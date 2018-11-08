<?php
if (!empty($_SESSION['uid'])) {
    $session_uid = $_SESSION['uid'];
    include ('clase/ClaseUsuario.php');
    $userClass = new userClass();
}
if (empty($session_uid)) {
    $url = 'home.php';
    header("Location: $url");
}
?>
