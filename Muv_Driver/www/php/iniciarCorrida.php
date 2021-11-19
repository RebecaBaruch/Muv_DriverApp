<?php
include 'conexao.php';

session_start();


$query = mysqli_query($con, "update corrida set status='iniciada' where infUser =" . $_SESSION['clientId']);

if($query){ 
    echo 'iniciada';
} else echo 'naoiniciada';