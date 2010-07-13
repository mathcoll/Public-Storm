{setlocale type="all" locale="fr_FR.utf8"}
{assign var=week value=0}
{assign var=year value=0}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/2}
<h3>{t 1=$username}Storms de %1{/t}</h3>
<img src="{$avatar}" alt="{$username|escape}" style="float:left; margin: 10px 5px 0 0;" />
<ul class="nolist">
	<li>{t}Prénom{/t} : {$prenom|ucfirst}</li>
	<li>{t}Nom{/t} : {$nom|ucfirst}</li>
	<li>{t 1=$member_since|date_format:"%d %B %Y"}Membre depuis le %1{/t}</li>
</ul>
<div style="clear:both;">&nbsp;</div>

{if $nb_pages gt 0}
<p>{t}Pages :{/t}</p>
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/utilisateurs/{$login|escape}/{$smarty.section.foo.iteration}/">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>
{/if}

<div class="table _100">
	<div class="table-row">
		<div class="table-cell _50">
		
			<ul class="liste">
				{foreach from=$storms item=storm}
				{if $storm.root ne ""}
					{if $year ne $storm.date|date_format:"%Y"}
						{if $loopnum gt $item_per_col|floor}
							</ul></div>
							{assign var=loopnum value=0}
							<div class="table-cell _50"><ul class="liste">
						{/if}
						<li class="year">{$storm.date|date_format:"%Y"}</li>
					{/if}
					
					{if $week ne $storm.date|date_format:"%W"}
						{if $loopnum gt $item_per_col|floor}
							</ul></div>
							{assign var=loopnum value=0}
							<div class="table-cell _50"><ul class="liste">
						{/if}
						<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%W"}</li>
					{/if}
					<li><a href="{$base_url}/storm/{$storm.permaname|url}/" class="storm">{$storm.root|ucfirst}</a>, créé le {$storm.date|date_format:"%A %d %B %Y %Hh%M GMT"}</li>
					{assign var=week value=$storm.date|date_format:"%W"}
					{assign var=year value=$storm.date|date_format:"%Y"}
				{/if}
				{assign var=loopnum value=$loopnum+1}
				{/foreach}

			</ul>
		</div>
	</div>
</div>

{if $nb_pages gt 0}
<p>{t}Pages :{/t}</p>
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/utilisateurs/{$login|escape}/{$smarty.section.foo.iteration}/">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>
{/if}