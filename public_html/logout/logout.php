<?php
    include_once '../../protected/login/includes/user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../index.php");

?>