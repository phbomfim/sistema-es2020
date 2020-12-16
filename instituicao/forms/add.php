<?php 
 
	include "..\conexao.php";
	 
	$nome = $_POST['nome'];
	$endereco = $_POST['endereco'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$mec = $_POST['mec'];
	$mantenedora = $_POST['mantenedora'];
	$usuario = $_POST['usuario'];

	$insere = "INSERT INTO instituicao (id, nome, endereco, cidade, estado, mec, mantenedora, usuario)
		 VALUES (NULL,'$nome' ,'$endereco', '$cidade', '$estado', '$mec' ,'$mantenedora','$usuario' )";
		 
	if (mysqli_query($con, $insere)) {
		echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado!');window.location.href='../index.php';</script>";
	}
	
	else {
		echo "Error: " . $insere . "<br>" . mysqli_error($con);
	}

	exit('<meta http-equiv="refresh" content="4;url=../index.php" />');

?>
 	