<?php
	
	include "..\conexao.php";

	$id = $_GET['id'];

	$excluir = "DELETE FROM cursos WHERE id = '$id' ";
?>

<!DOCTYPE html>

<html>

  <head>
  	<meta charset = "utf8">
 	<link rel="stylesheet" href="..\..\css\actions.css">
 	<link rel="stylesheet" href="..\..\css\action_excluir.css">
 	<link rel="stylesheet" href="..\..\css\casseb_style.css">
  	<title>Sistema - Excluir Curso</title>
  </head>

    <header>
    	<h1>Excluir Curso</h1>  
	</header>

  	<body class="casseb-style excluir">

	    <div class="conteudo-completo">
			<h3>Deseja realmente excluir os dados ?</h3>

			<form method="post">
				<button type="submit" name="Sim" value="Sim">SIM</button>
				<button type="submit" name="Nao" value="Não">NÃO</button>
			</form>
		</div>
	</body>

	<?php 

		if (isset($_POST['Sim'])){
			
			if (mysqli_query($con, $excluir)) {
			echo"<script language='javascript' type='text/javascript'>alert('Dados excluídos');window.location.href='../index.php';</script>";
			}
		
			else {
				echo "Error: " . $excluir . "<br>" . mysqli_error($con);
			}
		}

		else if (isset($_POST['Nao']))
			header("Location: ../index.php");
	?>

</html>