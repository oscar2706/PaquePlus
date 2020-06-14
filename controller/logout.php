<?php
session_start();
session_unset();
session_destroy();
$host = $_SERVER['HTTP_HOST'];
header("Location: http://$host/PaquePlus/index.php");
