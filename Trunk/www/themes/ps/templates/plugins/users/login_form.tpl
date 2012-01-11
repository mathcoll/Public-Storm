<form action="{$base_url}/utilisateurs/login/" method="post" id="loginForm">
	<p>{t}login intro{/t}</p>
	<p class="login_page"><a href="{$base_url}/utilisateurs/login/">{t}Login page{/t}</a></p>
	<p>
		<input type="text" tabindex="1" class="login_form" name="login" id="login_v" value="{t}field.login{/t}" onfocus="this.select();" />
	</p>
	<p>
		<input type="password" tabindex="2" class="login_form" name="password" id="password_v" value="{t}field.password{/t}" onfocus="this.select();" />
		<span><input type="submit" tabindex="4" value="{t}ok{/t}" class="ui-state-default ui-corner-all" /></span>
	</p>
	<p>
		<span><label for="persistent"><input type="checkbox" tabindex="3" name="persistent" id="persistent" value="true" /> {t}persistent{/t}</label></span>
	</p>
	<p class="margint10"><a href="{$base_url}/utilisateurs/creer-un-compte.php">{t}creer_un_compte{/t}</a> - <a href="{$base_url}/utilisateurs/mot-de-passe-oublie.php">{t}mot_de_passe_oublie{/t}</a></p>	
</form>