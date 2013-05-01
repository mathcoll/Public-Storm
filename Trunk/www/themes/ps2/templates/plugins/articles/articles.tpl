{if $articles|@sizeof gt 0}
	<h3>{t}articles{/t}</h3>
	<ul class="list-articles">
	{foreach from=$articles item=article}
		<li><a href="{$base_url}/articles/{$article.uid}/">{$article.title}</a></li>
	{/foreach}
	</ul>
{/if}