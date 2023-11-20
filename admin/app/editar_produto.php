<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

// Check if 'id' is present in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Include the database connection
    include_once "config/conection.php";

    // Get the ID from the URL
    $id = $_GET['id'];

    // Prepare and execute a query
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $item = $result->fetch_assoc();

    if (!$item) {
        echo "Item not found.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Painel de Admin Responsivo - Resultar Mind">
    <meta name="author" content="resultarmind">

    <title>Resultar Mind - Admin</title>

    <!-- vendor css -->
    <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="../lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="../lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="../lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="../lib/chartist/chartist.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
  </head>

  <body>

    <?php include_once 'config/header.php'?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.php">Início</a>
          <a class="breadcrumb-item" href="#">Produtos</a>
          <span class="breadcrumb-item active">Alterar Produto</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Alterar Produto</h4>
        <p class="mg-b-0">Realize alterações em um produto através do formulário abaixo.</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
        <form action="salvar_produto_edit.php" method="post" enctype="multipart/form-data">


        <div class="row">

        <div class="col-md-2">
        <div class="form-group">
    <div class="card bd-0 mb-3" style="max-width: 250px;">
        <div class="card-body bd color-gray-lighter rounded">
            <h6 class="mg-b-3"><a href="" class="tx-dark">Imagem atual do Produto</a></h6>
            <span class="tx-12">Altere enviando outra imagem, caso necessário.</span>
            <hr>
            <div class="text-center">
                <img class="card-img-bottom img-fluid img-max-250" src="../../images/BD/<?php echo $item['imagemProduto']; ?>" alt="Image">
            </div>
        </div><!-- card-body -->

        <div class="card-footer tx-center bd color-gray-lighter rounded mt-2">
            <label for="fileUpload1" class="btn btn-primary">Escolher Nova Imagem</label>
            <input type="file" id="fileUpload1" name="imagemProduto" style="display: none;">
            <p id="fileSelectedStatus1" class="mt-2"></p>
        </div>
    </div>
</div>

<script>
    const fileUpload1 = document.getElementById("fileUpload1");
    const fileSelectedStatus1 = document.getElementById("fileSelectedStatus1");

    fileUpload1.addEventListener("change", function () {
        if (fileUpload1.files.length > 0) {
            fileSelectedStatus1.textContent = "Arquivo selecionado: " + fileUpload1.files[0].name;
        } else {
            fileSelectedStatus1.textContent = "Nenhum arquivo selecionado";
        }
    });
</script>


        </div>

        <div class="col-md-2">
        <div class="form-group">
    <div class="card bd-0 mb-3" style="max-width: 250px;">
        <div class="card-body bd color-gray-lighter rounded">
            <h6 class="mg-b-3"><a href="" class="tx-dark">Imagem atual do PIX</a></h6>
            <span class="tx-12">Altere enviando outra imagem, caso necessário.</span>
            <hr>
            <div class="text-center">
                <img class="card-img-bottom img-fluid img-max-250" src="../../images/BD/<?php echo $item['imagemPix']; ?>" alt="Image">
            </div>
        </div><!-- card-body -->

        <div class="card-footer tx-center bd color-gray-lighter rounded mt-2">
            <label for="fileUpload" class="btn btn-primary">Escolher Nova Imagem</label>
            <input type="file" id="fileUpload" name="imagemPix" style="display: none;">
            <p id="fileSelectedStatus" class="mt-2"></p>
        </div>
    </div>
</div>

<script>
    const fileUpload = document.getElementById("fileUpload");
    const fileSelectedStatus = document.getElementById("fileSelectedStatus");

    fileUpload.addEventListener("change", function () {
        if (fileUpload.files.length > 0) {
            fileSelectedStatus.textContent = "Arquivo selecionado: " + fileUpload.files[0].name;
        } else {
            fileSelectedStatus.textContent = "Nenhum arquivo selecionado";
        }
    });
</script>


</div>

        </div>

<input type="hidden" name="id" value="<?php echo $id; ?>">

<input type="hidden" name="existingImageProduto" value="<?php echo $existingImageProduto; ?>">
<input type="hidden" name="existingImagePix" value="<?php echo $existingImagePix; ?>">


            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo isset($item['titulo']) ? $item['titulo'] : ''; ?>">
            </div>

            <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" value="<?php echo isset($item['marca']) ? $item['marca'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="categoria">Categoria</label>
        <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo isset($item['categoria']) ? $item['categoria'] : ''; ?>">
    </div>

            <div class="form-group">
                <label for="desconto">Valor do Desconto</label>
                <input type="text" class="form-control" id="desconto" name="desconto" value="<?php echo isset($item['desconto']) ? $item['desconto'] : ''; ?>">
            </div>

            <div class="form-group">
        <label for="tamanho">Tamanho</label>
        <div class="row">
            <?php
// Simulação de tamanhos selecionados (substitua isso pelo seu código real, se necessário)
$selectedSizes = isset($item['tamanhos']) ? explode(",", $item['tamanhos']) : [];

for ($size = 15; $size <= 44; $size++) {
    $checked = in_array(strval($size), $selectedSizes) ? "checked" : "";
    echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-3">';
    echo "<label class='size-label'><input type='checkbox' name='tamanho[]' value='$size' $checked> $size</label>";
    echo '</div>';
}
?>
        </div>
    </div>
            <div class="form-group">
                <label for="valorSemDesconto">Valor Sem Desconto</label>
                <input type="text" class="form-control" id="valorSemDesconto" name="valorSemDesconto" value="<?php echo isset($item['valorSemDesconto']) ? $item['valorSemDesconto'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="valorComDesconto">Valor Com Desconto</label>
                <input type="text" class="form-control" id="valorComDesconto" name="valorComDesconto" value="<?php echo isset($item['valorComDesconto']) ? $item['valorComDesconto'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="material">Material</label>
                <input type="text" class="form-control" id="material" name="material" value="<?php echo isset($item['material']) ? $item['material'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="solado">Solado</label>
                <input type="text" class="form-control" id="solado" name="solado" value="<?php echo isset($item['solado']) ? $item['solado'] : ''; ?>">
            </div>
            <div class="form-group">
                <label for="referencia">Referência</label>
                <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo isset($item['referencia']) ? $item['referencia'] : ''; ?>">
            </div>

<style>
    .img-max-150 {
        max-width: 150px;
        max-height: 150px;
    }

    .img-max-250 {
        max-height: 350px;
    }

</style>


            <div class="form-group">
                <label for="codigoPix">Código do PIX</label>
                <input type="text" class="form-control" id="codigoPix" name="codigoPix" value="<?php echo isset($item['codigoPix']) ? $item['codigoPix'] : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
        </div>

    <?php include_once 'config/footer.php'?>

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="../lib/jquery/jquery.js"></script>
    <script src="../lib/popper.js/popper.js"></script>
    <script src="../lib/bootstrap/bootstrap.js"></script>
    <script src="../lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../lib/moment/moment.js"></script>
    <script src="../lib/jquery-ui/jquery-ui.js"></script>
    <script src="../lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="../lib/peity/jquery.peity.js"></script>
    <script src="../lib/chartist/chartist.js"></script>
    <script src="../lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="../lib/d3/d3.js"></script>
    <script src="../lib/rickshaw/rickshaw.min.js"></script>


    <script src="../js/bracket.js"></script>
    <script src="../js/ResizeSensor.js"></script>
    <script src="../js/dashboard.js"></script>
    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>
  </body>
</html>
