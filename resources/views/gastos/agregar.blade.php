<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        .form-control::placeholder {
            color: #a8b3bd;
        }

        .title-platita {
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            font-size: 2rem;
        }
    </style>

    <title>Platita</title>
  </head>
  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal title-platita">Platita</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="/">Ir a Home</a>
            <a class="p-2 text-dark" href="/gastos">Ir a Gastos</a>
        </nav>
    </div>

    <div class="px-3 py-2 pt-md-4 pb-md-4 mx-auto text-center">
        <h2 class="display-4">Agregar gasto</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                    <form method="POST" action="/gastos/crear">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Edesur...">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pesos">Pesos</label>
                                <input type="number" class="form-control" id="pesos" name="pesos" placeholder="662" min="1">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="centavos">Centavos</label>
                                <input type="number" class="form-control" id="centavos" name="centavos" placeholder="1" min="0" max="99">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="dia">Dia</label>
                                <input type="number" class="form-control" id="dia" name="dia" placeholder="25" min="1" max="31">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mes">Mes</label>
                                <input type="number" class="form-control" id="mes" name="mes" placeholder="3" min="1" max="12">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="año">Año</label>
                                <input type="number" class="form-control" id="año" name="año" value="2019" min="2018" max="2019">
                            </div>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="pagado" name="pagado">
                            <label class="form-check-label" for="pagado">Pagado?</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>