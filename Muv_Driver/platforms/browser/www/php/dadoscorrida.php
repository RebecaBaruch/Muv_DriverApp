<?php
include 'conexao.php';

$query = mysqli_query($con, "select * from corrida inner join usuario on infUser = codUser where infUser = 80");

$resul = mysqli_fetch_assoc($query);

echo json_encode($resul);
