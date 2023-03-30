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
            font-size: 25px;
        }

        .bill {
            width: auto;
            box-shadow: 0 0 3px #aaa;
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
            width: 100%;
        }

        .table .header {
            border-top: 2px dashed #000;
            border-bottom: 2px dashed #000;
        }

        .table {
            text-align: left;
        }

        .table .total td:first-of-type {
            border-top: none;
            border-bottom: none;
        }

        .table .total td {
            border-top: 2px dashed #000;
            border-bottom: 2px dashed #000;
        }

        .table .net-amount td:first-of-type {
            border-top: none;
        }

        .table .net-amount td {
            border-top: 2px dashed #000;
        }

        .table .net-amount {
            border-bottom: 2px dashed #000;
        }

        @media print {

            .hidden-print,
            .hidden-print * {
                display: none !important;
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
</head>

<body>

    <div style="text-align:center">
        <!-- <h1>Print HTML Card from Javascript</h1>
    <p>This card is 300px x 400px ⇔ 3.125in x 4.17in (300/96 and 400/96 respectivelly)</p> -->

        <div id="card" style=" height:auto; border-radius: 10px; background-color:rgb(255, 255, 255);">
            <div class="bill">
                <div class="brand">
                    <strong> Fransisco </strong>
                    <br>
                    Profesonal Salon
                </div>
                <div class="address">
                    Jl. Sarean Taman No.2 Madiun
                </div>
                <div class="shop-details">
                    Telp. 081 335 407 915
                </div>
                <div> </div>
                <div class="bill-details">
                    <div class="flex justify-between">
                        <div>NOTA NO: {{ $data->manufaktur }}</div>
                        {{-- <div>TABLE NO: 091</div> --}}
                    </div>
                    <div class="flex justify-between">
                        <div>TANGGAL: {{ $data->tanggal }}</div>
                        {{-- <div>TIME: 14:10</div> --}}
                    </div>
                </div>
                <table class="table">
                    <tr class="header">
                        <th>
                            Barang
                        </th>
                        <th>
                            Harga
                        </th>
                        <th>
                            Jumlah
                        </th>
                        <th style="text-align: end;">
                            Subtotal
                        </th>
                    </tr>
                    @foreach ($data->layananRelasiDetail as $key)
                        <tr>
                            <td>{{ $key->detailRelasiJasa->nama_jasa }}</td>
                            <td>Rp. {{ $key->harga }}</td>
                            <td style="text-align: center;">{{ $key->jumlah }}</td>
                            <td class="is-end text-end">
                                Rp. {{ number_format($key->subtotal) }}
                            </td>
                        </tr>
                    @endforeach

                    <tr class="total">
                        <td></td>
                        <td>Total</td>
                        <td style="text-align: center;">{{ $data->layananRelasiDetail->sum('jumlah') }}</td>
                        <td>Rp. {{ number_format($data->total) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tunai</td>
                        <td></td>
                        <td>Rp. {{ number_format($bayar) }}</td>
                    </tr>
                    <tr class="net-amount">
                        <td></td>
                        <td>Kembali</td>
                        <td></td>
                        <td>Rp. {{ number_format($kembalian) }}</td>
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
        </div>

        <hr />
        <label class="checkbox">
            <input type="checkbox" id="useDefaultPrinter" /> <strong>Print to Default printer</strong>
        </label>
        <p>or...</p>
        <div id="installedPrinters">
            <label for="installedPrinterName">Select an installed Printer:</label>
            <select name="installedPrinterName" id="installedPrinterName"></select>
        </div>
        <br /><br />
        <button type="button" onclick="printElement();">Print Now...</button>
    </div>



    <script src="/assets/JSPrintManager.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.5/bluebird.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        //WebSocket settings
        JSPM.JSPrintManager.auto_reconnect = true;
        JSPM.JSPrintManager.start();
        JSPM.JSPrintManager.WS.onStatusChanged = function() {
            if (jspmWSStatus()) {
                //get client installed printers
                JSPM.JSPrintManager.getPrinters().then(function(myPrinters) {
                    var options = '';
                    for (var i = 0; i < myPrinters.length; i++) {
                        options += '<option>' + myPrinters[i] + '</option>';
                    }
                    $('#installedPrinterName').html(options);
                });
            }
        };

        //Check JSPM WebSocket status
        function jspmWSStatus() {
            if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Open)
                return true;
            else if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Closed) {
                alert(
                    'JSPrintManager (JSPM) is not installed or not running! Download JSPM Client App from https://neodynamic.com/downloads/jspm'
                );
                return false;
            } else if (JSPM.JSPrintManager.websocket_status == JSPM.WSStatus.Blocked) {
                alert('JSPM has blocked this website!');
                return false;
            }
        }

        //Do printing...
        function print(o) {
            if (jspmWSStatus()) {
                //generate an image of HTML content through html2canvas utility
                html2canvas(document.getElementById('card'), {
                    scale: 5
                }).then(function(canvas) {

                    //Create a ClientPrintJob
                    var cpj = new JSPM.ClientPrintJob();
                    //Set Printer type (Refer to the help, there many of them!)
                    if ($('#useDefaultPrinter').prop('checked')) {
                        cpj.clientPrinter = new JSPM.DefaultPrinter();
                    } else {
                        cpj.clientPrinter = new JSPM.InstalledPrinter($('#installedPrinterName').val());
                    }
                    //Set content to print...
                    var b64Prefix = "data:image/png;base64,";
                    var imgBase64DataUri = canvas.toDataURL("image/png");
                    var imgBase64Content = imgBase64DataUri.substring(b64Prefix.length, imgBase64DataUri.length);

                    var myImageFile = new JSPM.PrintFile(imgBase64Content, JSPM.FileSourceType.Base64,
                        'myFileToPrint.png', 1);
                    //add file to print job
                    cpj.files.push(myImageFile);

                    //Send print job to printer!
                    cpj.sendToClient();


                });
            }
        }
    </script>


</body>

</html>
