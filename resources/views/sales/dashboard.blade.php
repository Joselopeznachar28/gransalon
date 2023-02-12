<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <title>GRAN SALON</title>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">A&BGranSalon</h1>
            <img src="" alt="">
        </div>

        <div class="container flex">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
                Menu
              </button>
              
              <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="staticBackdropLabel">Menu de Navegacion</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('sales.create') }}" class="btn btn-outline-success mb-2">Venta</a></li>
                        <li><a href="{{ route('sales.pdf') }}" class="btn btn-outline-info mb-2">Reporte</a></li>
                    </ul>
                  </div>
                </div>
              </div>
        </div>

        <div class="container">
            <h2 class="text-center">Tablas de Ventas</h2>
            <div class="card">
                <input type="button" value="Pedidos Cancelados" class="card-head btn btn-dark "data-bs-toggle="collapse" href="#collapseVentas" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class="card-body">
                    <table class="table table-success table-striped text-center" id="collapseVentas">
                        <thead>
                            <tr>
                                <th>Codigo de Venta</th>
                                <th>Forma de Pago</th>
                                <th>Tipo de Pago</th>
                                <th>Total a Pagar USD</th>
                                <th>Total a Pagar VEF</th>
                                <th>Referencia</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody class="table-success">
                            @foreach ($paymentSales as $paymentSale)
                                <tr>
                                    <td>{{ $paymentSale->code }}</td>
                                    <td>{{ $paymentSale->payment_form }}</td>
                                    <td>{{ $paymentSale->payment_type }}</td>
                                    <td>{{ number_format(($paymentSale->payment_total),2,',','.')}}</td>
                                    <td>{{ number_format(($paymentSale->payment_vef),2,',','.')}}</td>
                                    <td>{{ $paymentSale->payment_code ? $paymentSale->payment_code : 'Pago en Efectivo' }}</td>
                                    <td><a href="{{route('sales.show', $paymentSale->id)}}">Detalles</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <input type="button" value="Pedidos a Credito" class="card-head btn btn-dark "data-bs-toggle="collapse" href="#collapseCreditos" role="button" aria-expanded="false" aria-controls="collapseExample">
                <div class="card-body">
                    <table class="table table-danger table-striped text-center" id="collapseCreditos">
                        <thead>
                            <tr>
                                <th>Codigo de Venta</th>
                                <th>Debe Pagar USD</th>
                                <th>Nota</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody class="table-danger">
                            @foreach ($credictSales as $credictSale)
                                <tr>
                                    <td>{{ $credictSale->code }}</td>
                                    <td>{{ number_format(($credictSale->payment_total),2,',','.')}}</td>
                                    <td>{{ $credictSale->note }}</td>
                                    <td><a href="{{route('sales.show', $credictSale->id)}}">Detalles</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
