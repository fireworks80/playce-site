<?php
  function script($jsCode = '') {
    echo "
    <!DOCTYPE html>
    <html>
    <body>
    <script type=\"text/javascript\">
      $jsCode
    </script>
    </body>
    </html>
    ";
  }
  function alert($msg = '', $script = '') {
    echo script("
      $script
      alert('$msg');
    ");
  }
  function alertNClose($msg = '', $script = '') {
    echo script("
      $script
      alert('$msg')
      window.close();
    ");
  }
?>