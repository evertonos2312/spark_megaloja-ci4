<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Mega Loja-Virtual</title>
    <link rel="stylesheet" type="text/css" href="{app_url}assets/css/estilos.css">

</head>

<body>
    {pagina}
    {id_categoria}
    <div class="container">
        <div class="header">
            <div class="container-header">
                <div class="logotipo">
                    <a href="{app_url}"><img src="{app_url}assets/imagens/logo.png"></a>
                </div>
                <div class="banner">
                    <a href="javascript:void()"><img src="{app_url}banner/getFoto/topo"></a>
                </div>
            </div>
            <div class="menu">
                <div class="menu-esquerdo">
                    <nav>
                        <ul>
                            <li> <a href="{app_url}">Home</a></li>
                            <li> <a href="{app_url}/promocao">Promoções</a></li>
                            <li> <a href="{app_url}/produto">Produtos</a></li>
                            {if !$isLoggedIn}
                                <li> <a href="{app_url}/cadastro">Cadastra-se</a></li>
                            {endif}
                            <li><a href="{app_url}/contato">Contato</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="menu-direito">
                    <nav>
                        <ul>
                            {if $isLoggedIn}
                                <li class="boas-vindas">Bem-vindo {isLoggedIn.nome}</li>
                                <li> <a href="{app_url}login/signout">Sair</a></li>
                            {else}
                                <li> <a href="{app_url}login">Logar</a></li>
                            {endif}
                        </ul>
                    </nav>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="coluna_esquerda">
            <div class="categorias">
                <h2>:: Categorias</h2>
                <ul>
                    {categorias}
                        <li><a href="{app_url}produto/porCategoria/{id}">:: {descricao}</a></li>
                    {/categorias}
                </ul>
            </div>
            <div class="social">
                <h2>:: Social</h2>
                <div class="icones_linha1">
                    <div class="facebook">
                        <a href="https://www.facebook.com" target="_blank"><img src="{app_url}assets/imagens/facebook.png"></a>

                    </div>
                    <div class="yt">
                        <a href="http://www.youtube.com" target="_blank"><img src="{app_url}assets/imagens/youtube.png"></a>
                    </div>
                </div>
                <div class="icones_linha2">
                    <div class="twitter">
                        <a href="http://www.twitter.com" target="_blank"><img src="{app_url}assets/imagens/twitter.png"></a>
                    </div>
                    <div class="instagram">
                        <a href="http://www.instagram.com" target="_blank"><img src="{app_url}assets/imagens/instagram.jpg"></a>
                    </div>
                </div>
            </div>
        </div>

        <section class="conteudo"> 
