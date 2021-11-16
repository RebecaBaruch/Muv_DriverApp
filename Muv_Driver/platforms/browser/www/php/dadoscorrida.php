<?php
include 'conexao.php';

session_start();

$query = mysqli_query($con, "select * from corrida inner join usuario on infUser = codUser where infUser =" . $_SESSION['clientId']);

$resul = mysqli_fetch_assoc($query);

echo json_encode($resul);
