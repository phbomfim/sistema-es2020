<?php 
    include "conexao.php";

    session_start();

	if((!isset ($_SESSION['uname']) == true) and (!isset ($_SESSION['psw']) == true) and (!isset ($_SESSION['role']) == true)){

		unset($_SESSION['uname']);
		unset($_SESSION['psw']);
		unset($_SESSION['role']);
	  	header('location:index.html');
  	}

    $cargo = $_SESSION['role'];
 
    if ($cargo === 'superintendente'){
        $query = "SELECT * FROM usuarios" ;
    }
    
    elseif ($cargo == 'diretor'){
        $query = "SELECT * FROM usuarios WHERE role != 'superintendente' " ;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="..\css\tabelas.css">
        <link rel="stylesheet" href="..\css\casseb_style.css">
        <title>Sistema - Usuários</title>
    </head>

    <header class="header-tab">
        <h1> Usuários</h1>
    </header>
    <br><br>
    <body>

        <form name ="add" action="forms\form_add.html" method="post">
            <button type="submit"> Adicionar Usuário </button>
        </form>
        <form action="..\index_two.php">
            <button type="submit" class="menu-button">Retornar ao Menu Anterior</button>
        </form>

        <?php 

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($id, $role, $nome, $sobrenome, $cpf, $telefone, $email,$senha,$aut);    
        ?>

        <table border = "1">
            <thead>
                <tr>
                    <td>Identificador</td>
                    <td>Atribuição</td>
                    <td>Nome</td>
                    <td>Sobrenome</td>
                    <td>CPF</td>
                    <td>Telefone</td>
                    <td>Email</td>
                    <td>Acesso</td>
                    <td>Ação</td>
                </tr>
            </thead>

        <?php while ($stmt->fetch()) {  ?>

            <tr>
                <td><?php printf("%s", $id)?></td>
                <td><?php printf("%s", $role)?></td>
                <td><?php printf("%s", $nome)?></td>
                <td><?php printf("%s", $sobrenome)?></td>
                <td><?php printf("%s", $cpf)?></td>
                <td><?php printf("%s", $telefone)?></td>
                <td><?php printf("%s", $email)?></td>
                <td><?php 
                    if ($aut =='0') 
                        printf("%s", "Não autorizado");
                    else
                        printf("%s", "Autorizado");
                    ?>
                </td>
                <td>
                <?php if( $cargo =="diretor" || $cargo =="superintendente"){ ?> 
                        <a href="action\editar.php?id=<?php echo $id;?>">Editar</a> |
                        <a href="action\excluir.php?id=<?php echo $id;?>">Excluir</a> |
                        <a href="action\aut.php?id=<?php echo $id;?>&aut=<?php echo $aut;?>">Alterar status</a></td>
                <?php } ?>
            </tr>
            
        <?php }
                $stmt->close();
            }
        ?>
        
        </table>

        <?php
            $con->close();
        ?>
    </body>
</html>