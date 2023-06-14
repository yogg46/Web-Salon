<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Fransisco</title>
    <link rel="icon" type="image/png" href="/assets/img/logos/logo/logo4.png" />
    <style>
        @import url('http://fonts.cdnfonts.com/css/vcr-osd-mono');

        body {
            font-family: 'VCR OSD Mono';
            color: #000;
            text-align: center;
            display: flex;
            justify-content: center;
            font-size: 10px;
        }

        .bill {
            width: 300px;
            /* box-shadow: 0 0 3px #aaa; */
            box-sizing: border-box;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .table {
            border-collapse: collapse;
            /* width: 100%; */
            /* table-layout: auto; */
            width: 100%;
        }

        .table .header {
            border-top: 1px dashed #000;
            /* font-style: normal; */
            border-bottom: 1px dashed #000;
            margin-bottom: 5px;
        }

        .table {
            text-align: left;
        }

        .th {
            font-weight: normal;
        }

        .table .total td:first-of-type {
            border-top: none;
            border-bottom: none;
        }

        .table .total td {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
        }

        .table .net-amount td:first-of-type {
            border-top: none;
        }

        .table .net-amount td {
            border-top: 1px dashed #000;
        }

        .table .net-amount {
            border-bottom: 1px dashed #000;
        }

        @media print {

            @page {
                size: 21mm 58mm;
                /* Mengatur ukuran kertas */
            }



            .bill {
                width: 90%;
                margin: 0;
                box-shadow: none;
            }
            .brand{
                width: 60%;
            }


        }
    </style>
    {{-- <script>
        window.onload = function() {
            window.print();
            window.onfocus = function() {
                window.close();
            }
        }
    </script> --}}
    <script>
        window.onload = function() {
            // Check if the print dialog was opened
            var printed = false;
            window.print();
            setTimeout(function() {
                printed = true;
            }, 500); // Wait for 500ms (0.5 seconds) before setting printed to true

            // Close the window only if the print dialog was opened
            window.onfocus = function() {
                if (printed) {
                    window.close();
                }
            };
        };
    </script>
</head>

<body>
    <div class="bill">
        <div class="brand" style=" width: 100%;font-size:10px;">

            {{-- <strong> Fransisco </strong>
            <span style="font-size: 7px;">
                Profesonal Salon
            </span> --}}
            <img src="/assets/img/nota.png" style="max-width: 120px;filter: grayscale(100%);
            height: auto;"
                alt="" srcset="">


        </div>

        <hr>

        {{-- <div> </div> --}}
        <div class="bill-details" style="font-size: 10px;margin-bottom: 5px;">
            <div class="flex justify-between" style="">
                <div>NOTA NO : {{ $data->manufaktur }}</div>
                {{-- <div>TABLE NO: 091</div> --}}
            </div>
            @php
                setlocale(LC_TIME, 'id_ID');
                \Carbon\Carbon::setLocale('id');
            @endphp

            <div class="flex justify-between">
                <div>TANGGAL : {{ $data->created_at->translatedFormat('d F Y') }}</div>
                {{-- <div>TIME: 14:10</div> --}}
            </div>

        </div>
        <table class="table">
            <tr class="header">
                {{-- <th style="width: 5%; font-weight: normal;">
                    No
                </th> --}}
                <th style="width: 40%; font-weight: normal;">
                    Layanan
                </th>

                <th style="width: 5%; font-weight: normal;">
                    Qty
                </th>
                <th style="text-align: end; width: 60%; font-weight: normal;text-align: end;">
                    Subtotal
                </th>
            </tr>
            <tr>
                <th></th>

            </tr>
            <tr>
                <th></th>

            </tr>
            <tr>
                <th></th>

            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($data->layananRelasiDetail as $key)
                <tr>
                    <td colspan="3">{{ $key->detailRelasiJasa->nama_jasa }}</td>
                </tr>
                <tr>
                    {{-- <td>{{ $no++ }}</td> --}}
                    <td colspan="1">Rp. {{ number_format($key->harga) }}</td>
                    <td style="text-align: center;">{{ $key->jumlah }}</td>
                    <td style="text-align: end;">
                        Rp. {{ number_format($key->subtotal) }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <th></th>

            </tr>
            <tr>
                <th></th>

            </tr>
            <tr>
                <th></th>

            </tr>
            <tr class="total" style="margin-top: 2px">
                {{-- <td></td> --}}
                {{-- <td></td> --}}
                <td>Total</td>
                <td style="text-align: center;">{{ $data->layananRelasiDetail->sum('jumlah') }}</td>
                <td style="text-align: end;">Rp. {{ number_format($data->total) }}</td>

            </tr>
            <tr>
                {{-- <td></td> --}}

                <td>Tunai</td>
                <td></td>
                <td style="text-align: end;">Rp. {{ number_format($bayar) }}</td>
            </tr>
            <tr class="net-amount">
                {{-- <td></td> --}}

                <td>Kembali</td>
                <td></td>
                <td style="text-align: end;">Rp. {{ number_format($kembalian) }}</td>
            </tr>
        </table>
        <br>
        {{-- Payment Method:Card<br>
                Transaction ID: 082098082783 --}}
        {{-- <br>Username: Pradeep [Biller] <br> --}}
        Thank You ! Please visit again
        <br>
        ------------------------------
    </div>
</body>

</html>
