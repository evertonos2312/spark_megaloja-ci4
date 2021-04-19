<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>{main_title} | {title}</title>

<link href="{app_url}assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{app_url}assets/js/jquery-2.0.0.min.js" type="text/javascript"></script>

<!-- Bootstrap4 files-->
<script src="{app_url}assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<link href="{app_url}assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>

<!-- Font awesome 5 -->
<link href="{app_url}assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

<!-- custom style -->
<link href="{app_url}assets/css/ui.css" rel="stylesheet" type="text/css"/>
<link href="{app_url}assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="{app_url}assets/css/responsive.css" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<!-- custom javascript -->
<script src="{app_url}assets/js/script.js" type="text/javascript"></script>

<script type="text/javascript">
/// some script

// jquery ready start
$(document).ready(function() {
	// jQuery code

}); 
// jquery end
</script>

</head>
<body>


<header class="section-header">


<section class="header-main border-bottom">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-6">
		<a href="http://bootstrap-ecommerce.com" class="brand-wrap">
			<img class="logo" src="{app_url}assets/images/logo.png">
		</a> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-12 col-sm-12">
		<form action="#" class="search">
			<div class="input-group w-100">
			    <input type="text" class="form-control" placeholder="Buscar">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i> Buscar
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
	</div> <!-- col.// -->
	<div class="col-lg-4 col-sm-6 col-12">
		<div class="widgets-wrap float-lg-right">
			<div class="widget-header  mr-3">
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></a>
				<span class="badge badge-pill badge-danger notify">0</span>
			</div>
			<div class="widget-header icontext">
				<a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
				<div class="text">
                    {if $isAdmin}
					<span class="text-muted">Bem-vindo {isAdmin.nome}</span>
                    {else}
					<div> 
						<a href="{app_url}login">Entrar</a> |  
						<a href="{app_url}cadastro"> Cadastrar</a>
					</div>
                    {endif}
				</div>
			</div>
		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->


<nav class="navbar navbar-main navbar-expand-lg navbar-light border-bottom">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main_nav">
      <ul class="navbar-nav">
      	<li class="nav-item dropdown">
          <a class="nav-link pl-0" data-toggle="dropdown" href="#"><strong> <i class="fa fa-bars"></i> &nbsp  Todas Categorias</strong></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Exemplo 1</a>
            <a class="dropdown-item" href="#">Exemplo 2</a>
            <div class="dropdown-divider"></div>
            {categorias}
            <a class="dropdown-item" href="{app_url}produto/porCategoria/{id_categoria}">{descricao}</a>
            {/categorias}
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{app_url}produto/getPromocao">Promoções</a>
        </li>
      </ul>
    </div> <!-- collapse .// -->
  </div> <!-- container .// -->
</nav>

</header> <!-- section-header.// -->
