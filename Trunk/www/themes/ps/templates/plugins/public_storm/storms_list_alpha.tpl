{assign var=prevcap value=""}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=item_per_col value=$s_count/3}

{t}Liste des Storms triés par ordre alphabêtique :{/t}
<div class="table _100">
	<div class="table-row">
		<div class="table-cell _30">
	
			<ul>
				{foreach from=$storms item=storm}
				{assign var=cap value=$storm.permaname.0}
				{if $cap ne $prevcap}
					{if $loopnum gt $item_per_col|floor}
						</ul></div>
						{assign var=loopnum value=0}
						<div class="table-cell _30"><ul>
					{/if}
					<li class="cap">{$cap|ucfirst}</li>
				{/if}
				{if $storm.root ne ""}<li><a href="{$base_url}/storm/{$storm.permaname|url}/">{$storm.root|ucfirst}</a> <small class="author">({t}by{/t} {$storm.author}</a>)</small></li>{/if}
				{assign var=prevcap value=$cap}
				
				{assign var=loopnum value=$loopnum+1}
				{/foreach}
			</ul>
			
		</div>
	</div>
</div>