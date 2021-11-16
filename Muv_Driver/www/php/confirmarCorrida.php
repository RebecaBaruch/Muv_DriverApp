<?php
include 'conexao.php';

session_start();

$localDriver = $_POST['localdriver'];

$query = mysqli_query($con, "update corrida set driverLocal='$localDriver', status='aceita', infDriver=". $_SESSION['codDriver'] ." where infUser =" . $_SESSION['clientId']);