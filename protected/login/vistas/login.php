<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://registroingresoem.000webhostapp.com/assets/logo-metalurgica.ico">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <main>
        <form action="" method="POST" autocomplete="off">
            <img class="logo" src="https://i.postimg.cc/sDfhxqHD/logo-metalurgica-1.png">
            <input type="text" name="username" placeholder="Ingrese su usuario">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <button type="submit"><i class='bx bx-lock-alt'></i>Ingresar</button>
            <?php
                if(isset($errorLogin)){
                    echo $errorLogin;
                }
            ?>
        </form>
    </main>
</body>
</html>