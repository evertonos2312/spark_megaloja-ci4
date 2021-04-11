<section class="section-pagetop bg">
    <div class="container">
        <h2 class="title-page">Detalhes {nome_produto}</h2>
        <nav>
        <ol class="breadcrumb text-white">
            <li class="breadcrumb-item"><a href="{app_url}">Início</a></li>
            <li class="breadcrumb-item"><a href="{app_url}produto/porCategoria/{id_categoria}">{descricao_categoria}</a></li>
        </ol>  
        </nav>
    </div> <!-- container //  -->
</section>
<section class="section-content padding-y bg">
    <div class="container">
        <div class="card">
            <div class="row no-gutters">
                <aside class="col-md-6">
        <article class="gallery-wrap"> 
            <div class="img-big-wrap">
            <a href="#"><img src="{app_url}produto/getFoto/{id}"></a>
            </div> <!-- img-big-wrap.// -->
            <div class="thumbs-wrap">
            <a href="#" class="item-thumb"> <img src="{app_url}assets/images/items/12-1.jpg"></a>
            <a href="#" class="item-thumb"> <img src="{app_url}assets/images/items/12-2.jpg"></a>
            <a href="#" class="item-thumb"> <img src="{app_url}assets/images/items/12.jpg"></a>
            <a href="#" class="item-thumb"> <img src="{app_url}assets/images/items/4.jpg"></a>
            </div> <!-- thumbs-wrap.// -->
        </article> <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-md-6 border-left">
        <article class="content-body">

        <h2 class="title">{nome_produto}</h2>

        <div class="rating-wrap my-3">
            <ul class="rating-stars">
                <li style="width:80%" class="stars-active">
                    <img src="{app_url}assets/images/icons/stars-active.svg" alt="">
                </li>
                <li>
                    <img src="{app_url}assets/images/icons/starts-disable.svg" alt="">
                </li>
            </ul>
            <small class="label-rating text-muted">132 reviews</small>
            <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
        </div> <!-- rating-wrap.// -->

        <div class="mb-3"> 
            <var class="price h4">R${valor}</var> 
        </div> 

        <p>{descricao_produto}</p>

        <dl class="row">
        <dt class="col-sm-3">Model#</dt>
        <dd class="col-sm-9">Odsy-1000</dd>

        <dt class="col-sm-3">Color</dt>
        <dd class="col-sm-9">Brown</dd>

        <dt class="col-sm-3">Delivery</dt>
        <dd class="col-sm-9">Russia, USA, and Europe </dd>
        </dl>

        <hr>
            <div class="row">
                <div class="form-group col-md flex-grow-0">
                    <label>Quantity</label>
                    <div class="input-group mb-3 input-spinner">
                    <div class="input-group-prepend">
                        <button class="btn btn-light" type="button" id="button-plus"> + </button>
                    </div>
                    <input type="text" class="form-control" value="1">
                    <div class="input-group-append">
                        <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
                    </div>
                    </div>
                </div> <!-- col.// -->
            </div> <!-- row.// -->
            {if($link_pagamento)}
            <a href="#" class="btn  btn-primary"> Comprar </a>
            <a href="#" class="btn  btn-outline-primary"> <span class="text">Adicionar ao Carrinho</span> <i class="fas fa-shopping-cart"></i>  </a>
            {else}
            <p>Produto Indisponível</p>
            {endif}
        </article> <!-- product-info-aside .// -->
                </main> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->
        <!-- ============================ COMPONENT 1 END .// ================================= -->
    </div> <!-- container .//  -->
</section>