<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="row container mt-5">
          <div class="col-sm-3">
            <div class="form-floating mb-3">
                <input type="name" class="form-control" required id="floatingName" placeholder="Nombre de Aliado" name="name">
                <label for="floatingName ">Nombre</label>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-floating mb-3">
                <input type="name" class="form-control" required id="floatingName" placeholder="Precio del Producto" name="price">
                <label for="floatingName ">Precio</label>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-floating mb-3">
                <select name="concessionaire_id" id="floatingName" class="form-control">
                    @foreach ($concessionaires as $concessionaire)
                        <option value="{{ $concessionaire->id }}">{{ $concessionaire->name }}</option>
                    @endforeach
                </select>
                <label for="floatingName ">Aliado</label>
            </div>
          </div>
          <div class="col-sm-3">
            <button type="submit" class="btn btn-success p-3">Guardar</button>
          </div>
        </div>
        <a href="{{ redirect()->back()->getTargetUrl() }}" class="btn btn-secondary">Regresar</a>
      </form>
</body>
</html>