{include file="header.tpl" base_url_http=$base_url_http message=$message user=$user description=$description statuses=$statuses}
	
	{if $title != ""}<h2>{$title}</h2>{/if}
	
	{if $contenu != ""}
		{$contenu}
	{/if}

{include file="pre-footer.tpl" base_url=$base_url articles=$articles plugins=$plugins statuses=$statuses trackbacks=$trackbacks}
{include file="footer.tpl" base_url=$base_url plugins=$plugins statuses=$statuses}