<?php

include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

    $query = mysqli_query($con, "SELECT * FROM motorista WHERE email='$email' AND senha='$senha'");

        if(mysqli_num_rows($query) == 0){
            echo 'error';
        }else {            
            $result = mysqli_fetch_assoc($query);
            if(!isset($_SESSION)) session_start();

            $_SESSION['codDriver'] = $result["codDriver"];            
            echo 'success';
        }