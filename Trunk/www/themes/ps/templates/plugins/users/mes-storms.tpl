{setlocale type="all" locale="fr_FR.utf8"}
{assign var=week value=0}
{assign var=year value=0}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/2}
<h3>{t}mes_storms{/t}</h3>

{include file="./pagination.tpl" login=$login nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}

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

{include file="./pagination.tpl" login=$login nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}