<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

include_once("config/conection.php");

// Verifique se a solicitação POST foi feita para atualizar o status
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["salvar"])) {
    // Obtenha os dados da solicitação POST
    $id = isset($_POST["id"]) ? $_POST["id"] : null;
    $status = isset($_POST["status"]) ? $_POST["status"] : null;

    // Certifique-se de que ambos os valores são definidos antes de executar a atualização
    if ($id !== null && $status !== null) {
        // Atualizar o status do produto
        $sql = "UPDATE produtos SET status = $status WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            // Exemplo de redirecionamento após a atualização bem-sucedida
            header("Location: visualizar_produtos.php?success=true");
            exit();
        } else {
            echo "Erro na atualização: " . $conn->error;
        }
    }
}

// Execute a consulta para buscar os dados da tabela produtos
$query = "SELECT * FROM produtos";
$resultado = $conn->query($query);

if (!$resultado) {
    // Lida com erros na consulta, se houver algum
    die("Erro na consulta: " . $conn->error);
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



<?php
// Verifique se há uma mensagem na sessão
if (isset($_SESSION['success_message'])) {
    ?>
    <!-- Adicione um script para mostrar o popup -->
    <script>
        $(document).ready(function(){
            $('#successModal').modal('show'); // Exibe o popup ao carregar a página
        });
    </script>

    <!-- Modal de sucesso -->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Cadastro com sucesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Seus dados foram cadastrados com sucesso!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Limpe a mensagem da sessão
    unset($_SESSION['success_message']);
}
?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        <div class="br-pageheader pd-y-15 pd-l-20">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="index.php">Início</a>
                <a class="breadcrumb-item" href="#">Produtos</a>
                <span class="breadcrumb-item active">Visualizar Produtos</span>
            </nav>
        </div><!-- br-pageheader -->
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <h4 class="tx-gray-800 mg-b-5">Visualizar Produtos</h4>
            <p class="mg-b-0">Visualize, edite ou exclua um produto.</p>
        </div>

        <div class="br-pagebody">
            <div class="br-section-wrapper">


                <a href="add_prod.php" class="btn btn-primary mb-4">Adicionar Produto</a>

                <?php
                // Include the database connection
                include_once "config/conection.php";

                // Verifique se a conexão foi bem-sucedida
                if ($conn->connect_error) {
                    die("Erro na conexão: " . $conn->connect_error);
                }

                // Execute uma consulta SQL para buscar os dados da tabela produtos_recomendados
                $query = "SELECT * FROM produtos";
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
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($linha = $resultado->fetch_assoc()):
                            ?>
                                <tr class="mt-3">
                                    <td class="text-center"><?php echo $linha["titulo"]; ?></td>
                                    <td class="text-center">
                                        <img class="img__full" src="../../images/BD/<?php echo $linha["imagemProduto"]; ?>" alt="<?php echo $linha["titulo"]; ?>" style="max-width: 150px; max-height: 150px;">
                                    </td>
                                    <td class="text-center">
                                        <form method="post" action="" id="form_<?php echo $linha["id"]; ?>">
                                        <select class="form-control <?php echo ($linha["status"] == 0) ? 'positive' : 'negative'; ?> status-select" name="status" data-id="<?php echo $linha["id"]; ?>">
    <option value="0" <?php echo ($linha["status"] == 0) ? 'selected' : ''; ?>>Habilitado</option>
    <option value="1" <?php echo ($linha["status"] == 1) ? 'selected' : ''; ?>>Desabilitado</option>
</select>

                                            <button class="btn btn-success btn-sm salvar-status mt-4" type="button" name="salvar">Salvar</button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <!-- Ações para editar e excluir permanecem inalteradas -->
                                        <a href="editar_produto.php?id=<?php echo $linha["id"]; ?>" class="btn btn-primary btn-sm" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm excluir-imagem2" data-id="<?php echo $linha["id"]; ?>" title="Excluir">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            endwhile;
                            ?>
                        </tbody>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <script type="text/javascript">
                            $(document).ready(function() {
                                // Quando o botão de exclusão for clicado
                                $(".excluir-imagem2").click(function() {
                                    // Obtenha o ID do produto a ser excluído
                                    var produtoId = $(this).data("id");

                                    // Exiba um modal SweetAlert de confirmação
                                    Swal.fire({
                                        title: 'Tem certeza?',
                                        text: "Tem certeza de que deseja excluir este produto?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Sim, excluir!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // Faça uma solicitação AJAX para o arquivo PHP que executará a exclusão
                                            $.ajax({
                                                url: "excluir_produto.php",
                                                type: "POST",
                                                data: {
                                                    id: produtoId
                                                },
                                                success: function(response) {
                                                    // Atualize a página após a exclusão ou faça qualquer outra ação necessária
                                                    location.reload();
                                                }
                                            });
                                        }
                                    });
                                });

                                // Quando o botão de salvar for clicado
                                $(".salvar-status").click(function(e) {
                                    e.preventDefault(); // Evita a submissão do formulário padrão

                                    // Obtém o ID do produto e o status do formulário
                                    var produtoId = $(this).siblings(".status-select").data("id");
                                    var status = $(this).siblings(".status-select").val();

                                    // Faça uma solicitação AJAX para atualizar o status
                                    $.ajax({
                                        url: "update_status.php", // Atualize com o caminho real do arquivo
                                        type: "POST",
                                        data: {
                                            id: produtoId,
                                            status: status
                                        },
                                        success: function(response) {
                                            // Lidar com a resposta conforme necessário
                                            console.log(response);
                                        }
                                    });
                                });
                            });
                        </script>

                        <?php

                        if (isset($_GET['success']) && $_GET['success'] === 'true') {
                            echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "Atualização bem-sucedida!",
                                    text: "O produto foi atualizado com sucesso.",
                                });
                            </script>';
                        }

                        ?>

                    </table>
                </div>

                <?php include_once 'config/footer.php'?>

            </div>

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
        $(function() {
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function() {
                minimizeMenu();
            });

            minimizeMenu();

            function minimizeMenu() {
                if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                    // show only the icons and hide left menu label by default
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>
</body>

</html>
