<div class="table-cell _30">
	<h3>{t}storms{/t}</h3>
	<ul>
		<li><a href="{$base_url}/storms/alpha/">{t}list_alpha{/t}</a></li>
		<li><a href="{$base_url}/storms/">{t}list_date{/t}</a></li>
	</ul>
	
	<h3>{t}plus_actifs{/t}</h3>
	<ul>
	{foreach from=$storms item=storm name=liste}<li><a href="{$storm.url}">{$storm.root|ucfirst}</a>{if $storm.author_login ne ""} <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a>)</small>{/if}</li>{/foreach}
	</ul>
	
	<h3>{t}Les plus appréciés{/t}</h3>
	<ul>
	{foreach from=$storms_note item=storm name=liste}
		<li><a href="{$storm.url}">{$storm.root|ucfirst}</a><span class="heart{$storm.hearts}"></span></li>
	{/foreach}
	</ul>
</div>
<div class="table-cell _30">
	<h3>{t}contribuez{/t}</h3>
	<p>{t}contribuez_p1{/t}</p>
	<p>{t}contribuez_p2{/t}</p>
	<p>{t escape=""}contribuez_p3{/t}</p>
	<p>{t escape="" 1=$base_url}contribuez_p4{/t}</p>
	
	<h3>{t}discutez{/t}</h3>
	<p>{t}discutez_p1{/t}</p>
	<p><small><a href="mailto:contact@internetcollaboratif.info?subject={t}Mon avis sur Public-Storm{/t}">contact@internetcollaboratif.info</a></small></p>
	
	<h3>{t}telechargez{/t}</h3>
	<p>{t}telechargez_p1{/t}</p>
	<p>{t escape=""}telechargez_p2{/t}</p>
	
</div>