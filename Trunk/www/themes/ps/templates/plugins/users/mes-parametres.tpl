<h3>{t}mes_parametres{/t}</h3>
<div>
	<p>{t}Vous pouvez vous inscrire à la newsletter du site Internet Collaboratif pour recevoir des informations sur les projets en cours. (3 à 4 emails par an){/t}</p>
	<form method="post" action="http://newsletters.internetcollaboratif.info/user/process.php" target="_blank">
	<p><input type="hidden" name="pommo_signup" value="true">
	<input type="hidden" name="formSubmitted" value="1">
	Les champs en <span class="required">gras</span> sont obligatoires<br>
	<label class="required" for="email"><strong>Email :</strong></label><br />
	<input type="text" size="32" maxlength="60" name="Email" id="email" value=""><br />
	<label for="field2">{t}Nom :{/t}</label><br>
	<input type="text" size="32" name="d[2]" id="field2"><br />
	<label for="field3">{t}Prénom :{/t}</label><br>
	<input type="text" size="32" name="d[3]" id="field3"><br />
	<input type="checkbox" checked="checked" name="d[15]" id="field15"><label for="field15">Newsletter Internet Collaboratif :</label><br>
	
	<input type="submit" name="pommo_signup" value="{t}S'abonner{/t}">
	</p>
	<p><a href="http://newsletters.internetcollaboratif.info/user/login.php">{t}Gérer mes abonnements{/t}</a></p>
	</form>
</div>