<?php
include 'conexao.php';

session_start();

$query = mysqli_query($con, "update corrida set status='aceita' where infUser =" . $_SESSION['clientId']);

if($query){
    echo 'corrida aceita!';
} else echo 'corrida nao aceita;-;';