{assign var=week value=0}
{assign var=year value=0}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/2}
<h3>{t}mes_storms{/t}</h3>

{include file="./pagination.tpl" tabbed=true login=$login nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}

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
							<div class="table-cell _50">
								<ul class="liste">
								{if $week eq $storm.date|date_format:"%W"}
									<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%W"} {t}(suite){/t}</li>
								{/if}
						{/if}
						<li class="cap">{t}Semaine{/t} {$storm.date|date_format:"%W"}</li>
					{/if}
					<li>
						{if $storm.hearts}<span class="sprite heart1" title="{t}I love this Storm !{/t}"></span>{/if} <a href="{$base_url}/storm/{$storm.permaname}/" class="storm">{$storm.root|ucfirst}</a>
						<a href="/backend/storm/{$storm.permaname}/rss.php"><img width="14" height="14" align="top" src="{$theme_dir}/img/rss.png" alt="{t 1=$storm.permaname}Flux Rss des suggestions de '%1'{/t}" title="{t 1=$storm.permaname}Flux Rss des suggestions de '%1'{/t}" /></a>, {$storm.date|date:"d/m/Y"}
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

{include file="./pagination.tpl" tabbed=true login=$login nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}