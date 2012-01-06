<div class="table must-login">
	<div class="table-row">
		<div class="table-cell _w710 table-cell-create-account">
			{if $useradd!="true"}
			<h3>{t}creer_un_compte{/t} <span class="free">{t}gratuit{/t}</span> {t}sur Public-Storm !{/t}</h3>
			<p></p>
			<div class="spacer">&nbsp;</div>
			
			<div>
				<div class="left _w430">
					<form action="{$base_url}/utilisateurs/creer-un-compte.php" method="post" class="formulaire">
						<input type="hidden" name="lang" value="{$current_lang}" />
						<div class="table">
						
							<div class="table-row">
								<div class="table-cell">
									<label for="prenom">{t}field.prenom{/t} :</label>
								</div><!-- //table-cell -->
								<div class="table-cell">
									<input type="text" tabindex="1" name="prenom" value="{$user_infos.prenom}" id="prenom" class="field" />
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
							<div class="table-row">
								<div class="table-cell">
									<label for="nom">{t}field.nom{/t} :</label>
								</div><!-- //table-cell -->
								<div class="table-cell">
									<input type="text" tabindex="2" name="nom" value="{$user_infos.nom}" id="nom" class="field" />
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
							<div class="table-row">
								<div class="table-cell">
									<label for="emailField">{t}field.email{/t}* :</label>
								</div><!-- //table-cell -->
								<div class="table-cell">
									<input type="text" tabindex="3" name="email" value="{$user_infos.email}" id="emailField" class="field" onchange="validerEmail(this.value);" />
									<img style="display: none;" src="{$theme_dir}img/dialog-warning_002.png" alt="warning" id="emailError" class="pictoError" height="15" width="15" /><img style="display: none;" src="{$theme_dir}img/apply.png" alt="valid" id="emailValid" class="pictoValid" height="15" width="15" />
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
							<div class="table-row">
								<div class="table-cell">
									<label for="loginField">{t}field.login{/t}* :</label>
								</div><!-- //table-cell -->
								<div class="table-cell">
									<input type="text" tabindex="4" name="login" id="loginField" value="{$user_infos.login}" class="field" onchange="validerIdentifiant(this.value);" />
									<img style="display: none;" src="{$theme_dir}img/dialog-warning_002.png" alt="warning" id="identifiantError" class="pictoError" height="15" width="15" /><img style="display: none;" src="{$theme_dir}img/apply.png" alt="valid" id="identifiantValid" class="pictoValid" height="15" width="15" />
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
							<div class="table-row">
								<div class="table-cell">
									<label for="password">{t}field.password{/t}* :</label>
								</div><!-- //table-cell -->
								<div class="table-cell">
									<input type="password" tabindex="5" name="password" value="{$user_infos.password}" id="password" class="field" />
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
							<div class="table-row">
								<div class="table-cell">
									<label for="captcha_code">{t escape=""}field.captcha{/t}*</label>
								</div><!-- //table-cell -->
								<div class="table-cell">
									<img id="captcha" src="{$base_url}/include/securimage/securimage_show.php" alt="CAPTCHA Image" /><br />
									<input type="text" tabindex="6" name="captcha_code" id="captcha_code" size="10" maxlength="6" class="field" /><br />
									<label style="float:none;"><a href="#" onclick="document.getElementById('captcha').src = '{$base_url}/include/securimage/securimage_show.php?' + Math.random(); return false">{t}field.reload_captcha{/t}</a></label>
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
							<div class="table-row">
								<div class="table-cell">
									<p>{t}Les champs marqués d'un * sont obligatoires.{/t}</p>
								</div>
							</div>
							
							<div class="table-row">
								<div class="table-cell"></div>
								<div class="table-cell">
									<div>
										<span><input type="submit" tabindex="7" value="{t}creer_un_compte{/t}" class="ui-state-default ui-corner-all field" /></span>
									</div>
								</div><!-- //table-cell -->
							</div><!-- //table-row -->
							
						</div><!-- //table -->
					</form>
				</div>
				<div class="left">
					<img src="{$theme_dir}img/creer_storms.png" alt="" width="280" height="280" />
				</div>
			</div>
			{else}
				<h3>{t}inscription.subject{/t}. {t}Mail sent{/t}</h3>
			{/if}
		</div><!-- //table-cell -->
		{*
		<div class="table-cell _50">
			<img src="{$theme_dir}plugins/public_storm/img/avantage_1.png" alt="{t}avantage_1{/t}" title="{t}avantage_1{/t}" class="avantages" />
			<img src="{$theme_dir}plugins/public_storm/img/avantage_2.png" alt="{t}avantage_2{/t}" title="{t}avantage_2{/t}" class="avantages" />
			<img src="{$theme_dir}plugins/public_storm/img/avantage_3.png" alt="{t}avantage_3{/t}" title="{t}avantage_3{/t}" class="avantages" />
			<img src="{$theme_dir}plugins/public_storm/img/avantage_4.png" alt="{t}avantage_4{/t}" title="{t}avantage_4{/t}" class="avantages" />
		</div><!-- //table-cell -->
		*}
	</div><!-- //table-row -->
</div><!-- //table -->