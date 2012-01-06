<h3>{t}mes_parametres{/t}</h3>
<div>
	<p>{t}Vous pouvez vous inscrire à la newsletter du site Internet Collaboratif pour recevoir des informations sur les projets en cours. (3 à 4 emails par an){/t}</p>
	<form method="post" action="http://newsletters.internetcollaboratif.info/user/process.php" target="_blank" class="formulaire mes-parametres">
		<p><input type="hidden" name="pommo_signup" value="true">
		<input type="hidden" name="formSubmitted" value="1">
		<br />Les champs en <span class="required">gras</span> sont obligatoires<br />
		<div class="table">
			<div class="table-cell">
				<div class="table">
					<div class="table-row">
						<div class="table-cell">
							<label class="required" for="email"><strong>Email :</strong></label>
						</div>
						<div class="table-cell">
							<input type="text" size="32" maxlength="60" name="Email" id="email" value="" class="field">
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<label for="field2">{t}Nom :{/t}</label>
						</div>
						<div class="table-cell">
							<input type="text" size="32" name="d[2]" id="field2" class="field">
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<label for="field3">{t}Prénom :{/t}</label>
						</div>
						<div class="table-cell">
							<input type="text" size="32" name="d[3]" id="field3" class="field">
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<input type="checkbox" checked="checked" name="d[15]" id="field15" class="field"><label for="field15">Newsletter Internet Collaboratif</label>
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<input type="submit" name="pommo_signup" value="{t}S'abonner{/t}" class="ui-state-default ui-corner-all">
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<a href="http://newsletters.internetcollaboratif.info/user/login.php">{t}Gérer mes abonnements{/t}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>