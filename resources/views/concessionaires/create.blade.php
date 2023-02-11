<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <form action="{{ route('concessionaires.store') }}" method="post">
    @csrf
    <div class="row container mt-5">
      <div class="col-sm-4">
        <div class="form-floating mb-3">
            <input type="name" class="form-control" required id="floatingName" placeholder="Nombre de Aliado" name="name">
            <label for="floatingName ">Nombre</label>
        </div>
      </div>
      <div class="col-sm-2">
        <button type="submit" class="btn btn-success p-3">Guardar</button>
      </div>
    </div>
  </form>
</body>
</html>