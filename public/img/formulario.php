<?php

$nombres=$_POST['nombres'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];
$tipo_id=$_POST['tipo_id'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$tipo_hab=$_POST['tipo_hab'];




echo $nombres;
echo $apellido1;
echo $apellido2;
echo $tipo_id;
echo $email;
echo $tel;
echo $tipo_hab;

$sql="INSERT INTO reservas('nombres') VALUES('$nombres')";




?>
