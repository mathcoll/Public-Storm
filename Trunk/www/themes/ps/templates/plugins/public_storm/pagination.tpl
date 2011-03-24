{assign var=prev value=$current_page-1}
{assign var=next value=$current_page+1}
{if $nb_pages gt 1}
<p>{t}Pages :{/t}</p>
<ul class="list-pages">
	{if $current_page > 1}
	<li><a href="{$base_url}/storms/alpha/{$prev}/" title="{t}Page précédente{/t}">&lt;</a></li>
	{/if}
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/storms/alpha/{$smarty.section.foo.iteration}/">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
	{if $current_page < $nb_pages}
	<li><a href="{$base_url}/storms/alpha/{$next}/" title="{t}Page suivante{/t}">&gt;</a></li>
	{/if}
</ul>
{/if}