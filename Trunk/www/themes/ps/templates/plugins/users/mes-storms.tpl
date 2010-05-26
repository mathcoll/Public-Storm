{setlocale type="all" locale="fr_FR.utf8"}
<h3>{t}mes_storms{/t}</h3>
<div>
	<ul>
{foreach from=$storms item=storm name=liste}<li><a href="{$base_url}/storm/{$storm.permaname|url}/">{$storm.root|ucfirst}</a>, créé par <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a> le {$storm.date|date_format:"%A %d %B %Y %Hh%M GMT"}</li>{/foreach}
	
	</ul>
</div>