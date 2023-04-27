<?php
include('conexao.php');

$sql_profissional    = mysqli_query($conn, "SELECT * FROM configuracao");
$dados_profissional  = mysqli_fetch_array($sql_profissional, MYSQLI_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ana Cecilia - Corretora imobiliaria</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">Ana Cecilia</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
          <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Imoveis</a></li>
          <li><a class="nav-link scrollto" href="#team">Time</a></li>

          <li><a class="nav-link scrollto" href="#contact">Contato</a></li>
          <li><a class="getstarted scrollto" href="https://wa.me/5531998964792?text=I'm%20Ola%20tenho%20interesse%20em%20comprar%20ou%20alugar%20um%20imovel">Whatapp</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center headercss">
          <h1 data-aos="fade-up">Ajudo você a encontrar o imóvel perfeito para comprar e alugar</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">A mais de 5 anos trabalhando para te ajudar a encontrar o melhor imovel para você</h2>
          <div data-aos="fade-up" data-aos-delay="800">

            <a href="https://wa.me/5531998964792?text=I'm%20Ola%20tenho%20interesse%20em%20comprar%20ou%20alugar%20um%20imovel">
              <img id="whatsapp" src="assets/img/clients/png-transparent-whatsapp-click-to-chat-button.png" alt="">
            </a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/clients/cd.png" id="apartamento" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients">
      <div class="container">

        <div class="row">

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/20211202125250.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/direcional.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/mrv.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/masb-br.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>


        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Sobre mim</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              <?php echo $dados_profissional["sobre_texto_01"] ?>
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> <?php echo $dados_profissional["sobre_destaque_01"] ?></li>
              <li><i class="ri-check-double-line"></i> <?php echo $dados_profissional["sobre_destaque_02"] ?></li>
              <li><i class="ri-check-double-line"></i> <?php echo $dados_profissional["sobre_destaque_03"] ?></li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              <?php echo $dados_profissional["sobre_texto_02"] ?>
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="flexdirection section-bg">

          <div class="row team section-bg">
            <div class="col-lg-6 col-md-8 d-flex align-items-stretch timecontainer">
              <div class="member" data-aos="fade-up" data-aos-delay="400">
                <div class="member-img">
                  <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href="<?php echo $dados_profissional["link_twitter"] ?>"><i class="bi bi-twitter"></i></a>
                    <a href="<?php echo $dados_profissional["link_facebook"] ?>"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $dados_profissional["link_instagram"] ?>"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo $dados_profissional["link_linkedin"] ?>"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?php echo ucwords(strtolower($dados_profissional["nome"])) ?></h4>
                  <span>Corretora de imoveis</span>
                </div>
              </div>

            </div>

          </div>


          <div class="col-xl-6 d-flex align-items-center pt-4 pt-xl-0" data-aos="fade-center" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row team section-bg">


                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="90" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Clientes Satisfeitos</strong> na conquista de venda ou aquisição de imoveis</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock"></i>
                    <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Anos de experiencia</strong> atuando no mercado imobiliário</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Premios</strong> de melhor corretor imobiliário de Betim</p>
                  </div>
                </div>


              </div>
            </div>

          </div>
          <!-- End .content-->
        </div>
      </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <!-- <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Serviços</h2>
          <p>Conheça um pouco mais dos meus serviços</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bi bi-bank"></i></div>
              <h4 class="title"><a href="">Financiamento</a></h4>
              <p class="description">Um financiamento de imóvel pode parecer um desafio, mas com planejamento, disciplina e orientação adequada, é possível realizar o sonho da casa própria. Ajudarei a buscar informações, compar as opções e seguir em frente rumo à conquista do seu lar!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Avaliação de Imoveis</a></h4>
              <p class="description">Lembre-se de que a avaliação de um imóvel não deve se basear apenas no seu valor financeiro, mas também em aspectos como localização, estado de conservação, infraestrutura e potencial de valorização. Faço uma análise cuidadosa de cada um desses fatores para tomar uma decisão mais segura e acertada</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bi bi-clipboard-data"></i></div>
              <h4 class="title"><a href="">Busca Acertiva</a></h4>
              <p class="description">Se você está procurando um imóvel, eu posso ajudá-lo a encontrar o lar dos seus sonhos. Com minha experiência e dedicação, farei o possível para atender às suas necessidades e superar suas expectativas. Venha fazer parte do grupo de clientes satisfeitos que já encontraram o imóvel ideal comigo!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bi bi-chat-right-heart-fill"></i></div>
              <h4 class="title"><a href="">Atendimento Personalizado</a></h4>
              <p class="description">Acredito que cada cliente é único e merece um atendimento personalizado. Por isso, estou aqui para ouvir suas necessidades, entender seus desejos e oferecer soluções que atendam suas expectativas. Conte comigo para tornar sua experiência de compra ou venda de imóvel mais tranquila e satisfatória</p>
            </div>
          </div>

        </div>

      </div>
    </section> -->

    <!-- End Services Section -->






    <!-- ======= imoveis Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Imoveis</h2>
          <p>nossos imoveis</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Tudo</li>
              <li data-filter=".filter-apartamento">Apartamento</li>
              <li data-filter=".filter-casa">Casas</li>
              <li data-filter=".filter-terreno">Terrenos</li>
            </ul>
          </div>
        </div>



        <section class="imoveis" id="imoveis">



          <div class="box-container container">

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">
            <?php
            $query_imovel = "SELECT * FROM imoveis ORDER BY ID DESC";
            $resultado_query_imovel = mysqli_query($conn, $query_imovel);
            while ($row = mysqli_fetch_assoc($resultado_query_imovel)) {
              $query_imagem = "SELECT * FROM imagens WHERE imovel_id = " . $row["id"] . " ORDER BY id DESC";
              $resultado_query_imagem = mysqli_query($conn, $query_imagem);
              $img = mysqli_fetch_assoc($resultado_query_imagem);
            ?>


                <div class="col-lg-3 col-md-3 portfolio-item filter-<?php echo strtolower($row["tipo"]) ?>">
                  <a href="imoveis.php?codigoImovel=<?php echo $row["id"] ?>">
                    <div class="portfolio-wrap  ">

                      <!-- pegar imagem do banco de dados imagens, primeira posição do array -->
                      <img style="height: 300px; width: 800px" class="img-fluid imoveis" src="assets/img/imoveis/<?php echo $img["imovel_id"] ?>/<?php echo $img["nome_imagem"] ?>" alt="">


                      <div class="portfolio-info">
                        <h4><?php echo number_format($row["valor"], 2, ',', '.'); ?></h4>
                        <p><?php echo $row["bairro"]; ?></p>
                        <p><?php echo $row["cidade"]; ?></p>
                        <p><?php echo $row["area"] . "m²"; ?></p>


                      </div>
                  </a>
                </div>
              </div>
            <?php
            }
            ?>


           




          </div>



      </div>
    </section>



    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <!-- <section id="team" class="team section-bg">
          <div class="container">

            <div class="section-title" data-aos="fade-up">
              <h2>Equipe</h2>
              <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem</p>
            </div>

            <div class="row">


              <div class="col-lg-3 col-md-6 d-flex align-items-stretch timecontainer">
                <div class="member" data-aos="fade-up" data-aos-delay="400">
                  <div class="member-img">
                    <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                    <div class="social">
                      <a href=""><i class="bi bi-twitter"></i></a>
                      <a href=""><i class="bi bi-facebook"></i></a>
                      <a href=""><i class="bi bi-instagram"></i></a>
                      <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                  </div>
                  <div class="member-info">
                    <h4>Ana Cecilia</h4>
                    <span>Corretora de imoveis</span>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </section> -->






    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contato</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Entre em contato</h3>
              <p>Se você precisar entrar em contato conosco, pode usar o formulário de contato em nosso site ou enviar um e-mail para o endereço que está disponível na seção de contato. Teremos prazer em responder às suas perguntas e ajudá-lo da melhor maneira possível. Nos encontre tambem nas redes sociais.</p>
              <div class="social-links">
                <a href="<?php echo $dados_profissional["link_twitter"] ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $dados_profissional["link_facebook"] ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $dados_profissional["link_instagram"] ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $dados_profissional["link_linkedin"] ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p><?php echo $dados_profissional["endereco"] ?><br><?php echo $dados_profissional["cidade"] . " - " . $dados_profissional["estado"] ?> - MG</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p><?php echo $dados_profissional["email"] ?></p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p><?php echo $dados_profissional["celular"] ?></p>
              </div>

            </div>
          </div>


          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="./enviar-email.php" method="post" name="enviar-email" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="nome" class="form-control" id="name" placeholder="Seu nome" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Seu e-mail" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="assunto" id="subject" placeholder="Assunto" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Mensagem" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Carregando...</div>
                <div class="error-message"></div>
                <div class="sent-message">Sua mensagem foi enviada. Muito Obrigado!</div>
              </div>
              <div class="text-center"><button type="submit" name="submit">Enviar Mensagem</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong><?php $dados_profissional["nome"] ?></strong>. All Rights Reserved
          </div>

        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="index.php" class="scrollto">Home</a>
            <a href="index.php#about" class="scrollto">Sobre</a>

          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>