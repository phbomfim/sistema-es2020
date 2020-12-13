<?php
    	 
    include "..\conexao.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM cursos WHERE id = '$id' ";
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf8">
        <link rel="stylesheet" href="..\..\css\actions.css">
        <link rel="stylesheet" href="..\..\css\action_editar.css">
        <link rel="stylesheet" href="..\..\css\casseb_style.css">
        <title>Sistema - Editar Curso</title>
    </head>

    <header>
        <h1>Editar Curso</h1>
    </header>

    <body class="casseb-style">

        <div class="conteudo-completo">

        	<?php
        	
            if ($stmt = $con->prepare($query)) {
                $stmt->execute();
                $stmt->bind_result($id, $nome, $grau, $codigo, $ato_auto, $ato_rec, $ato_ren,$obs);    
            ?>
    
            <table border = "1">
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Grau</td>
                        <td>Código e-ato_ren</td>
                        <td>Ato de auto</td>
                        <td>Ato de rec</td>
                        <td>Ato de ren</td>
                        <td>Observação</td>
                        <td>Ação</td>
                    </tr>
                </thead>

        <?php while ($stmt->fetch()) {  ?>

                <tr>
                    <td><?php printf("%s", $nome)?></td>
                    <td><?php printf("%s", $grau)?></td>
                    <td><?php printf("%s", $codigo)?></td>
                    <td><?php printf("%s", $ato_auto)?></td>
                    <td><?php printf("%s", $ato_rec)?></td>
                    <td><?php printf("%s", $ato_ren)?></td>
                    <td><?php printf("%s", $obs)?></td>
                </tr>
            </table>
        
        	<?php } ?>

            <form method="post" >

                <div class="edit-input">
                    <input type="text" name="i_nome" value="<?php echo $nome?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_grau" value="<?php echo $grau?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_codigo" value="<?php echo $codigo?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_ato_auto" value="<?php echo $ato_auto?>">
                </div>

                <div class="edit-input">
                    <input type="text" name="i_ato_ren" value="<?php echo $ato_ren?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_obs" value="<?php echo $obs?>">
                </div>

            	<button type="submit" value="Atualizar">Atualizar</button>

            </form>

            <?php 

            	if (isset($_POST['i_nome'])){

            		$nome_ = $_POST['i_nome'];
        			if($nome_ != $nome){
                        $editar = "UPDATE cursos SET nome = '$nome_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
        		}

                if (isset($_POST['i_grau'])){

                    $grau_ = $_POST['i_grau'];
                    if($grau_ != $grau){
                        $editar = "UPDATE cursos SET grau = '$grau_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

        		if (isset($_POST['i_codigo'])){

        			$codigo_ = $_POST['i_codigo'];
        			if($codigo_ != $codigo){
                        $editar = "UPDATE cursos SET codigo = '$codigo_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

        		if (isset($_POST['i_ato_auto'])){

                    $ato_auto_ = $_POST['i_ato_auto'];
        			if($ato_auto_ != $ato_auto){
                        $editar = "UPDATE cursos SET ato_auto = '$ato_auto_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }      
        		}

        		if (isset($_POST['i_ato_ren'])){

                    $ato_ren_ = $_POST['i_ato_ren'];
        			if($ato_ren_ != $ato_ren){
                        $editar = "UPDATE cursos SET ato_ren = '$ato_ren_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
        		}

                if (isset($_POST['i_obs'])){

                    $obs_ = $_POST['i_obs'];
                    if($obs_ != $obs){
                        $editar = "UPDATE cursos SET obs = '$obs_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

            	$stmt->close();
            }

        ?>

        </div>
        <a href="..\index.php" class="menu-link">Retornar ao Menu Anterior</a> 
    </body>
</html>