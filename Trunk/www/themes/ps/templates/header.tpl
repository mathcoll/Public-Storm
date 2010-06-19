<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
{setlocale type="all" locale="fr_FR.utf8"}
<head>
	<title>{$title} - {$site_name}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	{foreach from=$styles item=style}
<link rel="stylesheet" type="text/css" media="{$style.media}" href="{$style.stylesheet}" />
	{/foreach}

	{foreach from=$javascripts item=javascript}
<script type="{$javascript.type}" src="{$javascript.javascript}"></script>
	{/foreach}
<link href="{$rss}" rel="alternate" type="application/rss+xml" title="Flux RSS {$site_name}" />
	<link rel="shortcut icon" href="{$theme_dir}favicon.ico" type="image/x-icon" />
	<meta name="description" content="{t}baseline{/t} {$i18n.description|strip_tags}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<meta name="generator" content="{$site_name} {$version} - {$base_url}" />

   <script type="text/javascript">
   	$jQuery = jQuery.noConflict();
		{literal}if($jQuery("#message")) { $jQuery("#message").hide(); }{/literal}
		{if $message ne ""}{literal}$jQuery(document).ready( function() { $jQuery("#message").slideDown("slow"); } );{/literal}{/if}
	</script>
</head>
<body>

<div id="page">
	<div id="site_name">
		<h1><a href="{$base_url}/">{$site_name} <span class="baseline">{t}baseline{/t}</span></a></h1>
		<a href="{$base_url}/" class="home" title="{t}Go to home page{/t}">{t}Go to home page{/t}</a>
		{if $description ne "&nbsp;"}
			<div class="description">{t escape=""}description{/t}</div>
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
		{/if}
		
		<div id="message" style="display: none;">{$message}<span class="message_fermer"><a href="#" onclick="{literal}$('#message').slideUp('slow');{/literal}">{t}fermer{/t}</a></span></div>
	</div><!-- rightBox -->
	<!--<div class="spacer">&nbsp;</div>-->
	<div class="breadcrumb">{foreach from=$breadcrumb item=it name=breadcrumb}
	{if $smarty.foreach.breadcrumb.last}
		{$it.name|ucfirst}
	{else}
		{if $it.link ne ""}<a href="{$it.link}">{$it.name|ucfirst}</a>{else}{$it.name|ucfirst}{/if}&nbsp;>&nbsp;
	{/if}
	{/foreach}</div>