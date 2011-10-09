<div class="table">
	<div class="table-row">
		<div class="table-cell _50" style="padding:10px">
			{if $useradd!="true"}
			<p>{t}inscription_intro{/t}</p>
			<p>{t}Les champs marqués d'un * sont obligatoires.{/t}</p>
			<div class="spacer">&nbsp;</div>
			<div>
				<form action="{$base_url}/utilisateurs/creer-un-compte.php" method="post" class="formulaire">
					<input type="hidden" name="lang" value="{$current_lang}" />
					<div class="table">
					
						<div class="table-row">
							<div class="table-cell">
								<label for="prenom">{t}field.prenom{/t} :</label>
							</div><!-- //table-cell -->
							<div class="table-cell">
								<input type="text" name="prenom" value="{$user_infos.prenom}" id="prenom" class="field" />
							</div><!-- //table-cell -->
						</div><!-- //table-row -->
						
						<div class="table-row">
							<div class="table-cell">
								<label for="nom">{t}field.nom{/t} :</label>
							</div><!-- //table-cell -->
							<div class="table-cell">
								<input type="text" name="nom" value="{$user_infos.nom}" id="nom" class="field" />
							</div><!-- //table-cell -->
						</div><!-- //table-row -->
						
						<div class="table-row">
							<div class="table-cell">
								<label for="emailField"><img style="display: none;" src="{$theme_dir}img/dialog-warning_002.png" alt="warning" id="emailError" class="pictoError" height="15" width="15" /><img style="display: none;" src="{$theme_dir}img/apply.png" alt="valid" id="emailValid" class="pictoValid" height="15" width="15" />{t}field.email{/t}* :</label>
							</div><!-- //table-cell -->
							<div class="table-cell">
								<input type="text" name="email" value="{$user_infos.email}" id="emailField" class="field" onchange="validerEmail(this.value);" />
							</div><!-- //table-cell -->
						</div><!-- //table-row -->
						
						<div class="table-row">
							<div class="table-cell">
								<label for="loginField"><img style="display: none;" src="{$theme_dir}img/dialog-warning_002.png" alt="warning" id="identifiantError" class="pictoError" height="15" width="15" /><img style="display: none;" src="{$theme_dir}img/apply.png" alt="valid" id="identifiantValid" class="pictoValid" height="15" width="15" />{t}field.login{/t}* :</label>
							</div><!-- //table-cell -->
							<div class="table-cell">
								<input type="text" name="login" id="loginField" value="{$user_infos.login}" class="field" onchange="validerIdentifiant(this.value);" />
							</div><!-- //table-cell -->
						</div><!-- //table-row -->
						
						<div class="table-row">
							<div class="table-cell">
								<label for="password">{t}field.password{/t}* :</label>
							</div><!-- //table-cell -->
							<div class="table-cell">
								<input type="password" name="password" value="{$user_infos.password}" id="password" class="field" />
							</div><!-- //table-cell -->
						</div><!-- //table-row -->
						
						<div class="table-row">
							<div class="table-cell">
								<label for="captcha_code">{t escape=""}field.captcha{/t}*</label>
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
									<span><input type="submit" value="{t}valider{/t}" class="ui-state-default ui-corner-all" /></span>
								</div>
							</div><!-- //table-cell -->
						</div><!-- //table-row -->
						
					</div><!-- //table -->
				</form>
			</div>
			{else}
				{t}inscription.subject{/t} {t}Mail sent{/t}
			{/if}
		</div><!-- //table-cell -->
		<div class="table-cell _50">
			<img src="{$theme_dir}plugins/public_storm/img/avantage_1.png" alt="{t}avantage_1{/t}" title="{t}avantage_1{/t}" class="avantages" />
			<img src="{$theme_dir}plugins/public_storm/img/avantage_2.png" alt="{t}avantage_2{/t}" title="{t}avantage_2{/t}" class="avantages" />
			<img src="{$theme_dir}plugins/public_storm/img/avantage_3.png" alt="{t}avantage_3{/t}" title="{t}avantage_3{/t}" class="avantages" />
			<img src="{$theme_dir}plugins/public_storm/img/avantage_4.png" alt="{t}avantage_4{/t}" title="{t}avantage_4{/t}" class="avantages" />
		</div><!-- //table-cell -->
	</div><!-- //table-row -->
</div><!-- //table -->