<?php

  include "..\conexao.php";

  $msg = false;

  if(isset($_FILES['arquivo'])){

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "upload"; //define o diretorio para onde enviaremos o arquivo

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload

    $sql_code = "INSERT INTO upload (id, arquivo, data) VALUES(null, '$novo_nome', NOW())";

    if (mysqli_query($con,$sql_code))
      echo"<script language='javascript' type='text/javascript'>alert('Upload realizado!');window.location.href='../index.php';</script>";
    else
      echo"<script language='javascript' type='text/javascript'>alert('Falha em realizar o upload!');window.location.href='../index.php';</script>";


      exit('<meta http-equiv="refresh" content="4;url=../index.php" />');
  }

?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf8">
    <link rel="stylesheet" href="..\..\css\actions.css">
    <link rel="stylesheet" href="..\..\css\casseb_style.css">
    <title>Sistema - Inserir arquivo</title>
  </head>

  <header>
    <h1>Inserir arquivo</h1>  
  </header>

  <body class="casseb-style">
    <div class="conteudo-completo">
      <form action="upload.php" method="POST" enctype="multipart/form-data">
          <p class="bold">Arquivo: </p><input type="file" required name="arquivo">
          <button type="submit" value="Salvar">Inserir</button>
      </form>
    </div>
    <form action="..\index.php">
      <button type="submit" value="Menu Anterior" class="menu-button">Voltar ao Menu Anterior</button>
    </form>
  </body>
</html>
    
   