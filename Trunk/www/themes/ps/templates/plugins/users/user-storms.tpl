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

{include file="./pagination.tpl" tabbed=false login=$login nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}

<div class="table _100">
	<div class="table-row">
		<div class="table-cell _50">
			<ul class="liste">
				{foreach from=$storms item=storm}
				{if $storm.root ne ""}
					{if $year ne $storm.date|date_format:"%Y"}
						<li class="year">{$storm.date|date_format:"%Y"}</li>
					{/if}
					
					{if $loopnum ge $item_per_col|ceil}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _50"><ul class="liste">
					{/if}
					{if $week ne $storm.date|date_format:"%W"}
						<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%W"}</li>
					{/if}
					{if $loopnum ge $item_per_col|ceil}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _50"><ul class="liste">
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

{include file="./pagination.tpl" tabbed=false login=$login nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}