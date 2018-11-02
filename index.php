<?php
require_once 'conecta.php';
require_once 'banco-meusite.php';

$infos = listaMeusite($conexao);

if (($infos['trabalho1_imagem']) == "") {
  $imagemTrabalho1 = "noimage.jpg";
} else {
  $imagemTrabalho1 = ($infos['trabalho1_imagem']);
}

if (($infos['trabalho2_imagem']) == "") {
  $imagemTrabalho2 = "noimage.jpg";
} else {
  $imagemTrabalho2 = ($infos['trabalho2_imagem']);
}
if (
  ($infos['trabalho3_imagem']) == "") {
  $imagemTrabalho3 = "noimage.jpg";
} else {
  $imagemTrabalho3 = ($infos['trabalho3_imagem']);
}

?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= ($infos['titulo']) ?></title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->

    <link href="css/agency-<?= $infos['tema'] ?>.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><?= ($infos['brand']) ?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Trabalhos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Sobre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="trampoadmin" target="_blank"><i class="fas fa-user-lock"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-heading text-uppercase"><?= ($infos['subtitulo_banner']) ?></div>
          <div class="intro-lead-in"><?= ($infos['titulo_banner']) ?></div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">continuar</a>
        </div>
      </div>
  </header>

    <!-- Servicos -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Serviços</h2>
            <h3 class="section-subheading text-muted"><?= ($infos['subtitulo_servicos']) ?></h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="<?= ($infos['servico1_icone']) ?> fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><?= ($infos['servico1_titulo']) ?></h4>
            <p class="text-muted"><?= ($infos['servico1_texto']) ?></p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="<?= ($infos['servico2_icone']) ?> fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><?= ($infos['servico2_titulo']) ?></h4>
            <p class="text-muted"><?= ($infos['servico2_texto']) ?></p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="<?= ($infos['servico3_icone']) ?> fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading"><?= ($infos['servico3_titulo']) ?></h4>
            <p class="text-muted"><?= ($infos['servico3_texto']) ?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Trabalhos -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Trabalhos</h2>
            <h3 class="section-subheading text-muted"><?= ($infos['subtitulo_trabalhos']) ?></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid imageTrabalho" src="upload/<?= $imagemTrabalho1 ?>" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?= ($infos['trabalho1_titulo']) ?></h4>
              <p class="text-muted"><?= ($infos['trabalho1_subtitulo']) ?></p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid imageTrabalho" src="upload/<?= $imagemTrabalho2 ?>" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?= ($infos['trabalho2_titulo']) ?></h4>
              <p class="text-muted"><?= ($infos['trabalho2_titulo']) ?></p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid imageTrabalho" src="upload/<?= $imagemTrabalho3 ?>" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?= ($infos['trabalho3_titulo']) ?></h4>
              <p class="text-muted"><?= ($infos['trabalho3_subtitulo']) ?></p>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sobre -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Sobre</h2>
            <h3 class="section-subheading text-muted"><?= ($infos['subtitulo_sobre']) ?></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted"><?= ($infos['sobre_texto']) ?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contato -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contato</h2>
            <h3 class="section-subheading text-muted"><?= ($infos['subtitulo_contato']) ?></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Seu Nome *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Seu Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Seu Telefone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Sua Mensagem *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <span class="copyright">Copyright &copy; Erick Nishimoto | Layout by<a href="https://github.com/BlackrockDigital/startbootstrap-agency/blob/gh-pages/LICENSE" target="_blank"> Blackrock Digital LLC.</a></span>
          </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase"><?= ($infos['trabalho1_titulo']) ?></h2>
                  <p class="item-intro text-muted"><?= ($infos['trabalho1_subtitulo']) ?></p>
                  <img class="img-fluid imageModalTrabalho d-block mx-auto" src="upload/<?= $imagemTrabalho1 ?>" alt="">
                  <p><?= ($infos['trabalho1_texto']) ?></p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Fechar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase"><?= ($infos['trabalho2_titulo']) ?></h2>
                  <p class="item-intro text-muted"><?= ($infos['trabalho2_subtitulo']) ?></p>
                  <img class="img-fluid imageModalTrabalho d-block mx-auto" src="upload/<?= $imagemTrabalho2 ?>" alt="">
                  <p><?= ($infos['trabalho2_texto']) ?></p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Fechar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase"><?= ($infos['trabalho3_titulo']) ?></h2>
                  <p class="item-intro text-muted"><?= ($infos['trabalho3_subtitulo']) ?></p>
                  <img class="img-fluid imageModalTrabalho d-block mx-auto" src="upload/<?= $imagemTrabalho3 ?>" alt="">
                  <p><?= ($infos['trabalho3_texto']) ?></p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

    <!-- Altera BG -->
    <script>
      let bg = document.querySelector(".masthead");
      bg.style.background= "linear-gradient(0deg,rgba(0, 0, 0, 0.2),rgba(0, 0, 0, .6)),url('upload/<?= $infos['cabecalho_imagem']?>')";
      bg.style.backgroundRepeat = "no-repeat";
      bg.style.backgroundAttachment = "scroll";
      bg.style.backgroundPosition = "center center";
      bg.style.backgroundSize = "cover";
    </script>

  </body>

</html>
