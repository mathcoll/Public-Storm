<h3>{t}mes_parametres{/t}</h3>
<div>
	<form method="post" action="javascript:;" id="valider_meta" class="formulaire mes-parametres">
		<input type="hidden" name="update_meta" value="true" />
		<p>
			{t}Ask before creating a new storm?{/t}
		</p>
		<p>
			<label for="ask_before_create_yes">{t}yes{/t}</label>
			<input type="radio" name="ask_before_create" value="true" {if $meta.meta_value eq "true"}checked='checked'{/if} id="ask_before_create_yes" />
			<label for="ask_before_create_no">{t}no{/t}</label>
			<input type="radio" name="ask_before_create" value="false" {if $meta.meta_value ne "true"}checked='checked'{/if} id="ask_before_create_no" />
		</p>
		<p>
			&nbsp;
		</p>
		<p>
			<input type="submit" id="validate_meta" value="{t}Mettre à jour{/t}" class="ui-state-default ui-corner-all" />
		</p>
	</form>
</div>

<script type="text/javascript">
{literal}
$jQuery("form#valider_meta input#validate_meta").click(
	function() {
		$jQuery.ajax({
			type: "POST",
			cache: false,
			url: "mes-parametres.php",
			data: $jQuery(this).parent().parent().serialize(),
			success: function() {
				{/literal}alert("{t}Vos informations ont été mises à jour.{/t}");{literal}
            }
		});
	}
);
{/literal}
</script>


<div style="margin:20px 0;">
	<hr />
</div>


<h3>{t}Newsletter{/t}</h3>
<div>
	<h4>{t}Vous pouvez vous inscrire à la newsletter du site Internet Collaboratif pour recevoir des informations sur les projets en cours. (3 à 4 emails par an){/t}</h4>
	<form method="post" action="http://newsletters.internetcollaboratif.info/user/process.php" target="_blank" class="formulaire mes-parametres">
		<p><input type="hidden" name="pommo_signup" value="true">
		<input type="hidden" name="formSubmitted" value="1">
		<br />Les champs en <span class="required">gras</span> sont obligatoires<br />
		<div class="table">
			<div class="table-cell">
				<div class="table">
					<div class="table-row">
						<div class="table-cell">
							<label class="required" for="email"><strong>{t}Email :{/t}</strong></label>
						</div>
						<div class="table-cell">
							<input type="text" size="32" maxlength="60" name="Email" id="email" value="{$email}" class="field">
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<label for="field2">{t}Nom :{/t}</label>
						</div>
						<div class="table-cell">
							<input type="text" size="32" name="d[2]" value="{$nom}" id="field2" class="field">
						</div>
					</div>
					<div class="table-row">
						<div class="table-cell">
							<label for="field3">{t}Prénom :{/t}</label>
						</div>
						<div class="table-cell">
							<input type="text" size="32" name="d[3]" value="{$prenom}" id="field3" class="field">
						</div>
					</div>
				</div>
			</div>
			
		</div>
			<input type="checkbox" checked="checked" name="d[15]" id="field15" class="field"><label for="field15">Newsletter Internet Collaboratif</label><br />
			<input type="submit" name="pommo_signup" value="{t}S'abonner{/t}" class="ui-state-default ui-corner-all"> - <a href="http://newsletters.internetcollaboratif.info/user/login.php">{t}Gérer mes abonnements{/t}</a>
	</form>
</div>