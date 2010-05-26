<form action="{$base_url}/utilisateurs/login/" method="post">
	<p>{t}login intro{/t}</p>
	<p>
		<input type="text" class="login_form" name="login" id="login_v" value="{t}field.login{/t}" onfocus="this.select();" />
		<input type="password" class="login_form" name="password" id="password_v" value="{t}field.password{/t}" onfocus="this.select();" />
		<span><input type="submit" value="{t}ok{/t}" /></span>
		<br /><span><label for="persistent"><input type="checkbox" name="persistent" id="persistent" value="true" /> {t}persistent{/t}</label></span>
	</p>
	<p>&nbsp;</p>
	<p><a href="{$base_url}/utilisateurs/creer-un-compte.php">{t}creer_un_compte{/t}</a> - <a href="{$base_url}/utilisateurs/mot-de-passe-oublie.php">{t}mot_de_passe_oublie{/t}</a></p>	
</form>