<?php
header('Content-Type: text/html; charset=utf-8');
$conexao = mysqli_connect('localhost', 'publico', 'ede02e60172b237f72e48299bce8ac8e', 'pcdcurriculo');
mysqli_query($conexao, "SET NAMES 'utf8'");
mysqli_query($conexao, 'SET character_set_connection=utf8');
mysqli_query($conexao, 'SET character_set_client=utf8');
mysqli_query($conexao, 'SET character_set_results=utf8');
?>