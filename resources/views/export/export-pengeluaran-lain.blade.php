<table id="" class="table is-datatable is-hoverable table-is-bordered">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Manufaktur</th> --}}
            <th>tanggal</th>
            <th>Keterangan</th>
            <th>Kasir</th>
            <th>Subtotal</th>


        </tr>
    </thead>
    @php
    $no =1;
    @endphp
    <tbody>
        @foreach ($layanans as $v)
        <tr>
            <td>
                {{ $no++ }}
            </td>
            <td>
                {{ $v->tanggal->format('d-m-Y') }}
            </td>
            <td>
                {{ $v->keterangan }}
            </td>
            <td>
                {{ $v->kasir->name }}
            </td>
            <td>
                {{ 'Rp. '. number_format($v->total, 0, ',', '.') }}
            </td>

        </tr>

        @endforeach

    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"></th>
            <th>Total</th>



            <td><b>{{ 'Rp. '.number_format(collect($layanans)->sum('total'), 0, ',', '.') }}</b></td>

        </tr>
    </tfoot>
</table>
