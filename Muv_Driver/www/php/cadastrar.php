<?php 
include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

    $queryValidacao = mysqli_query($con, "select * from motorista where email='$email'");
    if(mysqli_num_rows($queryValidacao) != 0){
        echo 'ja existe um usuario!';
    }else{
        $query = mysqli_query($con, "INSERT INTO motorista (email, senha, telefone) VALUES ('$email', '$senha', '$telefone')");            
            if($query){                
                if(!isset($_SESSION)) session_start();
                $querySessao = mysqli_query($con, "select * from motorista where email='$email'");                                       
                $result = mysqli_fetch_assoc($querySessao);

                $_SESSION['codDriver'] = $result["codDriver"];
                echo 'success';
            }            
            else{
            echo 'erro ao cadastrar';
            }

        }
        
?>