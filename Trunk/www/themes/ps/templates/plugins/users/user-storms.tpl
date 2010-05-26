{setlocale type="all" locale="fr_FR.utf8"}
<h3>STORMS DE USERNAME</h3>
<div>
	<ul>
{foreach from=$storms item=storm name=liste}<li><a href="{$storm.url}">{$storm.root|ucfirst}</a>, créé le {$storm.date|date_format:"%A %d %B %Y %Hh%M GMT"}</li>{/foreach}
	
	</ul>
</div>