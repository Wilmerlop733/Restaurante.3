<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Iniciar Sesión') }} / {{ __('Registro') }}</title>
  <link rel="icon" href="/restaurante.png">
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
  <script>

    if (typeof Turbo !== 'undefined') {
      Turbo.session.drive = false;
    }
    
    localStorage.removeItem('theme');
    localStorage.clear();
    document.documentElement.setAttribute('data-bs-theme', 'light');
    
    if (sessionStorage.getItem('force_clear')) {
      sessionStorage.removeItem('force_clear');
      location.reload();
    }
  </script>
</head>
<body id="auth-page" data-turbo="false">

  <div class="container {{ request()->is('registro') ? 'right-panel-active' : '' }}" id="container">
    <div class="form-container sign-up-container">
      <form action="/registro" method="POST">
        @csrf
        <h1>{{ __('Crear Cuenta') }}</h1>
        @if ($errors->any() && request()->is('registro'))
          <div style="color: #dc2626; background: #fef2f2; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 12px; width: 100%;">
            <ul style="margin: 0; padding-left: 20px; text-align: left;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <input type="text" name="name" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name') }}" required />
        <input type="email" name="email" placeholder="{{ __('Correo Electrónico') }}" value="{{ old('email') }}" required />
        <input type="password" name="password" id="registerPassword" placeholder="{{ __('Contraseña') }}" required />
        <input type="password" name="password_confirmation" id="registerPasswordConfirmation" placeholder="{{ __('Confirmar Contraseña') }}" required />
        <label style="font-size: 12px; color: #666; display: flex; align-items: center; align-self: flex-start; cursor: pointer; margin-top: 5px;">
          <input type="checkbox" id="showRegisterPassword" style="width: auto; margin: 0 8px 0 0; padding: 0;">
          {{ __('Mostrar contraseñas') }}
        </label>
        <button type="submit" style="margin-top: 15px;">{{ __('Registrar') }}</button>
      </form>
    </div>
    
    <div class="form-container sign-in-container">
      <form action="/login" method="POST">
        @csrf
        <h1>{{ __('Iniciar Sesión') }}</h1>
        @if (session('status'))
          <div style="color: #059669; background: #ecfdf5; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 12px; width: 100%;">
            {{ session('status') }}
          </div>
        @endif
        @if ($errors->any() && request()->is('login'))
          <div style="color: #dc2626; background: #fef2f2; padding: 10px; border-radius: 8px; margin-bottom: 15px; font-size: 12px; width: 100%;">
            <ul style="margin: 0; padding-left: 20px; text-align: left;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        <input type="text" name="name" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name') }}" required />
        <input type="password" name="password" id="loginPassword" placeholder="{{ __('Contraseña') }}" required />
        <label style="font-size: 12px; color: #666; display: flex; align-items: center; align-self: flex-start; cursor: pointer; margin-top: 5px;">
          <input type="checkbox" id="showLoginPassword" style="width: auto; margin: 0 8px 0 0; padding: 0;">
          {{ __('Mostrar contraseña') }}
        </label>
        <a href="/recuperar">{{ __('¿Olvidaste tu contraseña?') }}</a>
        <button type="submit">{{ __('Ingresar') }}</button>
      </form>
    </div>
    
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="white-text">{{ __('¡Bienvenido de nuevo!') }}</h1>
          <p>{{ __('Para mantenerte conectado, inicia sesión con tu información personal') }}</p>
          <button class="ghost" id="signIn">{{ __('Iniciar Sesión') }}</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="white-text">{{ __('¡Hola!') }}</h1>
          <p>{{ __('Ingresa tus datos personales y comienza tu viaje con nosotros') }}</p>
          <button class="ghost" id="signUp">{{ __('Registrarse') }}</button>
        </div>
      </div>
    </div>
  </div>

  <canvas id="canvas1"></canvas>

  <script>
    document.addEventListener('DOMContentLoaded', function() {

      if (typeof Turbo !== 'undefined') {
        Turbo.session.drive = false;
      }
      
      localStorage.removeItem('theme');
      localStorage.clear();
      
      document.documentElement.setAttribute('data-bs-theme', 'light');
      
      @if(session('force_clear'))
        sessionStorage.setItem('force_clear', 'true');
        window.location.href = window.location.href;
      @endif
    });
  </script>

  <script src="{{ asset('js/auth.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

