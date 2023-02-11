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
                        <select class="form-select" id="floatingProduct" name="products[0][name]">
                          <option selected disabled>-- Seleccionar --</option>
                          <option disabled class="bg-black text-bold text-white">Bebidas</option>
                          <option value="santa_teresa">Santa Teresa Linaje</option>
                          <option value="old_par">Old Par 12</option>
                          <option value="buchanans_12">Buchanan's 12</option>
                          <option value="buchanans_18">Buchanan's 18</option>
                          <option value="diplomatico_re">Diplomatico R.E.</option>
                          <option value="grey_goose">Grey Goose</option>
                          <option value="espumante">Espumante</option>
                          <option value="vino_blanco">Vino Blanco</option>
                          <option value="red_bull">Red Bull</option>
                          <option value="agua_gasificada">Agua Gasificada</option>
                          <option value="refresco_lata">Refresco de Lata</option>
                          <option value="soda">Soda</option>
                          <option value="aguakina">AguaKina</option>
                          <option value="agua">Agua</option>
                          <option disabled class="bg-black text-bold text-white">Alimentos</option>
                          <option value="sushi">Sushi</option>
                          <option value="tequeño">Tequeño</option>
                          <option value="carpaccio_lomito">Carpaccio Lomito</option>
                          <option value="ceviche">Ceviche</option>
                          <option value="coctel_camarones">Coctel De Camarones</option>
                          <option value="pizza">Pizza</option>
                        </select>
                        <label for="floatingProduct">Alimentos y Bebidas</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingPrice" name="products[0][price]">
                          <option selected disabled>-- Seleccionar --</option>
                          <option disabled class="bg-black text-bold text-white">Bebidas</option>
                          <option value = 60 >USD 60</option>
                          <option value = 100 >USD 100</option>
                          <option value = 50 >USD 50</option>
                          <option value = 20 >USD 20</option>
                          <option value = 7 >USD 7</option>
                          <option value = 5 >USD 5</option>
                          <option value = 3 >USD 3</option>
                          <option value = 1 >USD 1</option>
                          <option disabled class="bg-black text-bold text-white">Alimentos</option>
                          <option value = 30 >30</option>
                          <option value = 12 >12</option>
                          <option value = 25 >25</option>
                          <option value = 20 >20</option>
                        </select>
                        <label for="floatingPrice">Precios</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="quantity" placeholder="Cantidad del Producto" name="products[0][quantity]">
                        <label for="quantity">Cantidad</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-floating">
                        <select class="form-select" id="floatingProduct" name="products[0][concessionaire_id]">
                            @foreach ($concessionaires as $concessionaire)
                                <option value="{{ $concessionaire->id }}">{{ $concessionaire->name }}</option>
                            @endforeach
                            <option selected disabled>-- Seleccionar --</option>
                        </select>
                        <label for="floatingProduct">Aliado Comercial</label>
                    </div>
                </div>
            </div><br>
            
            <div class="row" id="otherProducts"></div><br><hr>

            <div class="row">
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
                        <input type="number" class="form-control" id="floatingPriceDollar" placeholder="Ingrese Tasa BCV Actual" name="priceDollar" min="0.1" step="0.1">
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
    const concessionaires = @json($concessionaires);
</script>
</html>
