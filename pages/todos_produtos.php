<?php

include_once '../config/conection.php';

$query = "SELECT titulo FROM produtos";
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $query .= " WHERE titulo LIKE '%$searchTerm%'";
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
    <section class="section-sm-top bg-light mt-5">

<div class="container-xxl">


    <div class="row">
        <div class="col-md-3">
            <h4 class="mt-3">Filtros</h4>
            <hr>

            
    <?php
    // Consulta SQL para contar o total de itens na tabela produtos
    $sql = "SELECT COUNT(*) as total FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir o total de itens
        $row = $result->fetch_assoc();
echo '<div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i> Total de Produtos:<strong> ' . $row["total"] . '</strong></div>';
    } else {
        echo "<p class='lead'>Nenhum resultado encontrado na tabela produtos.</p>";
    }


    // Consulta SQL para contar o total de marcas distintas na tabela produtos
    $sql = "SELECT COUNT(DISTINCT marca) as total_marcas FROM produtos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Exibir o total de marcas
        $row = $result->fetch_assoc();
echo '<div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i> Total de Marcas:<strong> ' . $row["total_marcas"] . '</strong></div>';    } else {
        echo "<p>Nenhum resultado encontrado na tabela produtos.</p>";
    }
    ?>

            <div class="col-mb-3">
      <div class="card">
        <div class="card-body">
          <h4>Produtos</h4>
          <div class="mb-3">
            <label for="sortBy">Ordenar por:</label>
            <select class="form-select" id="sortBy">
              <option value="relevance">Relevância</option>
              <option value="price-low-high">Preço (baixo para alto)</option>
              <option value="price-high-low">Preço (alto para baixo)</option>
              <option value="newest">Mais recentes</option>
            </select>
          </div>
        </div>
      </div>
    </div>

            <div class="mb-3 mt-3">
            <div class="card card-filter">
                    <div class="card-body">

                <h5>Categoria</h5>
                <?php
include_once '../config/conection.php';

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para buscar todas as categorias distintas dos produtos
$sql = "SELECT DISTINCT categoria FROM produtos";
$result = $conn->query($sql);

echo '<div class="form-check">';
echo '<input class="form-check-input" type="checkbox" id="todasCategorias">'; // Remova o "checked" aqui
echo '<label class="form-check-label" for="todasCategorias">Todas as Categorias</label>';
echo '</div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoria = $row['categoria'];

        // Crie um checkbox para cada categoria
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" name="categorias[]" value="' . $categoria . '" id="' . $categoria . '">'; // Remova o "checked" aqui
        echo '<label class="form-check-label" for="' . $categoria . '">' . $categoria . '</label>';
        echo '</div>';
    }
}
// Não feche a conexão aqui
?>
            </div>
            </div>
            </div>

            <div class="mb-3">
                <div class="card card-filter">
                    <div class="card-body">

                <h5>Marca</h5>
                <?php
// Consulta para buscar todas as marcas distintas dos produtos
$sql = "SELECT DISTINCT marca FROM produtos";
$result = $conn->query($sql);

echo '<div class="form-check">';
echo '<input class="form-check-input" type="checkbox" id="todasMarcas">'; // Remova o "checked" aqui
echo '<label class="form-check-label" for="todasMarcas">Todas as Marcas</label>';
echo '</div>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $marca = $row['marca'];

        // Crie um checkbox para cada marca
        echo '<div class="form-check">';
        echo '<input class="form-check-input" type="checkbox" name="marcas[]" value="' . $marca . '" id="' . $marca . '">'; // Remova o "checked" aqui
        echo '<label class="form-check-label" for="' . $marca . '">' . $marca . '</label>';
        echo '</div>';
    }
}
// Não feche a conexão aqui
?>
            </div>
        </div>

                    </div>


    </div>


    <div class="col-md-9">
    <div class="col-md-5 offset-md-7">
    <div class="input-group">
    <input type="text" name="searchInput" id="searchInput" class="form-control" placeholder="Não achou o que procura? Pesquise aqui!" aria-label="Search" aria-describedby="searchButton">
    <button class="btn btn-outline-secondary" type="button" id="searchButton">
        <i class="fa fa-search"></i>
    </button>
</div>

    </div>
    <div class="row" id="searchResults"></div>
    <hr>


    <div class="row" id="produtos-container"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        const contentToShow = document.getElementById('contentToShow');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.trim();

            if (searchTerm === '') {
                searchResults.innerHTML = ''; // Clear the search results
                contentToShow.style.display = 'block'; // Show the original content
            } else {
                // Send an AJAX request to fetch search results
                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'get_resultados_pesquisa.php?search=' + encodeURIComponent(searchTerm), true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        searchResults.innerHTML = xhr.responseText;
                        contentToShow.style.display = 'none'; // Hide the original content
                    }
                };
                xhr.send();
            }
        });
    });
</script>

</section>
<!-- Adicione esta seção de script no final da página -->
<!-- Adicione esta seção de script no final da página -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function mostrarNomeCompleto(element, nome) {
    element.textContent = nome;
}

function restaurarNome(element) {
    // Recupere o nome original do atributo 'data-nome' e defina-o como o conteúdo do elemento
    var nomeOriginal = element.getAttribute('data-nome');
    element.textContent = nomeOriginal;
}

$(document).ready(function () {
    function atualizarProdutos() {
        var marcasSelecionadas = $('input[name="marcas[]"]:checked').map(function(){
            return $(this).val();
        }).get();

        var categoriasSelecionadas = $('input[name="categorias[]"]:checked').map(function(){
            return $(this).val();
        }).get();

        var ordenacao = $('#sortBy option:selected').attr('value');

        var todasMarcas = $('#todasMarcas');
        if (marcasSelecionadas.length > 0) {
            todasMarcas.prop('checked', false);
        } else {
            todasMarcas.prop('checked', true);
        }

        var todasCategorias = $('#todasCategorias');
        if (categoriasSelecionadas.length > 0) {
            todasCategorias.prop('checked', false);
        } else {
            todasCategorias.prop('checked', true);
        }

        $.ajax({
            url: 'get_consulta.php',
            data: { marcas: marcasSelecionadas, categorias: categoriasSelecionadas, ordenacao: ordenacao },
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                var produtosContainer = $('#produtos-container');
                produtosContainer.empty();

                if (data.length > 0) {
                    $.each(data, function (index, produto) {
                        // Adicione uma verificação para ocultar produtos com status igual a 1
                        if (produto.status !== "1") {
                            var produtoHTML = '<div class="col-md-3">';
                            produtoHTML += '<div class="card mt-3" >'; // Definindo largura e altura de 400px
                            produtoHTML += '<div class="card-body">';
                            produtoHTML += '<span class="badge badge-danger"><i class="fas fa-fire"></i></span>';
                            produtoHTML += '<img class="card-img-top" src="../images/BD/' + produto.imagem + '" alt="' + produto.nome + '">';
                            produtoHTML += '<h5 class="card-title card-title-hover text-uppercase" data-nome="' + produto.nome + '"><a href="produtos.php?id=' + produto.id + '">' + produto.nome + '</a></h5>';
                            produtoHTML += '<div class="product-bottom-details">';
                            produtoHTML += '<div class="product-price">';
                            produtoHTML += '<small class="text-muted">R$' + produto.precoAnterior + '</small>';
                            produtoHTML += 'R$' + produto.precoAtual;
                            produtoHTML += '</div>';
                            produtoHTML += '</div>';
                            produtoHTML += '</div>';
                            produtoHTML += '</div>';
                            produtoHTML += '</div>';
                            produtosContainer.append(produtoHTML);
                        }
                    });
                } else {
                    produtosContainer.html("Nenhum produto recomendado encontrado.");
                }
            },
            error: function (error) {
                console.error('Erro na solicitação AJAX: ' + error);
            }
        });
    }

    $('#todasMarcas').change(function() {
        $('input[name="marcas[]"]').prop('checked', this.checked);
        atualizarProdutos();
    });

    $('#todasCategorias').change(function() {
        $('input[name="categorias[]"]').prop('checked', this.checked);
        atualizarProdutos();
    });

    $('input[name="marcas[]"]').change(atualizarProdutos);
    $('input[name="categorias[]"]').change(atualizarProdutos);
    $('#sortBy').change(atualizarProdutos);

    atualizarProdutos();
});


</script>




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