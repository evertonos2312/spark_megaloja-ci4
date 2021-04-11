<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
<div class="container">
	<h2 class="title-page">{titulo}</h2>
	<nav>
	<ol class="breadcrumb text-white">
	    <li class="breadcrumb-item"><a href="{app_url}">Início</a></li>
	    <li class="breadcrumb-item"><a href="{app_url}produto/porCategoria/{id_categoria}">{descricao_categoria}</a></li>
	</ol>  
	</nav>
</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">
    {if $produtos_chunk}
    <div class="row">
        <aside class="col-md-3">
            <div class="card">
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">Pesquisar</h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="collapse_1">
                        <div class="card-body">
                            <form class="pb-3">
                                <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                </div>
                                </div>
                            </form>
                        </div> <!-- card-body.// -->
                    </div>
                </article> <!-- filter-group  .// -->
                <article class="filter-group">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                            <i class="icon-control fa fa-chevron-down"></i>
                            <h6 class="title">Marcas </h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="collapse_2" style="">
                        <div class="card-body">
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Exemplo Marca 1 
                                <b class="badge badge-pill badge-light float-right">120</b>  </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Exemplo Marca 2
                                <b class="badge badge-pill badge-light float-right">15</b>  </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Exemplo Marca 3
                                <b class="badge badge-pill badge-light float-right">35</b> </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" checked="" class="custom-control-input">
                            <div class="custom-control-label">Exemplo Marca 4
                                <b class="badge badge-pill badge-light float-right">89</b> </div>
                            </label>
                            <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input">
                            <div class="custom-control-label">Exemplo Marca 5
                                <b class="badge badge-pill badge-light float-right">30</b>  </div>
                            </label>
                </div> <!-- card-body.// -->
                    </div>
                </article> <!-- filter-group .// -->
            </div> <!-- card.// -->

        </aside> <!-- col.// -->
        <main class="col-md-9">
            <header class="border-bottom mb-4 pb-3">
                    <div class="form-inline">
                        <span class="mr-md-auto">32 produtos encontrados </span>
                        <select class="mr-2 form-control">
                            <option>Mais novos</option>
                            <option>Populares</option>
                            <option>Mais baratos</option>
                        </select>
                        <div class="btn-group">
                            <a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="Lista"> 
                                <i class="fa fa-bars"></i></a>
                            <a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grade"> 
                                <i class="fa fa-th"></i></a>
                        </div>
                    </div>
            </header><!-- sect-heading -->
            <div class="row">
            {produtos_chunk}
            <div class="col-md-4 product">
                <figure class="card card-product-grid">
                    <div class="img-wrap"> 
                        <span class="badge badge-danger"> NEW </span>
                        <img src="{app_url}/produto/getFoto/{id}">
                        <a class="btn-overlay" href=""><i class="fa fa-search-plus"></i> Detalhes</a>
                    </div> <!-- img-wrap.// -->
                    <figcaption class="info-wrap">
                        <div class="fix-height">
                            <a href="{app_url}produto/detalhes/{id}" class="title">{nome_produto}</a>
                            <div class="price-wrap mt-2">
                                <del class="price-old">$1980</del>
                                <span class="price">{valor}</span></br>
                                <span>em até 10x de R$ {parcelas}</span>
                            </div> <!-- price-wrap.// -->
                        </div>
                        <a href="" class="btn btn-block btn-primary">Adicionar ao Carrinho </a>
                    </figcaption>
                </figure>
            </div> <!-- col.// -->
            {/produtos_chunk}
            </div>
            <nav class="mt-4" aria-label="Page navigation sample">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Próxima</a></li>
            </ul>
            </nav>
        </main> <!-- col.// -->
    </div>
    {else}
        <h3 class="notfound">Nenhum produto encontrado</h3>
    {endif}
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
