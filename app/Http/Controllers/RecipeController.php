<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
// use Mike42\Escpos\ImagePrintBuffer;
use Mike42\Escpos\PrintBuffers\EscposPrintBuffer;
use Mike42\Escpos\PrintBuffers\ImagePrintBuffer;
use Mike42\Escpos\CapabilityProfile;
use Termwind\Components\Dd;

class RecipeController extends Controller
{
    public function printRecipe($id, $bayar, $kembalian, $print)
    {
        $data = Layanan::where('id', $id)->withSum('layananRelasiDetail', 'jumlah')->first();
        // dd(number_format($data->total));
        $profile = CapabilityProfile::load("POS-5890");
        $connector = new WindowsPrintConnector($print);
        $printer = new Printer($connector, $profile);

        try {



            $subtotal = new item('Total', 'Rp.' . number_format($data->total));
            $Bayar = new item('Bayar', 'Rp.' . number_format($bayar));
            $Kembali = new item('Kembali', 'Rp.' . number_format($kembalian));

            $invoiceNumber = $data->manufaktur;

            setlocale(LC_TIME, 'id_ID');
            \Carbon\Carbon::setLocale('id');

            $date = Carbon::now()->isoFormat('dddd, D MMMM Y');


            $pp = public_path('nota1.png');
            $logo = EscposImage::load($pp, false);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            if ($profile->getSupportsGraphics()) {
                $printer->graphics($logo);
            }
            if ($profile->getSupportsBitImageRaster() && !$profile->getSupportsGraphics()) {
                $printer->bitImage($logo);
            }
            $printer->setEmphasis(true);
            $printer->text("--------------------------------\n");
            $printer->text("No Faktur: " . $invoiceNumber . "\n");
            $printer->text("Tanggal: " . $date . "\n");
            $printer->text("--------------------------------\n");
            $printer->text("Layanan       Qty       Subtotal\n");
            $printer->text("--------------------------------\n");
            $printer->setEmphasis(false);

            // Layanan          Qty     Subtotal


            $printer->setJustification(Printer::JUSTIFY_LEFT);


            foreach ($data->layananRelasiDetail as $key) {
                // dd($key->detailRelasiJasa);
                # code...
                $printer->text($this->buatBaris1Kolom($key->detailRelasiJasa->nama_jasa));
                $printer->text($this->buatBaris3Kolom('Rp.' . number_format($key->harga), $key->jumlah, 'Rp.' . number_format($key->subtotal)));
            }







            $printer->setEmphasis(true);
            $printer->text("--------------------------------\n");
            $printer->text($this->buatBaris3Kolom("Qty", $data->layananRelasiDetail->sum('jumlah'), "", true));
            $printer->text($subtotal->getAsString(32));
            $printer->text("--------------------------------\n");
            $printer->text($Bayar->getAsString(32));
            $printer->text($Kembali->getAsString(32));
            $printer->text("--------------------------------\n");
            $printer->setEmphasis(false);
            $printer->feed();
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("Thank You! Please visit again\n");



            // // Cut the paper
            $printer->cut();

            // // Close the printer
            $printer->close();
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle any errors
            echo $e->getMessage();
            return redirect()->back();
            // return redirect()->route('kasir');
        }
    }

    private function fitWithinLine($string, $limit)
    {
        if (strlen($string) > $limit) {
            $string = substr($string, 0, $limit - 3) . '...';
        }
        return $string;
    }

    function buatBaris1Kolom($kolom1)
    {
        // Mengatur lebar setiap kolom (dalam satuan karakter)
        $lebar_kolom_1 = 32;

        // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n
        $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);

        // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
        $kolom1Array = explode("\n", $kolom1);

        // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
        $jmlBarisTerbanyak = count($kolom1Array);

        // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
        $hasilBaris = array();

        // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris
        for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

            // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan,
            $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");

            // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
            $hasilBaris[] = $hasilKolom1;
        }

        // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
        return implode($hasilBaris) . "\n";
    }

    function buatBaris3Kolom($kolom1, $kolom2, $kolom3, $p = false)
    {
        // Mengatur lebar setiap kolom (dalam satuan karakter)
        if ($p) {
            # code...
            $lebar_kolom_1 = 3;
            $lebar_kolom_2 = 12;
            $lebar_kolom_3 = 15;
        } else {
            $lebar_kolom_1 = 13;
            $lebar_kolom_2 = 2;
            $lebar_kolom_3 = 15;
        }

        // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n
        $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
        $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
        $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

        // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
        $kolom1Array = explode("\n", $kolom1);
        $kolom2Array = explode("\n", $kolom2);
        $kolom3Array = explode("\n", $kolom3);

        // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
        $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

        // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
        $hasilBaris = array();

        // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris
        for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

            // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan,
            $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
            // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
            $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ", STR_PAD_LEFT);

            $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

            // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
            $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
        }

        // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
        return implode($hasilBaris) . "\n";
    }
}
class item
{
    private $name;
    private $price;
    private $dollarSign;

    public function __construct($name = '', $price = '', $dollarSign = false)
    {
        $this->name = $name;
        $this->price = $price;
        $this->dollarSign = $dollarSign;
    }

    public function getAsString($width = 48)
    {
        $rightCols = 12;
        $leftCols = $width - $rightCols;
        if ($this->dollarSign) {
            $leftCols = $leftCols / 2 - $rightCols / 2;
        }
        $left = str_pad($this->name, $leftCols);

        $sign = ($this->dollarSign ? '$ ' : '');
        $right = str_pad($sign . $this->price, $rightCols, ' ', STR_PAD_LEFT);
        return "$left$right\n";
    }

    public function __toString()
    {
        return $this->getAsString();
    }
}
