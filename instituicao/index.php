<?php 
    include "conexao.php";

    session_start();

	if((!isset ($_SESSION['uname']) == true) and (!isset ($_SESSION['psw']) == true) and (!isset ($_SESSION['role']) == true)){

		unset($_SESSION['uname']);
		unset($_SESSION['psw']);
		unset($_SESSION['role']);
	  	header('location:index.html');
  	}

	$logado = $_SESSION['uname'];
	$senha = $_SESSION['psw'];
    $cargo = $_SESSION['role'];

    //if ($cargo === 'superintendente'){
        $query = "SELECT * FROM instituicao" ;
    //}

    //elseif ($cargo === 'diretor'){
    //    $query = "SELECT * FROM instituicao WHERE usuario = SEUID";
    //}
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

        <?php if( $cargo =="dirigente"){ ?> 
            <form name ="add" action="forms\form_add.html" method="post">
                <button type="submit"> Adicionar Instituição </button>
            </form>
        <?php } ?>

        <form action="..\index_two.php">
            <button type="submit" class="menu-button">Retornar ao Menu Anterior</button>
        </form>

        <?php 

        if ($stmt = $con->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($id, $nome, $endereco, $cidade, $estado, $mec, $mantenedora,$usuario,$aut,$validadora);    
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
                    <td>Validadora</td>
                    <td>Status</td>
                <?php if( $cargo =="diretor" || $cargo=="superintendente"){ ?> 
                    <td>Ação</td>
                <?php } ?>
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
                <td><?php printf("%s", $validadora)?></td>
                <td><?php if ($aut =='0') printf("%s", "Não autorizada")?>
                    <?php if ($aut =='1') printf("%s", "Autorizada")?>
                </td>
                <td>
                <?php if( $cargo =="diretor"){ ?> 
                        <a href="action\editar.php?id=<?php echo $id;?>">Editar</a> |
                        <a href="action\excluir.php?id=<?php echo $id;?>">Excluir</a>
                <?php } ?>
                <?php if( $cargo =="superintendente"){ ?> 
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