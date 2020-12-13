<?php

	include "..\conexao.php";

	session_start();

	$logado = $_SESSION['uname'];

	$psw_n1 = $_POST['psw_n1'];
	$psw_n2 = $_POST['psw_n2'];

	$att = " UPDATE usuarios SET senha = '$psw_n1' WHERE nome = '$logado' ";

	if ($psw_n1 != $psw_n2){
		echo"<script language='javascript' type='text/javascript'>alert('Senhas diferentes!');window.location.href='form_att_senha.html';</script>";
	}

	if ($con->query($att) === TRUE) {
		echo"<script language='javascript' type='text/javascript'>alert('Senha Atualizada !');window.location.href='../index_two.php';</script>";
   }
?>