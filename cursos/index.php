<?php 
    include "conexao.php";

    $query = "SELECT * FROM cursos" ;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="..\css\tabelas.css">
        <link rel="stylesheet" href="..\css\casseb_style.css">
        <title>Sistema - Cursos</title>
    </head>

    <header class="header-tab">
        <h1> Cursos</h1>
    </header>
    <br><br>
    <body>

        <form name ="add" action="forms\form_add.html" method="post">
            <button type="submit"> Adicionar Cursos </button>
        </form>
        <form action="..\index_two.php">
            <button type="submit" class="menu-button">Retornar ao Menu Anterior</button>
        </form>

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
                    <td>Código e-MEC</td>
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