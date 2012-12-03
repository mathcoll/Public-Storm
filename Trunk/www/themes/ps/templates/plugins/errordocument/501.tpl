<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{$site_name} > {t}baseline{/t}</title>
	{literal}
	<style>
	* { padding: 0; margin: 0; }
	img { border: 0; }
	a
	{
		color: #156e1e;
		text-decoration: none;
		outline: 0;
		padding: .2em;
	}
	
	a:hover
	{
		background: #a3ab0e;
		color: #000000;
	}
	body
	{
		font-family: Arial;
	}
	#wrapper
	{
		width: 450px;
		margin: 29px auto;
	}
	#logo img
	{
		margin: auto;
	}
	#logo.blank
	{
		padding: 50px auto 10px auto;
		text-indent: 0;
		margin-bottom: 1px;
	}
	h1
	{
		color: #156e1e;
		font-size: 36px;
		font-weight: bold;
		text-align: center;
		white-space: nowrap;
	}
	h2
	{
		font-size: 12px;
		font-weight: normal;
		text-align: center;
		margin-bottom:40px;
	}
	#when, .textwidget
	{
		font-size: 18px;
		text-align: center;
	}
	#when p
	{
		margin-bottom: 10px;
	}
	#when p.message
	{
		margin: 20px 0 20px 0;
		color: #156e1e;
	}
	#form
	{
		width: 410px;
		margin: 25px auto 15px auto;
	}
	input {
		background: none;
		border: 1px solid #156e1e;
		outline: 0;
	}
	input.text
	{
		width: 268px;
		padding: 5px;
		color: #156e1e;
		font-size: 18px;
		float: left;
	}
	input.submit
	{
		width: 104px;
		padding: 5px;
		font-size: 18px;
		float: right;
		cursor: pointer;
		background: #a3ab0e;
	}
	#buttons
	{
		clear: both;
		text-align: center;
		margin: 100px auto 0 auto;
	}
	#rss
	{
		padding-right: 10px;
	}
	#rss img
	{
		width: 27px;
		height: 27px;
	}
	#twitter a img, #identica a img
	{
		height: 32px;
	}
	#footer
	{
		clear: both;
		padding-top: .5em;
		margin-top: 3em;
		border-top: #156e1e 15px solid;
		text-align: center;
		color: #444;
		font-size: 10px;
	}
	</style>
	{/literal}
</head>
<body>
	<div id="wrapper">
		<div id="logo" class="blank">
			<h1><a href="{$base_url}">{$site_name}</a></h1>
			<h2>{t}baseline{/t}</h2>
		</div>
		<div>
			<p>{t}501 Not Implemented{/t}</p>
		</div>
	</div>
	<div id="footer">
		&copy; Internet Collaboratif 2009-{$smarty.now|date_format:'%Y'}<br />
		<a href="mailto:contact@internetcollaboratif.info">contact@internetcollaboratif.info</a><br />
		<a href="{$base_url}/">{$site_name} Version {$version}</a><br />
	</div><!-- end of footer -->
</body>
</html>