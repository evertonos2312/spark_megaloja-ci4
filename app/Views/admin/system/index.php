<section class="content-main">

  <div class="content-header">
    <h2 class="content-title">{title} </h2>
  </div>
  {if ($msg)}
    <div class="alert {if ($msg_type)}{msg_type}{else}alert-danger{endif} alert-dismissible fade show" role="alert">
        <i class="far fa-lightbulb mr-5"></i>
            <span>&nbsp;</span>
            {msg}
        <button type="button" class="{if ($msg_type)}{msg_type}{else}alert-danger{endif} close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    {endif}

<div class="card">
  <div class="card-body">
    <div class="row gx-5">
      <div class="col-lg-9">
        <section class="content-body p-xl-4">
        <form name="form_system" method="post" action="{app_url}admin/system/index/{id}">
            <div class="row border-bottom mb-4 pb-4">
                <div class="row col-md-12">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Razão Social</label>
                        <input class="form-control" type="text" name="razao_social" value="{razao_social}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Nome Fantasia</label>
                        <input class="form-control" type="text" name="nome_fantasia" value="{nome_fantasia}" placeholder="Digite aqui">
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">CNPJ</label>
                        <input class="form-control" type="text" name="cnpj" value="{cnpj}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">Inscrição Estadual</label>
                        <input class="form-control" type="text" name="ie" value="{ie}" placeholder="Digite aqui">
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Telefone Fixo</label>
                        <input class="form-control" type="text" name="telefone_fixo" value="{telefone_fixo}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Celular</label>
                        <input class="form-control" type="text" name="telefone_movel" value="{telefone_movel}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">E-mail</label>
                        <input class="form-control" type="text" name="email" value="{email}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">URL do site</label>
                        <input class="form-control" type="text" name="site_url" value="{site_url}" placeholder="Digite aqui">
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="mb-3 col-md-3">
                        <label class="form-label">CEP</label>
                        <input class="form-control" type="text" name="cep" value="{cep}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Endereço</label>
                        <input class="form-control" type="text" name="endereco" value="{endereco}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label">Cidade</label>
                        <input class="form-control" type="text" name="cidade" value="{cidade}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label">Estado</label>
                        <select class="form-control" name="estado" placeholder="Digite aqui">
                            <option value="{estado}">{estado}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-1">
                        <label class="form-label">Número</label>
                        <input class="form-control" type="text" name="numero" value="{numero}" placeholder="Digite aqui">
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="mb-3 col-md-4">
                        <label class="form-label">Texto</label>
                        <input class="form-control" type="text" name="texto" value="{texto}" placeholder="Digite aqui">
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label">Destaques</label>
                        <input class="form-control" type="text" name="produtos_destaques" value="{produtos_destaques}" placeholder="Digite aqui">
                    </div>
                </div>
            </div>         
            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
          
        </section> <!-- content-body .// -->
      </div> <!-- col.// -->
    </div> <!-- row.// -->

  </div> <!-- card-body .//end -->
</div> <!-- card .//end -->


</section> <!-- content-main end// -->