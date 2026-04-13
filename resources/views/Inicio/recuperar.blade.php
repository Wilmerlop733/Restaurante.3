<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Recuperar Contraseña') }}</title>
  <style>
    body { background-color: #fff !important; color: #333 !important; }
  </style>
  <link rel="icon" href="/restaurante.png">
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
</head>
<body id="auth-page">

  <div class="container" id="container">
    
    <div class="form-container sign-in-container" style="width: 50%;">
      <form action="/recuperar" method="POST">
        @csrf
        <h1>{{ __('Restablecer') }}</h1>
        <span style="font-size: 11px; margin-top: 5px;">{{ __('Ingresa tus datos para crear una nueva contraseña.') }}</span>
        
        @if ($errors->any())
          <div style="color: #dc2626; background: #fef2f2; padding: 10px; border-radius: 8px; margin-bottom: 10px; font-size: 11px; width: 100%;">
            <ul style="margin: 0; padding-left: 20px; text-align: left;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <input type="text" name="name" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name') }}" required autofocus />
        <input type="email" name="email" placeholder="{{ __('Correo Electrónico') }}" value="{{ old('email') }}" required />
        <input type="password" name="password" id="resetPassword" placeholder="{{ __('Nueva Contraseña') }}" required />
        <input type="password" name="password_confirmation" placeholder="{{ __('Confirmar Contraseña') }}" required />
        
        <label style="font-size: 12px; color: #666; display: flex; align-items: center; align-self: flex-start; cursor: pointer; margin-top: 5px;">
          <input type="checkbox" id="showResetPassword" style="width: auto; margin: 0 8px 0 0; padding: 0;">
          {{ __('Mostrar contraseña') }}
        </label>

        <button type="submit" style="margin-top: 15px;">{{ __('Cambiar Contraseña') }}</button>
        <a href="/login" style="margin-top: 15px;">← {{ __('Volver al login') }}</a>
      </form>
    </div>
    
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1 class="white-text">{{ __('¡Tranquilo!') }}</h1>
          <p>{{ __('Restablece tu contraseña y sigue disfrutando de nuestros servicios.') }}</p>
        </div>
      </div>
    </div>
  </div>

  <canvas id="canvas1"></canvas>

  <script src="{{ asset('js/auth.js') }}"></script>
  <script src="{{ asset('js/auth-recuperar.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

