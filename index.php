<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas php</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="./app.js" async></script>       
</head>
<body>

  <div class="container mt-3">
    <h3 class="text-center mt-4 display-6">Tabla de Reservaciones</h3>
    <hr class="mt-0">
     
    <div class="row">
      <div class="col-12 col-md-4 col-lg-3">
        <small>Seleccione que datos desea ver:</small>
        <select class="form-select shadow ms-md-2" onchange="mostrarDB()" id="opcion" name="opcion">
          <option selected disabled>Selecione una opcion</option>
          <option value="*">Mostrar todos</option>
          <option value="nombre">Nombres</option>
          <option value="apellido">Apellidos</option>
          <option value="nombre, hora">Nombre y Hora</option>
          <option value="nombre, fecha">Nombre y Fecha</option>
          <option value="nombre, servicios">Nombre y Servicio</option>
        </select>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col">

        <div class="table-responsive">
          <table class="table table-dark table-striped table-hover" id="resultado">
            <thead class="papas">
              <tr class="text-center">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Hora</th>
                <th>Fecha</th>
                <th>Servicios</th>
              </tr>
            </thead>
          </table>
        </div>

      </div>
    </div>

    <div class="row">
      <div class="col">
        <nav aria-label="Page navigation" class="d-flex justify-content-center" id="navigation">
        </nav>
      </div>
    </div>

  </div>
  
  
  <footer>
    <p class="text-center bg-dark text-white m-0 p-3">Ariz Hernandez&copy; - 2021</p>
  </footer>

</body>
</html>