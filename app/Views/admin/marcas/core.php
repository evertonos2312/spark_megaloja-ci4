<section class="content-main" style="max-width: 720px">
	<div class="content-header">
		<h2 class="content-title">{title} </h2>
		<div>
			<a href="{app_url}admin/marcas/index" class="btn btn-outline-danger"> &times; Cancelar</a>
		</div>
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

	<div class="card mb-4">
          <div class="card-body">
			<form name="form_core" method="post" action="{app_url}admin/marcas/save/{id}">
				<div class="mb-4">
					<label for="name" class="form-label" >Nome</label>
					<input type="text" placeholder="Digite aqui" name="name" class="form-control" value="{name}" id="name" required>
				</div>
				<div class="mb-4">
					<label for="username" class="form-label" >Meta-Link</label>
					<input type="text" placeholder="Digite aqui" name="meta_link" value="{meta_link}" class="form-control" id="meta_link" required>
				</div>
				<div class="row gx-2">
					  <div class="col-sm-6 mb-3">
					    <label class="form-label">Status</label>
					    <select class="form-select" name="status" required>
							
					    	<option id="ativo" value="1"> Ativo </option>
					    	<option id="inativo" value="0"> Inativo </option>
					    </select>
					  </div>
				<input type="hidden" name="marca_id" value="{id}">
				</div> <!-- row.// -->
				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>
          </div>
    </div> <!-- card end// -->


</section> <!-- content-main end// -->
<script src="{app_url}assets/admin/js/user/user.js?v=1.0" type="text/javascript"></script>

<script>
	if({active} === 1){
		document.getElementById("ativo").setAttribute('selected', true);
	}else if({active} === 0){
		document.getElementById("inativo").setAttribute('selected', true);
	}
	if({is_admin} === 1){
		document.getElementById("adm").setAttribute('selected', true);
	}else if({active} === 0){
		document.getElementById("cliente").setAttribute('selected', true);
	}


</script>