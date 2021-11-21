<?php
include 'conexao.php';

session_start();
session_destroy();

$home = 'login.html';
echo $home;
exit;


?>