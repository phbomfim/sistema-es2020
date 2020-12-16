<?php

	include "..\conexao.php";

	session_start();
	session_destroy();
	echo"<script language='javascript' type='text/javascript'>alert('Você saiu do sistema. Até mais');window.location.href='../index.html';</script>";
?>