<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservas php</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="../js/create.js" async></script>       
</head>
<body>
  <?php include "../shared/navbar.php"?>

  <div class="container mt-4">
    <div class="row">
      <div class="col">
        <div class="form__container border border-2 p-3 w-50 mx-auto">
          <h3 class="text-center text-secondary">Ingresar una nueva reserva</h3>
          
          <form action="/conexion-db/actions/createReserva.php" method="POST">
            <div class="my-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="my-3">
              <label for="apellido" class="form-label">Apellido:</label>
              <input type="text" class="form-control" name="apellido" id="apellido">
            </div>

            <div class="row">
              <div class="col-6 my-3">
                <label for="hora" class="form-label">Hora:</label>
                <input type="time" class="form-control" name="hora" id="hora">
              </div>
              <div class="col-6 my-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" name="fecha" id="fecha">
              </div>
            </div>

            <div class="my-3">
              <label for="servicio" class="form-label">Servicio:</label>
              <input type="text" class="form-control" name="servicio" id="servicio">
            </div>
            <div class="mt-2 text-center">
              <button type="submit" class="btn btn-primary shadow">Realizar Reserva</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

</body>
</html>

<!-- $nombre, $apellido, $hora, $fecha, $servicio -->