{setlocale type="all" locale="fr_FR.utf8"}
{assign var=week value=0}
{assign var=year value=0}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/2|ceil}
{assign var=base value=$base_url|cat:'/storms/'}
<p>{t}Liste des derniers Storms créés :{/t}</p>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}

<div class="table _100">
	<div class="table-row">
		<div class="table-cell _50">
		
			<ul class="liste">
				{foreach from=$storms item=storm}
				{if $storm.root ne ""}
					{if $year ne $storm.date|date_format:"%Y"}
						<li class="year">{$storm.date|date_format:"%Y"}</li>
					{/if}
					
					{if $loopnum ge $item_per_col|floor}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _50">
							<ul class="liste">
								{if $week eq $storm.date|date_format:"%W"}
									<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%W"} {t}(suite){/t}</li>
								{/if}
					{/if}
					
					{if $week ne $storm.date|date_format:"%W"}
						<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%W"}</li>
					{/if}
					
					{if $loopnum ge $item_per_col|floor}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _50"><ul class="liste">
					{/if}
					
					<li>
						{if $storm.hearts}<span class="heart1" title="{t}I love this Storm !{/t}"></span>{/if} <a href="{$base_url}/storm/{$storm.permaname}/" class="storm">{$storm.root|ucfirst}</a><br />
						{if $storm.author_login ne ""}
							{t escape="" 1=$base_url 2=$storm.author_login 3=$storm.author}créé par <a href="%1/utilisateurs/%2/">%3</a>{/t}
						{/if}
						{t 1=$storm.date|date_format:"%A %d %B %Y %Hh%M GMT"}le %1{/t}
					</li>
					{assign var=week value=$storm.date|date_format:"%W"}
					{assign var=year value=$storm.date|date_format:"%Y"}
				{/if}
				{assign var=loopnum value=$loopnum+1}
				{/foreach}

			</ul>
		</div>
	</div>
</div>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}