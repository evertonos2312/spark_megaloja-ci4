<h2>Produto</h2>
<hr>
<div class="produto-unico">
    <div class="header-produto">
        <div class="foto">
            <a href="<?php echo base_url('produto/getFoto/' . $produto['id']) ?>" target="_blank"><img class="foto" src="<?php echo base_url('produto/getFoto/' . $produto['id']) ?>" alt=""></a>
        </div>
        <div class="dados">
            <p class="titulo"><?php echo $produto['nome_produto'] ?></p>
            <p class="valor">de: <?php echo $produto['valor'] ?></p>
            <p>por:</p>
            <p class="valor-final">R$ <?php echo formata_valor($produto['valor']) ?></p>
            <?php if (isset(session()->isLoggedIn)) : ?>
                <?php if (!empty($produto['link_pagamento'])) : ?>
                    <p><a href="<?php echo base_url('produto/comprar/' . $produto['id']) ?>" target="_blank" class="btn bg-blue">COMPRAR</a></p>
                <?php else : ?>
                    <p style="margin-top: 10px;">Produto Indisponível</p>
                <?php endif; ?>
            <?php else : ?>
                <p style="margin-top: 10px;">Logue-se para comprar o produto.<br /><a href="<?php echo base_url('login/signin') ?>">Clique aqui para Logar-se</a></p>
            <?php endif; ?>
        </div>
        <div class="clear"></div>
        <hr>
        <div class="descricao">
            <p class="titulo">Descrição do Produto</p>
            <p><?php echo nl2br($produto['descricao_produto']) ?></p>
        </div>
    </div>
</div>