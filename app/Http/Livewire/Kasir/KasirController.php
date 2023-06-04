<?php

namespace App\Http\Livewire\Kasir;

use App\Models\Barang;
use App\Models\detailLayanan;
use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\CapabilityProfile;
use Carbon\Carbon;


class KasirController extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $s = '';
    public $cek = [];
    public $jumlah = [];

    public $total;
    public $item;
    public $bayar = 0;
    public $kembalian;
    public $pp;

    public function render()
    {
        $printerList = [];

        exec('wmic printer get name', $output);

        if (!empty($output)) {
            foreach ($output as $printer) {
                $printer = trim($printer);

                if (!empty($printer) && $printer !== 'Name') {
                    $printerList[] = ['NAME' => $printer];
                }
            }
        }

        return view('livewire.kasir.kasir-controller', [
            'kate' => Kategori::all(),
            'jasa' => Jasa::search('kategori_id', $this->s)->get(),
            'bar' => Jasa::pluck('nama_jasa', 'id'),
            'har' => Jasa::pluck('harga', 'id'),
            'lis' => $printerList,
        ])->extends(
            'layouts.main',
            [
                'tittle' => 'Kasir',
                'slug1' => ''
            ]
        )
            ->section('isi');
    }

    public function mount()
    {
        $this->harga = Jasa::pluck('harga', 'id');
        $this->harga_asli = Jasa::pluck('harga', 'id');
        $this->total = 0;
        $this->item = 0;
        $printerList = [];
        $defaultPrinter = '';

        exec('wmic printer get Name, Default', $output);

        if (!empty($output)) {
            foreach ($output as $printer) {
                $printer = trim($printer);

                if (!empty($printer) && $printer !== 'Name' && $printer !== 'Default') {
                    $printerName = $printer;
                    $isDefault = (bool) strstr($printer, "TRUE");

                    if ($isDefault) {
                        $defaultPrinter = $printerName;
                    }

                    $printerList[] = [
                        'NAME' => $printerName,
                        'DEFAULT' => $isDefault,
                    ];
                }
            }
        }

        // Move the default printer to the top of the list
        if (!empty($defaultPrinter)) {
            $printerList = array_merge([['NAME' => $defaultPrinter, 'DEFAULT' => true]], $printerList);
        }
        $pp = trim(str_replace('TRUE', '', $printerList[0]["NAME"]));
        $this->pp = $pp;
        // dd($pp);
        // $this->jumlah[$value] = max(1, $this->jumlah[$value] ?? 1);
    }

    public function itemTot()
    {
        $this->item = 0;
        // if (count($this->cek) == count($this->jumlah)) {

        //     $this->item = array_combine($this->cek, $this->jumlah);
        // }
        // foreach ($this->cek as $key => $value) {
        //     if (in_array($this->jumlah[$value], $this->cek, TRUE)) {
        //         $this->item += $this->jumlah[$value];
        //     };
        //     // @dd($this->jumlah[$value]);
        // }
    }

    public function susus($id)
    {
        $this->s = $id;
    }
    public $harga;
    public $harga_asli;

    public function TOT($itu)
    {

        $cek1 = Jasa::pluck('harga', 'id');
        $this->harga[$itu] = $this->jumlah[$itu] * $cek1[$itu];
        $this->totalasu();
        $this->itemTot();
    }

    public function rep($value)
    {
        $this->totalasu();
        $this->jumlah[$value] = max(1, $this->jumlah[$value] ?? 1);
        // $this->itemTot();
    }
    public function totalasu()
    {
        $this->harga[0] = 0;
        if ($this->total) {
            $this->total = 0;
            foreach ($this->cek as $key => $value) {

                $this->total += $this->harga[$value];
            }
        } else {
            foreach ($this->cek as $key => $value) {

                $this->total += $this->harga[$value];
            }
        }
    }
    public $layid;
    protected $rules = [
        'harga.*' => 'required|numeric',
        'jumlah.*' => 'required|numeric|min:1',
        'bayar' => 'required|numeric|min:1',
    ];

    public function save()
    {
        $this->validate(
            [
                'harga.*' => 'required|numeric',
                'jumlah.*' => 'required|numeric|min:1',
                'bayar' => 'required|numeric|min:1',
            ]
        );
        // dd($this->bayar);
        $layanan = Layanan::create([
            'tanggal' => now()->format('d-m-Y'),
            'total' => $this->total,
            'user_id' => Auth::user()->id,
        ]);
        $this->kembalian = $this->bayar - $this->total;
        // dd($url);
        foreach ($this->cek as $key => $value) {
            // dd($layanan->id);
            // // $layanan->layananRelasiDetail()->create([
            // //     'harga' => $this->harga_asli[$value],
            // //     'jumlah' => $this->jumlah[$value],
            // //     'subtotal' => $this->harga[$value],
            // //     'jasa_id' => $value
            // // ]);
            detailLayanan::create([
                'harga' => $this->harga_asli[$value],
                'jumlah' => $this->jumlah[$value],
                'subtotal' => $this->harga[$value],
                'jasa_id' => $value,
                'layanan_id' => $layanan->id
            ]);
            $this->layid = $layanan->id;
        }
        $url = url('/print/' . $this->layid) . '-' . $this->bayar . '-' . $this->kembalian . '-' . $this->pp;

        $this->alert('success', 'Data Berhasil Disimpan');

        $this->resetInput();
        // Redirect the user to the printing URL and open it in a new tab
        // return Redirect::away($url)
        //     ->with('success', 'Printing page opened in a new tab.')
        //     ->with('url', $url);

        // $url = 'https://www.example.com';
        // $newTabUrl = 'https://example.com/new-tab-url';
        // $this->dispatchBrowserEvent('openNewTab', ['url' => $url]);
        // $this->emit('openNewTab', $url);
        return redirect($url);
        // Redirect back to form page

    }



    public function resetInput()
    {
        $this->cek = [];
        $this->jumlah = [];
        $this->total = 0;
        $this->bayar = 0;
        $this->harga = Jasa::pluck('harga', 'id');
    }
}
