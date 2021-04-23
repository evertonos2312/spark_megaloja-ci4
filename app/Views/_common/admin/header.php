<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{main_title} | {title}</title>

  <link href="{app_url}assets/admin/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link href="{app_url}assets/admin/css/bootstrap.css?v=1.1" rel="stylesheet" type="text/css"/>


  <!-- custom style -->
  <link href="{app_url}assets/css/sweetalert2.min.css?v=1.1" rel="stylesheet" type="text/css">
  <link href="{app_url}assets/admin/css/style.css?v=1.1" rel="stylesheet" type="text/css"/>
  <link href="{app_url}assets/admin/css/ui.css?v=1.1" rel="stylesheet" type="text/css"/>
  <link href="{app_url}assets/admin/css/responsive.css?v=1.1" rel="stylesheet" />

  <!-- iconfont -->
  <link rel="stylesheet" href="{app_url}assets/admin/fonts/material-icon/css/round.css"/>
  <!-- Font awesome 5 -->
<link href="{app_url}assets/admin/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">


</head>
{if($isAdmin)}
<body>

<b class="screen-overlay"></b>

<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top">
    <a href="page-index-1.html" class="brand-wrap">
        <img src="{app_url}assets/admin/images/logo2.png" style="height:86px;width:86px;"  class="logo" alt="PHP Store">
    </a>
    <div>
        <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
    </div>
    </div> <!-- aside-top.// -->

    <nav>
    <ul class="menu-aside">
        <li class="menu-item active"> 
        <a class="menu-link" href="{app_url}admin/home/index"> <i class="icon material-icons md-home"></i> 
            <span class="text">Dashboard</span> 
        </a> 
        </li>
        <li class="menu-item has-submenu"> 
        <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>  
            <span class="text">Produtos</span> 
        </a> 
        <div class="submenu">
            <a href="page-products-table.html">Lista de Produtos</a>
            <a href="{app_url}admin/categorias/index">Categorias</a>
             <a href="{app_url}admin/marcas/index"><i class="fas fa-layer-group"></i> Marcas</a>
        </div>
        </li>
        <li class="menu-item has-submenu"> 
        <a class="menu-link" href="page-orders-1.html"> <i class="icon material-icons md-shopping_cart"></i> 
            <span class="text">Pedidos</span> 
        </a>
        <div class="submenu">
            <a href="page-orders-1.html">Lista 1</a>
            <a href="page-orders-2.html">Lista 2</a>
            <a href="page-orders-detail.html">Detalhes</a>
        </div> 
        </li>

        <li class="menu-item"> 
        <a class="menu-link" href="{app_url}admin/usuarios/index"> <i class="icon material-icons md-people"></i> 
            <span class="text">Usuários</span> 
        </a> 
        </li>
    </ul>
    <hr>
    <ul class="menu-aside">
        <li class="menu-item has-submenu"> 
        <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i> 
            <span class="text">Configurações</span> 
        </a>
        <div class="submenu">
            <a href="{app_url}admin/system/index">Sistema</a>
        </div>
        </li>
    </ul>
    <br>
    <br>
    </nav>
</aside>

<main class="main-wrap">
	<header class="main-header navbar">
        <div class="col-search">
            <form class="searchform">
                <div class="input-group">
                    <input list="search_terms" type="text" class="form-control" placeholder="Buscar">
                    <button class="btn btn-light bg" type="button"> <i class="material-icons md-search"></i> </button>
                </div>
            </form>
        </div>
        <div class="col-nav">
            <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i class="md-28 material-icons md-menu"></i> </button>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-icon" style="margin-right:10px;" href="#"> <i class="material-icons md-notifications_active"></i> </a>
                </li>
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#"> <i class="fas fa-user"></i></a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Meu perfil</a>
                        <a class="dropdown-item" href="#">Configurações</a>
                        <a class="dropdown-item text-danger" href="{app_url}admin/login/logout">Sair</a>
                    </div>
                </li>
            </ul> 
        </div>
    </header>
    {endif}