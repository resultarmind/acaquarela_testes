<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Aquarela Calçados - Sua loja de calçados premium para todas as ocasiões. Encontre tênis, botas, sandálias e muito mais. Compre agora com entrega rápida e gratuita!" />
    <meta name="keywords" content="Aquarela Calçados, calçados premium, tênis, botas, sandálias, sapatos, moda, entrega rápida e gratuita" />
    <meta name="author" content="Aquarela Calçados" />

    <!-- Site Title -->
    <title>Aquarela Calçados - Sua Loja de Calçados</title>

    <link rel="icon" href="https://acaquarela.com.br/images/favico.ico" type="image/x-icon">

    <!-- Site favicon -->

    <!-- Swiper js -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css" type="text/css" />

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/hover.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css">


</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="60">

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom navbar-light sticky-dark" id="navbar-sticky">
        <div class="container">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="https://acaquarela.com.br/">
                <img src="https://acaquarela.com.br/images/logo-dark.png" height="30px" alt="" class="logo-dark" />
                <img src="https://acaquarela.com.br/images/logo-light.png" height="30px" alt="" class="logo-light" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarCollapse">
                <ul class="navbar-nav mx-auto navbar-center" id="mySidenav">
                    <li class="nav-item">
                        <a href="#home" class="nav-link">Início</a>
                    </li>
                    <li class="nav-item">
                        <a href="#produtos" class="nav-link">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#destaques" class="nav-link">Destaques</a>
                    </li>
                    <li class="nav-item">
                        <a href="#info" class="nav-link">Contatos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--
    <script>
        const productsOnSale = [
  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>SANDÁLIA SUPERMAN + BRINDE</h2>",
    price: "<h3>R$ 104,00</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/SUPER%20HOMEM.png",
    url: "https://acaquarela.com.br/pages/produtos_0.php",
  },

  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>SANDÁLIA CAPITÃO AMÉRICA + BRINDE</h2>",
    price: "<h3>R$ 142,72</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/CAPITÃO%20AMÉRICA.png",
    url: "https://acaquarela.com.br/pages/produtos_1.php",
  },

  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>SANDÁLIA SPIDERMAN + BRINDE</h2>",
    price: "<h3>R$ 140,93</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/PROMOÇÃO%20ARANHA.png",
    url: "https://acaquarela.com.br/pages/produtos_2.php",
  },

  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>CHINELO BATMAN + BRINDE</h2>",
    price: "<h3>R$ 138,80</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/BATMAN.png",
    url: "https://acaquarela.com.br/pages/produtos_3.php",
  },

  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>SANDÁLIA BARBIE + BRINDE</h2>",
    price: "<h3>R$ 139,80</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/BARBIE%201.png",
    url: "https://acaquarela.com.br/pages/produtos_4.php",
  },
  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>SANDÁLIA BARBIE + BRINDE</h2>",
    price: "<h3>R$ 142,73</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/BARBIE%202.png",
    url: "https://acaquarela.com.br/pages/produtos_5.php",
  },
  {
    name: "PRODUTO EM OFERTA",
    description: "<h2>SANDÁLIA BABY SHARK + BRINDE</h2>",
    price: "<h3>R$ 142,85</h3>",
    image: "https://acaquarela.com.br/images/Ofertas/BABY%20SHARK.png",
    url: "https://acaquarela.com.br/pages/produtos_6.php",
  },

  // Adicione mais produtos aqui...
];
    </script>

    <script>
        // Função para gerar um número aleatório entre 0 e o comprimento do array de produtos em oferta
function getRandomProductIndex() {
  return Math.floor(Math.random() * productsOnSale.length);
}

// Escolhe um produto aleatório
const randomProductIndex = getRandomProductIndex();
const randomProduct = productsOnSale[randomProductIndex];


    </script>

    <script>
  // Abre o modal do SweetAlert com as informações do produto aleatório
  Swal.fire({
    title: randomProduct.name,
    html: `
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="position-relative">
                            <img class="img-off" src="${randomProduct.image}" alt="${randomProduct.name}" style="max-width: 100%;">
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12">
            <p>${randomProduct.description}</p>
            <h5>Preço: ${randomProduct.price}</h5>
        </div>
    </div>
</div>

    `,
    showCancelButton: true,
    showConfirmButton: false,
    cancelButtonText: "COMPRAR AGORA",
    showCloseButton: true, // Adiciona um botão 'X' para fechar o modal
  });

// Adicione um evento de clique ao botão "Comprar Agora"
const comprarAgoraButton = document.querySelector(".swal2-cancel");
comprarAgoraButton.addEventListener("click", () => {
    // Obtém a URL correspondente ao produto aleatório
    const productUrl = randomProduct.url;

    // Redireciona para a página de compra
    window.location.href = productUrl;
});
    </script>




    <!-- home-agency start -->
    <section class="hero-1" id="home">
        <div class="bg-overlay-img"></div>
        <div class="container">
            <div class="row align-items-center hero-content">
            <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center">
    <img src="../images/Logotipo.png" alt="" class="img-ini">
    <h1 class="hero-title fw-bold-new mb-4 pb-3 d-none d-lg-block">AQUARELA CALÇADOS</h1>
</div>


                <div class="col-lg-6 text-center text-lg-end">
                    <img src="images/heros/hero-1-img.png" alt="" class="img-fluid" />
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="hero-bottom-shape">
                        <img src="images/heros/hero-1-bottom-shape.png" alt="" class="w-100" />
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="down-arrow-btn">
                        <a href="#produtos" class="down-arrow"><i class="mdi mdi-arrow-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- home-agency end -->

<div class="container">
    <div class="slider">
<div class="slide-track">
<div class="slide">
<img src="images/marcas/fila.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/PICADILLY.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/Raffarilo.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/via marte.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/Grendene.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/fila.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/PICADILLY.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/Raffarilo.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/via marte.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/Grendene.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/fila.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/PICADILLY.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/Raffarilo.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/via marte.png" height="100" width="250" alt="" />
</div>
<div class="slide">
<img src="images/marcas/Grendene.png" height="100" width="250" alt="" />
</div>

</div>
</div>
</div>

    <!-- App Screens start -->
    <section class="section overflow-hidden" id="produtos">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6 text-center">
                    <h6 class="subtitle">o melhor da <span class="fw-bold-new">Aquarela calçados</span></h6>
<div class="row justify-content-center black-col-2">
        <div class="col-md-12 text-center">
        <a href="pages/todos_produtos.php" class="custom-btn btn-11">
  Clique para ver
  <div class="dot"></div>
</a>
        </div>
                   <!-- <h2 class="title">TODOS OS PRODUTOS</h2> -->
                    <p class="text-muted mb-0 mt-3">CLIQUE EM UM DOS PRODUTOS E ADQUIRA AGORA.</p>
                </div>
</div>
</div>
            <div class="container">
            <div class="row">

            <div class="screen-slider overflow-hidden">
                        <div class="swiper-wrapper">

            <?php
include_once 'config/conection.php';

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta para buscar os produtos recomendados
$sql = "SELECT id, titulo, valorSemDesconto, valorComDesconto, imagemProduto FROM produtos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nomeProduto = $row['titulo'];
        $linkProduto = 'pages/produtos.php?id=';
        $precoAnterior = $row['valorSemDesconto'];
        $precoAtual = $row['valorComDesconto'];
        $imagem = $row['imagemProduto'];

        // Agora, substitua os valores dinâmicos no código HTML
        echo '<div class="swiper-slide">';
        echo '<div class="col-md-12">';
        echo '<div class="product-card">';
        echo '<div class="badge"><i class="fa-solid fa-fire"></i></div>';
        echo '<div class="product-tumb">';
        echo '<img src="images/BD/' . htmlspecialchars($row["imagemProduto"]) . '" alt="' . $nomeProduto . '">';
        echo '</div>';
        echo '<div class="product-details">';
        echo '<h4><a href="' . $linkProduto . '' . $id . '">' . $nomeProduto . '</a></h4>';
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

       
    </div>
    </div>
    </section>
    <!-- App Screens end -->



    <section class="section-sm bg-light recommended" id="destaques">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6 text-center">
                <h2 class="title">Produtos recomendados para você</h2>
                <h6 class="subtitle">Descubra nossos produtos cuidadosamente selecionados, <span class="fw-bold-new">perfeitos para você.</span></h6>
            </div>
        </div>

        <div class="container">
            <div class="row">

            <div class="screen-slider overflow-hidden">
                        <div class="swiper-wrapper">

            <?php
include_once 'config/conection.php';

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
        echo '<img src="images/BD/' . htmlspecialchars($row["imagem"]) . '" alt="' . $nomeProduto . '">';
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

   <!-- contact start -->
   <section class="section bg-clean" id="info">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-8 col-lg-6 text-center">
                    <h6 class="subtitle">Fale <span class="fw-bold-new">Conosco</span></h6>
                    <h2 class="title">Dúvidas e Sugestões</h2>
                    <p class="text-muted">Entre em contato conosco preenchendo o formulário abaixo</p>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="contact-icon bg-soft-primary text-primary">
                                    <i class="mdi mdi-email"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0 fs-18">Email</h5>
                            </div>
                        </div>
                        <p class="mb-1"><i class="mdi mdi-arrow-right-thin text-muted me-1"></i><a href="mailto:contato@acaquarela.com.br" class="text-secondary">contato@acaquarela.com.br</a></p>
                    </div>
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="contact-icon bg-soft-primary text-primary">
                                    <i class="mdi mdi-phone"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0 fs-18">Telefone/Whatsapp</h5>
                            </div>
                        </div>
                        <p class="mb-1"><i class="mdi mdi-arrow-right-thin text-muted me-1"></i><a href="tel:+5533998122152" class="text-secondary">(33) 99812-2152</a></p>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="contact-icon bg-soft-primary text-primary">
                                    <i class="mdi mdi-google-maps"></i>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0 fs-18">Endereço</h5>
                            </div>
                        </div>
                        <h5 class="fs-16 mb-2 text-secondary"><i class="mdi mdi-arrow-right-thin text-muted me-1"></i> Loja 1 Sobrália</h5>
                        <p class="text-muted lh-base">Av. JK, 13 - Sobrália, MG, 35145-000</p>
                        <h5 class="fs-16 mb-2 text-secondary"><i class="mdi mdi-arrow-right-thin text-muted me-1"></i> Loja 2 Eng. Caldas</h5>
                        <p class="text-muted lh-base mb-0">Av. Padre João Pina do Amaral, 67 b - Eng. Caldas, MG, 35130-000</p>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <div class="card contact-form rounded-lg mt-4 mt-lg-0">
                        <div class="card-body p-5">
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="formFirstName" class="form-label">Nome</label>
                                            <input type="text" class="form-control" id="formFirstName" placeholder="Digite seu nome..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formEmail" class="form-label">Endereço de Email</label>
                                            <input type="email" class="form-control" id="formEmail" placeholder="Seu email de contato..." required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="formPhone" class="form-label">Telefone</label>
                                            <input type="text" class="form-control" id="formPhone" placeholder="Seu telefone de contato..." required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="formSubject" class="form-label">Assunto</label>
                                            <input type="text" class="form-control" id="formSubject" placeholder="Escreva um assunto..." required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="formMessages" class="form-label">Mensagem</label>
                                            <textarea class="form-control" id="formMessages" rows="4" placeholder="Escreva sua mensagem..." required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gradient-danger">Enviar mensagem <i class="mdi mdi-send ms-1"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const form = document.querySelector('form');

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            // Obtém os valores dos campos do formulário.
            const name = document.querySelector('#formFirstName').value;
            const subject = document.querySelector('#formSubject').value;
            const message = document.querySelector('#formMessages').value;

            // Cria uma string com os valores dos campos do formulário.
            const whatsappMessage = `Olá meu nome é: ${name}.\nGostaria de falar sobre o Assunto: ${subject}.\nMensagem:\n${message}`;


            // Gere o link do WhatsApp
            const whatsappLink = `https://api.whatsapp.com/send?phone=+5533998122152&text=${encodeURIComponent(whatsappMessage)}`;

            // Redirecione o usuário para o WhatsApp
            window.location.href = whatsappLink;
        });
    </script>
    <!-- contact end -->


    <section class="section-sm bg-light" id="infor">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
                <h2 class="title">Aquarela Calçados</h2>
                <h6 class="subtitle">Explore todas as nossas <span class="fw-bold-new">vantagens</span></h6>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-4 text-center pt-5">
                <i class="fa-brands fa-pix icon-edit"></i>
                <h2 class="title-mod">PAGUE COM PIX</h2>
                <h6 class="subtitle-mod">Pagamentos via PIX</h6>
            </div>

            <div class="col-12 col-sm-6 col-md-4 text-center pt-5">
                <i class="fa-brands fa-whatsapp icon-edit"></i>
                <h2 class="title-mod">COMPRE PELO WHATSAPP</h2>
                <h6 class="subtitle-mod">Da sua loja favorita, diretamente para a sua casa</h6>
            </div>

            <div class="col-12 col-sm-6 col-md-4 text-center pt-5">
                <i class="fa-solid fa-rotate-left icon-edit"></i>
                <h2 class="title-mod">DEVOLUÇÃO GRATUITA</h2>
                <h6 class="subtitle-mod">Até 30 dias para devolver</h6>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 text-center pt-5">
                <h6 class="subtitle-mod">Calçados femininos, masculinos e infantis - Aquarela Calçados tem tudo!</h6>
            </div>
        </div>
    </div>
</section>



<section class="section-sm bg-white faq" id="infor">

<div class="container-fluid">
<div class="row justify-content-center black-col">
        <div class="col-md-12 col-lg-6 text-center">
            <h2 class="title-new"> <i class="fa-solid fa-shield-halved"></i> Compre com segurança, compre na Aquarela Calçados.</h2>
                </div>
    </div>
    </div>
</section>


    <?php include_once 'config/footer.php'?>

    <!-- Back to top -->
    <a href="#" onclick="topFunction()" class="back-to-top-btn btn btn-gradient-primary" id="back-to-top"><i class="mdi mdi-chevron-up"></i></a>
    </div>
    </div>



    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=553388791961" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float">
        </i>
    </a>

    <!-- javascript -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- counter -->
    <script src="js/counter.init.js"></script>
    <!-- swiper -->
    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/swiper.js"></script>
    <script src="js/app.js"></script>
</body>

</html>