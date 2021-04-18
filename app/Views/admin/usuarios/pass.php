	<div class="mb-4">
					<label for="password" class="form-label" >Senha</label>
					<input type="password" placeholder="Digite aqui" required value="{password}" name="password" class="form-control" id="password">
					<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					<input type="checkbox" class="form-check-input" id="change_password" onclick="changeCheck()">
					<label for="change_password">Alterar senha?</label>
				</div>

				<div class="mb-4" id="div-pass" style="display:none;">
					<label for="password" class="form-label" >Confirmar Senha</label>
					<input type="password" placeholder="Digite aqui" value="" class="form-control" name="confirm_password" id="confirm_password">
					<span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
					
				</div>