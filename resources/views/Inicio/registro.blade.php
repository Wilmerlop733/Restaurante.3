<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Iniciar Sesión') }} / {{ __('Registro') }}</title>
    <link rel="icon" href="/restaurante.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login-style.css') }}?v={{ time() }}">
</head>

<body id="auth-page">

    <div class="container {{ request()->is('registro') ? 'right-panel-active' : '' }}" id="container">

        <div class="form-container sign-up-container">
            <form action="/registro" method="POST">
                @csrf
                <h1>{{ __('Crear Cuenta') }}</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>{{ __('o usa tu correo para registrarte') }}</span>
                @if ($errors->any() && request()->is('registro'))
                  <div style="color: #dc2626; font-size: 11px; margin-bottom: 10px;">{{ $errors->first() }}</div>
                @endif
                <input type="text" name="name" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name') }}" required />
                <input type="email" name="email" placeholder="{{ __('Correo Electrónico') }}" value="{{ old('email') }}" required />
                <input type="password" name="password" id="registerPassword" placeholder="{{ __('Contraseña') }}" required />
                <input type="password" name="password_confirmation" id="registerPasswordConfirmation" placeholder="{{ __('Confirmar Contraseña') }}" required />
                <label style="font-size: 11px; color: #666; display: flex; align-items: center; align-self: flex-start; cursor: pointer;">
                  <input type="checkbox" id="showRegisterPassword" style="width: auto; margin: 0 5px 0 0; padding: 0;"> 
                  <span style="color: #666;">{{ __('Mostrar contraseñas') }}</span>
                </label>
                <button style="margin-top: 10px;">{{ __('Registrar') }}</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="/login" method="POST">
                @csrf
                <h1>{{ __('Iniciar Sesión') }}</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>{{ __('o usa tu cuenta') }}</span>
                @if (session('status'))
                  <div style="color: #059669; font-size: 11px;">{{ session('status') }}</div>
                @endif
                @if ($errors->any() && request()->is('login'))
                  <div style="color: #dc2626; font-size: 11px;">{{ $errors->first() }}</div>
                @endif
                <input type="text" name="name" placeholder="{{ __('Nombre de Usuario') }}" value="{{ old('name') }}" required />
                <input type="password" name="password" id="loginPassword" placeholder="{{ __('Contraseña') }}" required />
                <label style="font-size: 11px; color: #666; display: flex; align-items: center; align-self: flex-start; cursor: pointer;">
                  <input type="checkbox" id="showLoginPassword" style="width: auto; margin: 0 5px 0 0; padding: 0;"> 
                  <span style="color: #666;">{{ __('Mostrar contraseña') }}</span>
                </label>
                <a href="/recuperar">{{ __('¿Olvidaste tu contraseña?') }}</a>
                <button>{{ __('Ingresar') }}</button>
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

    <script src="{{ asset('js/auth.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

