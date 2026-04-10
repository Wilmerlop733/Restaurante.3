<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Editar Usuario') }} - {{ __('Restaurante') }}</title>
    <link rel="icon" href="/restaurante.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/theme.css">
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        }
    </script>
</head>
<body class="bg-body-tertiary">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow">
                    <div class="card-header bg-success text-white py-3">
                        <h5 class="mb-0"><i class="bi bi-pencil-square"></i> {{ __('Editar Usuario') }}: {{ $usuario->name }}</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('Nombre Completo') }}</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $usuario->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('Correo Electrónico') }}</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <hr class="my-4">
                            <p class="text-muted small"><i class="bi bi-info-circle"></i> {{ __('Deja la contraseña en blanco si no deseas cambiarla.') }}</p>

                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('Nueva Contraseña (Opcional)') }}</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">{{ __('Confirmar Nueva Contraseña') }}</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">{{ __('Cambiar Rol') }}</label>
                                <select name="rol" class="form-select @error('rol') is-invalid @enderror" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $usuario->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rol') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ $usuario->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="is_active">{{ __('Usuario Habilitado') }}</label>
                                </div>
                                <small class="text-muted">{{ __('Si se deshabilita, el usuario no podrá entrar al sistema.') }}</small>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-success w-100 py-2 shadow-sm">{{ __('Guardar Cambios') }}</button>
                                <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary w-100 py-2 shadow-sm">{{ __('Cancelar') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('turbo:load', function() {
            const currentTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', currentTheme);
        });
    </script>
</body>
</html>
