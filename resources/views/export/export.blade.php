<table id="" class="table is-datatable is-hoverable table-is-bordered">
    <thead>
        <tr>
            <th colspan="7">LAPORAN PEMASUKAN  </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Manufaktur</th>
            <th>tanggal</th>
            <th>Kasir</th>
            <th>Layanan</th>
            <th>Jumlah</th>
            <th>Subtotal</th>

        </tr>
    </thead>

    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach ($layanans as $v)
        <tr>

            <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                {{ $no++ }}
            </td>
            <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                {{ $v->manufaktur }}
            </td>
            <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                {{ $v->tanggal->format('d-m-Y') }}
            </td>
            <td rowspan="{{ count($v->layananRelasiDetail)+1 }}">
                {{ $v->layananRelasiUser->name }}
            </td>
        </tr>
        @foreach ($v->layananRelasiDetail as $items)
        <tr>
            <td>
                {{ $items->detailRelasiJasa->jasaRelasiKategori->kategori }} - {{ $items->detailRelasiJasa->nama_jasa }}
            </td>
            <td>
                {{ $items->jumlah }}
            </td>
            <td>
                {{$items->subtotal}}
            </td>
        </tr>
        @endforeach

        @endforeach


    </tbody>
    <tfoot>
        <tr>
            <th colspan="4"></th>
            <th>Total</th>
            <th>{{ collect($layanans)->sum(function($layanan) { return
            $layanan->layananRelasiDetail->sum('jumlah'); })
                }}</th>

            {{-- <th>Suplier</th> --}}
            <td><b>{{ 'Rp. '.number_format(collect($layanans)->sum(function($layanan) { return
                    $layanan->layananRelasiDetail->sum('subtotal'); }), 0, ',', '.') }}</b></td>
            {{-- <th>Rincian</th> --}}
        </tr>
    </tfoot>
</table>
