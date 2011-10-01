<p>{t}Vous avez oublié votre mot de passe ? Saisissez votre identifiant OU votre email et nous vous enverrons un nouveau mot de passe immédiatement.{/t}</p>
<p>
	<form action="mot-de-passe-oublie.php" method="post" class="formulaire">
		<div class="deuxCols">
			<div style="float:left;">
				<label for="emailField">{t}field.email{/t}</label>
				<label for="loginField">{t}field.login{/t}</label>
			</div>
			<div style="margin-left:150px;">
				<input type="text" name="email" id="emailField" value="{$user_infos.email}" class="field" />
				<input type="text" name="login" id="loginField" value="{$user_infos.login}" class="field" />
			</div>
		</div>
		<div>
			<span class="centered"><input type="submit" class="btn_submit" value="{t}valider{/t}" /></span>
		</div>
	</form>	
</p>