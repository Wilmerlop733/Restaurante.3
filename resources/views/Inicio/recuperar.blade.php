<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Recuperar Contraseña') }}</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body id="auth-page" class="auth-recuperar-body">

  <div class="container" id="container">
    
    <div class="form-container sign-in-container auth-form-half">
      <form action="/recuperar" method="POST">
        @csrf
        <h1>{{ __('Restablecer') }}</h1>
        <span class="auth-subtitle">{{ __('Ingresa tus datos para crear una nueva contraseña.') }}</span>
        
        @if ($errors->any())
          <div class="auth-error-box">
            <ul class="auth-error-list">
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
        
        <label class="auth-show-password">
          <input type="checkbox" id="showResetPassword">
          {{ __('Mostrar contraseña') }}
        </label>

        <button type="submit" class="auth-submit-btn">{{ __('Cambiar Contraseña') }}</button>
        <a href="/login" class="auth-submit-btn">← {{ __('Volver al login') }}</a>
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

