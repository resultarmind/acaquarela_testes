<?php
include_once '../config/conection.php';

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtenha o "id" da URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para buscar as informações do produto com base no "id"
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $titulo = $row['titulo'];
        $desconto = $row['desconto'];
        $tamanhos = $row['tamanhos'];
        $valorSemDesconto = $row['valorSemDesconto'];
        $valorComDesconto = $row['valorComDesconto'];
        $material = $row['material'];
        $solado = $row['solado'];
        $referencia = $row['referencia'];
        $imagemPix = $row['imagemPix'];
        $codigoPix = $row['codigoPix'];
        $imagemProduto = $row['imagemProduto'];
        // Outras informações do produto

        // Outras informações do produto
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "O parâmetro 'id' não foi especificado na URL.";
}

?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SANDÁLIA SUPERMAN + ESGUICHADOR DE ÁGUA DO SUPERMAN na Aquarela Calçados. Encontre os melhores tênis masculinos da Fila com estilo e conforto. Compre agora com entrega rápida e gratuita!" />
    <meta name="keywords" content="tênis masculino, tênis Fila, tênis Fila Atmosphere, tênis masculino de marca, calçado masculino, tênis com entrega rápida e gratuita, Aquarela Calçados" />
    <meta name="author" content="Aquarela Calçados" />

    <!-- Site Title -->
    <title>Aquarela Calçados</title>



    <!-- Site favicon -->
    <link rel="shortcut icon" href="../images/favicon.ico" />

    <!-- Swiper js -->
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" type="text/css" />

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="../css/materialdesignicons.min.css" />

    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">
    <!--Navbar Start-->
    <?php include_once '../config/header_pages.php'?>
    <!-- Navbar End -->

    <!-- contact start -->
    <section class="section-sm-top bg-light" id="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 text-center">
                    <h2 class="title text-uppercase color-price-azul"><?php echo $titulo ?></h2>
                    <h6 class="subtitle">GOSTOU DO PRODUTO? <span class="fw-bold">ADQUIRA AGORA!</span></h6>
                    <h2 class="title">SIGA AS ETAPAS ABAIXO</h2>
                    <p class="text-muted">Entre em contato conosco agora e garanta a sua!</p>
                </div>
            </div>

            <div class="row align-items-center">

                <div class="col-lg-12 mx-auto">
                    <div class="card contact-form rounded-lg mt-4 mt-lg-0">

                        <div class="card-body card-venda">
                        <div class="wrapper">
    <?php
    // Adiciona '%' ao valor de desconto se não terminar com '%'
    $desconto = rtrim($desconto, '%') . '%';
    ?>
    
    <div class="ribbon-wrapper-green"><div class="ribbon-green">-<?php echo $desconto ?></div></div>
</div>


                            <form id="orderForm">
                                <div class="row">
                                    <div class="col-md-4 mt-4">
                                        <div class="mb-3">
                                            <label for="formFirstName" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="formFirstName" placeholder="Digite seu nome" required />
                                        </div>

<div class="mb-3">
    <?php
    include_once 'config/conection.php';

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Obtenha o "id" da URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Consulta para buscar os tamanhos com base no "id"
        $sql = "SELECT tamanhos FROM produtos WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $tamanhos = $row['tamanhos'];

            // Verifique se a categoria tamanho não é nula
            if (!empty($tamanhos)) {
                ?>
                <label for="selectSize" id="size" class="form-label">Tamanho</label>
                <select class="form-select" id="selectSize" name="tamanho[]" aria-label="Default select example">
                    <option selected>Selecionar Tamanho</option>
                    <?php
                    $tamanhosArray = explode(',', $tamanhos);

                    foreach ($tamanhosArray as $tamanho) {
                        echo "<option value=\"$tamanho\">$tamanho</option>";
                    }
                    ?>
                </select>
                <?php
            } else {
                echo "";
            }
        } else {
            echo "Produto não encontrado.";
        }
    } else {
        echo "O parâmetro 'id' não foi especificado na URL.";
    }
    ?>
</div>




                                        <div class="mb-3 pt-1">
                                            <label for="selectSize" class="form-label">Frete</label>
                                            <select class="form-select" id="freteSelect" aria-label="Default select example">
                                                <option selected value="Retirada em loja">Retirada em loja</option>
                                                <option value="Envio do produto">Envio (Valor a combinar)</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="selectPay" class="form-label">Pagamento</label>
                                            <select class="form-select" id="selectPay" aria-label="Default select example">
                                                <option selected value="Pagamento à vista">Pagamento à vista</option>
                                                <option value="Pagamento no cartão">Pagamento no cartão</option>
                                            </select>
                                        </div>

<!--
<div class="mb-6">
                                            <label for="selectColor" class="form-label">Cor</label>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <ul class="list-unstyled d-flex color-grid" id="colorOptions2">
                                                        <li class="color-option is-selected" data-color="#474649" value="Preto"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
-->
                                    </div>


                                    <style>
                                        .color-option:nth-child(1) {
                                            background: #474649;
                                        }
                                    </style>



                                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                                            <img id="productImage1" class="" src="<?php echo '../images/BD/' . $imagemProduto; ?>" alt="" height="220px" width="220px">
                                        </div>


                                        <div class="col-md-4 pt-2">
                                        <div class="mb-3 pb-3">
    <?php if (!preg_match('/,\d{2}$/', $valorSemDesconto)) : ?>
        <?php $valorSemDesconto .= ',00'; ?>
    <?php endif; ?>
    <h4 class="text-decoration-line-through color-price-azul">R$ <?php echo $valorSemDesconto ?></h4>

    <?php if (!preg_match('/,\d{2}$/', $valorComDesconto)) : ?>
        <?php $valorComDesconto .= ',00'; ?>
    <?php endif; ?>
    <h3 class="color-price-azul">R$ <?php echo $valorComDesconto ?> no Pix</h3>

    <?php if (!preg_match('/,\d{2}$/', $valorSemDesconto)) : ?>
        <?php $valorSemDesconto .= ',00'; ?>
    <?php endif; ?>
    <h6 class="color-price-azul">ou R$ <?php echo $valorSemDesconto ?> em até 4x sem juros</h6>
</div>


<?php
if (!isset($_GET["gerarpix"])) {
   if (isset($_POST["chave"]) && isset($_POST["beneficiario"]) && isset($_POST["cidade"])) {
      $chave_pix=strtolower($_POST["chave"]);
      $beneficiario_pix=$_POST["beneficiario"];
      $cidade_pix=$_POST["cidade"];
      if (isset($_POST["descricao"])){
         $descricao=$_POST["descricao"];
      }
      else { $descricao=''; }
      if ((!isset($_POST["identificador"])) || (empty($_POST["identificador"]))) {
         $identificador="***";
      }
      else {
         $identificador=$_POST["identificador"];
         if (strlen($identificador) > 25) {
            $identificador=substr($identificador,0,25);
         }
      }
      $gerar_qrcode=true;
   }
   else {
      $cidade_pix="ENG CALDAS";
      $gerar_qrcode=false;
   }
}
else {
   $chave_pix="";
   $beneficiario_pix="";
   $cidade_pix="";
   $identificador="***";
   $descricao="";
   $gerar_qrcode=true;
}
if (is_numeric($_POST["valor"])){
   $valor_pix=preg_replace("/[^0-9.]/","",$_POST["valor"]);
}
else {
   $valor_pix="0.00";
}
?>


<form method="post" action="produtos.php?id=<?php echo $id ?>">

<div class="row row-cols-lg-auto align-items-center">
   <input type="hidden" class="form-control" id="chave" name="chave" placeholder="Informe a chave pix"
      value="<?= $chave_pix;?>" size="50" maxlength="100" onclick="this.select();"
      data-toggle="tooltip" data-placement="right" title="Informe a chave pix de destino" required>
</div>

<script>
   // Apply Inputmask to the Pix key input field
   $(document).ready(function () {
      $('#chave').inputmask({
         mask: ['email', 'phone', 'cpf', 'cnpj', '9{10,50}'],
         keepStatic: true,
         showMaskOnHover: false,
         showMaskOnFocus: false
      });
   });
</script>


<div class="row row-cols-lg-auto align-items-center mt-3">
   <input type="hidden" id="valor" class="form-control" name="valor"
      placeholder="Informe o valor a cobrar" size="15" maxlength="13" value="<?= $valor_pix; ?>"
      onclick="this.select();" onkeypress="mascara(this,reais)">
</div>
<div class="row row-cols-lg-auto align-items-center mt-3">
   <input type="hidden" id="beneficiario" class="form-control" name="beneficiario"
      placeholder="Informe o nome do beneficiario" size="30" onclick="this.select();" maxlength="25"
      value="<?= $beneficiario_pix; ?>" required>
</div>
<div class="row row-cols-lg-auto align-items-center mt-3">
   <input type="hidden" name="cidade" class="form-control" placeholder="Informe a cidade"
      onclick="this.select();" maxlength="15" value="<?= $cidade_pix;?>" required>
</div>
<div class="row row-cols-lg-auto align-items-center mt-3">
   <input type="hidden" id="descricao" class="form-control" name="descricao"
      placeholder="Descricao do pagamento" size="60" maxlength="70" value="<?= $_POST["descricao"];?>"
      value="<?= $_POST["descricao"];?>" onclick="this.select();">
</div>
<div class="row row-cols-lg-auto align-items-center mt-3">
   <input type="hidden" id="identificador" class="form-control" name="identificador"
      placeholder="Identificador do pagamento" value="***" size="25" onclick="this.select();"
      value="<?= $_POST["identificador"];?>">
</div>

<p>Gere o Pix e faça o pagamento agora mesmo.</p>
<p><a href="#" id="gerarpix" class="btn btn-info" onclick="preencherCampos()">GERAR PIX <i class="fas fa-hand-holding-usd pl-3"></i></a>&nbsp;</p>
</form>
<script>
    function preencherCampos() {
        // Preencha os campos com os valores desejados usando PHP
        document.getElementById('chave').value = '42.508.706/0001-09';
        document.getElementById('valor').value = '<?php echo $valorComDesconto; ?>';
        document.getElementById('beneficiario').value = 'Milva';
        document.getElementById('cidade').value = 'Sobrália';
        document.getElementById('descricao').value = 'Pagamento';
        document.getElementById('identificador').value = 'PAGSITEAC';

        // Envie o formulário
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Manipule a resposta do servidor, se necessário
                console.log(this.responseText);
            }
        };

        // Obtenha os dados do formulário
        var formData = new FormData(document.getElementById('pixForm'));

        // Envie a solicitação AJAX
        xhttp.open("POST", "produtos.php?id=<?php echo $id ?>", true);
        xhttp.send(formData);
    }
</script>






        <div class="row align-items-center text-center justify-content-end mb-5 border rounded">
            <div class="col-md-12 pt-2">
                <h5>Pague agora via PIX</h5>
                <p>Aperte no QRCode para copiar o pix.</p>
            </div>
            <div class="col-md-4 mb-2">

            <?php

if ($gerarpix){
   include "../pix/phpqrcode/qrlib.php"; 
   include "../pix/funcoes_pix.php";
   $px[00]="01"; //Payload Format Indicator, Obrigatório, valor fixo: 01
   // Se o QR Code for para pagamento único (só puder ser utilizado uma vez), descomente a linha a seguir.
   //$px[01]="12"; //Se o valor 12 estiver presente, significa que o BR Code só pode ser utilizado uma vez. 
   $px[26][00]="br.gov.bcb.pix"; //Indica arranjo específico; “00” (GUI) obrigatório e valor fixo: br.gov.bcb.pix
   $px[26][01]=$chave_pix;
   if (!empty($descricao)) {
      /* 
      Não é possível que a chave pix e infoAdicionais cheguem simultaneamente a seus tamanhos máximos potenciais.
      Conforme página 15 do Anexo I - Padrões para Iniciação do PIX  versão 1.2.006.
      */
      $tam_max_descr=99-(4+4+4+14+strlen($chave_pix));
      if (strlen($descricao) > $tam_max_descr) {
         $descricao=substr($descricao,0,$tam_max_descr);
      }
      $px[26][02]=$descricao;
   }
   $px[52]="0000"; //Merchant Category Code “0000” ou MCC ISO18245
   $px[53]="986"; //Moeda, “986” = BRL: real brasileiro - ISO4217
   if ($valor_pix > 0) {
      // Na versão 1.2.006 do Anexo I - Padrões para Iniciação do PIX estabelece o campo valor (54) como um campo opcional.
      $px[54]=$valor_pix;
   }
   $px[58]="BR"; //“BR” – Código de país ISO3166-1 alpha 2
   $px[59]=$beneficiario_pix; //Nome do beneficiário/recebedor. Máximo: 25 caracteres.
   $px[60]=$cidade_pix; //Nome cidade onde é efetuada a transação. Máximo 15 caracteres.
   $px[62][05]=$identificador;
//   $px[62][50][00]="BR.GOV.BCB.BRCODE"; //Payment system specific template - GUI
//   $px[62][50][01]="1.2.006"; //Payment system specific template - versão
   $pix=montaPix($px);
   $pix.="6304"; //Adiciona o campo do CRC no fim da linha do pix.
   $pix.=crcChecksum($pix); //Calcula o checksum CRC16 e acrescenta ao final.
   $linhas=round(strlen($pix)/120)+1;
   ?>

<?php
   ob_start();
   QRCode::png($pix, null,'M',5);
   $imageString = base64_encode( ob_get_contents() );
   ob_end_clean();
   // Exibe a imagem diretamente no navegador codificada em base64.
   echo '<img src="data:image/png;base64,' . $imageString . '"></p>';
}
?>



        </div>
            <div class="col-md-8 px-3">
                <h6>Ou Chave PIX: <span id="chavePix">42.508.706/0001-09</span></h6>
            </div>
        </div>
    

        




                                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">



                                        <!-- Inclua o arquivo JavaScript do SweetAlert2 -->
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
                                        <script>
                                            // Texto que deseja copiar
                                            var textoParaCopiar = "<?php echo $codigoPix ?>";

                                            // Adiciona um evento de clique à imagem
                                            document.getElementById("pix").addEventListener("click", function() {
                                                // Copia o texto para a área de transferência
                                                navigator.clipboard.writeText(textoParaCopiar).then(function() {
                                                    // Exibe uma mensagem de sucesso com SweetAlert2
                                                    Swal.fire({
                                                        title: "CÓDIGO COPIADO!",
                                                        text: "Agora, acesse o aplicativo do seu banco e conclua a transação usando o Pix copia e cola",
                                                        icon: "success"
                                                    });
                                                }).catch(function(err) {
                                                    // Trate possíveis erros
                                                    console.error("Erro ao copiar o texto: " + err);
                                                });
                                            });

                                            // Adiciona um evento de clique ao elemento com o ID "chavePix"
                                            document.getElementById("chavePix").addEventListener("click", function() {
                                                // Texto dentro do elemento
                                                var chavePixTexto = document.getElementById("chavePix").innerText;

                                                // Copia o texto para a área de transferência
                                                navigator.clipboard.writeText(chavePixTexto).then(function() {
                                                    // Exibe uma mensagem de sucesso quando o texto é copiado
                                                    Swal.fire({
                                                        title: "CÓDIGO COPIADO!",
                                                        text: "Agora, acesse o aplicativo do seu banco e conclua a transação usando o Pix CNPJ",
                                                        icon: "success"
                                                    });
                                                }).catch(function(err) {
                                                    // Trate possíveis erros
                                                    console.error("Erro ao copiar o texto: " + err);
                                                });
                                            });
                                        </script>

                                        <div class="mb-3 pt-lg-5">
                                            <button type="submit" id="enviarButton" class="btn btn-gradient-azul">Enviar mensagem <i class="mdi mdi-send ms-1"></i></button>
                                        </div>

                                    </div>


                                    <script>
                                        // Step 3: Listen for clicks on .color-option elements, grab value from data attribute and update --primary-color

                                        document.addEventListener('click', (e) => {
                                            const colorOption = e.target.closest('.color-option');
                                            if (!colorOption) return;

                                            // unselect currently selected color options
                                            document.querySelectorAll('.color-option').forEach(colorOption =>
                                                colorOption.classList.remove('is-selected'));
                                            colorOption.classList.add('is-selected');

                                            const color = colorOption.dataset.color;

                                            let root = document.documentElement;
                                            root.style.setProperty('--primary-color', color);

                                        });
                                    </script>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
    var titulo = "<?php echo $titulo; ?>";
    var codigoPix = "<?php echo $codigoPix; ?>";
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("orderForm");

        form.addEventListener("submit", function (event) {
            event.preventDefault();

            // Retrieve values from the form fields
            const nome = document.getElementById("formFirstName").value;
            const tamanho = document.querySelector("#selectSize option:checked").value;
            const corSelecionada = document.querySelector(".color-option.is-selected");
            const cor = corSelecionada ? corSelecionada.getAttribute("value") : "N/A";
            const frete = document.getElementById("freteSelect").value;
            const pagamento = document.getElementById("selectPay").value;

            // Construct the WhatsApp message
            const mensagem = `📃 *PEDIDO:*
👤 *Nome:* ${nome}
----------------------------------------
🛍️ *Produto Selecionado:* <?php echo $titulo; ?>.
📏 *Tamanho:* ${tamanho}
🖌️ *Cor:* ${cor}
📦 *Frete:* ${frete}
----------------------------------------
💵 *Pagamento:* ${pagamento}

🔐 *Chave PIX CNPJ:* 42.508.706/0001-09

📋 *PIX COPIA E COLA:*
<?php echo $codigoPix; ?>`;

            // Phone number of the seller (replace with the actual phone number)
            const numeroVendedor = "+5533998122152";

            // Create the WhatsApp URL
            const whatsappURL = `https://api.whatsapp.com/send?phone=${numeroVendedor}&text=${encodeURIComponent(mensagem)}`;

            // Open WhatsApp in a new window or tab
            window.open(whatsappURL, "_blank");
        });
    });
</script>



    <!-- contact end -->


<!-- features start -->
<section class="section-sm-per bg-light" id="features">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 col-lg-6 text-center">
                <h2 class="title mb-4">CONHEÇA MAIS SOBRE O PRODUTO</h2>
            </div>
        </div>

        <div class="col-lg-12 mx-auto">

        <div class="row justify-content-center">

        <div class="col-lg-3">
            <div class="col-lg-3 offset-lg-5">
                    <img id="productImage2" src="<?php echo '../images/BD/' . $imagemProduto; ?>" alt="" height="300px" width="300px" class="img d-block mx-auto" />
            </div>
            </div>

            <div class="col-lg-9">
            <div class="col-lg-12 offset-lg-3">
                <div class="">
                    <h1 class="fs-38 mb-4"><?php echo $titulo ?></h1>
                </div>


<?php
if (!empty($material)) {
    ?>

                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <span class="avatar avatar-lg bg-white text-primary rounded-circle shadow-primary">
                            <i class="mdi mdi-check"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <p class="text-muted"><span class="text-dark fw-bold">Material:</span> <?php echo $material ?></p>
                    </div>
                </div>
                    <?php
}
?>

<?php
if (!empty($solado)) {
    ?>
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <span class="avatar avatar-lg bg-white text-primary rounded-circle shadow-primary">
                            <i class="mdi mdi-check"></i>
                        </span>
                    </div>
    <div class="flex-grow-1 ms-4">
        <p class="text-muted">
            <span class="text-dark fw-bold">Solado:</span> <?php echo $solado ?>
        </p>
    </div>
    <?php
}
?>

                </div>

<?php
if (!empty($referencia)) {
    ?>
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <span class="avatar avatar-lg bg-white text-primary rounded-circle shadow-primary">
                            <i class="mdi mdi-check"></i>
                        </span>
                    </div>
                    <div class="flex-grow-1 ms-4">
                        <p class="text-muted">
                            <span class="text-dark fw-bold">Referência:</span> <?php echo $referencia ?>
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
</section>
<!-- features end -->




<section class="section-sm-per bg-light recommended" id="recommended">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6 text-center">
                <h2 class="title">Produtos recomendados para você</h2>
            </div>
        </div>

        <div class="container">
            <div class="row">

            <div class="screen-slider overflow-hidden">
                        <div class="swiper-wrapper">

            <?php
include_once '../config/conection.php';

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para buscar os produtos recomendados
$sql = "SELECT nome, categoria, link, descricao, preco_anterior, preco_atual, imagem FROM produtos_recomendados";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nomeProduto = $row['nome'];
        $categoriaProduto = $row['categoria'];
        $linkProduto = $row['link'];
        $descricaoProduto = $row['descricao'];
        $precoAnterior = $row['preco_anterior'];
        $precoAtual = $row['preco_atual'];
        $imagem = $row['imagem'];

        // Agora, substitua os valores dinâmicos no código HTML
        echo '<div class="swiper-slide">';
        echo '<div class="col-md-12">';
        echo '<div class="product-card">';
        echo '<div class="badge"><i class="fa-solid fa-fire"></i></div>';
        echo '<div class="product-tumb">';
        echo '<img src="../images/BD/' . htmlspecialchars($row["imagem"]) . '" alt="' . $nomeProduto . '">';
        echo '</div>';
        echo '<div class="product-details">';
        echo '<span class="product-catagory">' . $categoriaProduto . '</span>';
        echo '<h4><a href="' . $linkProduto . '">' . $nomeProduto . '</a></h4>';
        echo '<p>' . $descricaoProduto . '</p>';
        echo '<div class="product-bottom-details">';
        echo '<div class="product-price"><small>R$' . $precoAnterior . '</small>R$' . $precoAtual . '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Nenhum produto recomendado encontrado.";
}

// Não feche a conexão aqui
?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

            </div>
        </div>
    </div>
</section>




    <!-- footer & cta start -->

    <?php include_once '../config/footer.php'?>

    <!-- javascript -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- counter -->
    <script src="../js/counter.init.js"></script>
    <!-- swiper -->
    <script src="../js/swiper-bundle.min.js"></script>
    <script src="../js/swiper.js"></script>
    <script src="../js/app.js"></script>

</body>

</html>