<?php
	// Arquivos de Configuração
	include_once("adm_gerencia/includes/Conexao.php");
	
	// Dados do Imóvel
	$sql_Imovel    = mysqli_query($link, "SELECT * FROM imoveis_empreendimentos WHERE url='".$_GET["url"]."' AND referencia='".$_GET["referencia"]."'");
	$dados_Imovel  = mysqli_fetch_array($sql_Imovel, MYSQLI_ASSOC);
	
	// Verifica se o usuário já visualizou o imóvel e grava a mesma no banco
	$ip_usuario  = $_SERVER["REMOTE_ADDR"];
	$id_registro = $dados_Imovel['id'];
	$data_atual  = date("Y-m-d H:i:s");
	
	$sql       = mysqli_query($link, "SELECT * FROM imoveis_visitas WHERE ip='$ip_usuario' AND id_registro LIKE ('$id_registro')");  
	$resultado = mysqli_num_rows($sql);
	if($resultado == 0)
	{
		mysqli_query($link, "INSERT INTO imoveis_visitas (ip, id_registro, data)VALUES('$ip_usuario','$id_registro','$data_atual')");
	}
	
	// Dados Seo
	$meta_site_name        = utf8_encode(NOME);
	$meta_site_title       = "Referência: " .utf8_encode($dados_Imovel['referencia']) ." - ". utf8_encode($dados_Imovel['nome']);
	$meta_site_description = utf8_encode($dados_Imovel['descricao']);
	$meta_site_description = strip_tags($meta_site_description);
	$meta_site_description = str_replace($pega_caracteres_especiais_html, $converte_caracteres_especiais_html, ($meta_site_description));
	$meta_site_description = substr($meta_site_description, 0, 180) . "...";
	$meta_site_image       = $_linkCompleto."/thumbnail.php?w=300px&h=300px&imagem=assets/uploads/imoveis_empreendimentos/".$dados_Imovel['id']."/" .$dados_Imovel['foto_destaque'];
	$meta_site_link        = $_linkCompleto."/imovel/detalhes/".$dados_Imovel['url']."/referencia/".$dados_Imovel['referencia'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $meta_site_title;?></title>
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="<?php echo $meta_site_description;?>">
    <meta name="keywords" content="Venda de casa, sobrados, apartamentos, terrenos, Chácaras, Lotes e Lançamentos">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $meta_site_title;?>">
    <meta property="og:description" content="<?php echo $meta_site_description;?>">
    <meta property="og:image" content="<?php echo $meta_site_image;?>">
    <meta property="og:url" content="<?php echo $meta_site_link;?>">
    <meta property="og:site_name" content="<?php echo $meta_site_name;?>">
    <link rel="canonical" href="<?php echo $meta_site_link;?>">	
    <meta name="Language" content="Portuguese">
    <meta name="Author" content="John Danilo studio design">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="1">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">
    <meta name="format-detection" content="telephone=yes"> 
	<?php include "includes/include.Html.Head.php";?>
</head>

<body>
	
    <header>
		<?php include "includes/include.Top.Menu.php";?>
    </header>
    
    <section class="banner-home">
    	<div class="container-fluid">
        	<div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        	<?php include "includes/include.Buscador.Paginas.php";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
    	<div class="container-fluid background-color-white padding-top-70 padding-bottom-20">
			<div class="container">
    			<div class="row">
                	<div class="col-md-12 text-align-center">
                    	<h3 class="text-uppercase font-color-blue font-size-25 margin-bottom-30">
                        	Detalhes do <span class="font-weight-800">Imóvel</span>
                        </h3>
                    </div>
                	<div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 margin-bottom-30" id="imovel-impressao">
                                <div class="col-md-12 c-card-imovel-view padding-top-25 padding-bottom-25 padding-left-25 padding-right-25">
                                    <div class="row">
                                        <div class="col-md-7">
                                        	<div class="owl-carousel owl-theme imovel-exibindo-fotos">
												<!-- COMECA EXIBICAO DAS FOTOS !-->
                                                <div class="item">
                                                    <div class="img-button-hover-container">
                                                        <img 
                                                            src="<?php echo $_linkCompleto ."/thumbnail.php?w=800px&h=600px&imagem=assets/uploads/imoveis_empreendimentos/" . $dados_Imovel['id'] . "/" . $dados_Imovel['foto_destaque'];?>" 
                                                            alt="<?php echo utf8_encode($dados_Imovel['nome']);?>"
                                                            class="img-fluid"
                                                        >
                                                        <div class="img-button-hover-overlay"></div>
                                                        <div class="img-button-hover-button">
                                                            <a 
                                                                href="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=600px&imagem=assets/uploads/imoveis_empreendimentos/<?php echo $dados_Imovel['id'];?>/<?php echo $dados_Imovel['foto_destaque'];?>" 
                                                                data-toggle="lightbox" 
                                                                data-gallery="example-gallery"
                                                                class="buttons"
                                                            >
                                                                + ampliar
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php
													if($dados_Imovel['fotos_extras'] == "S"){
														
														$sql = mysqli_query($link, "SELECT * FROM imoveis_fotos WHERE id_registro='".$dados_Imovel['id']."' ORDER BY id_ordem ASC, id DESC");
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
                                                            src="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=600px&imagem=assets/uploads/imoveis_empreendimentos/<?php echo $dados_Imovel['id'];?>/<?php echo $dados['foto'];?>" 
                                                            alt="<?php echo utf8_encode($dados_Imovel['nome']);?>"
                                                            class="img-fluid"
                                                        >
                                                        <div class="img-button-hover-overlay"></div>
                                                        <div class="img-button-hover-button">
                                                            <a 
                                                                href="<?php echo $_linkCompleto;?>/thumbnail.php?w=800px&h=600px&imagem=assets/uploads/imoveis_empreendimentos/<?php echo $dados_Imovel['id'];?>/<?php echo $dados['foto'];?>" 
                                                                data-toggle="lightbox" 
                                                                data-gallery="example-gallery"
                                                                class="buttons"
                                                            >+ ampliar</a>
                                                        </div>
                                                        <p class="padding-bottom-10"></p>
                                                    </div>
                                                    <!-- Image End !-->                                                                       
                                                </div>
                                                <?php
															}
														}
													}
												?>
                                                <!-- TERMINA EXIBICAO DAS FOTOS !-->
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="col-md-12 text-align-left">
                                                <p class="font-size-15 font-color-silver margin-bottom-10 acessibilidade">
                                                    <i class="fa fa-star-o"></i> Código: 
                                                    <span class="font-weight-800">
														<?php echo utf8_encode($dados_Imovel['referencia']);?>
                                                    </span>
                                                </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                            	<p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">Imóvel</p>
                                				<p class="font-size-16 font-weight-700 font-color-blue acessibilidade">
													<?php echo utf8_encode($dados_Imovel['nome']);?>
                                                </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                            	<p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">Tipo / Finalidade</p>
                                				<p class="font-size-15 font-color-silver font-weight-800 acessibilidade">
                                                	<?php 				
														$sql_Tipos   = mysqli_query($link, "SELECT * FROM imoveis_tipos WHERE url='".$dados_Imovel['tipo']."'");
														$dados_Tipos = mysqli_fetch_array($sql_Tipos);
														echo utf8_encode($dados_Tipos['nome']);
														
														echo " para ";
														
														$sql_Finalidades   = mysqli_query($link, "SELECT * FROM imoveis_finalidades WHERE url='".$dados_Imovel['finalidade']."'");
														$dados_Finalidades = mysqli_fetch_array($sql_Finalidades);
														echo utf8_encode($dados_Finalidades['nome']);
													?>
                                                </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                            	<p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">Localização</p>
                                				<p class="font-size-15 font-color-silver acessibilidade">
													<?php 
                                                        $sql_Bairros   = mysqli_query($link, "SELECT * FROM imoveis_bairros WHERE url='".$dados_Imovel['bairro']."'");
                                                        $dados_Bairros = mysqli_fetch_array($sql_Bairros);
                                                        
                                                        echo "<i class=\"fa fa-map-marker\"></i> " . utf8_encode($dados_Bairros['nome']) . " - ";
                                                        
                                                        $sql_Cidades   = mysqli_query($link, "SELECT * FROM imoveis_cidades WHERE url='".$dados_Imovel['cidade']."'");
                                                        $dados_Cidades = mysqli_fetch_array($sql_Cidades);
                                                        echo utf8_encode($dados_Cidades['nome']);
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-md-12 margin-top-15 text-align-left">
                                            	<p class="font-color-gold font-size-14 font-weight-700 margin-bottom-0 acessibilidade">Valor</p>
                                				<p class="font-size-19 line-height-20 font-weight-800 font-color-gold margin-bottom-0 acessibilidade">
													<?php
														$numero = $dados_Imovel['preco'];
														echo " R$ " . number_format($numero, 2, ',', '.'); //Resultado: 29.875,70
													?>
                                                </p>
                                            </div>
                                            
                                            <div class="col-md-12">
                                            	<div class="row">
                                                	<?php
														if(!empty($dados_Imovel['preco_condominio'])){
													?>
													<div class="col-md-6 margin-top-15 text-align-left">
														<p class="font-color-silver font-size-14 font-weight-700 margin-bottom-0 acessibilidade">Condomínio</p>
														<p class="font-size-16 font-weight-800 font-color-gold acessibilidade">
															<?php echo "R$ " . utf8_encode($dados_Imovel['preco_condominio']);?>
														</p>
													</div>
													<?php
														}
													?>
													
													<?php
														if(!empty($dados_Imovel['preco_iptu'])){
													?>
													<div class="col-md-6 margin-top-15 text-align-left">
														<p class="font-color-silver font-size-14 font-weight-700 margin-bottom-0 acessibilidade">Iptu</p>
														<p class="font-size-16 font-weight-800 font-color-gold acessibilidade">
															<?php echo "R$ " . utf8_encode($dados_Imovel['preco_iptu']);?>
														</p>
													</div>
													<?php
														}
													?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                    	<div class="col-md-12">
                                        	<div class="row">
                                            	<div 
                                                    class="col-md-12 padding-top-25 padding-bottom-20 margin-top-10" 
                                                    style="border-top:solid 1px #eaeaea; border-bottom:1px solid #eaeaea"
                                                >
                                            	    
                                            	    <?php
													if(!empty($dados_Imovel['descricao'])){
												?>
                                                <div 
                                                    class="col-md-12 padding-top-25 padding-bottom-20" 
                                                    style="border-bottom:1px solid #eaeaea"
                                                >
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                           		Descrição
                                                           </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                           <p class="font-size-14 font-color-silver margin-top-5 acessibilidade">
                                                           		<?php 
																	$texto_Imovel = utf8_encode($dados_Imovel['descricao']);
																	$texto_Imovel = str_replace("&nbsp;","",$texto_Imovel);  
																	$texto_Imovel = str_replace("</p>","<br><br>",$texto_Imovel); 
																	$texto_Imovel = strip_tags($texto_Imovel,'<br><br><strong></strong><b></b>'); 
																	$texto_Imovel = str_replace("\n","",$texto_Imovel);
																	echo $texto_Imovel;
																?>
                                                           </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
													}
												?>
                                            	    
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-0 text-uppercase acessibilidade">
                                                           		Endereço
                                                           </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-color-silver margin-top-5 acessibilidade">
                                                           		<?php 
																	echo "<span class='font-weight-700'>";
																	echo utf8_encode($dados_Imovel['endereco']);
																	echo ", nº ";
																	echo utf8_encode($dados_Imovel['numero']);
																	echo " - ";
																	$sql_Bairros   = mysqli_query($link, "SELECT * FROM imoveis_bairros WHERE url='".$dados_Imovel['bairro']."'");
																	$dados_Bairros = mysqli_fetch_array($sql_Bairros);
																	echo utf8_encode($dados_Bairros['nome']);
																	echo " - ";
																	$sql_Cidades   = mysqli_query($link, "SELECT * FROM imoveis_cidades WHERE url='".$dados_Imovel['cidade']."'");
																	$dados_Cidades = mysqli_fetch_array($sql_Cidades);
																	echo utf8_encode($dados_Cidades['nome']);
																	echo " - Cep: ";
																	echo utf8_encode($dados_Imovel['cep']);
																	echo "</span>";
																	echo " <br> ";
																	echo " (próximo a " . utf8_encode($dados_Imovel['ponto_referencia']) . ")";
																?>
                                                           </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div 
                                                    class="col-md-12 padding-top-25 padding-bottom-20" 
                                                    style="border-bottom:1px solid #eaeaea"
                                                >
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
                                                                       
																	   <?php
                                                                            if(!empty($dados_Imovel['dependencias_dormitorios'])){
                                                                       ?>
                                                                       <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_dormitorios']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Dormitórios
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['dependencias_suites'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_suites']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Suítes
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['dependencias_banheiros'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_banheiros']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Banheiros
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['dependencias_garagens'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_garagens']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Garagens
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['dependencias_mobiliado'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_mobiliado']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Mobiliado?
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['dependencias_pavimentos'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_pavimentos']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Pavimentos
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['dependencias_areaservico'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['dependencias_areaservico']);?>
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Área de Serviço
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div 
                                                    class="col-md-12 padding-top-25 padding-bottom-20" 
                                                    style="border-bottom:1px solid #eaeaea"
                                                >
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-0 text-uppercase acessibilidade">
                                                           		Características
                                                           </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                           <div class="row">
                                                           		<div class="col-md-12">
                                                                    <div class="row">
                                                                       
																	   <?php
                                                                            if(!empty($dados_Imovel['area_privativa'])){
                                                                       ?>
                                                                       <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['area_privativa']);?> m
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Área Privativa
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['area_total'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['area_total']);?> m
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Área Total
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['area_terreno'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['area_terreno']);?> m
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Área do Terreno
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['area_construida'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['area_construida']);?> m
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Área Construída
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                        <?php
                                                                            if(!empty($dados_Imovel['area_comum'])){
                                                                        ?>
                                                                        <div class="col-md-3 margin-top-10 margin-bottom-10">
                                                                            <div 
                                                                                class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                            >
                                                                                <p class="font-size-20 font-weight-800 font-color-blue margin-0 acessibilidade">
                                                                                    <?php echo utf8_encode($dados_Imovel['area_comum']);?> m
                                                                                </p>
                                                                                <p class="font-size-15 font-color-silver margin-0 acessibilidade">
                                                                                    Área Comum
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                            }
                                                                        ?>
                                                                        
                                                                    </div>
                                                                </div>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <?php
													if(!empty($dados_Imovel['opcionais'])){
												?>
                                                <div 
                                                    class="col-md-12 padding-top-25 padding-bottom-20" 
                                                    style="border-bottom:1px solid #eaeaea"
                                                >
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                           		Opcionais / Adicionais
                                                           </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                        	<div class="row">
															<?php
																$_tags = explode("#", $dados_Imovel['opcionais']);
																$_ids = array();
																
																if (count($_tags)>0){
																	for ($_i=1; $_i<count($_tags)-1; $_i++)
																	
																	$_ids[count($_ids)] = "nome = '" . $_tags[$_i] . "'";
																	$_where = implode(" or ", $_ids);
																	
																	$sql5 = mysqli_query($link, "SELECT * FROM imoveis_opcionais WHERE status='S' and (" . $_where . ") order by id");
																	while($dados5=mysqli_fetch_array($sql5)){
                                                            ?>
                                                            <div class="col-md-4 margin-top-10 margin-bottom-10">
                                                                <div 
                                                                    class="col-md-12 text-align-center padding-top-10 padding-bottom-10 background-color-silver-light"
                                                                >
                                                                    <p class="font-size-14 font-color-silver margin-0 font-weight-700 acessibilidade">
                                                                        <?php echo utf8_encode($dados5['nome']);?>
                                                                    </p>
                                                                </div>
                                                            </div>        
                                                            <?php 
                                                            		} 
                                                            	}
                                                            ?>
                                                           	</div>
                                                           
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
													}
												?>
                                                
                                                <?php
													if(!empty($dados_Imovel['video'])){
												?>
                                                <div 
                                                    class="col-md-12 padding-top-25 padding-bottom-15" 
                                                >
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                           		Vídeo do Imóvel
                                                           </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                           <div class="embed-responsive embed-responsive-16by9">
                                                              <iframe 
                                                                class="embed-responsive-item" 
                                                                src="https://www.youtube.com/embed/<?php echo $dados_Imovel['video'];?>" 
                                                                frameborder="0" 
                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen
                                                             >
                                                             </iframe>
                                                           </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
													}
												?>
                                                
                                                <?php
													if(!empty($dados_Imovel['google_maps'])){
												?>
                                                <div 
                                                    class="col-md-12 padding-top-25 padding-bottom-15" 
                                                >
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                           		Localização
                                                           </p>
                                                        </div>
                                                        <div class="col-md-12">
                                                           <p class="font-size-14 font-color-silver margin-top-5 acessibilidade">
                                                           		<?php 
																	$google_Maps = utf8_encode($dados_Imovel['google_maps']);
																	$google_Maps = str_replace("<iframe ","<iframe class='map-imovel' ",$google_Maps); 
																	echo $google_Maps;
																?>
                                                           </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
													}
												?>
                                                
                                                <div 
                                                    class="col-md-12 text-align-center padding-bottom-15" 
                                                >
                                                    <div class="row text-align-center">
                                                        <div class="col-md-12">
                                                           <div class="row">
                                                               <div class="col-md-6 text-align-right margin-bottom-20">
                                                                   <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                                        <a 
                                                                            href="<?php echo $_linkCompleto;?>/imovel-imprimir/detalhes/<?php echo $dados_Imovel['url'];?>/referencia/<?php echo $dados_Imovel['referencia'];?>" 
                                                                            class="buttons_2"
                                                                            target="_blank"
                                                                        >
                                                                            <i class="fa fa-print"></i> Clique para imprimir
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 text-align-left margin-bottom-20">
                                                                    <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                                                        <a 
                                                                            href="https://api.whatsapp.com/send?phone=55<?php echo CELULAR;?>&text=Olá, gostaria de obter maiores informações sobre o imóvel  - Ref: <?php echo $dados_Imovel['referencia'];?>, que eu visualizei no site <?php echo $_linkCompleto;?>" 
                                                                            class="buttons_2"
                                                                            target="_blank"
                                                                        >
                                                                            <i class="fa fa-whatsapp"></i> Solicitar mais Informações
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
                                    <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-10 text-uppercase acessibilidade">
                                    	Compartilhe
                                    </p>
									<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e8e2bfb40ee6239"></script>
                        			<div class="addthis_inline_share_toolbox text-align-center"></div>
                                </div>
                                <div class="col-md-12 c-card-imovel-view padding-top-25 padding-bottom-25 padding-left-25 padding-right-25">
                                    <p class="font-size-15 font-weight-800 font-color-blue margin-bottom-5 text-uppercase acessibilidade">
                                    	Entre em contato
                                    </p>
                                    <p class="font-size-15 font-color-silver margin-top-5 font-weight-700 margin-bottom-5 acessibilidade">
                                    	<?php echo utf8_encode(NOME);?>
                                    </p>
                                    <p class="font-size-15 font-color-gold margin-top-5 font-weight-700 margin-bottom-5 acessibilidade">
                                    	<?php echo "CRECI " . utf8_encode(CPF_CPNJ);?>
                                    </p>
                                    <p class="margin-top-15 acessibilidade">
                                        <a 
                                            href="https://api.whatsapp.com/send?phone=55<?php echo CELULAR;?>&text=Olá, gostaria de obter maiores informações sobre o imóvel  - Ref: <?php echo $dados_Imovel['referencia'];?>, que eu visualizei no site <?php echo $_linkCompleto;?>"
                                            target="_blank"
                                            class="buttons_2"
                                            title="Solicitar informações via Whatsapp"
                                        >
                                            <i class="fa fa-whatsapp"></i> Falar via Whatsapp
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-12 c-card-imovel-view padding-top-25 padding-bottom-25 padding-left-25 padding-right-25">
                                    <p class="font-size-14 font-color-silver margin-top-5 margin-bottom-20 acessibilidade">
                                    	Preencha o formulário abaixo e solicite maiores informações sobre este <span class="font-weight-700">imóvel</span>!
                                    </p>
                                    <form id="contactForm" data-toggle="validator" class="shake">
                                        <div class="row text-left">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls"> 
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Nome</label>
                                                        <input 
                                                            type="text"  
                                                            class="form-control"
                                                            id="nome" 
                                                            required data-error="* Insira seu Nome"
                                                        >
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Telefone</label>
                                                        <input 
                                                            type="tel" 
                                                            class="form-control"
                                                            id="telefone" 
                                                            required data-error="* Insira seu Telefone"
                                                        >
                                                        <div class="help-block with-errors"></div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Email</label>
                                                        <input 
                                                            type="email" 
                                                            class="form-control" 
                                                            id="email" 
                                                            required data-error="* Insira seu Email"
                                                        >
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 input-message">
                                                <div class="form-group">
                                                    <div class="controls">
                                                    	<?php
															$msg_form  = "Olá, estou interessado no imóvel código ";
															$msg_form .= $dados_Imovel['referencia'] . ", ";
															$msg_form .= "localizado em ";
															
															$sql_Bairros   = mysqli_query($link, "SELECT * FROM imoveis_bairros WHERE url='".$dados_Imovel['bairro']."'");
															$dados_Bairros = mysqli_fetch_array($sql_Bairros);
															$msg_form .= utf8_encode($dados_Bairros['nome']);
															$msg_form .= " na cidade de ";
															$sql_Cidades   = mysqli_query($link, "SELECT * FROM imoveis_cidades WHERE url='".$dados_Imovel['cidade']."'");
															$dados_Cidades = mysqli_fetch_array($sql_Cidades);
															$msg_form .= utf8_encode($dados_Cidades['nome']);
															
															$msg_form .= " que encontrei no site. Por favor, entre em contato.";
														?>
                                                        <label class="font-color-gold font-weight-600 font-size-14 text-uppercase acessibilidade">Mensagem</label>
                                                        <textarea id="mensagem" rows="8" class="form-control font-weight-400 font-size-14 acessibilidade"><?php echo $msg_form;?></textarea>
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

    <footer>
		<?php include "includes/include.Footer.php";?>
    </footer>

	<?php include "includes/include.Footer.Scripts.php";?>
    
    <script src="<?php echo $_linkCompleto;?>/assets/template/lib/form-validator-send/contact-imovel-form.js"></script>
</body>
</html>
