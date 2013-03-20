{assign var=week value=0}
{assign var=year value=0}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/2|ceil}
{assign var=base value=$base_url|cat:'/storms/'}
<p>{t}Liste des derniers Storms créés :{/t}</p>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}

<div class="grid2">
	<ul class=col>
		{foreach from=$storms item=storm}
		{if $storm.root ne ""}
			{if $year ne $storm.date|date_format:"%Y"}
				<li class="year">{$storm.date|date_format:"%Y"}</li>
			{/if}
			
			{if $loopnum ge $item_per_col|floor}
				</ul>
				{assign var=loopnum value=0}
					<ul class="col">
						{if $week eq $storm.date|date_format:"%V"}
							<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%V"} {t}(suite){/t}</li>
						{/if}
			{/if}
			
			{if $week ne $storm.date|date_format:"%V"}
				<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%V"}</li>
			{/if}
			
			<li>
				{if $storm.hearts}<span class="sprite heart1" title="{t}I love this Storm !{/t}"></span>{/if} <a href="{$base_url}/storm/{$storm.permaname}/" class="storm">{$storm.root|ucfirst}</a><br />
				{if $storm.author_login ne ""}
					{t escape="" 1=$base_url 2=$storm.author_login 3=$storm.author|ucwords}{t}créé par{/t} <a href="%1/utilisateurs/%2/">%3</a>{/t}
				{/if}
				{$storm.date|date:"d/m/Y"}
			</li>
			{assign var=week value=$storm.date|date_format:"%V"}
			{assign var=year value=$storm.date|date_format:"%Y"}
		{/if}
		{assign var=loopnum value=$loopnum+1}
		{/foreach}
	</ul>
</div>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}