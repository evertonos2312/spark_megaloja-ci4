<section class="content-main">
	
	<!-- ============================ COMPONENT LOGIN   ================================= -->
	<div class="card shadow mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4">Administração</h4>
      <form method="post" action="{app_url}admin/login/index">
      	
          <div class="mb-3">
			 <input class="form-control" name="username" placeholder="Usuário" type="text" required>
          </div> <!-- form-group// -->
          <div class="mb-3">
			<input class="form-control" name="password" id="inputpassword"  placeholder="Senha" type="password" required>
            <span toggle="#inputpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
          </div> <!-- form-group// -->
          
          <div class="mb-3">
            <label class="form-check"> 
            	<input type="checkbox" class="form-check-input" checked=""> 
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