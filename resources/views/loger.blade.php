<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/gochat.js')}}"></script>
<script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
</head>
<body>
<div class="overlay"></div>

<div class="popup-container" id="popup-container">
  <div class="popup">
    <div class="popup-content">
      <form action="{{asset('/check')}}">
      <h2>¡Bienvenido!</h2>
      <label method="get">Nick:</label>
      <input type="text" name="nombre_usser" id="nombre_usser" required><br><br>
      <input type="submit" value="Enviar">
      </form>
    </div>
  </div>

</div>

</body>
</html>