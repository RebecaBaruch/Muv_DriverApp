<?php
include 'conexao.php';

session_start();

$query = mysqli_query($con, "update corrida set status='aceita', infDriver=". $_SESSION['codDriver'] . " where infUser =" . $_SESSION['clientId']);