<div class="banner_promocao">
    <a href="javascript:void(0)"><img src="{app_url}banner/getFoto/home"></a>
</div>
<div class="ofertas">
    <h2>::Ofertas em Destaque</h2>
    <div class="grid-ofertas">
        {produtos_chunk}
            <div class="linha_produtos">
                <div class="produto">
                    <div class="imagem"><a href="{app_url}produto/mostraProduto/{id}"><img class="foto" src="{app_url}/produto/getFoto/{id}" alt=""></a></div>
                    <div class="titulo">{nome_produto}</div>
                    <div class="preco-menor">R$ {valor}</div>
                    <div class="preco-maior">R$ {valor_final}</div>
                    <div class="parcelamento">em até 10x de R$ {parcelas}</div>
                </div>
            </div>
        {/produtos_chunk}
    </div>
</div>