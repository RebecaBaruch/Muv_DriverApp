<?php
include 'conexao.php';

$query = mysqli_query($con,'select * from corrida where status="motorista" order by idCorrida DESC');



    $resul = mysqli_fetch_object($query);
    echo json_encode($resul);

