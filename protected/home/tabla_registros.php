<!DOCTYPE html>
<html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://registroingresoem.000webhostapp.com/assets/logo-metalurgica.ico">
  <!-- <meta http-equiv="refresh" content="5"> -->
  <link rel="stylesheet" href="css/styles.css">
  <title>Registro Empleados</title>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <img src="./assets/logo-metalurgica.png" alt="logo">
    <h1> Registro Empleados </h1>
  </header>
  <main>
    <a class="logout" href="/logout/logout.php">
        <button type="button" class="boton-logout"><i class='bx bx-log-in' style='color:#ffffff'></i>Cerrar sesión</button>
    </a>
  <?php

  include 'conexion.php';

  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }
  
  try {
    $consulta_sql = "SELECT nombre, apellido, fecha_registro FROM Tb_Registro ORDER BY fecha_registro DESC LIMIT 20";
  } catch (\Throwable $th) {
    echo "ERROR EN LA CONSULTA";
  }

  echo '
  <table>
    <tbody>
      <tr> 
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha de registro</th>       
      </tr>';

  if ($datos = $link->query($consulta_sql)) {
    while ($fila = $datos->fetch_assoc()) {
      $fila_nombre = $fila["nombre"];
      $fila_apellido = $fila["apellido"];
      $fila_fecha = $fila["fecha_registro"];

      echo '
        <tr> 
          <td>' . $fila_nombre . '</td> 
          <td>' . $fila_apellido . '</td> 
          <td>' . $fila_fecha . '</td>
        </tr>';
    }

    $datos->free();
  }

  $link->close();
  ?>
    </tbody>
  </table>
  <div>
      <h2>Registro completo</h2>
      <form action="/generar-pdf/generar_pdf.php" method="post">
            <button type="submit" class="download"><i class='bx bxs-download'></i>Descargar</button>
      </form>
  </div>
  </main>
  <hr>
  <footer>
      <h4>Realizado por Román Martinez</h4>
      <h4>&copy 2023</h4>
  </footer>
</body>
</html>