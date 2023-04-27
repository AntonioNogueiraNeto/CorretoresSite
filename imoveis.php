<?php
session_start();

include('conexao.php');
$id = (int)$_GET['codigoImovel'];
$sql_Imovel    = mysqli_query($conn, "SELECT * FROM imoveis WHERE id = " . $id . " ORDER BY id DESC");
$dados_Imovel  = mysqli_fetch_array($sql_Imovel, MYSQLI_ASSOC);
$sql_profissional    = mysqli_query($conn, "SELECT * FROM configuracao");
$dados_profissional  = mysqli_fetch_array($sql_profissional, MYSQLI_ASSOC);


if (isset($_POST['nome'])) {
    // Sanitize user input
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);

    $stmt = $conn->prepare("INSERT INTO contatos (referencia_imovel, email, telefone, nome, data, mensagem) VALUES (?, ?, ?, ?, NOW(), ?)");
    $stmt->bind_param("sssss", $id, $email, $telefone, $nome, $mensagem);

    $stmt->execute();
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Referência: LT180 - LOTE FINANCIADO - BAIRRO SÃO PEDRO, IBIRITÉ/MG</title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="UM LOTE DE 200,00M&sup2; COM OTIMA LOCALIZAÇÃO.

 

QUASE TODO MURADO, FINANCIAMENTO PELA CAIXA ECONÔMICA FEDERAL.

 

 
...">
    <meta name="keywords" content="Venda de casa, sobrados, apartamentos, terrenos, Chácaras, Lotes e Lançamentos">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Referência: LT180 - LOTE FINANCIADO - BAIRRO SÃO PEDRO, IBIRITÉ/MG">
    <meta property="og:description" content="UM LOTE DE 200,00M&sup2; COM OTIMA LOCALIZAÇÃO.

 

QUASE TODO MURADO, FINANCIAMENTO PELA CAIXA ECONÔMICA FEDERAL.

 

 
...">
    <meta property="og:image" content="//www.ibiriteimobiliaria.com.br/thumbnail.php?w=300px&h=300px&imagem=assets/uploads/imoveis_empreendimentos/427/63c83d5e03f28woshgh.png">
    <meta property="og:url" content="//www.ibiriteimobiliaria.com.br/imovel/detalhes/lote-financiado-bairro-sao-pedro-ibirite-mg/referencia/LT180">
    <meta property="og:site_name" content="IBIRITÉ IMOBILIÁRIA ">
    <link rel="canonical" href="//www.ibiriteimobiliaria.com.br/imovel/detalhes/lote-financiado-bairro-sao-pedro-ibirite-mg/referencia/LT180">
    <meta name="Language" content="Portuguese">
    <meta name="Author" content="uHLelo Tecnologia">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    <meta name="format-detection" content="telephone=yes">
    <style>
        :root {
            --cor-primaria: #3498db;
            --cor-secundaria: #000000;
        }
    </style>



    <link href="//www.ibiriteimobiliaria.com.br/assets/template/lib/preloader/preloader.css" rel="stylesheet" />
    <link href="//www.ibiriteimobiliaria.com.br/assets/template/lib/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//www.ibiriteimobiliaria.com.br/assets/template/lib/ekko-lightbox/ekko-lightbox.css" rel="stylesheet">
    <!-- style carousel -->
    <link href="//www.ibiriteimobiliaria.com.br/assets/template/lib/owl-carousel/owl.carousel.min.css" rel="stylesheet" />

    <link href="//www.ibiriteimobiliaria.com.br/assets/template/lib/owl-carousel/owl.theme.default.min.css" rel="stylesheet" />

    <!-- FIM carousel -->

    <!-- Whatapp api -->
    <link href="//www.ibiriteimobiliaria.com.br/assets/template/lib/whatsapp-widget/whatsapp.css" rel="stylesheet">

    <!-- css -->
    <link href="//www.ibiriteimobiliaria.com.br/assets/template/css/custom.css" rel="stylesheet" type="text/css">
    <link href="//www.ibiriteimobiliaria.com.br/assets/template/css/style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Imovel nome</title>
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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>


<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                <h1><a href="index.php">Ana Cecilia</a></h1>

                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.php#about">Sobre</a></li>
                    <li><a class="nav-link scrollto " href="index.php#portfolio">Imoveis</a></li>

                    <li><a class="nav-link scrollto" href="index.php#contact">Contato</a></li>
                    <li><a class="getstarted scrollto" href="https://wa.me/5531998964792?text=I'm%20Ola%20tenho%20interesse%20em%20comprar%20ou%20alugar%20um%20imovel">Whatsapp</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <section>
        <div class="container-fluid background-color-white padding-top-70 padding-bottom-20">
            <div class="container">
                <div class="row">
                    <!-- TITULO -->
                    <div class="col-md-12 text-align-center">

                        <h3 class="text-uppercase font-color-blue font-size-25 margin-bottom-30">
                            Detalhes do <span class="font-weight-800">Imóvel</span>
                        </h3>
                    </div>

                    <!-- FIM TITULO -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 margin-bottom-30" id="imovel-impressao">
                                <div class="col-md-12 c-card-imovel-view padding-top-25 padding-bottom-25 padding-left-25 padding-right-25">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="owl-carousel owl-theme imovel-exibindo-fotos">
                                                <!-- COMECA EXIBICAO DAS FOTOS !-->

                                               

<?php
													
														
														$sql = mysqli_query($conn, "SELECT * FROM imagens WHERE imovel_id = " . $id . " ORDER BY id DESC");
														$total = mysqli_num_rows($sql);  
														if ($total>0) 
														{ 
															for ($i = 0; $i < $total; $i++) 
															{ 
																$dados = mysqli_fetch_array($sql);
												?>
                                                <div class="item">
                                                    <!-- Image Init !-->
                                                    <div class="img-button-hover-container">
                                                        <img 
                                                            src="assets/img/imoveis/<?php echo $id ?>/<?php echo $dados["nome_imagem"] ?>" 
                                                            alt="<?php echo $dados_Imovel['bairro'];?>"
                                                            class="img-fluid"
                                                        >
                                                        <div class="img-button-hover-overlay"></div>
                                                        <div class="img-button-hover-button">
                                                            

                                                            <a href="assets/img/imoveis/<?php echo $id ?>/<?php echo $dados["nome_imagem"] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" ><i class="buttons">+ ampliar</i></a>
                                                        </div>
                                                       
                                                    </div>
                                                    <!-- Image End !-->                                                                       
                                                </div>
                                                <?php
															}
														}
													
												?>







                                                <!-- TERMINA EXIBICAO DAS FOTOS !-->
                                            </div>
                                        </div>
                                        <div class="col-md-5">

                                            <!-- INFORMAÇOES AO LADO DA FOTO -->
                                            <div class="col-md-12 text-align-left">
                                                <p class="font-size-15 font-color-silver margin-bottom-10 acessibilidade">
                                                    <i class="fa fa-star-o"></i> Código:
                                                    <span class="font-weight-800">
                                                        <?php echo $id ?> </span>
                                                </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                                <p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">
                                                    Imóvel</p>
                                                <p class="font-size-16 font-weight-700 font-color-blue acessibilidade">
                                                    <?php echo strtoupper($dados_Imovel["tipo"] . " - " . $dados_Imovel["bairro"]) ?></p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                                <p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">
                                                    Tipo / Finalidade</p>
                                                <p class="font-size-15 font-color-silver font-weight-800 acessibilidade">
                                                    <?php echo ucwords(strtolower($dados_Imovel["tipo"] . " para " . $dados_Imovel["finalidade"])) ?> </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                                <p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">
                                                    Localização</p>
                                                <p class="font-size-15 font-color-silver acessibilidade">
                                                    <i class="fa fa-map-marker"></i> <?php echo ucwords(strtolower($dados_Imovel["bairro"] . " - " . $dados_Imovel["cidade"])) ?>
                                                </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                                <p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">
                                                    Valor</p>
                                                <p class="font-size-19 line-height-20 font-weight-800 font-color-gold margin-bottom-0 acessibilidade">
                                                    R$ <?php echo number_format($dados_Imovel["valor"], 2, ',', '.'); ?></p>
                                            </div>

                                            <!-- TERMINA INFORMAÇOES -->



                                        </div>
                                    </div>

                                    <!-- DESCRIÇÃO IMOVEL -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12 padding-top-25 padding-bottom-20 margin-top-10" style="border-top:solid 1px #eaeaea; border-bottom:1px solid #eaeaea">

                                                    <div class="col-md-12 padding-top-25 padding-bottom-20" style="border-bottom:1px solid #eaeaea">
                                                        <div class="row text-align-center">
                                                            <div class="col-md-12">
                                                                <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                                    Descrição
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <p class="font-size-14 font-color-silver margin-top-5 acessibilidade">

                                                                    <?php echo $dados_Imovel["descricao"] ?>

                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-12 padding-top-25 padding-bottom-20" style="border-bottom:1px solid #eaeaea">
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                            <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-0 text-uppercase acessibilidade">
                                                                Dependências
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">

                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light">
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    2 </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    vagas
                                                                                </p>
                                                                            </div>
                                                                        </div>








                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 padding-top-25 padding-bottom-20" style="border-bottom:1px solid #eaeaea">
                                                    <div class="row text-align-center">
                                                        <!-- Caracteristicas -->

                                                        <div class="col-md-12">
                                                            <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-0 text-uppercase acessibilidade">
                                                                Características
                                                            </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="row">



                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light">
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    120 </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    m2
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <!-- Butoes de imprimir e solicitar informaçoes -->
                                                <div class="col-md-12 text-align-center padding-bottom-15">
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                            <div class="row">

                                                                <div class="text-align-center margin-bottom-20">
                                                                    <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                                        <a href="https://api.whatsapp.com/send?phone=55(31) 99896-4792&text=Olá, gostaria de obter maiores informações sobre o imóvel  - Ref: <?php echo $id ?>, que eu visualizei no site //www.anacecilia.com.br" class="buttons_2" target="_blank">
                                                                            <i class="fa fa-whatsapp"></i> Solicitar
                                                                            mais Informações
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-30 text-align-center">

                                <div class="col-md-12 c-card-imovel-view padding-top-25 padding-bottom-25 padding-left-25 padding-right-25">
                                    <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                        Entre em contato
                                    </p>
                                    <p class="font-size-15 font-color-silver margin-top-5 font-weight-700 margin-bottom-5 acessibilidade">
                                        <?php echo  ucwords(strtolower($dados_profissional["nome"])) ?> </p>

                                    <p class="font-size-15 font-color-gold margin-top-5 font-weight-700 margin-bottom-5 acessibilidade">
                                        CRECI <?php echo $dados_profissional["creci"] ?>
                                    </p>

                                    <p class="margin-top-15">
                                        <a href="https://api.whatsapp.com/send?phone=55(31) 99896-4792&text=Olá, gostaria de obter maiores informações sobre o imóvel  - Ref: <?php echo $id ?>, que eu visualizei no site //www.anacecilia.com.br" class="buttons_2" target="_blank">
                                            <i class="fa fa-whatsapp"></i> Falar via Whatsapp
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-12 c-card-imovel-view padding-top-25 padding-bottom-25 padding-left-25 padding-right-25">
                                    <p class="font-size-14 font-color-silver margin-top-5 margin-bottom-20 acessibilidade">
                                        Preencha o formulário abaixo e solicite maiores informações sobre este <span class="font-weight-700">imóvel</span>!
                                    </p>

                                    <form action="" method="post">

                                        <div class="row text-left">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Nome</label>
                                                        <input type="text" name="nome" class="form-control" id="nome" required data-error="* Insira seu Nome">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Telefone</label>
                                                        <input type="tel" name="telefone" class="form-control" id="telefone" required data-error="* Insira seu Telefone">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Email</label>
                                                        <input type="email" name="email" class="form-control" id="email" required data-error="* Insira seu Email">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 input-message">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Mensagem</label>
                                                        <textarea id="mensagem" name="mensagem" rows="8" class="form-control font-weight-400 font-size-14 acessibilidade"><?php echo "Olá, estou interessado no imóvel código " . $dados_Imovel["tipo"] . $id . " localizado em " . $dados_Imovel["bairro"] . " na cidade de " . ucwords(strtolower($dados_Imovel["cidade"])) .  " que encontrei no site. Por favor, entre em contato." ?>, </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 font-color-gold font-size-14 font-weight-700">
                                                <div id="msgSubmit" class="hidden"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="col-md-12 text-align-center margin-top-10 form-btn">

                                                <button type="submit" id="submit" class="buttons_2">
                                                    <i class="fa fa-send"></i> Enviar Mensagem
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        &copy; Copyright <strong>Ana Cecilia</strong>. All Rights Reserved
                    </div>

                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="#intro" class="scrollto">Home</a>
                        <a href="#about" class="scrollto">Sobre</a>

                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->



    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/jquery/jquery-3.3.1.min.js"></script>

    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/bootstrap/bootstrap.min.js"></script>



    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/form-validator-send/form-validator.min.js"></script>
    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/form-validator-send/jquery.validate.min.js"></script>
    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/form-validator-send/jquery.maskedinput.js"></script>
    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/form-validator-send/actions-form.js"></script>

    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/owl-carousel/owl.carousel.js"></script>

    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/ekko-lightbox/ekko-lightbox.min.js"></script>

    <script src="//www.ibiriteimobiliaria.com.br/assets/template/js/custom.js"></script>



    <style>
        /* HIDE LINK */
        .cc-cp-foot-byline,
        .cc-cp-foot-byline a {
            color: transparent !important;
            cursor: default !important
        }

        /* TITULO */
        .cookieconsent-com---palette-light .cc-nb-title {
            color: #000 !important;
            text-transform: uppercase !important;
            font-weight: 700 !important;
            font-size: 18px !important;
            margin-bottom: 7px !important
        }

        .cookieconsent-com---palette-dark .cc-nb-title {
            color: #fff !important;
            text-transform: uppercase !important;
            font-weight: 700 !important;
            font-size: 18px !important;
            margin-bottom: 7px !important
        }

        /* TEXTO */
        .cookieconsent-com---nb .cc-nb-text {
            font-size: 15px !important;
            line-height: 18px !important
        }

        /* BOTAO ACEITAR */
        .cookieconsent-com---palette-light .cc-nb-okagree,
        .cookieconsent-com---palette-dark .cc-nb-okagree {
            color: #fff !important;
            background-color: #444 !important;
        }

        .cookieconsent-com---palette-light .cc-nb-okagree:hover,
        .cookieconsent-com---palette-dark .cc-nb-okagree:hover {
            color: #fff !important;
            background-color: #444 !important;
        }

        /* BOTAO RECUSAR */
        .cookieconsent-com---palette-light .cc-nb-reject,
        .cookieconsent-com---palette-dark .cc-nb-reject {
            color: #999 !important;
            background-color: #444 !important;
        }

        .cookieconsent-com---palette-light .cc-nb-reject:hover,
        .cookieconsent-com---palette-dark .cc-nb-reject:hover {
            color: #fff !important;
            background-color: #333 !important;
        }

        /* BOTAO SALVAR */
        .cookieconsent-com---palette-light .cc-cp-foot-save,
        .cookieconsent-com---palette-dark .cc-cp-foot-save {
            color: #fff !important;
            background-color: #444 !important;
        }

        .cookieconsent-com---palette-light .cc-cp-foot-save:hover,
        .cookieconsent-com---palette-dark .cc-cp-foot-save:hover {
            color: #fff !important;
            background-color: #333 !important;
        }

        .cookieconsent-com---nb-interstitial {
            right: 1.5vw !important;
            top: auto !important;
            bottom: 3vh !important;
            left: 1.5vw !important;
            max-width: 100%;
            position: fixed;
        }
    </style>

    <script type="text/javascript" src="https://www.cookieconsent.com/releases/4.0.0/cookie-consent.js" charset="UTF-8"></script>
    <script type="text/javascript" charset="UTF-8">
        document.addEventListener('DOMContentLoaded', function() {
            cookieconsent.run({
                "notice_banner_type": "interstitial",
                "consent_type": "express",
                "palette": "light",
                "language": "pt",
                "page_load_consent_levels": ["strictly-necessary"],
                "notice_banner_reject_button_hide": false,
                "preferences_center_close_button_hide": false,
                "website_name": "//www.ibiriteimobiliaria.com.br"
            });
        });
    </script>






    <script src="//www.ibiriteimobiliaria.com.br/assets/template/lib/form-validator-send/contact-imovel-form.js"></script>
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