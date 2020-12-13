<?php 
    include "conexao.php";

    $query = "SELECT * FROM usuarios" ;
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
            $stmt->bind_result($id, $role, $nome, $sobrenome, $cpf, $telefone, $email,$senha);    
        ?>

        <table border = "1">
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
                <td><a href="action\editar.php?id=<?php echo $id;?>">Editar</a> |
                    <a href="action\excluir.php?id=<?php echo $id;?>">Excluir</a>       
                </td>
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