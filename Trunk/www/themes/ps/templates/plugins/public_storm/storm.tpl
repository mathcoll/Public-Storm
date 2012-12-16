{assign var=rootCap value=$storm.root|ucfirst}

<div itemscope itemtype="http://data-vocabulary.org/Review" class="pageContent">
	<span itemprop="summary" class="Review">{$title}</span>
	<span itemprop="rating" class="Review">{$rating}</span>
	<span itemprop="count" class="Review">{$votes}</span>

<h3 class="storm"><a href="{$storm.url}" itemprop="itemreviewed">{$storm.root|ucfirst}</a></h3>
<div class="right">
	<a href="{$rss_storm}">
		<img width="14" height="14" align="top" src="{$theme_dir}/img/rss.png" alt="{t 1=$rootCap}Flux Rss des suggestions de '%1'{/t}" title="{t 1=$rootCap}Flux Rss des suggestions de '%1'{/t}" />
		{t 1=$rootCap}Flux Rss des suggestions de '%1'{/t}
	</a>
</div>
<div style="margin:0 0 20px 0">&nbsp;</div>

<div class="table">
	<div class="table-row">
{* column 1 *}
		<div class="table-cell _w200">
			<div class="fiche">
				<div class="ficheContainer _w200">
					<label class="sprite date">{t}Création du storm :{/t}</label>
						<time itemprop="dtreviewed" datetime="{$storm.date|date_format:"%Y-%m-%d"}"><span class="data">{$storm.date|date_format:"%a, %d %B %Y %Hh%M:%S GMT"}</span></time><br />
					{if $storm.author_login ne ""}{* should'nt be null ! :-) *}
						<label class="sprite author">{t 1=$rootCap}Auteur du storm %1 :{/t}</label>
						<img src="{$avatar}" style="float:right;" alt="{$storm.author|escape}" />
							<span class="data" itemprop="reviewer"><a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a></span><br />
						<br />
					{/if}
					{if $contributors ne ""}{* should'nt be null ! :-) *}
					<label class="sprite contributors">{t}Contributeurs :{/t}</label>
						<ul>
							{foreach from=$contributors item=contributor}
								<li>
									{if $contributor.author_login ne "-anonymous-"}
										<a href="{$base_url}/utilisateurs/{$contributor.author_login}/">{$contributor.author}</a>
									{else}
										<i>{$contributor.author}</i>
									{/if}
								</li>
							{/foreach}
						</ul>
						<br />
					{/if}

					{if $user.isadmin eq 1}
					<label class="sprite connected">{t}Utilisateurs connectés :{/t}</label>
						<span class="data" id="countSubscribers"></span>
						<br />
					{/if}

					<ul class="tools">
						{if $statuses.sendtoafriend eq 1}<li><a href="{$base_url}/sendtoafriend/form/{$storm.permaname}/" title="{t}Partager avec mes amis{/t}"><span class="sprite sendToAFriend"></span>{t}Partager avec mes amis{/t}</a></li>{/if}
						<li><a href="{$base_url}/odsExport/{$storm.permaname}/"><span class="sprite stormExport"></span>{t}export2ods{/t}</a></li>
						<li><a href="{$base_url}/csvExport/{$storm.permaname}/"><span class="sprite stormExport"></span>{t}export2csv{/t}</a></li>
						{if $user.logged}
							{if $is_favorites eq 0}
								<li><a href="{$base_url}/utilisateurs/add-to-favorites/{$storm.permaname}/"><span class="sprite add-to-favorites"></span>{t}Ajouter aux favoris{/t}</a></li>
							{else}
								<li><a href="{$base_url}/utilisateurs/remove-from-favorites/{$storm.permaname}/"><span class="sprite remove-from-favorites"></span>{t}Enlever des favoris{/t}</a></li>
							{/if}
						{/if}
					</ul>
				</div><!-- //fiche container -->
			</div><!-- //fiche -->
			
			{include file="../openlike/openlike.tpl" rootCap=$rootCap base_url_http=$base_url_http}
		</div>

{* column 2 *}
		<div class="table-cell _w300 sprite accroche-suggestion">
			<p>
				{t 1=$rootCap escape=""}accroche incitation suggestion{/t}
			</p>
			{*<h4><label for="suggestion">{t 1=$rootCap escape=""}suggest_it{/t}</label></h4>*}
			<form action="{$base_url}/storm/add_suggestion/" method="post" class="suggestion" id="suggestionForm" onsubmit="add_suggestion('{$base_url}'); return false;">
				<input type="hidden" name="storm_id" id="storm_id" value="{$storm.storm_id}" />
				<input type="hidden" name="storm_permaname" id="storm_permaname" value="{$storm.root|ucfirst}" />	
				<label for="suggestion"><img src="{$theme_dir}plugins/public_storm/img/light.png" style="vertical-align:middle;" alt="Suggestion" /></label>
				<input type="text" class="input field" name="suggestion" id="suggestion" value="" onfocus="this.select();" maxlength="140" />
				<input type="submit" value="&gt;" class="ui-state-default ui-corner-all field" />
			</form>
			
			<div style="margin:0 0 10px 0">&nbsp;</div>
			{if $user.logged}
				<p><a href="#" onclick="add_storm('{$base_url}', 'create_storm');return false;">{t}ajouter_un_storm{/t}</a></p>
			{else}
				<p><a href="{$base_url}/utilisateurs/creer-un-compte.php">{t}creer_un_compte{/t}</a> - <a href="{$base_url}/utilisateurs/mot-de-passe-oublie.php">{t}mot_de_passe_oublie{/t}</a></p>
			{/if}
			
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

{* column 3 *}
		<div class="table-cell  _w500">
			<div class="table">
				<div class="table-row">
					<div class="table-cell _50">
						<h4>{t}Suggestions principales{/t}</h4>
						<ul id="storm_{$storm.storm_id}" class="storm">
							{if $storm.suggestions != null}
								{assign var=size value="20"}
								{foreach from=$storm.suggestions item=suggestion}
								<li class="size_{$size} bulle">
									<blockquote title="Suggérée le {$suggestion.date|date_format:"%A %d %B %Y %Hh%M:%S GMT"}">
										<a href="{$base_url}/storm/{$suggestion.suggestion|url}/{$suggestion.suggestion|ucfirst|urlencode}/">{$suggestion.suggestion|ucfirst}</a>
										<span class="size" id="total_{$suggestion.suggestion|url}">({$suggestion.nb})</span>
										<span id="suggestions_{$suggestion.suggestion|url}" class="hidden" style="vertical-align:top;"></span>
										<input type="hidden" name="suggestion" value="{$suggestion.suggestion|url}" />
										<span class="suggest-too" title="{t}Je suggère moi aussi !{/t}"><input type="button" value="+" onclick="suggest_too('{$suggestion.suggestion|escape}', '{$base_url}');" /></span>
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
						</ul>
					</div>
					
					<div class="table-cell _50">
						{if $cloud1 ne ""}
						<div class="nuage _100">
							<h4>{t}Autres suggestions{/t}</h4>
							{$cloud1}
						</div>
						{/if}
					</div>
				</div>
			</div>

			{if $user.isadmin eq 1}
				<span id="meteorStatus">{t}Chargement en cours...{/t}</span>
				<span id="meteorStatusPause" style="float:right;"><a href="#" onclick="javascript:meteorStartStop();">{t}Start / Stop{/t}</a></span>
			{/if}
			
			<hr />
			
			{if $cloud ne ""}
			<div class="nuage">
				<h4>{t 1=$rootCap}Nuage de storms liés à %1{/t}</h4>
				{$cloud}
			</div>
			{/if}
			<applet 
                name="wordle" 
                mayscript="mayscript" 
                code="wordle.WordleApplet.class"
                codebase="http://wordle.appspot.com" 
                archive="/j/v1373/wordle.jar" 
                width="100%" height="400">
                
                <param name="colorwordcounts" value="{$wordle}"/>
                <param name="bg" value="FFFFFF"/>
                
                <param name="java_arguments" value="-Xmx256m -Xms64m">
                Your browser doesn't seem to understand the APPLET tag.
                You need to install and enable the <a href="http://java.com/">Java</a> plugin.
        	</applet>
		</div>
	</div>
</div>
			
{*
<div class="pancontainer" data-orient="center" data-canzoom="yes" style="width:410px; height:500px;">
	<img src="{$cache_dir_http}{$storm.storm_id}.jpg" id="neato" style="width:480px;" />
</div>
*}
</div>{* end of div with attribute 'itemtype' *}
