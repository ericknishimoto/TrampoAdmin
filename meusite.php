<?php
require_once 'logica-usuario.php';
verificaUsuario(); verificaAdmin();
require_once 'header.php';
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);

?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alterar meu site
        <small>altere os dados do seu site principal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Meu site</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

<!-- //Alert de alteração confirmada -->
<?php if(isset($_GET["alteracao"]) && $_GET["alteracao"]==true) {
  ?>
    <div class="row">
      <div class="col-xs-8">
      <div class="box box-success box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Site alterado</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            Informações alteradas com sucesso!
            <a href="index" target="_blank"> Veja as alterações</a>
            </div>
            <!-- /.box-body -->
          </div>
      </div>
    </div>
  <?php
  }
?>

      <form action="altera-meusite.php" method="POST" enctype="multipart/form-data">
       
        <!-- Cabecalho -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Cabeçalho</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                      <p>Cor do Tema:</p>
                      <select type="text" required name="tema" class="form-control">
                        <?php 
                          if ( $infos['tema'] != 'azul') { ?>
                            <option value="azul">Azul</option>
                        <?php } else { ?>
                            <option value="azul" selected>Azul</option>
                        <?php }
                        ?>

                        <?php 
                          if ( $infos['tema'] != 'amarelo') { ?>
                            <option value="amarelo">Amarelo</option>
                        <?php } else { ?>
                            <option value="amarelo" selected>Amarelo</option>
                        <?php }
                        ?>

                         <?php 
                          if ( $infos['tema'] != 'verde') { ?>
                            <option value="verde">Verde</option>
                        <?php } else { ?>
                            <option value="verde" selected>Verde</option>
                        <?php }
                        ?>
                      </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                      <p>Texto logo:</p>
                      <input value="<?= ($infos['brand']) ?>" type="text" name="brand" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                      <p>Título no navegador:</p>
                      <input value="<?= ($infos['titulo']) ?>" type="text" name="titulo" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                      <p>Imagem cabeçalho:</p>
                      <img src="upload/<?= ($infos['cabecalho_imagem']) ?>" class="thumbnail img-rounded img-md"/>
                      <input value="<?= ($infos['cabecalho_imagem']) ?>" type="file" name="cabecalho_imagem" class="form-control-file">
                      <input value="<?= ($infos['cabecalho_imagem']) ?>" type="hidden" name="cabecalho_imagem_anterior">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                      <p>Título banner 01:</p>
                      <input value="<?= ($infos['titulo_banner01']) ?>" type="text" name="titulo_banner01" class="form-control">
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                      <p>Título banner 02:</p>
                      <input value="<?= ($infos['titulo_banner02']) ?>" type="text" name="titulo_banner02" class="form-control">
                    </div>
                </div>


                <div class="col-md-8">
                    <div class="form-group">
                      <p>Subtítulo banner:</p>
                      <input value="<?= ($infos['subtitulo_banner']) ?>" type="text" name="subtitulo_banner" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="box box-warning box-solid mt-2">
                    <div class="box-header with-border">
                      <h3 class="box-title">Atenção</h3>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    Talvez seja necessário pressionar "CTRl + F5" para atualizar as alterações.
                    </div>
                  <!-- /.box-body -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Serviços -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Serviços</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <p>Subtítulo:</p>
                    <input value="<?= ($infos['subtitulo_servicos']) ?>" type="text" name="subtitulo_servicos" class="form-control">
                  </div>
                </div>
              </div>

              <!-- Serviço1 -->
              <div class="box-body">
                <h5 ><b>Serviço #1</b></h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Ícone - <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome</a><small> Ex: fas fa-briefcase</small></p>
                      <input value="<?= ($infos['servico1_icone']) ?>" type="text" name="servico1_icone" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Título:</p>
                        <input value="<?= ($infos['servico1_titulo']) ?>" type="text" name="servico1_titulo" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Resumo:</p>
                        <input value="<?= ($infos['servico1_texto']) ?>" type="text" name="servico1_texto" class="form-control">
                      </div>
                  </div>
                </div>
              </div>

              <!-- Serviço2 -->
              <div class="box-body">
                <h5 ><b>Serviço #2</b></h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Ícone - <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome</a><small> Ex: fas fa-briefcase</small></p>
                      <input value="<?= ($infos['servico2_icone']) ?>" type="text" name="servico2_icone" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Título:</p>
                        <input value="<?= ($infos['servico2_titulo']) ?>" type="text" name="servico2_titulo" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Resumo:</p>
                        <input value="<?= ($infos['servico2_texto']) ?>" type="text" name="servico2_texto" class="form-control">
                      </div>
                  </div>
                </div>
              </div>
              <!-- Serviço3 -->
              <div class="box-body">
                <h5 ><b>Serviço #3</b></h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Ícone - <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_blank">FontAwesome</a><small> Ex: fas fa-briefcase</small></p>
                      <input value="<?= ($infos['servico3_icone']) ?>" type="text" name="servico3_icone" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Título:</p>
                        <input value="<?= ($infos['servico3_titulo']) ?>" type="text" name="servico3_titulo" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Resumo:</p>
                        <input value="<?= ($infos['servico3_texto']) ?>" type="text" name="servico3_texto" class="form-control">
                      </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Trabalhos -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Trabalhos</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <p>Subtítulo:</p>
                    <input value="<?= ($infos['subtitulo_trabalhos']) ?>" type="text" name="subtitulo_trabalhos" class="form-control">
                  </div>
                </div>
              </div>

              <!-- Trabalho1 -->
              <div class="box-body">
                <h5 ><b>Trabalho #1</b></h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Imagem:</p>
                      <img src="upload/<?= ($infos['trabalho1_imagem']) ?>" class="thumbnail img-rounded img-xs"/>
                      <input value="<?= ($infos['trabalho1_imagem']) ?>" type="file" name="trabalho1_imagem" class="form-control-file">
                      <input value="<?= ($infos['trabalho1_imagem']) ?>" type="hidden" name="trabalho1_imagem_anterior">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Título:</p>
                      <input value="<?= ($infos['trabalho1_titulo']) ?>" type="text" name="trabalho1_titulo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Subtítulo:</p>
                        <input value="<?= ($infos['trabalho1_subtitulo']) ?>" type="text" name="trabalho1_subtitulo" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group">
                        <p>Texto:</p>
                        <textarea rows="5" type="text" name="trabalho1_texto" class="form-control"><?= ($infos['trabalho1_texto']) ?></textarea>
                      </div>
                  </div>
                </div>
              </div>

              <!-- Trabalho2 -->
              <div class="box-body">
                <h5 ><b>Trabalho #2</b></h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Imagem:</p>
                      <img src="upload/<?= ($infos['trabalho2_imagem']) ?>" class="thumbnail img-rounded img-xs"/>
                      <input value="<?= ($infos['trabalho2_imagem']) ?>" type="file" name="trabalho2_imagem" class="form-control-file">
                      <input value="<?= ($infos['trabalho2_imagem']) ?>" type="hidden" name="trabalho2_imagem_anterior">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Título:</p>
                      <input value="<?= ($infos['trabalho2_titulo']) ?>" type="text" name="trabalho2_titulo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Subtítulo:</p>
                        <input value="<?= ($infos['trabalho2_subtitulo']) ?>" type="text" name="trabalho2_subtitulo" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group">
                        <p>Texto:</p>
                        <textarea rows="5" type="text" name="trabalho2_texto" class="form-control"><?= ($infos['trabalho2_texto']) ?></textarea>
                      </div>
                  </div>
                </div>
              </div>

              <!-- Trabalho3 -->
              <div class="box-body">
                <h5 ><b>Trabalho #3</b></h5>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Imagem:</p>
                      <img src="upload/<?= ($infos['trabalho3_imagem']) ?>" class="thumbnail img-rounded img-xs"/>
                      <input value="<?= ($infos['trabalho3_imagem']) ?>" type="file" name="trabalho3_imagem" class="form-control-file">
                      <input value="<?= ($infos['trabalho3_imagem']) ?>" type="hidden" name="trabalho3_imagem_anterior">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <p>Título:</p>
                      <input value="<?= ($infos['trabalho3_titulo']) ?>" type="text" name="trabalho3_titulo" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <p>Subtítulo:</p>
                        <input value="<?= ($infos['trabalho3_subtitulo']) ?>" type="text" name="trabalho3_subtitulo" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-8">
                      <div class="form-group">
                        <p>Texto:</p>
                        <textarea rows="5" type="text" name="trabalho3_texto" class="form-control"><?= ($infos['trabalho3_texto']) ?></textarea>
                      </div>
                  </div>
                </div>
              </div>

            </div> 
          </div>
        </div>
        
        <!-- Sobre -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Sobre</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                      <p>Subtítulo:</p>
                      <input value="<?= ($infos['subtitulo_sobre']) ?>" type="text" name="subtitulo_sobre" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                      <p>Texto:</p>
                      <textarea type="text" name="sobre_texto" class="form-control"><?= ($infos['sobre_texto']) ?></textarea>
                      <script>
                        CKEDITOR.replace( 'sobre_texto' );
                      </script>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- Contato -->
        <div class="box collapsed-box">
          <div class="box-header with-border">
            <h3 class="box-title">Contato</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-plus"></i></button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body pad" style="">
            <div class="box-body mb-1">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <p>Subtítulo:</p>
                      <input value="<?= ($infos['subtitulo_contato']) ?>" type="text" name="subtitulo_contato" class="form-control">
                    </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- /.row -->
        <div class="row">
          <div class="center-block text-center">
            <input type="submit" class="btn btn-success margin-bottom margin" value="Alterar">
            <a href="dashboard" class="btn btn-default margin-bottom margin">Voltar</a>
          </div>
        </div>
        
      </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>