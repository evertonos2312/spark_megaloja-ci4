<section class="content-main" style="max-width: 720px">
	<div class="content-header">
		<h2 class="content-title">{title} </h2>
		<div>
			<a href="{app_url}admin/usuarios/index" class="btn btn-outline-danger"> &times; Cancelar</a>
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
			<form name="form_core" method="post" action="{app_url}admin/usuarios/save/{id}">
				<div class="mb-4">
					<label for="name" class="form-label" >Nome</label>
					<input type="text" placeholder="Digite aqui" name="name" class="form-control" value="{name}" id="name" required>
				</div>
				<div class="mb-4">
					<label for="username" class="form-label" >Usuário</label>
					<input type="text" placeholder="Digite aqui" name="username" value="{username}" class="form-control" id="username" required>
				</div>
				<div class="mb-4">
					<label for="email" class="form-label" >E-mail</label>
					<input type="email" placeholder="Digite aqui" name="email" value="{email}" class="form-control" id="email" required>
				</div>
				{if ($senha === 'sim')}
				<div class="mb-4">
					<label for="password" class="form-label" >Senha</label>
					<input type="password" placeholder="Digite aqui" required value="{password}" name="password" class="form-control" id="password">
					<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>

				<div class="mb-4" id="div-pass">
					<label for="password" class="form-label" >Confirmar Senha</label>
					<input type="password" placeholder="Digite aqui" value="" required class="form-control" name="confirm_password" id="confirm_password">
					<span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					
				</div>
				{endif}
				<div class="row gx-2">
					<div class="col-sm-6 mb-3">
					    <label class="form-label">Tipo de Usuário</label>
					    <select class="form-select" name="is_admin" required>
					    	<option id="adm" value="1"> Administrador </option>
					    	<option id="cliente" value="0"> Cliente </option>
					    </select>
				  	</div>
					  <div class="col-sm-6 mb-3">
					    <label class="form-label">Status</label>
					    <select class="form-select" name="status" required>
							
					    	<option id="ativo" value="1"> Ativo </option>
					    	<option id="inativo" value="0"> Inativo </option>
					    </select>
					  </div>
				<input type="hidden" name="user_id" value="{id}">
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