<?php

$servidor="localhost";
$usuario="root";
$senha="";
$banco="angotube";

$conecta = mysqli_connect($servidor,$usuario,$senha,$banco);
$sql = "SELECT * FROM `categorias`";
$resultadoCate = mysqli_query($conecta, $sql);
?>