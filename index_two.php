 <?php 

	include "conexao.php";

	session_start();

	if((!isset ($_SESSION['uname']) == true) and (!isset ($_SESSION['psw']) == true)){

		unset($_SESSION['uname']);
	  	unset($_SESSION['psw']);
	  	header('location:index.html');
  	}
 
	$logado = $_SESSION['uname'];

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
			<form method="get" action="instituicao\index.php">
    			<button type="submit">Instituição Parceira</button>
			</form>
			<form method="get" action="instituicao_validadora\index.php">
    			<button type="submit">Instituição Validadora</button>
			</form>
			<form method="get" action="usuarios\index.php">
    			<button type="submit">Usuários</button>
			</form>
			<form method="get" action="cursos\index.php">
    			<button type="submit">Cursos</button>
			</form>
			<form method="get" action="action\form_att_senha.html">
    			<button type="submit">Alterar/Recuperar senha</button>
			</form>
			<form action="index.html">
    			<button type="submit">Sair</button>
			</form>
		</div>
	</body>
</html>