<?php
    	 
    include "..\conexao.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM validadora WHERE id = '$id' ";
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf8">
        <link rel="stylesheet" href="..\..\css\actions.css">
        <link rel="stylesheet" href="..\..\css\action_editar.css">
        <link rel="stylesheet" href="..\..\css\casseb_style.css">
        <title>Sistema - Editar Instituição</title>
    </head>

    <header>
        <h1>Editar Instituição</h1>
    </header>

    <body class="casseb-style">

        <div class="conteudo-completo">

        	<?php
        	
            	if ($stmt = $con->prepare($query)) {
                        $stmt->execute();
                        $stmt->bind_result($id, $nome, $endereco, $cidade, $estado, $mec, $mantenedora,$usuario,$instituicao);    
            ?>

           	<table >
                <thead>
                    <tr>
                        <td>Nome</td>
                        <td>Endereço</td>
                        <td>Cidade</td>
                        <td>Estado</td>
                        <td>MEC</td>
                        <td>Mantenedora</td>
                        <td>Usuário</td>
                        <td>Instituição</td>
                        <td>Ação</td>
                    </tr>
            </thead>

        <?php while ($stmt->fetch()) {  ?>

                <tr>
                    <td><?php printf("%s", $nome)?></td>
                    <td><?php printf("%s", $endereco)?></td>
                    <td><?php printf("%s", $cidade)?></td>
                    <td><?php printf("%s", $estado)?></td>
                    <td><?php printf("%s", $mec)?></td>
                    <td><?php printf("%s", $mantenedora)?></td>
                    <td><?php printf("%s", $usuario)?></td>
                    <td><?php printf("%s", $instituicao)?></td>
                </tr>
            </table>
        
        	<?php } ?>

            <form method="post" >

                <div class="edit-input">
                    <input type="text" name="i_nome" value="<?php echo $nome?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_endereco" value="<?php echo $endereco?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_cidade" value="<?php echo $cidade?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_estado" value="<?php echo $estado?>">
                </div>

                <div class="edit-input">
                    <input type="text" name="i_mec" value="<?php echo $mec?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_mantenedora" value="<?php echo $mantenedora?>">
                </div>

                <div class="edit-input">
                    <input type="text" name="i_usuario" value="<?php echo $usuario?>">
                </div>

                <div class="edit-input">
                    <input type="text" name="i_instituicao" value="<?php echo $instituicao?>">
                </div>

            	<button type="submit" value="Atualizar">Atualizar</button>

            </form>

            <?php 

            	if (isset($_POST['i_nome'])){

            		$nome_ = $_POST['i_nome'];
        			if($nome_ != $nome){
                        $editar = "UPDATE validadora SET nome = '$nome_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
        		}

                if (isset($_POST['i_endereco'])){

                    $endereco_ = $_POST['i_endereco'];
                    if($endereco_ != $endereco){
                        $editar = "UPDATE validadora SET endereco = '$endereco_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

        		if (isset($_POST['i_cidade'])){

        			$cidade_ = $_POST['i_cidade'];
        			if($cidade_ != $cidade){
                        $editar = "UPDATE validadora SET cidade = '$cidade_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

        		if (isset($_POST['i_estado'])){

                    $estado_ = $_POST['i_estado'];
        			if($estado_ != $estado){
                        $editar = "UPDATE validadora SET estado = '$estado_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }      
        		}

        		if (isset($_POST['i_mec'])){

                    $mec_ = $_POST['i_mec'];
        			if($mec_ != $mec){
                        $editar = "UPDATE validadora SET mec = '$mec_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
        		}

                if (isset($_POST['i_mantenedora'])){

                    $mantenedora_ = $_POST['i_mantenedora'];
                    if($mantenedora_ != $mantenedora){
                        $editar = "UPDATE validadora SET mantenedora = '$mantenedora_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

                if (isset($_POST['i_usuario'])){

                    $usuario_ = $_POST['i_usuario'];
                    if($usuario_ != $usuario){
                        $editar = "UPDATE validadora SET usuario = '$usuario_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

                if (isset($_POST['i_instituicao'])){

                    $instituicao_ = $_POST['i_instituicao'];
                    if($instituicao_ != $instituicao){
                        $editar = "UPDATE validadora SET instituicao = '$instituicao_' WHERE id = '$id'";
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