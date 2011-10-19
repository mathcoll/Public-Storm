<div class="table must-login">
	<div class="table-cell _w710 table-cell-create-account">
		<h3>{t}Vous avez oublié votre mot de passe ? Saisissez votre identifiant OU votre email et nous vous enverrons un nouveau mot de passe immédiatement.{/t}</h3>
		<form action="mot-de-passe-oublie.php" method="post" class="formulaire">
			<div class="table">
				<div class="table-row">
					<div class="table-cell">
						<label for="emailField">{t}field.email{/t}</label>
					</div>
					<div class="table-cell">
						<input type="text" name="email" id="emailField" value="{$user_infos.email}" class="field" />
					</div>
				</div>
				<div class="table-row">
					<div class="table-cell">
						<label for="loginField">{t}field.login{/t}</label>
					</div>
					<div class="table-cell">
						<input type="text" name="login" id="loginField" value="{$user_infos.login}" class="field" />
					</div>
				</div>
				<div class="table-row">
					<div class="table-cell"></div>
					<div class="table-cell">
						<span><input type="submit" value="{t}valider{/t}" class="ui-state-default ui-corner-all field" /></span>
					</div>
				</div>
			</div>
		</form>	
	</div>
</div>