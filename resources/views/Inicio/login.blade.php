<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('Iniciar Sesión') }} / {{ __('Registro') }}</title>
    <script src="{{ asset('js/theme-head.js') }}"></script>
  <link rel="icon" href="/restaurante.png">
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
  <script src="{{ asset('js/auth-page-head.js') }}"></script>
</head>
<body id="auth-page" data-turbo="false" data-force-clear="{{ session('force_clear') ? '1' : '0' }}">
  <div class="container {{ (request()->is('registro') || $errors->hasAny(['email', 'password_confirmation', 'rol'])) ? 'right-panel-active' : '' }}" id="container">
    <div class="form-container sign-up-container">
      <form action="/registro" method="POST">
        @csrf
        <h1>{{ __('Crear Cuenta') }}</h1>
        @if ($errors->hasAny(['name', 'email', 'password', 'rol']) && (request()->is('registro') || $errors->hasAny(['email', 'password_confirmation', 'rol'])))
          <div class="auth-error-box">
            <ul class="auth-error-list">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <input type="text" name="name" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name') }}" required />
        <input type="email" name="email" placeholder="{{ __('Correo Electrónico') }}" value="{{ old('email') }}" required />
        <select name="rol" required class="auth-select">
            <option value="" disabled selected>{{ __('Seleccione un Rol') }}</option>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ __($role->name) }}</option>
            @endforeach
        </select>
        <input type="password" name="password" id="registerPassword" placeholder="{{ __('Contraseña') }}" required />
        <input type="password" name="password_confirmation" id="registerPasswordConfirmation" placeholder="{{ __('Confirmar Contraseña') }}" required />
        <label class="auth-show-password">
          <input type="checkbox" id="showRegisterPassword">
          {{ __('Mostrar contraseñas') }}
        </label>
        <button type="submit" class="auth-submit-btn">{{ __('Registrar') }}</button>
      </form>
    </div>
    
    <div class="form-container sign-in-container">
      <form action="/login" method="POST">
        @csrf
        <h1>{{ __('Iniciar Sesión') }}</h1>
        @if (session('status'))
          <div class="auth-success-box">
            {{ session('status') }}
          </div>
        @endif

        @if ($errors->has('login') || ($errors->any() && !request()->is('registro') && !$errors->hasAny(['email', 'password_confirmation', 'rol'])))
          <div class="auth-error-box">
            <ul class="auth-error-list">
              @foreach ($errors->get('login') as $error)
                <li>{{ $error }}</li>
              @endforeach
              @if(!$errors->has('login'))
                @foreach ($errors->all() as $error)
                   @if(!in_array($error, $errors->get('login')))
                    <li>{{ $error }}</li>
                   @endif
                @endforeach
              @endif
            </ul>
          </div>
        @endif
        <input type="text" name="login" placeholder="{{ __('Usuario') }}" value="{{ old('login') }}" required />
        <input type="password" name="password" id="loginPassword" placeholder="{{ __('Contraseña') }}" required />
        <label class="auth-show-password">
          <input type="checkbox" id="showLoginPassword">
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

  <script src="{{ asset('js/auth-login-page.js') }}"></script>
  <script src="{{ asset('js/auth.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
