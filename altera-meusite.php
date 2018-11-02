<?php 
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'conecta.php';
require_once 'banco-meusite.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    
      <?php 
      
      $tema = $_POST["tema"];
      $titulo = $_POST["titulo"];
      $brand = $_POST["brand"];
      $titulo_banner = $_POST["titulo_banner"];
      $subtitulo_banner = $_POST["subtitulo_banner"];
      $subtitulo_servicos = $_POST["subtitulo_servicos"];
      $servico1_icone = $_POST["servico1_icone"];
      $servico1_titulo = $_POST["servico1_titulo"];
      $servico1_texto = $_POST["servico1_texto"];
      $servico2_icone = $_POST["servico2_icone"];
      $servico2_titulo = $_POST["servico2_titulo"];
      $servico2_texto = $_POST["servico2_texto"];
      $servico3_icone = $_POST["servico3_icone"];
      $servico3_titulo = $_POST["servico3_titulo"];
      $servico3_texto = $_POST["servico3_texto"];
      $subtitulo_trabalhos = $_POST["subtitulo_trabalhos"];
      $trabalho3_titulo = $_POST["trabalho3_titulo"];
      $trabalho3_subtitulo = $_POST["trabalho3_subtitulo"];
      $trabalho3_texto = $_POST["trabalho3_texto"];
      $trabalho2_titulo = $_POST["trabalho2_titulo"];
      $trabalho2_subtitulo = $_POST["trabalho2_subtitulo"];
      $trabalho2_texto = $_POST["trabalho2_texto"];
      $trabalho1_titulo = $_POST["trabalho1_titulo"];
      $trabalho1_subtitulo = $_POST["trabalho1_subtitulo"];
      $trabalho1_texto = $_POST["trabalho1_texto"];
      $subtitulo_sobre = $_POST["subtitulo_sobre"];
      $sobre_texto = $_POST["sobre_texto"];
      $subtitulo_contato = $_POST["subtitulo_contato"];
      $trabalho_imagem1 = $_FILES['trabalho1_imagem'];

      if($_FILES['cabecalho_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['cabecalho_imagem']['name'], -4)); //pega a extensao do arquivo
        $cabecalho_imagem = md5('cabecalho_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['cabecalho_imagem']['tmp_name'], $diretorio.$cabecalho_imagem); //efetua o upload
      } else {
        $cabecalho_imagem = $_POST['cabecalho_imagem_anterior'];
      }

      if($_FILES['trabalho1_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['trabalho1_imagem']['name'], -4)); //pega a extensao do arquivo
        $imagem1 = md5('trabalho1_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['trabalho1_imagem']['tmp_name'], $diretorio.$imagem1); //efetua o upload
      } else {
        $imagem1 = $_POST['trabalho1_imagem_anterior'];
      }

      if($_FILES['trabalho2_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['trabalho2_imagem']['name'], -4)); //pega a extensao do arquivo
        $imagem2 = md5('trabalho2_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['trabalho2_imagem']['tmp_name'], $diretorio.$imagem2); //efetua o upload
      } else {
        $imagem2 = $_POST['trabalho2_imagem_anterior'];
      }

      if($_FILES['trabalho3_imagem']['name'] != "") {
        $extensao = strtolower(substr($_FILES['trabalho3_imagem']['name'], -4)); //pega a extensao do arquivo
        $imagem3 = md5('trabalho3_imagem') . $extensao; //define o nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        move_uploaded_file($_FILES['trabalho3_imagem']['tmp_name'], $diretorio.$imagem3); //efetua o upload
      } else {
        $imagem3 = $_POST['trabalho3_imagem_anterior'];
      }

      if(alteraMeusite($conexao,
      $tema,
      $titulo,
      $brand,
      $cabecalho_imagem,
      $titulo_banner,
      $subtitulo_banner,
      $subtitulo_servicos,
      $servico1_icone,
      $servico1_titulo,
      $servico1_texto,
      $servico2_icone,
      $servico2_titulo,
      $servico2_texto,
      $servico3_icone,
      $servico3_titulo,
      $servico3_texto,
      $subtitulo_trabalhos,
      $imagem3,
      $trabalho3_titulo,
      $trabalho3_subtitulo,
      $trabalho3_texto,
      $imagem2,
      $trabalho2_titulo,
      $trabalho2_subtitulo,
      $trabalho2_texto,
      $imagem1,
      $trabalho1_titulo,
      $trabalho1_subtitulo,
      $trabalho1_texto,
      $subtitulo_sobre,
      $sobre_texto,
      $subtitulo_contato
      ))
      {
        header ("Location: meusite?alteracao=true");
        die();
      }else{ 
      ?>
        <h1>Algo deu errado:</h1>
        <?php
          printf("Connect failed: %s\n", mysqli_error($conexao));
        exit();
      }
      ?>

    </section>
    <!-- /.content -->
  </div>