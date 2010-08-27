{assign var=prevcap value=""}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/3}

{t}Liste des Storms triés par ordre alphabêtique :{/t}

<p>{t}Pages :{/t}</p>
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/storms/alpha/{$smarty.section.foo.iteration}/">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>

<div class="table _100">
	<div class="table-row">
		<div class="table-cell _30">
	
			<ul class="liste">
				{foreach from=$storms item=storm}
				{assign var=cap value=$storm.permaname.0}
				{if $cap ne $prevcap}
					{if $loopnum gt $item_per_col|floor}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _30"><ul class="liste">
					{/if}
					<li class="cap">{$cap|ucfirst}</li>
				{/if}
				{if $storm.root ne ""}<li><a href="{$base_url}/storm/{$storm.permaname|url}/" class="storm">{$storm.root|ucfirst}</a> <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a>)</small></li>{/if}
				{assign var=prevcap value=$cap}
				
				{assign var=loopnum value=$loopnum+1}
				{/foreach}
			</ul>
			
		</div>
	</div>
</div>

<p>{t}Pages :{/t}</p>
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/storms/alpha/{$smarty.section.foo.iteration}/">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>