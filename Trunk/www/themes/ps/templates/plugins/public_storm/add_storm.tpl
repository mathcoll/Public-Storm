<div id="add_this_storm">
	<h2>{t}Ajouter ce 'Storm' :{/t}</h2>
	<form action="{$base_url}/storm/" method="post" onsubmit="add_this_storm(this, '{$base_url}'); return false;">
		<input type="text" name="storm" value="nom du storm" onfocus="this.select();" />
		<input type="submit" value="{t}Ajouter{/t}" />
	</form>
</div>