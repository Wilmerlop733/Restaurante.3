<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingredientes</title>
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        } else {
            document.documentElement.setAttribute('data-bs-theme', 'light');
        }
    </script>
    <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/theme.css?v=1.1">
</head>

<body>
    <div class="container mt-5">

        <h1>Listas de Ingredientes</h1>

        <div class="mb-3">
            <a href="/" class="btn btn-secondary">Volver</a>
            <a href="/ingrediente/create" class="btn btn-primary ms-2">Crear Ingrediente</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>IdIngrediente</th>
                    <th>Nombre</th>
                    <th>Inventario</th>
                    <th class="text-center">Surtir</th> <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                @foreach($dIngredientes as $ingrediente)
                <tr>
                    <td>{{ $ingrediente->id }}</td>
                    <td>{{ $ingrediente->nombreingre }}</td>
                    <td>{{ $ingrediente->inventario }} {{ $ingrediente->unidad_medida }}</td>

                    <td class="text-center">
                        <button type="button" class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#modalStock{{ $ingrediente->id }}">
                            <i class="bi bi-plus-lg"></i> Surtir
                        </button>
                    </td>

                    <td>
                        <a href="/ingrediente/{{ $ingrediente->id }}/edit" class="btn btn-success">Editar</a>
                    </td>

                    <td>
                        <a href="/ingrediente/{{ $ingrediente->id }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>

                <div class="modal fade" id="modalStock{{ $ingrediente->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Surtir: {{ $ingrediente->nombreingre }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('ingredientes.agregarStock', $ingrediente->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <p>Inventario actual: 
                                        @if($ingrediente->inventario < 0)
                                            <span class="badge bg-danger">
                                                <i class="bi bi-exclamation-triangle-fill"></i> {{ $ingrediente->inventario }} {{ $ingrediente->unidad_medida }} (Negativo)
                                            </span>
                                        @else
                                            <strong>{{ $ingrediente->inventario }} {{ $ingrediente->unidad_medida }}</strong>
                                        @endif
                                    </p>
                                    
                                    @if($ingrediente->inventario < 0)
                                        <div class="alert alert-warning small py-1">
                                            <i class="bi bi-info-circle"></i> Tu inventario es negativo. Te recomendamos surtir una cantidad mayor para normalizarlo o editar el ingrediente directamente.
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="cantidad_nueva" class="form-label">Cantidad a sumar:</label>
                                        <input type="number" step="0.01" name="cantidad_nueva" class="form-control" placeholder="Ej: 5.00" required autofocus>
                                        <div class="form-text">Esta cantidad se sumará directamente al total actual.</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar Inventario</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>