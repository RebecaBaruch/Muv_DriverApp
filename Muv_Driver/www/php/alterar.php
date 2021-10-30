<?php

include 'conexao.php';

session_start();

$codDriver = $_SESSION['codDriver'];

$email = $_POST['email'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$data = $_POST['data'];

$dataAtual = date('d-m-Y');
$driverYears = date_diff(date_create($data), date_create($dataAtual));

$idade = $driverYears->format("%y");

$query = mysqli_query($con,"update motorista set email='$email',senha='$senha',telefone='$telefone',nome='$nome',
idade='$idade' where codDriver='$codDriver'");
    if($query){
        echo 'success';
    }else{
        echo 'error';
    } 

?>