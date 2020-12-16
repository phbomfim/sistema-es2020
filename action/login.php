<?php

	include "..\conexao.php";

	session_start();

	$uname = $_POST['uname'];
	$senha = $_POST['psw'];
	$role = $_POST['role'];

	$verifica = "SELECT * FROM usuarios WHERE nome = '$uname' AND senha = '$senha' AND role = '$role' "; 

	$result_id = mysqli_query($con,$verifica) or die("Erro no banco de dados!"); 
	$total = mysqli_num_rows($result_id); 

	// Função
	function intervaloEntreDatas($inicio, $fim, $agora) {
		$inicioTimestamp = strtotime($inicio);
		$fimTimestamp = strtotime($fim);
		$agoraTimestamp = strtotime($agora);
		return (($agoraTimestamp >= $inicioTimestamp) && ($agoraTimestamp <= $fimTimestamp));
	}
	
	// Parametros
	$inicio = '08:00:00';
	$fim = '18:00:00';
	$agora = date("H:i:s");
	
	// Chamada
	if(intervaloEntreDatas($inicio,$fim,$agora)){
		if($total > 0) {

			$_SESSION['uname'] = $uname;
			$_SESSION['psw'] = $senha;
			$_SESSION['role'] = $role;
	
			header("Location:../index_two.php");
		} 
	
		else {
			unset ($_SESSION['uname']);
			unset ($_SESSION['psw']);
			unset ($_SESSION['role']);
			echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha e/ou atribuição incorreta');window.location.href='../index.html';</script>";
				  die();
		}
	} 
	
	else {
		unset ($_SESSION['uname']);
		unset ($_SESSION['psw']);
		unset ($_SESSION['role']);
		echo"<script language='javascript' type='text/javascript'>alert('O sistema não funciona no horário atual. Somente das 08h às 18h.');window.location.href='../index.html';</script>";
		die();
	}	
?>