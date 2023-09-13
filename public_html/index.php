<?php

include_once '../protected/login/includes/user.php';
include_once '../protected/login/includes/user_session.php';

$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    $_SESSION['loggedin'] = true;
    $user->setUser($userSession->getCurrentUser());
    include_once '../protected/home/tabla_registros.php';
}
else if(isset($_POST['username']) && isset($_POST['password'])){
    
    $userForm = $_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExists($userForm, $passForm)){
        // echo "Usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        $_SESSION['loggedin'] = true;
        include_once '../protected/home/tabla_registros.php';
    } else{
        $errorLogin = "Nombre de usuario y/o password es incorrecto";
        include_once '../protected/login/vistas/login.php';
    }
}
else{
    $_SESSION['loggedin'] = false;
    include_once '../protected/login/vistas/login.php';
}

?>