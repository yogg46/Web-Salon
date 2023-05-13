<table id="" class="table is-datatable is-hoverable table-is-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pegawai</th>
            <th>Keterangan</th>
            <th>Kas Keluar</th>
            <th>Kas Masuk</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        $total_masuk = 0;
        $total_keluar = 0;
        @endphp
        @foreach ($layanans as $key => $value)
            @if(is_array($value))
                @foreach ($value as $item)
                @php
                $total_masuk += $item['kas_masuk'] ?? 0;
                $total_keluar += $item['kas_keluar'] ?? 0;
                @endphp
                <tr>
                    @if ($loop->first)
                    <td rowspan="{{ count($value) }}">{{ $no++ }}</td>
                    <td rowspan="{{ count($value) }}">{{ $key }}</td>
                    @endif
                    @if(is_array($item))
                    <td>{{ $item['pegawai'] }}</td>
                    <td>{{ $item['keterangan'] }}</td>
                    <td>{{ $item['kas_keluar'] }}</td>
                    <td>{{ $item['kas_masuk'] }}</td>
                    @endif
                </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" style="text-align: center;">Total</th>
            <th>{{ "Rp. ".number_format($total_keluar) }}</th>
            <th>{{ "Rp. ".number_format($total_masuk) }}</th>
        </tr>
    </tfoot>
</table>
