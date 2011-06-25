<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
{setlocale type="all" locale="fr_FR.utf8"}
<head>
	<title>{$title} - {$site_name}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="{$rss}" rel="alternate" type="application/rss+xml" title="Flux RSS {$site_name}" />
	<link rel="shortcut icon" href="{$theme_dir}favicon.ico" type="image/x-icon" />
	<meta name="description" content="{t}baseline{/t} {$meta_description|strip_tags}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<meta name="generator" content="{$site_name} {$version} - {$base_url_http}" />

	<link rel="stylesheet" type="text/css" media="screen" href="/css/groups/all.css/" />

    <script type="text/javascript" defer="defer">
  		var BASE_URL = "{$base_url}";
	</script>
	<script type="text/javascript" src="/js/groups/jquery.js/"></script>
	<script type="text/javascript" src="/js/groups/all.js/"></script>
	
   <script type="text/javascript" defer="defer">
	{literal}
	$jQuery(document).ready( function() {
		openSendToAFriend(1);
		populateFriends({/literal}{$json}{literal});
	});
	{/literal}
</script>
</head>

<body>
<h4>{t}Partager à me amis{/t} > {t}Storm{/t} <b>{$storm}</b></h4>
<p>{$message}</p>
</body>
</html>