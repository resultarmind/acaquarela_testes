<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
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
          <span class="breadcrumb-item active">Adicionar Produto</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Adicionar Produto</h4>
        <p class="mg-b-0">Adicione um novo produto através do formulário abaixo.</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">
            
<form action="salvar_formulario.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="imagemProduto" class="form-label">Imagem do Produto (Obrigatório)</label>
        <input type="file" class="form-control" id="imagemProduto" name="imagemProduto" required>
    </div>

    <div class="mb-3">
        <label for="titulo" class="form-label">Título (Obrigatório)</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título" required>
    </div>

    <div class="mb-3">
        <label for="marca" class="form-label">Marca (Obrigatório)</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Digite a marca" required>
    </div>

    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria (Obrigatório)</label>
        <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Digite a categoria" required>
    </div>

    <div class="mb-3">
        <label for="desconto" class="form-label">Valor do Desconto (Obrigatório)</label>
        <input type="text" class="form-control" id="desconto" name="desconto" placeholder="Digite o valor do desconto" required>
    </div>

    <div class="mb-3">
        <label for="tamanho" class="form-label">Tamanho (Opcional)</label>
        <div class="row">
            <?php
            // Simulação de tamanhos selecionados (substitua isso pelo seu código real, se necessário)
            $selectedSizes = [];

            for ($size = 15; $size <= 44; $size++) {
                $checked = in_array(strval($size), $selectedSizes) ? "checked" : "";
                echo '<div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-2">';
                echo "<label class='size-label'><input type='checkbox' name='tamanho[]' value='$size' $checked> $size</label>";
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="valorSemDesconto" class="form-label">Valor Sem Desconto (Obrigatório)</label>
        <input type="text" class="form-control" id="valorSemDesconto" name="valorSemDesconto" placeholder="Digite o valor sem desconto" required>
    </div>

    <div class="mb-3">
        <label for="valorComDesconto" class="form-label">Valor Com Desconto (Obrigatório)</label>
        <input type="text" class="form-control" id="valorComDesconto" name="valorComDesconto" placeholder="Digite o valor com desconto" required>
    </div>

    <div class="mb-3">
        <label for="material" class="form-label">Material (Opcional)</label>
        <input type="text" class="form-control" id="material" name="material" placeholder="Digite o material">
    </div>

    <div class="mb-3">
        <label for="solado" class="form-label">Solado (Opcional)</label>
        <input type="text" class="form-control" id="solado" name="solado" placeholder="Digite o solado">
    </div>

    <div class="mb-3">
        <label for="referencia" class="form-label">Referência (Opcional)</label>
        <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Digite a referência">
    </div>

    <div class="mb-3">
        <label for="imagemPix" class="form-label">Imagem do PIX (Opcional)</label>
        <input type="file" class="form-control" id="imagemPix" name="imagemPix">
    </div>

    <div class="mb-3">
        <label for="codigoPix" class="form-label">Código do PIX (Opcional)</label>
        <input type="text" class="form-control" id="codigoPix" name="codigoPix" placeholder="Digite o código do PIX">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
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
