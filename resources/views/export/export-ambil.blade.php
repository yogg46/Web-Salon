<table id="" class="table is-datatable is-hoverable table-is-bordered">
    <thead>
        <tr>
            <th colspan="5">LAPORAN PENGAMBILAN  </th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Pengambil</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($layanans as $s)
        <tr>
            <td>{{ $s->no_pengambilan }}</td>
            <td>{{ $s->tanggal->format('d-m-Y') }}</td>
            <td>{{ $s->pengambilanRelasiBarang->nama_barang }}</td>
            <td>{{ $s->jumlah }}</td>
            <td>{{ $s->pengambilanRelasiUser->name }}</td>

        </tr>
        @endforeach

    </tbody>
</table>
