<?php
include '../config/conection.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Construa sua consulta SQL para buscar produtos que correspondem ao termo de pesquisa
    $sql = "SELECT id, titulo, desconto, valorSemDesconto, valorComDesconto, imagemProduto FROM produtos WHERE titulo LIKE '%$search%' AND status != '1'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $produto = array(
                'id' => $row['id'],
                'nome' => $row['titulo'],
                'desconto' => $row['desconto'],
                'precoAnterior' => $row['valorSemDesconto'],
                'precoAtual' => $row['valorComDesconto'],
                'imagem' => $row['imagemProduto'],
            );

            echo '<div class="col-md-3">';
            echo '<div class="card mt-3" >';
            echo '<div class="card-body">';
            echo '<span class="badge badge-danger"><i class="fas fa-fire"></i></span>';
            echo '<img class="card-img-top" src="../images/BD/' . $produto['imagem'] . '" alt="' . $produto['nome'] . '">';
            echo '<h5 class="card-title card-title-hover text-uppercase" data-nome="' . $produto['nome'] . '"><a href="produtos.php?id=' . $produto['id'] . '">' . $produto['nome'] . '</a></h5>';
            echo '<div class="product-bottom-details">';
            echo '<div class="product-price">';
            echo '<small class="text-muted">R$' . $produto['precoAnterior'] . '</small>';
            echo 'R$' . $produto['precoAtual'];
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<h5 class="h5 mt-4 mb-4 text-center">Nenhum produto com essas especificações foi encontrado.</h5>';
    }
}
?>
