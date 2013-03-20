<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>{$title} - {$site_name}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="{$rss}" rel="alternate" type="application/rss+xml" title="Flux RSS {$site_name}" />
	<link rel="shortcut icon" href="{$theme_dir}favicon.ico" type="image/x-icon" />
	<meta name="description" content="{t}baseline{/t} {$meta_description|strip_tags}" />
	<meta name="keywords" content="{$meta_keywords}" />
	<meta name="generator" content="{$site_name} {$version} - {$base_url_http}" />

	<link rel="stylesheet" type="text/css" media="screen" href="/css/groups/screen.css/" />

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
<div id="site_name" class="sprite">
	<p style="padding-left:95px;">
		{t escape=""}Choisissez le service auquel vous souhaitez vous connecter. Vous pourrez ensuite envoyer un message à vos amis.<br />Public-Storm ne conserve aucune donnée vous concernant.{/t}
	</p>
</div>

<form action="{$base_url}/sendtoafriend/send/" method="post">
<div id="accordion">
    <h3><a href="#">1. {t}Me connecter via OAuth,{/t}</a></h3>
    <div id="auth">
    	<p>{t}Vous êtes déjà connecté{/t}</p>
	</div>
	
    <h3><a href="#">2. {t}choisir mes amis...{/t}</a></h3>
    <div>
    	<ul id="friends">
    		<li>&nbsp;</li>
     	</ul>
    </div>
    
    <h3><a href="#">3. {t}...et leur envoyer un message{/t}</a></h3>
    <div>
    	<p>{t}Ajoutez votre message personnel :{/t}</p>	
		<textarea style="width:100%;height:200px;" name="message_perso" rows="5" cols="20">{t}Bonjour,{/t}
		
{t}Je viens de découvrir ce site, et j'ai pensé qu'il pourrait t'intéresser !{/t}


{t}À bientôt.{/t}</textarea>
		<input type="submit" value="{t}Envoyer{/t}" class="ui-state-default ui-corner-all" />
    </div>
</div>
</form>

</body>
</html>