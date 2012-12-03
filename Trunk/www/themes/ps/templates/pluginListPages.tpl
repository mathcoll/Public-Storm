
<h2>Plugin {$title} v.{$version}</h2>
<p>{$title} {t}by{/t} {$author}</p>
<p>{$description}</p>
<p>{t}listpages{/t} :</p>
<ul>
	{foreach from=$listplugins item=plugin}
<li><a href="./{$plugin}">{$plugin}</a></li>
	{/foreach}

</ul>

