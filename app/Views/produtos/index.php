<div class="promocoes">
    <h2>{titulo}</h2>
    {if $produtos_chunk}
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
    {else}
        <h3 class="subtitulo">Nenhum produto encontrado.</h3>
    {endif}
</div>