<?php echo $this->extend('_common/layout') ?>
<?php echo $this->section('conteudo') ?>
<div class="banner_promocao">
    <a href="<?php echo $banners[1]['link'] ?>"><img src="<?php echo base_url('banner/getFoto/home') ?>"></a>
</div>
<div class="ofertas">
    <h2>::Ofertas em Destaque</h2>
    <?php $item = 0; ?>
    <?php foreach ($produtos_chunk as $produto) : ?>
        <div class="linha_produtos">
            <?php if (isset($produto[$item])) : ?>
                <?php
                $valorProduto = $produto[$item]['valor'];
                $desconto = $produto[$item]['desconto'];
                $valorFinal = $valorProduto - ($valorProduto * $desconto / 100);
                $parcelas = $valorProduto / 10;
                ?>
                <div class="produto">
                    <div class="imagem"><a href="<?php echo base_url('produto/mostraProduto/' . $produto[$item]['id']) ?>"><img class="foto" src="<?php echo base_url('produto/getFoto/' . $produto[$item]['id']) ?>" alt=""></a></div>
                    <div class="titulo"><?php echo $produto[$item]['nome_produto'] ?></div>
                    <div class="preco-menor">R$ <del> <?php echo formata_valor($valorProduto) ?></del></div>
                    <div class="preco-maior">R$ <?php echo formata_valor($valorFinal) ?></div>
                    <div class="parcelamento">em até 10x de R$ <?php echo formata_valor($parcelas) ?></div>
                </div>
            <?php endif; ?>
            <?php $item++; ?>
            <?php if (isset($produto[$item])) : ?>
                <?php
                $valorProduto = $produto[$item]['valor'];
                $desconto = $produto[$item]['desconto'];
                $valorFinal = $valorProduto - ($valorProduto * $desconto / 100);
                $parcelas = $valorProduto / 10;
                ?>
                <div class="produto">
                    <div class="imagem"><a href="<?php echo base_url('produto/mostraProduto/' . $produto[$item]['id']) ?>"><img class="foto" src="<?php echo base_url('produto/getFoto/' . $produto[$item]['id']) ?>" alt=""></a></div>
                    <div class="titulo"><?php echo $produto[$item]['nome_produto'] ?></div>
                    <div class="preco-menor">R$ <del> <?php echo formata_valor($valorProduto) ?></del></div>
                    <div class="preco-maior">R$ <?php echo formata_valor($valorFinal) ?></div>
                    <div class="parcelamento">em até 10x de R$ <?php echo formata_valor($parcelas) ?></div>
                </div>
            <?php endif; ?>
            <?php $item++; ?>
            <?php if (isset($produto[$item])) : ?>
                <?php
                $valorProduto = $produto[$item]['valor'];
                $desconto = $produto[$item]['desconto'];
                $valorFinal = $valorProduto - ($valorProduto * $desconto / 100);
                $parcelas = $valorProduto / 10;

                ?>
                <div class="produto">
                    <div class="imagem"><a href="<?php echo base_url('produto/mostraProduto/' . $produto[$item]['id']) ?>"><img class="foto" src="<?php echo base_url('produto/getFoto/' . $produto[$item]['id']) ?>" alt=""></a></div>
                    <div class="titulo"><?php echo $produto[$item]['nome_produto'] ?></div>
                    <div class="preco-menor">R$ <del> <?php echo formata_valor($valorProduto) ?></del></div>
                    <div class="preco-maior">R$ <?php echo formata_valor($valorFinal) ?></div>
                    <div class="parcelamento">em até 10x de R$ <?php echo formata_valor($parcelas) ?></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
        if ($item === 2) {
            $item = 0;
        }
        ?>
    <?php endforeach; ?>
</div>
<?php echo $this->endSection('conteudo')?>