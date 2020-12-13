<?php
    	 
    include "..\conexao.php";

    $id = $_GET['id'];

    $query = "SELECT * FROM usuarios WHERE id = '$id' ";
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset = "utf8">
        <link rel="stylesheet" href="..\..\css\actions.css">
        <link rel="stylesheet" href="..\..\css\action_editar.css">
        <link rel="stylesheet" href="..\..\css\casseb_style.css">
        <title>Sistema - Editar Usuário</title>
    </head>

    <header>
        <h1>Editar Usuário</h1>
    </header>

    <body class="casseb-style">

        <div class="conteudo-completo">

        	<?php
        	
            	if ($stmt = $con->prepare($query)) {
                        $stmt->execute();
                        $stmt->bind_result($id, $role, $nome, $sobrenome, $cpf, $telefone, $email,$senha);
            ?>

           	<table >
                <thead>
                    <tr>
                        <td>Atribuição</td>
                        <td>Nome</td>
                        <td>Sobrenome</td>
                        <td>CPF</td>
                        <td>Telefone</td>
                        <td>Email</td>
                        <td>Ação</td>
                    </tr>
            </thead>

        <?php while ($stmt->fetch()) {  ?>

                <tr>
                    <td><?php printf("%s", $role)?></td>
                    <td><?php printf("%s", $nome)?></td>
                    <td><?php printf("%s", $sobrenome)?></td>
                    <td><?php printf("%s", $cpf)?></td>
                    <td><?php printf("%s", $telefone)?></td>
                    <td><?php printf("%s", $email)?></td>
                </tr>
            </table>
        
        	<?php } ?>

            <form method="post" >

                <div class="edit-input">
                    <input type="text" name="i_role" value="<?php echo $role?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_nome" value="<?php echo $nome?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_sobrenome" value="<?php echo $sobrenome?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_cpf" value="<?php echo $cpf?>">
                </div>

                <div class="edit-input">
                    <input type="text" name="i_telefone" value="<?php echo $telefone?>">
            	</div>

                <div class="edit-input">
                    <input type="text" name="i_email" value="<?php echo $email?>">
                </div>

            	<button type="submit" value="Atualizar">Atualizar</button>

            </form>

            <?php 

            	if (isset($_POST['i_role'])){

            		$role_ = $_POST['i_role'];
        			if($role_ != $role){
                        $editar = "UPDATE usuarios SET role = '$role_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
        		}

                if (isset($_POST['i_nome'])){

                    $nome_ = $_POST['i_nome'];
                    if($nome_ != $nome){
                        $editar = "UPDATE usuarios SET nome = '$nome_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

        		if (isset($_POST['i_sobrenome'])){

        			$sobrenome_ = $_POST['i_sobrenome'];
        			if($sobrenome_ != $sobrenome){
                        $editar = "UPDATE usuarios SET sobrenome = '$sobrenome_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
                }

        		if (isset($_POST['i_cpf'])){

                    $cpf_ = $_POST['i_cpf'];
        			if($cpf_ != $cpf){
                        $editar = "UPDATE usuarios SET cpf = '$cpf_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }      
        		}

        		if (isset($_POST['i_telefone'])){

                    $telefone_ = $_POST['i_telefone'];
        			if($telefone_ != $telefone){
                        $editar = "UPDATE usuarios SET telefone = '$telefone_' WHERE id = '$id'";
                        if(mysqli_query($con,$editar))
                            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados!');window.location.href='../index.php';</script>";
                    }
        		}

                if (isset($_POST['i_email'])){

                    $email_ = $_POST['i_email'];
                    if($email_ != $email){
                        $editar = "UPDATE usuarios SET email = '$email_' WHERE id = '$id'";
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