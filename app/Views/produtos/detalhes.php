<h2>Produto</h2>
<hr>
<div class="produto-unico">
    <div class="header-produto">
        <div class="foto">
            <a href="{app_url}produto/getFoto/{id}" target="_blank"><img class="foto" src="{app_url}produto/getFoto/{id}" alt=""></a>
        </div>
        <div class="dados">
            <p class="titulo">{nome_produto}</p>
            <p class="valor">de: {valor}</p>
            <p>por:</p>
            <p class="valor-final">R$ {valor}</p>
            {if ($isLoggedIn)}
                {if($link_pagamento)}
                    <p><a href="{app_url}produto/comprar/{id}" target="_blank" class="btn bg-blue">COMPRAR</a></p>
                {else}
                    <p style="margin-top: 10px;">Produto Indisponível</p>
                {endif}
            {else}
                <p style="margin-top: 10px;">Logue-se para comprar o produto.<br /><a href="{app_url}login/signin">Clique aqui para Logar-se</a></p>
            {endif}
        </div>
        <div class="clear"></div>
        <hr>
        <div class="descricao">
            <p class="titulo">Descrição do Produto</p>
            <p>{descricao_produto}</p>
        </div>
    </div>
</div>