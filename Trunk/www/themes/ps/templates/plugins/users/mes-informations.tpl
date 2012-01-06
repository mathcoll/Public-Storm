<h3>{t}mes_informations{/t}</h3>

<form action="{$base_url}/utilisateurs/mon-compte/mes-informations/" method="post" class="formulaire mes-informations">
	<div class="table">
		<div class="table-row">
			<div class="table-cell">{* left col *}
				<a href="http://www.gravatar.com/emails/" class="centered" target="_blank">
					<img src="{$avatar}" alt="{$username|escape}" /><br />
					{t}Changer ma photo{/t}</a>
			</div>{* /left col *}
			<div class="table-cell">{* right col *}
				<div class="table">
					<div class="table-row">
						<div class="table-cell">
							<label for="prenom">{t}field.prenom{/t} :</label>
						</div><!-- //table-cell -->
						<div class="table-cell">
							<input type="text" name="prenom" value="{$user_infos.prenom}" id="prenom" class="field" />
						</div><!-- //table-cell -->
						<div class="table-cell">
							
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
							<label for="emailField">{t}field.email{/t} :</label>
						</div><!-- //table-cell -->
						<div class="table-cell">
							<input type="text" name="email" value="{$user_infos.email}" id="emailField" class="field" />
						</div><!-- //table-cell -->
					</div><!-- //table-row -->
					
					<div class="table-row">
						<div class="table-cell">
							<label for="login">{t}field.login{/t} :</label>
						</div><!-- //table-cell -->
						<div class="table-cell">
							<input type="text" name="login" disabled="disabled" value="{$user_infos.login}" class="field" />
						</div><!-- //table-cell -->
					</div><!-- //table-row -->
					
					<div class="table-row">
						<div class="table-cell">
							<label for="password">{t}field.password{/t} :</label>
						</div><!-- //table-cell -->
						<div class="table-cell">
							<input type="password" name="password" value="" id="password" class="field" />
						</div><!-- //table-cell -->
					</div><!-- //table-row -->
					
					<div class="table-row">
						<div class="table-cell">
							<label for="password2">{t}field.password{/t} :</label>
						</div><!-- //table-cell -->
						<div class="table-cell">
							<input type="password" name="password2" value="" id="password2" class="field" />
						</div><!-- //table-cell -->
					</div><!-- //table-row -->
					
					<div class="table-row">
						<div class="table-cell">
							<div class="spacer">&nbsp;</div>
							<span class="centered"><input type="submit" class="ui-state-default ui-corner-all field" value="{t}valider{/t}" /></span>
						</div><!-- //table-cell -->
					</div><!-- //table-row -->
				</div>
			</div>{* /right col *}
		</div>
	</div>
</form>