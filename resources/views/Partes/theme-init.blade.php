<script>
(function(){
  var style = document.createElement('style');
  style.appendChild(document.createTextNode('*, *::before, *::after { transition: none !important; }'));
  document.head.appendChild(style);

  var t=localStorage.getItem('theme')||'light';
  document.documentElement.setAttribute('data-bs-theme',t);

  var enableTransitions = function() {
    setTimeout(function() {
      if (document.head.contains(style)) {
        document.head.removeChild(style);
      }
    }, 10);
  };

  window.addEventListener('load', enableTransitions);
  document.addEventListener('turbo:load', enableTransitions);
})();
</script>
