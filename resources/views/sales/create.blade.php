<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Productos</title>
</head>
<body>
    <div class="container">
        
        <form action="{{ route('sales.store') }}" method="post">
            @csrf
    
            <div class="d-flex justify-content-around mt-5">
                <h2>Productos</h2>
                <input type="button" onclick="addProducts()" class="btn btn-success" value="Agregar Productos" id="buttonAddProducts">
            </div><hr>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingProduct0" name="products[0][product_id]" onchange="changeProducts(0)">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                          <option selected disabled>-- Seleccionar --</option>
                        </select>
                        <label for="floatingProduct0">Alimentos y Bebidas</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <input type="number" readonly class="form-control" id="floatingPrice0" onchange="changeTotal(0)" name="products[0][price]">
                        <label for="floatingPrice0">Precios</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingQuantity0" onchange="changeTotal(0)" placeholder="Cantidad del Producto" name="products[0][quantity]">
                        <label for="floatingQuantity0">Cantidad</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingTotalProduct0" placeholder="Cantidad del Producto" readonly name="products[0][totalToProduct]">
                        <label for="floatingTotalProduct0">Total</label>
                    </div>
                </div>
            </div><br>
            
            <div class="row" id="otherProducts"></div><br><hr>
            <span>Total USD =</span>
            <span id="totalSale"></span>

            <div class="row">
                <h2 class="text-center">Informacion del Pago</h2><hr>
                <div class="col-sm-2">
                    <div class="form-floating">
                        <select class="form-select" id="floatingFormPayment" name="sale_type">
                          <option selected disabled>Tipo de Venta</option>
                          <option value="paga">A Pagar</option>
                          <option value="credito">A Credito</option>
                        </select>
                        <label for="floatingFormPayment">Venta</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingFormPayment" name="payment_form">
                          <option selected disabled>Seleccione una forma de pago</option>
                          <option value="transferencia">Transferencia</option>
                          <option value="efectivo">Efectivo</option>
                          <option value="pm">Pago Movil</option>
                          <option value="pdv">Punto de Venta</option>
                          <option value="mixta">Mixta</option>
                        </select>
                        <label for="floatingFormPayment">Forma de Pago</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingTypePayment" name="payment_type">
                            <option selected disabled>Seleccione el tipo de pago</option>
                            <option value="vef">Bolivares</option>
                            <option value="usd">Divisas</option>
                            <option value="mixta">Mixta</option>
                        </select>
                        <label for="floatingTypePayment">Tipo de Pago</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingPriceDollar" disabled readonly  value='24.20' name="priceDollar" min="0.1" step="0.1">
                        <label for="floatingPriceDollar">Tasa BCV</label>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingPaymentCode" placeholder="Codigo del Pago" name="payment_code" >
                        <label for="floatingPaymentCode">Nro de Referencia</label>
                    </div>
                </div>
            </div><hr>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-floating">
                        <textarea class="form-control" id="floatingNote" name="note"></textarea>
                        <label for="floatingNote">Nota</label>
                      </div>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-success" onclick="return ('Seguro desea guardar esta venta?')">Guardar</button>
                    <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="/js/addProducts.js"></script>
<script>
    const products = @json($products);
</script>
</html>
