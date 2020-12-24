<?php
session_start();
$_SESSION = array();
session_destroy();
header('Location: /Ave_Noel/index.php');
?>