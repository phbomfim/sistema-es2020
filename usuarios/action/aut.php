<?php
	
	include "..\conexao.php";

	$id = $_GET['id'];
	$aut = $_GET['aut'];

	if ($aut === '0'){
        $autorizar = "UPDATE usuarios SET aut = '1' WHERE id = '$id' ";
    }

	else {
		$autorizar = "UPDATE usuarios SET aut = '0' WHERE id = '$id' ";
	}

?>

<!DOCTYPE html>

<html>

  <head>
  	<meta charset = "utf8">
 	<link rel="stylesheet" href="..\..\css\actions.css">
 	<link rel="stylesheet" href="..\..\css\action_excluir.css">
 	<link rel="stylesheet" href="..\..\css\casseb_style.css">
  	<title>Sistema - Autorizar Usuário</title>
  </head>

    <header>
    	<h1>Autorizar Usuário</h1>  
	</header>

  	<body class="casseb-style excluir">

	    <div class="conteudo-completo">
			<h3>Deseja realmente alterar o acesso do Usuário ?</h3>

			<form method="post">
				<button type="submit" name="Sim" value="Sim">SIM</button>
				<button type="submit" name="Nao" value="Não">NÃO</button>
			</form>
		</div>
	</body>

	<?php 

		if (isset($_POST['Sim'])){
			
			if (mysqli_query($con, $autorizar)) {
			echo"<script language='javascript' type='text/javascript'>alert('Status alterado');window.location.href='../index.php';</script>";
			}
		
			else {
				echo "Error: " . $autorizar . "<br>" . mysqli_error($con);
			}
		}

		else if (isset($_POST['Nao']))
			header("Location: ../index.php");
	?>

</html>