 <?php 

	include "conexao.php";

	session_start();

	if((!isset ($_SESSION['uname']) == true) and (!isset ($_SESSION['psw']) == true) and (!isset ($_SESSION['role']) == true)){

		unset($_SESSION['uname']);
		unset($_SESSION['psw']);
		unset($_SESSION['role']);
	  	header('location:index.html');
  	}

	$logado = $_SESSION['uname'];
	$senha = $_SESSION['psw'];
	$cargo = $_SESSION['role'];
	
	$aut = "SELECT * FROM usuarios WHERE nome = '$logado' AND senha = '$senha' AND aut = '1' ";

	$result_aut = mysqli_query($con,$aut) or die("Erro no banco de dados!"); 
	$total = mysqli_num_rows($result_aut); 

	if($total <= 0 ) {

		echo"<script language='javascript' type='text/javascript'>alert('Você não possui autorização. Favor constatar um superior');window.location.href='index.html';</script>";
        die();
	} 

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css\acessar.css">
		<link rel="shortcut icon" href="imagens\cpd.ico">
     	<title> SISTEMA DE GERENCIAMENTO </title>
	</head>

	<header>
		<img src="imagens\usu.ico" width="40" height="40" align="center" class="img-avatar">
		<h3><?php echo $logado ?></h3>
	</header>

	<body>
		<div class="conteudo-direcionar">
			<?php 

				if( $cargo =="diretor" || $cargo =="dirigente" || $cargo =="superintendente"){ ?> <!--INST PARCEIRA - DIRIG CRIA + DIRETOR CONTROLA = SUPERINT PRECISA AUTORIZAR-->
					<form method="get" action="instituicao\index.php">
						<button type="submit">Instituição Parceira</button>
					</form>
			<?php	
				}
				
				if( $cargo =="superintendente" || $cargo =="visitante"){ ?> <!-- INST VALIDADORA - SUPERINTENDENTE GERENCIA -->
					<form method="get" action="instituicao_validadora\index.php">
						<button type="submit">Instituição Validadora</button>
					</form>
			
			<?php	
				}
				if( $cargo =="superintendente" || $cargo =="diretor"){ ?> <!-- USUÁRIOS - SUPER > + > DIRETOR MEXEM -->
					<form method="get" action="usuarios\index.php">
						<button type="submit">Usuários</button>
					</form>
			<?php	
				}
				if( $cargo =="superintendente" ){ ?> <!--SUPER  -->
					<form method="get" action="">
						<button type="submit">Validação</button>
					</form>
			<?php	
				}
				if( $cargo =="funcionario"){ ?> <!-- CURSOS - SÓ FUNCIONARIO MEXE -->
					<form method="get" action="cursos\index.php">
						<button type="submit">Cursos</button>
					</form>
			<?php	
				}
			?>

			<form method="get" action="action\form_att_senha.html">
				<button type="submit">Alterar/Recuperar senha</button>
			</form>

			<form name="login" action="action\deslog.php" method="post">
				<button type="submit">Sair</button>
			</form>
		</div>
	</body>
</html>