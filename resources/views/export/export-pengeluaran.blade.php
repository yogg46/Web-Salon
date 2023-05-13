<table id="" class="table is-datatable is-hoverable table-is-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Manufaktur</th>
            <th>tanggal</th>
            <th>Petugas Gudang</th>
            <th>Suplier</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Subtotal</th>

        </tr>
    </thead>
    @php
    $no =1;
    @endphp
    <tbody>
        @foreach ($layanans as $v)
        <tr>
            <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $no++ }}</td>
            <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->manufaktur }}</td>
            <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->tanggal->format('d-m-Y')
                }}</td>
            <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{ $v->pembelianRelasiUser->name
                }}</td>
            <td rowspan="{{ count($v->pembelianRelasiDetail)+1 }}">{{
                $v->pembelianRelasiSuplier->nama_suplier }}</td>


        </tr>
        @foreach ($v->pembelianRelasiDetail as $items)
        <tr>
            <td>
                {{ $items->detailRelasiBarang->nama_barang }}
            </td>
            <td>
                {{ $items->jumlah }}
            </td>
            <td>
                {{ $items->subtotal }}
            </td>
        </tr>
        @endforeach
        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th colspan="5"></th>
            <th>Total</th>
            <th>{{ collect($layanans)->sum(function($layanan) { return
            $layanan->pembelianRelasiDetail->sum('jumlah'); })
                }}</th>

            {{-- <th>Suplier</th> --}}
            <td><b>{{ 'Rp. '.number_format(collect($layanans)->sum(function($layanan) { return
                    $layanan->pembelianRelasiDetail->sum('subtotal'); }), 0, ',', '.') }}</b></td>
            {{-- <th>Rincian</th> --}}
        </tr>
    </tfoot>
</table>
