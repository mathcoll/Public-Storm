<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xml:lang="fr" lang="fr">
<head>
	<title>{$title} - {$site_name}</title>
	<meta property="fb:app_id" content="{$fb_app_id}" />
	<meta property="og:title" content="{$title}" />
	<meta property="og:site_name" content="{$site_name}" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{$base_url_http}{$smarty.server.REQUEST_URI}" />
	<meta property="og:image" content="{$base_url_http}{$theme_dir}img/logo.jpg" />
	<meta property="og:description" content="{$meta_description|strip_tags}" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	{foreach from=$rssfeeds item=rss}
<link href="{$rss.href}" rel="{$rss.rel}" type="{$rss.type}" title="{$rss.title}" />
	{/foreach}
	<link rel="shortcut icon" href="{$theme_dir}favicon.ico" type="image/x-icon" />
	<meta name="description" content="{t}baseline{/t} {$meta_description|strip_tags}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<meta name="generator" content="{$site_name} {$version} - {$base_url_http}" />
{if $has_prev != ""}
<link rel="prev" href="{$has_prev.href}" title="{$has_prev.title}" />
{/if}
{if $has_start != ""}
<link rel="start" href="{$has_start.href}" title="{$has_start.title}" />
{/if}
{if $has_next != ""}
<link rel="next" href="{$has_next.href}" title="{$has_next.title}" />
{/if}
{if $is_mobile eq 1}
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
{/if}
{if $statuses.trackbacks eq 1}
	<link rel="pingback" href="{$base_url_http}/trackbacks/index.php" />
{/if}
	{foreach from=$styles item=style}
<link rel="stylesheet" type="text/css" media="{$style.media}" href="{$style.stylesheet}" />
	{/foreach}

   <script type="text/javascript" defer="defer">
  		var BASE_URL = "{$base_url}";
	</script>
	{foreach from=$javascripts item=javascript}
<script type="{$javascript.type}" src="{$javascript.javascript}"></script>
	{/foreach}
   <script type="text/javascript" defer="defer">
		{literal}if($jQuery("#message")) { $jQuery("#message").hide(); }{/literal}
	</script>
</head>
<body>


<div id="habillage">
<div id="page">
	<div id="site_name" class="sprite">
		<h1><a href="{$base_url}/">{$site_name} <span class="baseline">{t}baseline{/t}</span></a></h1>
		<a href="{$base_url}/" class="home" title="{t}Go to home page{/t}">{t}Go to home page{/t}</a>
		{if $description ne "&nbsp;"}
			<div class="description">{$meta_description}</div>
		{/if}
		{if $statuses.rechercher eq 1}
			{include file="plugins/rechercher/form_recherche.tpl" base_url=$base_url i18n=$i18n s=$s}
		{/if}
	</div>
	<div id="rightBox">
		{if $statuses.i18n eq 1}
		<div id="languages">
			{t}available_languages{/t}
			<ul>
				{foreach from=$langs item=lang}
{if $lang eq $current_lang}
{assign var="selected" value="selected"}
{else}
{assign var="selected" value=""}
{/if}
{include file="plugins/i18n/inc_lang.tpl" code=$lang.code name=$lang.name prefix=$prefix selected=$selected}
	
				{/foreach}
			</ul>
			<p>&nbsp;</p>
			<p><a href="mailto:contact@internetcollaboratif.info">{t}Aider à la traduction{/t}</a></p>
		</div><!-- languages -->
		{/if}
		
		{if $statuses.users eq 1}
		<div id="login" class="_{$user.logged}">
			{if $user.logged}
			{include file="plugins/users/login_infos.tpl" base_url=$base_url i18n=$i18n user=$user}
			{else}
			{include file="plugins/users/login_form.tpl" base_url=$base_url i18n=$i18n}
			{/if}
		</div><!-- login -->
		<span id="create_storm"></span>
		{/if}
		
		<div id="message" class="sprite">{$message}</div>
	</div><!-- rightBox -->
