<?php 
 
	include "..\conexao.php";
	 
	$role = $_POST['role'];
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$cpf = $_POST['cpf'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$aut = $_POST['aut'];

	$insere = "INSERT INTO usuarios (id, role, nome, sobrenome, cpf, telefone, email, senha, aut)
		 VALUES (NULL,'$role' ,'$nome', '$sobrenome', '$cpf', '$telefone' ,'$email','$senha','$aut')";
		 
	if (mysqli_query($con, $insere)) {
		echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado!');window.location.href='../index.php';</script>";
	}
	
	else {
		echo "Error: " . $insere . "<br>" . mysqli_error($con);
	}

	exit('<meta http-equiv="refresh" content="4;url=../index.php" />');

?>
 	