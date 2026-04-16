<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Restaurante</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/theme.css">
    <script src="https://unpkg.com/@hotwired/turbo@7.1.0/dist/turbo.es2017-umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @include('Partes.theme-init')
</head>
<body>
    <div class="container page-container">
        @include('Partes.navbar')
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <div>
                <h1 class="mb-0"><i class="bi bi-people-fill text-primary"></i> {{ __('Gestión de Usuarios') }}</h1>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('usuarios.create') }}" class="btn btn-primary shadow-sm">
                    <i class="bi bi-plus-circle"></i> {{ __('Crear Usuario Nuevo') }}
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm">{{ session('error') }}</div>
        @endif

        <div class="card border-0 shadow-sm overflow-hidden">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">{{ __('Nombre') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Rol') }}</th>
                        <th>{{ __('Estado') }}</th>
                        <th>{{ __('Fecha Registro') }}</th>
                        <th class="text-end pe-4">{{ __('Acciones') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                    <tr>
                        <td class="ps-4 fw-bold">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($user->roles as $role)
                                <span class="badge rounded-pill bg-info text-dark px-3">{{ $role->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            @if($user->is_active)
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3">{{ __('Activo') }}</span>
                            @else
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3">{{ __('Inactivo') }}</span>
                            @endif
                        </td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="text-end pe-4">
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-sm btn-outline-success shadow-sm">
                                <i class="bi bi-pencil"></i> {{ __('Editar') }}
                            </a>
                            @if(auth()->id() !== $user->id)
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger shadow-sm" onclick="return confirm('{{ __('¿Estás seguro de eliminar este usuario?') }}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
