<?php 
    include "conexao.php";

    $query = "SELECT * FROM instituicao" ;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="..\css\tabelas.css">
        <link rel="stylesheet" href="..\css\casseb_style.css">
        <title>Sistema - Instituição Parceira</title>
    </head>

    <header class="header-tab">
        <h1> Instituição Parceira</h1>
    </header>
    <br><br>
    <body>

        <form name ="add" action="forms\form_add.html" method="post">
            <button type="submit"> Adicionar Instituição </button>
        </form>
        <form action="..\index_two.php">
            <button type="submit" class="menu-button">Retornar ao Menu Anterior</button>
        </form>

        <?php 

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($id, $nome, $endereco, $cidade, $estado, $mec, $mantenedora,$usuario);    
        ?>

        <table border = "1">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Endereço</td>
                    <td>Cidade</td>
                    <td>Estado</td>
                    <td>MEC</td>
                    <td>Mantenedora</td>
                    <td>Usuário</td>
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