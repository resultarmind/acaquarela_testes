<?php
include_once '../config/conection.php';

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Construa sua consulta com base nos filtros selecionados (marca, categoria e ordenação) e exiba os produtos.
// Você precisará adicionar a lógica para aplicar os filtros selecionados à sua consulta SQL.

// Filtragem por marca
$marcasSelecionadas = isset($_GET['marcas']) ? $_GET['marcas'] : array();
$marcaFiltro = "";
if (!empty($marcasSelecionadas)) {
    $marcaFiltro = "AND marca IN ('" . implode("','", $marcasSelecionadas) . "')";
}

// Filtragem por categoria
$categoriasSelecionadas = isset($_GET['categorias']) ? $_GET['categorias'] : array();
$categoriaFiltro = "";
if (!empty($categoriasSelecionadas)) {
    $categoriaFiltro = "AND categoria IN ('" . implode("','", $categoriasSelecionadas) . "')";
}

// Adicione a ordenação com base na opção selecionada
$ordenacao = isset($_GET['ordenacao']) ? $_GET['ordenacao'] : 'relevance';

// Construa a consulta SQL
$sql = "SELECT id, titulo, desconto, valorSemDesconto, valorComDesconto, imagemProduto, status FROM produtos WHERE 1 $marcaFiltro $categoriaFiltro";

// Adicione a lógica de ordenação à sua consulta SQL
if ($ordenacao === 'price-low-high') {
    $sql .= " ORDER BY valorComDesconto ASC";
} elseif ($ordenacao === 'price-high-low') {
    $sql .= " ORDER BY valorComDesconto DESC";
} elseif ($ordenacao === 'newest') {
    $sql .= " ORDER BY id DESC";
}

// Execute a consulta
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $product = array(
            'id' => $row['id'],
            'nome' => $row['titulo'],
            'desconto' => $row['desconto'],
            'precoAnterior' => $row['valorSemDesconto'],
            'precoAtual' => $row['valorComDesconto'],
            'imagem' => $row['imagemProduto'],
            'status' => $row['status'],  // Adicione o campo 'status' à resposta JSON
        );

        $products[] = $product;
    }
}

// Retorna os resultados em formato JSON
echo json_encode($products);

// Não feche a conexão aqui
?>
