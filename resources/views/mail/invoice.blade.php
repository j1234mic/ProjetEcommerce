<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        @foreach ($orders as $order)
                            <tr>
                                <td class="title">
                                    <h2>Company</h2>
                                </td>

                                <td>
                                    Invoice : 123 <br />
                                    Created: {{ $order->created_at }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td class="colspan = 2">
                    <table>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    {{ $order->address }} <br />
                                </td>
                                <td>
                                    {{ $order->name }} <br />
                                    {{ Session::get('client')->email  }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Payement Method
                </td>

                <td>
                    Check #
                </td>
            </tr>

            <tr class="details">
                <td>
                    Credit Cards
                </td>

                <td>
                <td>1000</td>
                </td>
            </tr>

            <table>
                <tr class="heading">
                    <td>
                        Item
                    </td>

                    <td>
                        Quantity
                    </td>

                    <td>
                        Unit Cost
                    </td>

                    <td>
                        Price
                    </td>
                </tr>

                <tr class="item">
                    <td>
                        Website design
                    </td>
                    <td></td>
                    <td></td>

                    <td>$75.00</td>
                </tr>

                <tr class="item-last">
                    <td>Domain name (1 year)</td>
                    <td></td>
                    <td></td>
                    <td>$10.00</td>
                </tr>

                <tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>
                        Total: $385.00
                    </td>
                </tr>
            </table>
        </table>
    </div>
</body>

</html>
