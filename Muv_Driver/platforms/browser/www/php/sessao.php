<?php
include 'conexao.php';


session_start();

    $codDriver = $_SESSION['codDriver'];

    $query = mysqli_query($con,"select * from motorista where codDriver='$codDriver'");
    $info = mysqli_fetch_object($query);
    echo json_encode($info);
 
?>