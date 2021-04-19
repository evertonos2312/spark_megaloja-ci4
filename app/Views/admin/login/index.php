<section class="content-main">

	
	<!-- ============================ COMPONENT LOGIN   ================================= -->
	<div class="card shadow mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
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
      <h4 class="card-title mb-4">Administração</h4>
      <form method="post" action="{app_url}admin/login/index">
      	
          <div class="mb-3">
			 <input class="form-control" name="username" placeholder="Usuário" type="text" required>
          </div> <!-- form-group// -->
          <div class="mb-3">
			<input class="form-control" name="password" id="inputpassword"  placeholder="Senha" type="password" required>
           
          </div> <!-- form-group// -->
          
          <div class="mb-3">
            <label class="form-check"> 
            	<input type="checkbox" name="remember" class="form-check-input" checked=""> 
            	<span class="form-check-label">Lembre de mim</span> 
            </label>
          </div> <!-- form-group form-check .// -->
          <div class="mb-4">
              <button type="submit" class="btn btn-primary w-100"> Entrar  </button>
          </div> <!-- form-group// -->    
      </form>
      
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->
</section> <!-- content-main end// -->