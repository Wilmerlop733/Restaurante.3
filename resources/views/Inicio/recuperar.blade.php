<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restablecer Contraseña</title>
  <link rel="icon" href="/restaurante.png">
  <link rel="stylesheet" href="{{ asset('css/login-style.css') }}">
</head>
<body>

  <div class="container" id="container">
    
    <div class="form-container sign-in-container" style="width: 50%;">
      <form action="/recuperar" method="POST">
        @csrf
        <h1>Restablecer</h1>
        <span style="font-size: 11px; margin-top: 5px;">Ingresa tus datos para crear una nueva contraseña.</span>
        
        @if ($errors->any())
          <div style="color: #dc2626; background: #fef2f2; padding: 10px; border-radius: 8px; margin-bottom: 10px; font-size: 11px; width: 100%;">
            <ul style="margin: 0; padding-left: 20px; text-align: left;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <input type="text" name="name" placeholder="Nombre de Usuario" value="{{ old('name') }}" required autofocus />
        <input type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required />
        <input type="password" name="password" id="resetPassword" placeholder="Nueva Contraseña" required />
        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required />
        
        <label style="font-size: 12px; color: #666; display: flex; align-items: center; align-self: flex-start; cursor: pointer; margin-top: 5px;">
          <input type="checkbox" id="showResetPassword" style="width: auto; margin: 0 8px 0 0; padding: 0;">
          Mostrar contraseña
        </label>

        <button type="submit" style="margin-top: 15px;">Cambiar Contraseña</button>
        <a href="/login" style="margin-top: 15px;">← Volver al login</a>
      </form>
    </div>
    
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <h1 class="white-text">¡Tranquilo!</h1>
          <p>Restablece tu contraseña y sigue disfrutando de nuestros servicios.</p>
        </div>
      </div>
    </div>
  </div>

  <canvas id="canvas1"></canvas>

  <script src="{{ asset('js/auth.js') }}"></script>
  <script>
    const showResetPassword = document.getElementById('showResetPassword');
    const resetPassword = document.getElementById('resetPassword');
    const resetPasswordConfirmation = document.querySelector('input[name="password_confirmation"]');
    
    if (showResetPassword && resetPassword && resetPasswordConfirmation) {
        showResetPassword.addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';
            resetPassword.type = type;
            resetPasswordConfirmation.type = type;
        });
    }
  </script>
</body>
</html>
