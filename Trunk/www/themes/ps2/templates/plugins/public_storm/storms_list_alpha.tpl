{setlocale type="all" locale="fr_FR.utf8"}
{assign var=prevcap value=""}
{assign var=loopnum value=0}
{assign var=s_count value=$storms|@count}
{assign var=base value=$base_url|cat:'/storms/alpha/'}
{assign var=item_per_col value=$s_count/3|ceil}
<p>{t}Liste des Storms triés par ordre alphabêtique :{/t}</p>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}
{*
<div id="abcdaire">
	<a href="#top" title="#" class="actif">#</a>
	<a href="#a" title="A" class="actif">A</a>
	<a href="#b" title="B" class="actif">B</a>
	<a href="#c" title="C" class="actif">C</a>
	<a href="#d" title="D" class="actif">D</a>
	<a href="#e" title="E" class="actif">E</a>
	<a href="#f" title="F" class="actif">F</a>
	<a href="#g" title="G" class="actif">G</a>
	<a href="#h" title="H" class="actif">H</a>
	<a href="#i" title="I" class="actif">I</a>
	<a href="#j" title="J" class="actif">J</a>
	<a href="#k" title="K" class="actif">K</a>
	<a href="#l" title="L" class="actif">L</a>
	<a href="#m" title="M" class="actif">M</a>
	<a href="#n" title="N" class="actif">N</a>
	<a href="#o" title="O" class="actif">O</a>
	<a href="#p" title="P" class="actif">P</a>
	<a href="#q" title="Q" class="actif">Q</a>
	<a href="#r" title="R" class="actif">R</a>
	<a href="#s" title="S" class="actif">S</a>
	<a href="#t" title="T" class="actif">T</a>
	<a href="#u" title="U" class="actif">U</a>
	<a href="#v" title="V" class="actif">V</a>
	<a href="#w" title="W" class="actif">W</a>
	<a href="#x" title="X" class="actif">X</a>
	<a href="#y" title="Y" class="actif">Y</a>
	<a href="#z" title="Z" class="actif">Z</a>
</div>*}

<div class="grid2">
	<ul class="col">
		{foreach from=$storms item=storm}
			{assign var=cap value=$storm.permaname.0}
		
			{if $loopnum ge $item_per_col|floor}
				</ul>
				{assign var=loopnum value=0}
					<ul class="col">
						{if $cap eq $prevcap}
							<li class="cap">{$cap|ucfirst} {t}(suite){/t}</li>
						{/if}
			{/if}
			
			{if $cap ne $prevcap}
				<li class="cap"><a id="{$cap}">{$cap|ucfirst}</a></li>
			{/if}
				
			{if $storm.root ne ""}<li>{if $storm.hearts}<span class="sprite heart1" title="{t}I love this Storm !{/t}"></span>{/if} <a href="{$base_url}/storm/{$storm.permaname}/" class="storm">{$storm.root|ucfirst}</a>{if $storm.author_login ne ""} <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author|ucwords}</a>)</small>{/if}</li>{/if}
	
			{assign var=prevcap value=$cap}
			{assign var=loopnum value=$loopnum+1}
		{/foreach}
	</ul>
</div>

{include file="pagination.tpl" base=$base nb_pages=$nb_pages current_page=$current_page base_url_http=$base_url_http}