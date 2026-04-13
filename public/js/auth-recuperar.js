document.addEventListener('DOMContentLoaded', function () {
  var showResetPassword = document.getElementById('showResetPassword');
  var resetPassword = document.getElementById('resetPassword');
  var resetPasswordConfirmation = document.querySelector('input[name="password_confirmation"]');

  if (showResetPassword && resetPassword && resetPasswordConfirmation) {
    showResetPassword.addEventListener('change', function () {
      var type = this.checked ? 'text' : 'password';
      resetPassword.type = type;
      resetPasswordConfirmation.type = type;
    });
  }
});
