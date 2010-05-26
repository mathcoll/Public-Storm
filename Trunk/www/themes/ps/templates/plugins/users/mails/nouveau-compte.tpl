<html>
<body>
<a href="{$base_url}"><img src="{$theme_dir}img/logo.jpg" align="left" border="0"></a>
<h1 style="font-size:18px;">{t}inscription.subject{/t}</h1>
<p style="font-size:12px;">
	{t}inscription.welcome{/t}
</p>
<p style="font-size:11px;">
	{t}field.nom{/t} : <b>{$user_infos.nom|escape}</b><br />
	{t}field.prenom{/t} : <b>{$user_infos.prenom|escape}</b><br />
	{t}field.login{/t} : <b>{$user_infos.login|escape}</b><br />
	{{t}field.password{/t} : <b>{$user_infos.password|escape}</b>
</p>
<p style="font-size:12px;">
	<br />-- <br />{t}inscription.signature{/t}
</p>
</body>
</html>
