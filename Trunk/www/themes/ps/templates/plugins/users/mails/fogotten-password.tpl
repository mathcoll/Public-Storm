<html>
<body>
<a href="{$base_url_http}?utm_source=forgotten-password&utm_medium=email&utm_term=key1&utm_campaign=Public-Storm"><img src="{$theme_dir_http}img/logo.jpg" align="left" border="0"></a>
<h1 style="font-size:18px;">{$user_infos.prenom|escape|ucfirst} {$user_infos.nom|escape|ucfirst}, {t}fogotten_password.subject{/t}</h1>
<p style="font-size:12px;">
	{t}fogotten_password.intro{/t}
</p>
<p style="font-size:11px;">
	{t}field.login{/t} : <b>{$user_infos.login|escape}</b><br />
	{t}field.password{/t} : <b>{$user_infos.password|escape}</b>
</p>
<p>&nbsp;</p>
<p style="font-size:12px;">
	<br />-- <br />
	{t}fogotten_password.signature{/t}
</p>
</body>
</html>
