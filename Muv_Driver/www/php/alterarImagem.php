<?php
include 'conexao.php';

session_start();

$codDriver = $_SESSION['codDriver'];

$driverImg = $_FILES['file'];
$filetype = $driverImg['type'];

if($filetype == 'image/pjpeg' || $filetype == 'image/PJPEG' || $filetype == 'image/jpeg' || $filetype == 'image/JPEG' || $filetype == 'image/jpg' || $filetype == 'image/JPG' || $filetype == 'image/png' || $filetype == 'image/PNG' || $filetype == 'image/gif' || $filetype == 'image/GIF' || $filetype == 'image/bmp' || $filetype == 'image/BMP'){
    if($driverImg['size'] > 1000000){
        echo('Arquivo muito grande. Tamanho máximo permitido 500ktb. O aqrquivo enviado contém'.round($arquivo['size']/1024).'kb');
    }

    $novonome = md5(mt_rand(1, 1000).$driverImg['name']).'jpg';
    $dr = '../driverimg/';
    $caminho = $dr.$novonome;

    move_uploaded_file($_FILES['file']['tmp_name'], $caminho);

    $qlastimg = mysqli_query($con, "select imgperfil from motorista where codDriver='$codDriver'");
    $lastimg = mysqli_fetch_array($qlastimg);

    if(empty($lastimg[0])){
        $query = mysqli_query($con, "update motorista set imgperfil='$novonome' where codDriver='$codDriver'");
        if($query) echo $novonome;
        else echo "error";
    }else{
        //se o usuario ja cadastrou outra imagem anteriormente ela ser apagada
        unlink('../driverimg/' . $lastimg[0]);
        $query = mysqli_query($con, "update motorista set imgperfil='$novonome' where codDriver='$codDriver'");
        if($query) echo $novonome;
        else echo "error";
    }
}