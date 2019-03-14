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
        </nav>
        <a class="p-2 btn btn-outline-secondary" href="/gastos/agregar">Agregar gasto</a>
    </div>

    <div class="px-3 py-2 pt-md-4 pb-md-4 mx-auto text-center">
        <h2 class="display-4">Gastos</h2>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4">
                @foreach ($gastos as $gasto)
                    <div class="card bg-light mb-3 shadow-sm">
                        <div class="card-header">{{ $gasto->nombre }}</div>
                        <div class="card-body">
                            <h5 class="card-title">${{ $gasto->monto }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                @if (strpos($gasto->vencimiento->locale('es')->diffForHumans(), 'hace') !== false)
                                    Venció {{ $gasto->vencimiento->locale('es')->diffForHumans() }}
                                @else
                                    Vence {{ $gasto->vencimiento->locale('es')->diffForHumans() }}
                                @endif
                            </h6>

                            <p class="card-text">
                            @if ($gasto->pagado)
                                <span class="badge badge-pill badge-success">Pagado</span>
                            @else
                                <span class="badge badge-pill badge-warning">No se pagó aun</span>
                            @endif
                            </p>

                        </div>
                        <div class="card-footer text-muted">
                            <form method="POST" action="/gastos/borrar" class="float-right pl-2">
                                @csrf
                                <input id="borrar_{{ $gasto->id }}" name="borrar_id" type="hidden" value="{{ $gasto->id }}">
                                <button type="submit" class="btn btn-sm btn-link text-danger">Borrar</button>
                            </form>
                            @if (!$gasto->pagado)
                                <form method="POST" action="/gastos/pagar" class="float-right pl-2">
                                    @csrf
                                    <input id="pagar_{{ $gasto->id }}" name="pagar_id" type="hidden" value="{{ $gasto->id }}">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Pagado!</button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
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