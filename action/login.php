<?php

	include "..\conexao.php";

	session_start();

	$uname = $_POST['uname'];
	$psw = $_POST['psw'];

	$verifica = "SELECT * FROM usuarios WHERE nome = '$uname' AND senha = '$psw' "; 

	$result_id = mysqli_query($con,$verifica) or die("Erro no banco de dados!"); 
	$total = mysqli_num_rows($result_id); 

	if($total <= 0 ) {

		unset ($_SESSION['uname']);
  		unset ($_SESSION['psw']);		
		echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../index.html';</script>";
          	die();
	} 

	else {
		
		$_SESSION['uname'] = $uname;
		$_SESSION['psw'] = $senha;
		header("Location:../index_two.php");
	}
?>