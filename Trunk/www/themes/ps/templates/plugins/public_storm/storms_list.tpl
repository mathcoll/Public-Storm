{setlocale type="all" locale="fr_FR.utf8"}
{t}Liste des derniers Storms créés :{/t}
<ul class="liste">
	{foreach from=$storms item=storm}
	{if $storm.root ne ""}<li><a href="{$base_url}/storm/{$storm.permaname|url}/" class="storm">{$storm.root|ucfirst}</a>, créé par <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a> le {$storm.date|date_format:"%A %d %B %Y %Hh%M GMT"}</li>{/if}
	{/foreach}
</ul>