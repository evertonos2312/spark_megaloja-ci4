<section class="section-intro padding-y-sm">
<div class="container">

<div class="intro-banner-wrap">
	<img src="{app_url}assets/images/banners/1.jpg" class="img-fluid rounded">
</div>

</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
	<div class="container">
		<header class="section-heading">
			<a href="{app_url}produto/index" class="btn btn-outline-primary float-right">Veja mais</a>
			<h3 class="section-title">Em destaque</h3>
		</header><!-- sect-heading -->
		<div class="row">
			{produtos_chunk}
			<div class="col-md-3">
				<div class="card card-product-grid product">
					<a href="" class="img-wrap"> <img src="{app_url}/produto/getFoto/{id}"> </a>
					<figcaption class="info-wrap">
						<a href="{app_url}produto/detalhes/{id}" class="title">{nome_produto}</a>
						
						<div class="rating-wrap">
							<ul class="rating-stars">
								<li style="width:80%" class="stars-active"> 
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
								</li>
								<li>
									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 
								</li>
							</ul>
							<span class="label-rating text-muted"> 34 reviews</span>
						</div>
						<div class="price mt-1">R$ {valor_final}</div>
						<div class="price mt-1">em até 10x de R$ {parcelas}</div>
					</figcaption>
				</div>
			</div>
			{/produtos_chunk}
		</div> <!-- row.// -->

	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->