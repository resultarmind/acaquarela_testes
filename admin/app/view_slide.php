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
          <a class="breadcrumb-item" href="#">Slides</a>
          <span class="breadcrumb-item active">Visualizar Slides</span>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Visualizar Slides</h4>
        <p class="mg-b-0">Visualize, edite ou exclua um slide.</p>
      </div>

      <div class="br-pagebody">
        <div class="br-section-wrapper">


        <a href="add_slide.php" class="btn btn-primary mb-4">Adicionar Slide</a>

<?php
// Include the database connection
include_once "config/conection.php";

// Verifique se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Execute uma consulta SQL para buscar os dados da tabela produtos_recomendados
$query = "SELECT * FROM slides";
$resultado = $conn->query($query);

if (!$resultado) {
    // Lida com erros na consulta, se houver algum
    die("Erro na consulta: " . $conn->error);
}
?>

<div class="bd bd-gray-300 rounded table-responsive">
            <table class="table table-hover table-striped table-bordered mg-b-0">
        <thead class="thead-colored thead-primary">
            <tr>
                <th class="text-center" scope="col">Título</th>
                <th class="text-center" scope="col">Imagem</th>
                <th class="text-center" scope="col">Link</th>
                <th class="text-center" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
while ($linha = $resultado->fetch_assoc()):
?>
                <tr>
                    <td class="text-center"><?php echo $linha["titulo"]; ?></td>
                    <td class="text-center">
                        <img class="img__full" src="../../images/BD/<?php echo $linha["imagem"]; ?>" alt="<?php echo $linha["titulo"]; ?>" style="max-width: 150px; max-height: 150px;">
                    </td>
                    <td class="text-center">produtos.php?id=<?php echo $linha["id"]; ?></td>
                    <td class="text-center">
                        <a href="editar_slide.php?id=<?php echo $linha["id"]; ?>" class="btn btn-primary btn-sm" title="Editar">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm excluir-imagem" data-id="<?php echo $linha["id"]; ?>" title="Excluir">
                        <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
endwhile;
?>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    // Quando o botão de exclusão for clicado
    $(".excluir-imagem").click(function() {
        // Obtenha o ID do produto a ser excluído
        var slideId = $(this).data("id");

        // Exiba um modal SweetAlert de confirmação
        Swal.fire({
            title: 'Tem certeza?',
            text: "Tem certeza de que deseja excluir este slide?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Faça uma solicitação AJAX para o arquivo PHP que executará a exclusão
                $.ajax({
                    url: "excluir_slide.php",
                    type: "POST",
                    data: { id: slideId },
                    success: function(response) {
                        // Atualize a página após a exclusão ou faça qualquer outra ação necessária
                        location.reload();
                    }
                });
            }
        });
    });
});
</script>


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
