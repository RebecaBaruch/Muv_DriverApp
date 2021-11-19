<?php
include 'conexao.php';

session_start();

$localDriver = $_POST['localdriver'];

$query = mysqli_query($con, "update corrida set status='finalizada' where infUser =" . $_SESSION['clientId']);