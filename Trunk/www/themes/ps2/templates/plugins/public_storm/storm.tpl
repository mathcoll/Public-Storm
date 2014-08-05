{assign var=rootCap value=$storm.root|ucfirst}

<div itemscope itemtype="http://data-vocabulary.org/Review" class="pageContent">
	<span itemprop="summary" class="Review">{$title}</span>
	<span itemprop="rating" class="Review">{$rating}</span>
	<span itemprop="best" class="Review">5</span>
	<span itemprop="count" class="Review">{$votes}</span>

<span class="ficheContainer">
	<h3 class="storm"><span>&nbsp;</span><a href="{$storm.url}" itemprop="itemreviewed">{$storm.root|ucfirst}</a></h3>
	<hr />
	<ul>
		<li>
			<label class="sprite date">{t}Création du storm :{/t}</label>
			<time itemprop="dtreviewed" datetime="{$storm.date|date_format:"%Y-%m-%d"}"><span class="data">{$storm.date|date_format:"%a, %d %B %Y %Hh%M:%S GMT"}</span></time>
		</li>
		{if $storm.author_login ne ""}{* should'nt be null ! :-) *}
		<li>
			<label class="sprite author">{t 1=$rootCap}Auteur du storm %1 :{/t}</label>
			<img src="{$avatar}" style="float:right;" alt="{$storm.author|escape}" />
			<span class="data" itemprop="reviewer"><a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a></span><br />
		</li>
		{/if}
		{if $contributors ne ""}{* should'nt be null ! :-) *}
		<li>
			<label class="sprite contributors">{t}Contributeurs :{/t}</label>
			<br />
			<span class="data">
			{foreach from=$contributors name=contribs item=contributor}
				{if $contributor.author_login ne "-anonymous-"}
					<a href="{$base_url}/utilisateurs/{$contributor.author_login}/">{$contributor.author}</a>{if !$smarty.foreach.contribs.last},&nbsp;{/if}
				{else}
					<i>{$contributor.author}</i>{if !$smarty.foreach.contribs.last},&nbsp;{/if}
				{/if}
			{/foreach}
			</span>
		</li>
		{/if}
		<li>
			{if $user.isadmin eq 1}
			<label class="sprite connected">{t}Utilisateurs connectés :{/t}</label>
			<span class="data" id="countSubscribers">1</span>
			{/if}
		</li>
		{if $statuses.sendtoafriend eq 1}
		<li>
			<span class="sprite sendToAFriend"></span>
			<span class="data">
				<a href="{$base_url}/sendtoafriend/form/{$storm.permaname}/" title="{t}Partager avec mes amis{/t}">{t}Partager avec mes amis{/t}</a>
			</span>
		</li>
		{/if}
		<li>
			<span class="sprite stormExport"></span>
			<span class="data">
				<a href="{$base_url}/odsExport/{$storm.permaname}/" title="{t}export2ods{/t}">{t}export2ods{/t}</a> <sup>beta</sup>
			</span>
		</li>
		<li>
			<span class="sprite stormExport"></span>
			<span class="data">
				<a href="{$base_url}/csvExport/{$storm.permaname}/" title="{t}export2csv{/t}">{t}export2csv{/t}</a> <sup>beta</sup>
			</span>
		</li>
		{if $user.logged}
		<li>
			{if $is_favorites eq 0}
				<span class="sprite add-to-favorites"></span>
				<span class="data">
					<a href="{$base_url}/utilisateurs/add-to-favorites/{$storm.permaname}/" title="{t}Ajouter aux favoris{/t}">{t}Ajouter aux favoris{/t}</a>
				</span>
			{else}
				<span class="sprite remove-from-favorites"></span>
				<span class="data">
					<a href="{$base_url}/utilisateurs/remove-from-favorites/{$storm.permaname}/" title="{t}Enlever des favoris{/t}">{t}Enlever des favoris{/t}</a>
				</span>
			{/if}
		</li>
		{/if}
		<li>
			<span class=""></span>
			<span class="data">
				<a href="{$rss_storm}" title="{t}Enlever des favoris{/t}"><img width="14" height="14" align="top" src="{$theme_dir}/img/rss.png" alt="{t 1=$rootCap}Flux Rss des suggestions de '%1'{/t}" title="{t 1=$rootCap}Flux Rss des suggestions de '%1'{/t}" />
				{t 1=$rootCap}Flux Rss des suggestions de '%1'{/t}</a>
			</span>
		</li>
	</ul>

	{*{include file="../openlike/openlike.tpl" rootCap=$rootCap base_url_http=$base_url_http}*}
</span>

<div style="margin:0 0 80px 0">&nbsp;</div>

<div class="line">
	<p>{t 1=$rootCap escape=""}accroche incitation suggestion{/t}</p>
	{*<h4><label for="suggestion">{t 1=$rootCap escape=""}suggest_it{/t}</label></h4>*}
	<form action="{$base_url}/storm/add_suggestion/" method="post" class="suggestion" id="suggestionForm" onsubmit="add_suggestion('{$base_url}'); return false;">
		<input type="hidden" name="storm_id" id="storm_id" value="{$storm.storm_id}" />
		<input type="hidden" name="storm_permaname" id="storm_permaname" value="{$storm.root|ucfirst}" />	
		<label for="suggestion"><img src="{$theme_dir}plugins/public_storm/img/light.png" style="vertical-align:middle;" alt="Suggestion" /></label>
		<input type="text" class="input field" name="suggestion" id="suggestion" value="" onfocus="this.select();" maxlength="140" />
		<input type="submit" value="&gt;" class="ui-state-default ui-corner-all field" />
	</form>
	
	{if $hubs != null}
	<div style="margin:0 0 10px 0">
		<h4 class="viadeo_api" title="{t 1=$rootCap escape=""}Hubs Viadeo liés à '%1'{/t}">{t 1=$rootCap escape=""}Hubs Viadeo liés à '%1'{/t}</h4>
		<ul class="hubs">
		{foreach from=$hubs item=hub}
			<li>
				<a href="{$hub.link}" target="_blank">{$hub.name}</a>
			</li>
		{/foreach}
		</ul>
	</div>
	{/if}
</div>

<div class="line">
	<h4>{t}Suggestions principales{/t}</h4>
	<ol id="storm_{$storm.storm_id}" class="storm">
		{if $storm.suggestions != null}
			{assign var=size value="20"}
			{foreach from=$storm.suggestions item=suggestion}
			<li class="size_{$size} bulle">
				<blockquote title="Suggérée le {$suggestion.date|date_format:"%A %d %B %Y %Hh%M:%S GMT"}">
					<a href="{$base_url}/storm/{$suggestion.suggestion|url}/{$suggestion.suggestion|ucfirst|urlencode}/">{$suggestion.suggestion|ucfirst}</a>
					<span class="size" id="total_{$suggestion.suggestion|url}">({$suggestion.nb})</span>
					<span id="suggestions_{$suggestion.suggestion|url}" class="hidden" style="vertical-align:top;"></span>
					<input type="hidden" name="suggestion" value="{$suggestion.suggestion|url}" />
					<span class="suggest-too" title="{t}Je suggère moi aussi !{/t}"><input type="button" value="+" onclick="suggest_too('{$suggestion.suggestion|escape}', '{$base_url}');" /><span class="inner">{t}Je suggère moi aussi !{/t}</span></span>
				</blockquote>
				<cite>
					{if $suggestion.author_login ne ""}Suggérée par <a href="{$base_url}/utilisateurs/{$suggestion.author_login}/" style="font-size:1em;">{$suggestion.author}</a>, {/if}le {$suggestion.date|date_format:"%A %d %B %Y %Hh%M:%S GMT"}
				</cite>
			</li>
			{assign var=size value=$size-1}
			{/foreach}
		{else}
			<li class="no_suggestion">{t 1=$rootCap}Pas encore de suggestion pour %1{/t}</li>
		{/if}
	</ol>
</div>

{if $cloud1 ne ""}
<div class="line nuage">
	<h4>{t}Autres suggestions{/t}</h4>
	{$cloud1}
</div>
{/if}

{if $user.isadmin eq 1}
<div class="line">
	<span id="meteorStatus">{t}Chargement en cours...{/t}</span>
	<span id="meteorStatusPause" style="float:right;"><a href="#" onclick="javascript:meteorStartStop();return false;">{t}Start / Stop{/t}</a></span>
</div>
{/if}

<hr />

{if $cloud ne ""}
<div class="line nuage">
	<h4>{t 1=$rootCap}Nuage de storms liés à %1{/t}</h4>
	{$cloud}
</div>
{/if}

</div>{* end of div with attribute 'itemtype' *}
