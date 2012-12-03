<h3>{t}Mes favoris{/t}</h3>

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
				{if $storm.root ne ""}<li>
					{if $storm.hearts}<span class="sprite heart1" title="{t}I love this Storm !{/t}"></span>{/if} <a href="{$base_url}/storm/{$storm.permaname}/" class="storm">{$storm.root|ucfirst}</a>
					<a href="/backend/storm/{$storm.permaname}/rss.php"><img width="14" height="14" align="top" src="{$theme_dir}/img/rss.png" alt="{t 1=$storm.permaname}Flux Rss des suggestions de '%1'{/t}" title="{t 1=$storm.permaname}Flux Rss des suggestions de '%1'{/t}" /></a>
					{if $storm.author_login ne ""} <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a>, {$storm.date|date:"d/m/Y"})</small>{/if}
				</li>{/if}
				{assign var=prevcap value=$cap}
				
				{assign var=loopnum value=$loopnum+1}
				{/foreach}
			</ul>
			
		</div>
	</div>
</div>