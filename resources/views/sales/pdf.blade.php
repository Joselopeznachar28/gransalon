<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>GRAN SALON</title>

        <style>
            .page-break {
                page-break-after: always;
            }

            @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

            body {
                margin: .5cm;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #2a0927;
                color: white;
                text-align: center;
                line-height: 30px;
            }

            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                background-color: #2a0927;
                color: white;
                text-align: center;
                line-height: 35px;
            }

            table{
                text-align: center;
            }

        </style>
    </head>
    <body>
        <div>
            <h1>A&BGranSalon - Caja N° Prueba</h1>
            <img src="" alt="">
        </div>
        <!-- pagos -->
        <div class="page-break">
            <h2>Pedidos Pagos</h2>
            <table>
                <thead>
                    <tr>
                        <th>Codigo de Venta</th>
                        <th>Forma de Pago</th>
                        <th>Tipo de Pago</th>
                        <th>Total a Pagar USD</th>
                        <th>Total a Pagar VEF</th>
                        <th>Referencia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paymentSales as $paymentSale)
                        <tr>
                            <td>{{ $paymentSale->code }}</td>
                            <td>{{ $paymentSale->payment_form }}</td>
                            <td>{{ $paymentSale->payment_type }}</td>
                            <td>{{ number_format(($paymentSale->payment_total),2,',','.')}}</td>
                            <td>{{ number_format(($paymentSale->payment_vef),2,',','.')}}</td>
                            <td>{{ $paymentSale->payment_code ? $paymentSale->payment_code : 'Pago en Efectivo' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br><hr>
            <div style="text-align: right">
                <span>Total Ingresos USD: <b>{{ number_format($paymentSales->sum('payment_total'),2,',','.') }}</b></span><br>
                <span>Ingresos en VEF: <b>{{ number_format($paymentSales->sum('payment_vef'),2,',','.') }}</b></span>
            </div>
        </div>
        <!-- credito -->
        <div>
            <h2>Pedidos A Credito</h2>
            <table >
                <thead>
                    <tr>
                        <th>Codigo de Venta</th>
                        <th>Pagar USD</th>
                        <th>Nota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($credictSales as $credictSale)
                        <tr>
                            <td>{{ $credictSale->code }}</td>
                            <td>{{ number_format(($credictSale->payment_total),2,',','.')}}</td>
                            <td>{{ $credictSale->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br><hr>
            <div style="text-align: right">
                <span>Total Ingresos USD: <b>{{ number_format($credictSales->sum('payment_total'),2,',','.') }}</b></span><br>
            </div>
        </div>
    </body>

    </html>
