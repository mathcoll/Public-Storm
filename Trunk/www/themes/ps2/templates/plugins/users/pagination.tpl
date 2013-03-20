{assign var=prev value=$current_page-1}
{assign var=next value=$current_page+1}
{if $nb_pages gt 1}
<p style="clear:both;">{t}Pages :{/t}</p>
<ul class="list-pages">
	{if $current_page > 1}
	<li><a href="{$base_url}/utilisateurs/{$login|escape}/{$prev}/" title="{t}Page précédente{/t}">&lt;</a></li>
	{/if}
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/utilisateurs/{$login|escape}/{$smarty.section.foo.iteration}/" title="{t}Storms{/t} {t}page{/t} {$smarty.section.foo.iteration}" {if $tabbed}name="mes-storms" onclick="tab(this.name, this.name, 'utilisateurs', {$smarty.section.foo.iteration});return false;"{/if}>{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
	{if $current_page < $nb_pages}
	<li><a href="{$base_url}/utilisateurs/{$login|escape}/{$next}/" title="{t}Page suivante{/t}">&gt;</a></li>
	{/if}
</ul>
{/if}