<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

?>

<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href="index.php"><span>[</span>Resultar Mind<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navegação</label>
      <div class="br-sideleft-menu">
        <a href="index.php" class="br-menu-link active">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Início</span>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Slides</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="add_slide.php" class="nav-link">Adicionar</a></li>
          <li class="nav-item"><a href="view_slide.php" class="nav-link">Visualizar / Editar</a></li>
        </ul>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Produtos</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="add_prod.php" class="nav-link">Adicionar</a></li>
          <li class="nav-item"><a href="view_produto.php" class="nav-link">Visualizar / Editar</a></li>
        </ul>

        <a href="#" class="br-menu-link">
          <div class="br-menu-item">
            <i class="menu-item-icon ion-ios-redo-outline tx-24"></i>
            <span class="menu-item-label">Prod. Recomendados</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
          <li class="nav-item"><a href="add_rc.php" class="nav-link">Adicionar</a></li>
          <li class="nav-item"><a href="view_produto_rc.php" class="nav-link">Visualizar / Editar</a></li>
        </ul>

      </div><!-- br-sideleft-menu -->




      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">


        </div><!-- input-group -->
      </div><!-- br-header-left -->
      <div class="br-header-right">

      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
