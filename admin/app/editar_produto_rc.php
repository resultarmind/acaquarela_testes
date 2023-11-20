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
    $sql = "SELECT * FROM produtos_recomendados WHERE id = ?";
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
          <a class="breadcrumb-item" href="#">Produtos Recomendados</a>
          <span class="breadcrumb-item active">Alterar Produto Recomendado</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Alterar Produto Recomendado</h4>
        <p class="mg-b-0">Realize alterações em um produto recomendado através do formulário abaixo.</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">

<form action="salvar_produto_rc_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">


        <div class="form-group">
    <div class="card bd-0 mb-3" style="max-width: 250px;">
        <div class="card-body bd color-gray-lighter rounded">
            <h6 class="mg-b-3"><a href="" class="tx-dark">Imagem atual do Produto</a></h6>
            <span class="tx-12">Altere enviando outra imagem, caso necessário.</span>
            <hr>
            <div class="text-center">
                <img class="card-img-bottom img-fluid img-max-250" src="../../images/BD/<?php echo $item['imagem']; ?>" alt="Image">
            </div>
        </div><!-- card-body -->

        <div class="card-footer tx-center bd color-gray-lighter rounded mt-2">
            <label for="fileUpload1" class="btn btn-primary">Escolher Nova Imagem</label>
            <input type="file" id="fileUpload1" name="imagem" style="display: none;">
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


        <div class="form-group">
        <label for="nomeProduto">Nome do Produto</label>
        <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" value="<?php echo isset($item['nome']) ? $item['nome'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="categoriaProduto">Categoria do Produto</label>
        <input type="text" class="form-control" id="categoriaProduto" name="categoriaProduto" value="<?php echo isset($item['categoria']) ? $item['categoria'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="linkProduto">Link do Produto</label>
        <input type="text" class="form-control" id="linkProduto" name="linkProduto" value="<?php echo isset($item['link']) ? $item['link'] : ''; ?>">
    </div>
    <div class="form-group">
    <label for="descricaoProduto">Descrição do Produto</label>
    <textarea class="form-control" id="descricaoProduto" name="descricaoProduto" rows="3"><?php echo isset($item['descricao']) ? $item['descricao'] : ''; ?></textarea>
</div>


    <div class="form-group">
        <label for="precoAnterior">Preço Anterior</label>
        <input type="text" class="form-control" id="precoAnterior" name="precoAnterior" value="<?php echo isset($item['preco_anterior']) ? $item['preco_anterior'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="precoAtual">Preço Atual</label>
        <input type="text" class="form-control" id="precoAtual" name="precoAtual" value="<?php echo isset($item['preco_atual']) ? $item['preco_atual'] : ''; ?>">
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






















