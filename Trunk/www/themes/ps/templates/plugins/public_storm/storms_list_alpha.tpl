{setlocale type="all" locale="fr_FR.utf8"}
{assign var=prevcap value=""}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=base value=$base_url|cat:'/storms/alpha/'}
{assign var=item_per_col value=$s_count/3|ceil}
<p>{t}Liste des Storms triés par ordre alphabêtique :{/t}</p>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}

<div class="table _100">
	<div class="table-row">
		<div class="table-cell _30">
	
			<ul class="liste">
				{foreach from=$storms item=storm}
					{assign var=cap value=$storm.permaname.0}
				
					{if $loopnum ge $item_per_col|floor}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _30">
							<ul class="liste">
								{if $cap eq $prevcap}
									<li class="cap">{$cap|ucfirst} {t}(suite){/t}</li>
								{/if}
					{/if}
					
					{if $cap ne $prevcap}
						<li class="cap">{$cap|ucfirst}</li>
					{/if}
						
					{if $storm.root ne ""}<li>{if $storm.hearts}<span class="sprite heart1" title="{t}I love this Storm !{/t}"></span>{/if} <a href="{$base_url}/storm/{$storm.permaname}/" class="storm">{$storm.root|ucfirst}</a>{if $storm.author_login ne ""} <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author|ucwords}</a>)</small>{/if}</li>{/if}
			
					{assign var=prevcap value=$cap}
					{assign var=loopnum value=$loopnum+1}
				{/foreach}
			</ul>
			
		</div>
	</div>
</div>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}