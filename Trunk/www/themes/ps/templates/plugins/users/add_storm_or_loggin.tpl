<p>
	{$i18n.not_yet_created|sprintf:$storm_permaname}
	<div class="spacer">&nbsp;</div>
</p>

<p>
	{t escape=""}To create a storm you need to have an account{/t}
</p>

<div class="table">
	<div class="table-row">
		<div class="table-cell _40">

			<h3>{t}connectez_vous{/t}</h3>
			<form action="{$base_url}/utilisateurs/login/" method="post">
				<p>{$loginintro}</p>
				<p>
					<input type="text" class="login_form" name="login" id="login_v" value="{t}field.login{/t}" onfocus="this.select();" />
					<input type="password" class="login_form" name="password" id="password_v" value="{t}field.password{/t}" onfocus="this.select();" />
					<span><input type="submit" value="{t}ok{/t}" /></span>
					<br /><span><label for="persistent2"><input type="checkbox" name="persistent" id="persistent2" value="true" /> {t}persistent{/t}</label></span>
				</p>
				<p>&nbsp;</p>
				<p><a href="{$base_url}/utilisateurs/mot-de-passe-oublie.php">{t}mot_de_passe_oublie{/t}</a></p>	
			</form>

		</div>

		<div class="table-cell _40">

			<h3>{t}creer_un_compte{/t}</h3>
			<form action="{$base_url}/utilisateurs/creer-un-compte.php" method="post" class="formulaire">
			<input type="hidden" name="lang" value="{$current_lang}" />

			<div class="table">
				<div class="table-row">
					<div class="table-cell">
						<label for="prenom">{t}field.prenom{/t}</label>
					</div>
					<div class="table-cell">
						<input type="text" name="prenom" value="{$user_infos.prenom}" id="prenom" class="field" />
					</div>
				</div>
				<div class="table-row">
					<div class="table-cell">
						<label for="nom">{t}field.nom{/t}</label>
					</div>
					<div class="table-cell">
						<input type="text" name="nom" value="{$user_infos.nom}" id="nom" class="field" />
					</div>
				</div>
				<div class="table-row">
					<div class="table-cell">
						<label for="emailField"><img style="display: none;" src="{$theme_dir}img/dialog-warning_002.png" id="emailError" class="pictoError" height="15" width="15"><img style="display: none;" src="{$theme_dir}img/apply.png" id="emailValid" class="pictoValid" height="15" width="15">{t}field.email{/t}</label>
					</div>
					<div class="table-cell">
						<input type="text" name="email" value="{$user_infos.email}" id="emailField" class="field" onchange="validerEmail(this.value);" />
					</div>
				</div>
				<div class="table-row">
					<div class="table-cell">
						<label for="loginField"><img style="display: none;" src="{$theme_dir}img/dialog-warning_002.png" id="identifiantError" class="pictoError" height="15" width="15"><img style="display: none;" src="{$theme_dir}img/apply.png" id="identifiantValid" class="pictoValid" height="15" width="15">{t}field.login{/t}</label>
					</div>
					<div class="table-cell">
						<input type="text" name="login" id="loginField" value="{$user_infos.login}" class="field" onchange="validerIdentifiant(this.value);" />
					</div>
				</div>
				<div class="table-row">
					<div class="table-cell">
						<label for="password">{t}field.password{/t}</label>
					</div>
					<div class="table-cell">
						<input type="password" name="password" value="{$user_infos.password}" id="password" class="field" />
					</div>
				</div>
						
				<div class="table-row">
					<div class="table-cell">
						<label for="captcha_code">{t escape=""}field.captcha{/t}</label>
					</div><!-- //table-cell -->
					<div class="table-cell">
						<img id="captcha" src="{$base_url}/include/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
						<input type="text" name="captcha_code" id="captcha_code" size="10" maxlength="6" />
						<label style="float:none;"><a href="#" onclick="document.getElementById('captcha').src = '{$base_url}/include/securimage/securimage_show.php?' + Math.random(); return false">{t}field.reload_captcha{/t}</a></label>
					</div><!-- //table-cell -->
				</div><!-- //table-row -->
						
				<div class="table-row">
					<div class="table-cell">
						<div class="spacer">&nbsp;</div>
						<div>
							<span class="centered"><input type="submit" class="btn_submit" value="{t}valider{/t}" /></span>
						</div>
					</div><!-- //table-cell -->
				</div><!-- //table-row -->
			</div><!-- /table -->
			</form>

		</div>
	</div>
</div>