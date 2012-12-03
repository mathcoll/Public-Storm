<div id="rechercher">
	<span class="intro">{t}rechercher_intro{/t}</span>
	<form id="recherche" action="{$base_url}/rechercher/" onsubmit="search($('#s').val());" method="post">
		<p><input type="text" name="s" value="{$s}" id="s" onfocus="this.select();" />&nbsp;<input type="submit" value="{t}rechercher{/t}" /></p>
	</form>
</div>