<?php
session_start();
include('conexao.php');
// Handle form submission
if (isset($_POST['submit'])) {
    // Sanitize user input
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $valor = mysqli_real_escape_string($conn, $_POST['valor']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    
         // Insert data into database
        $stmt = $conn->prepare("INSERT INTO imoveis (tipo, descricao, endereco, area, valor) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $tipo, $descricao, $endereco, $area, $valor);
        
        if ($stmt->execute()) {
           
            // receber o id do imovel
            $imovel_id = $conn->insert_id;

            // endereco diretorio

            $diretorio = "assets/img/imoveis/$imovel_id/" ;
            mkdir($diretorio, 0755);

            //receber arquivos 
            $arquivos = $_FILES['pic'];

            for($cont = 0; $cont < count($arquivos['name']); $cont++){
                // receber nome da imagem
                $nome_arquivo = $arquivos['name'][$cont];
                $destino = $diretorio . $arquivos['name'][$cont];
                if(move_uploaded_file($arquivos['tmp_name'][$cont], $destino)){
                 $query_img = $conn->prepare("INSERT INTO imagens (nome_imagem, imovel_id) VALUES (?,?)");
                 $query_img->bind_param("ss", $nome_arquivo, $imovel_id) ;
                 if($query_img->execute()){
                    
                 $_SESSION['msg'] = "<p>Cadastrado com sucesso!</p>";
                 }else{
                 $_SESSION['msg'] = "<p>Erro ao cadastrar imagem.</p>";
                 };

                 $_SESSION['msg'] = "<p>Cadastrado com sucesso!</p>";
                } else{
                 $_SESSION['msg'] = "<p>Erro ao cadastrar imagem.</p>";
                }
            }
        } else {
            $_SESSION['msg'] = "<p>Erro ao cadastrar.</p>";
        }
        
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        
        $stmt->close();

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>AntônioNeto Imoveis</title>

   <!-- font link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- bootstrap link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

   <!-- css link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<section class="contato" id="contato">

   <h1 class="heading">Adicionar Imóvel</h1>

   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">


      <span>Tipo :</span>
      <input type="text" name="tipo" placeholder="tipo de imovel" class="box" >

      <span>descricao:</span>
      <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
      
      <span>endereco:</span>
      <input type="text" name="endereco" placeholder="endereco" class="box" >
      
      <span>area:</span>
      <input type="number" name="area" placeholder="area" class="box" >

      <span>valor:</span>
      <input type="number" name="valor" placeholder="valor" class="box" >

      <span>imagem:</span>
      <input type="file" name="pic[]" class="box" multiple="multiple" accept="image/*">

      <input type="submit" value="Upload" name="submit" class="link-btn">
   </form>  

</section>
    
</body>
</html>