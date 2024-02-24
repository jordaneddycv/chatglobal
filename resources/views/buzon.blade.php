<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('js/chatglobal.js')}}"></script>
<script>
        var baseUrl = '{{ url("") }}';
    </script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<!-- ddddddddddddddddddddddddddddddddddddddddd -->
<div style="display: flex; width: 100vw; height: 100vh">

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 20vw;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Chat Global</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      
    
    <?php foreach ($listaUsuarios as $usuario): ?>
    <li class="nav-item">
        <a onclick="seleccionChat(this)" id="<?php echo $usuario->id; ?>" class="nav-link" aria-current="page" value="<?php echo $usuario->id; ?>">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
            <?php echo $usuario->nombre; ?>
        </a>
    </li>
<?php endforeach; ?>
<br>
<hr><br>
<center>
      <a href="{{asset('cerrar')}}"><button type="button" class="btn btn-danger">Cerrar Sesion</button></a>
      </center>
    </ul>
    <hr>
    <!-- {{-- <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div> --}} -->
  </div>


  <div id="world" style="width: 80vw; height: 100vh; background-color:greenyellow">
    <div id="mostrar_mensaje"><h1>Bienvenid@ mis estimados y queridos amigos  y...... rebeca, probablemente no este con ustedes el dia de hoy :c asi que dejare algo para que me recuerden mientras no este... (bueno capaz si llego a la ultima hora xd pero regresare con justificante)</h1></div>
    <div id="enviar_mensaje" style="display: flex; align-items: center; justify-content: center;">
      <textarea name="buzon" id="buzon" cols="100" rows="1"></textarea>
      <button onclick="enviarMensaje()">
        >
      </button>
    </div>
  </div>


</div>
</body>
</html>