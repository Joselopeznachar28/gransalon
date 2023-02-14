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
        </div><hr>

        <div class="container">
            <h2 class="text-center">DETALLES</h2><hr>
            <div class="row text-center">
                <div class="col-sm-2">
                    <h5 class="form-label">Codigo</h5>
                    <span>{{ $sale->code }}</span>
                </div>
                <div class="col-sm-2">
                    <h5 class="form-label">Forma de Pago</h5>
                    <span>{{ $sale->payment_form ? $sale->payment_form : 'CREDITO' }}</span>
                </div>
                <div class="col-sm-2">
                    <h5 class="form-label">Tipo de Pago</h5>
                    <span>{{ $sale->payment_type ? $sale->payment_type : 'CREDITO' }}</span>
                </div>
                <div class="col-sm-2">
                    <h5 class="form-label">Total USD</h5>
                    <span>{{ number_format(($sale->payment_total),2,',','.')}}</span>
                </div>
                <div class="col-sm-2">
                    <h5 class="form-label">Pago VEF</h5>
                    <span>{{ $sale->payment_vef ? number_format(($sale->payment_vef),2,',','.') : 0}}</span>
                </div>
                <div class="col-sm-2">
                    <h5 class="form-label">Codigo de Pago</h5>
                    <span>{{ $sale->payment_code ? $sale->payment_code : 'CREDITO'  }}</span>
                </div>
            </div><hr>
            <h2 class="text-center">PRODUCTOS DE LA {{$sale->code}}</h2><hr>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th >Producto</th>
                        <th >Cantidad</th>
                        <th >Precio Unitario</th>
                        <th >Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sale->productSales as $productSale)
                        <tr>
                            <td>{{$productSale->product->name}}</td>
                            <td>{{$productSale->quantity}}</td>
                            <td>{{$productSale->price}}</td>
                            <td>{{$productSale->totalToProduct}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: right">
                <span>Total Venta USD: <b>{{ number_format($sale->productSales->sum('totalToProduct'),2,',','.') }}</b></span><br>
                <span>Venta en VEF: <b>{{ number_format($sale->payment_vef,2,',','.') }}</b></span>
            </div>
        </div>
    </body>
</html>
