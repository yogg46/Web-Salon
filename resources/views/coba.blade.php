<!DOCTYPE html>
<html>

<head>
    <title>Salon Receipt</title>
    <style>
        /* CSS code for receipt styling */
        body,
        html {
            margin: 0;
            padding: 0;
        }

        /* Container for the receipt */
        .receipt {
            width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Header section */
        .receipt-header {
            text-align: center;
        }

        .receipt-header h1 {
            font-size: 24px;
            margin: 0;
        }

        /* Customer section */
        .receipt-customer {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .receipt-customer p {
            margin: 0;
            font-weight: bold;
        }

        /* Items section */
        .receipt-items {
            margin-bottom: 20px;
        }

        .receipt-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt-items th,
        .receipt-items td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .receipt-items th {
            text-align: left;
            font-weight: bold;
        }

        /* Total section */
        .receipt-total {
            text-align: right;
        }

        .receipt-total p {
            margin: 0;
            font-weight: bold;
        }

        /* Footer section */
        .receipt-footer {
            text-align: center;
            margin-top: 30px;
        }

        .receipt-footer p {
            margin: 0;
            font-size: 12px;
            color: #999;
        }

        /* Print media styles */
        @media print {
            @page {
                size: 30mm 58mm;
                /* Mengatur ukuran kertas */
            }

            body {
                width: 30mm;
                /* Mengatur lebar body sesuai dengan ukuran kertas */
                height: 58mm;
                /* Mengatur tinggi body sesuai dengan ukuran kertas */
                margin: 0;
                /* Menghapus margin */
                padding: 0;
                /* Menghapus padding */
            }

            .receipt {
                width: 100%;
                margin: 0;
                box-shadow: none;
            }

            /* Adjust other styles as needed for print layout */
        }
    </style>
</head>

<body>
    <div class="receipt">
        <div class="receipt-header">
            <h1>Salon Receipt</h1>
        </div>

        <div class="receipt-customer">
            <p>Customer: </p>
            <p>Date: </p>
        </div>

        <div class="receipt-items">
            <table>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Price</th>
                </tr>
                {{-- @foreach ($services as $service)
                <tr>
                    <td>{{ $service['name'] }}</td>
                    <td>{{ $service['price'] }}</td>
                </tr>
                @endforeach --}}
                <tr>
                    <td>choosing our salon!</td>
                    <td>1</td>
                    <td>10000</td>
                </tr>
            </table>
        </div>

        <div class="receipt-total">
            <p>Total: RP.10000</p>
        </div>

        <div class="receipt-footer">
            <p>Thank you for choosing our salon!</p>
        </div>
    </div>
</body>

</html>
