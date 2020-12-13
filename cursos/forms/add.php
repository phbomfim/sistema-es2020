<?php 
 
	include "..\conexao.php";
	 
	$nome = $_POST['nome'];
	$grau = $_POST['grau'];
	$codigo = $_POST['codigo'];
	$ato_auto = $_POST['ato_auto'];
	$ato_rec = $_POST['ato_rec'];
	$ato_ren = $_POST['ato_ren'];
	$obs = $_POST['obs'];

	$insere = "INSERT INTO cursos (id, nome, grau, codigo, ato_auto, ato_rec, ato_ren, obs)
		 VALUES (NULL,'$nome' ,'$grau', '$codigo', '$ato_auto', '$ato_rec' ,'$ato_ren','$obs')";
		 
	if (mysqli_query($con, $insere)) {
		echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado!');window.location.href='../index.php';</script>";
	}
	
	else {
		echo "Error: " . $insere . "<br>" . mysqli_error($con);
	}

	exit('<meta http-equiv="refresh" content="4;url=../index.php" />');

?>
 	