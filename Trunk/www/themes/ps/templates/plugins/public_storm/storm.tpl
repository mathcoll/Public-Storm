{setlocale type="all" locale="fr_FR.utf8"}
<div class="table">
	<div class="table-row">
		<div class="table-cell _70">
			<h3 class="storm"><a href="{$storm.url}">{$storm.root|ucfirst}</a></h3>
			<div class="left">
				{assign var=rootCap value=$storm.root|ucfirst}
				<h4><label for="suggestion">{t 1=$rootCap escape=""}suggest_it{/t}</label></h4>
				<form action="{$base_url}/storm/add_suggestion/" method="post" class="suggestion" id="suggestionForm" onsubmit="add_suggestion('{$base_url}'); return false;">
					<input type="hidden" name="storm_id" id="storm_id" value="{$storm.storm_id}" />	
					<label for="suggestion"><img src="{$theme_dir}plugins/public_storm/img/light.png" style="vertical-align:middle;" alt="Suggestion" /></label>
					<input type="text" class="input" name="suggestion" id="suggestion" value="" onfocus="this.select();" maxlength="140" />
					<input type="submit" value="&gt;" />
				</form>
					
				<ul id="storm_{$storm.storm_id}" class="storm">
				{if $storm.suggestions != null}
					{assign var=size value="20"}
					{foreach from=$storm.suggestions item=suggestion}
					<li class="size_{$size} bulle">
						<blockquote title="Suggérée le {$suggestion.date|date_format:"%A %d %B %Y %Hh%M:%S GMT"}">
							<a href="{$base_url}/storm/{$suggestion.suggestion|url}/">{$suggestion.suggestion|ucfirst}</a>
							<span class="size" id="total_{$suggestion.suggestion|url}">({$suggestion.nb})</span>
							<span id="suggestions_{$suggestion.suggestion|url}" class="hidden" style="vertical-align:top;"></span>
							<input type="hidden" name="suggestion" value="{$suggestion.suggestion|url}" />
							<span class="suggest-too" title="{t}Je suggère moi aussi !{/t}"><input type="button" value="+" onclick="suggest_too('{$suggestion.suggestion|escape}', '{$base_url}');" /></span>
						</blockquote>
						<cite>
							Suggérée par xxxxxx, le {$suggestion.date|date_format:"%A %d %B %Y %Hh%M:%S GMT"}
						</cite>
					</li>
					{assign var=size value=$size-1}
				
					{/foreach}
				{else}
					<li class="no_suggestion">{$i18n.no_suggestion|sprintf:$storm.root|ucfirst}</li>
				{/if}
				</ul>
				<script>
				{literal}
				/*
	        	$jQuery(document).ready( function() {
					$jQuery('.input').keypress(function(e) {
						if(e.which == 13) {
							$jQuery(this).blur();
							$jQuery('#suggestionForm').focus().click();
						}
						$jQuery('#suggestion').focus();
					});
	        	});
	        	*/
				{/literal}
				</script>
			</div><!-- //left-->
			<!--<div class="right neato">
				<div id="map" class="smallmap"></div>
				<script defer="defer" type="text/javascript">
				{literal}
				var map, layer;
				function init()
				{
					map = new OpenLayers.Map( 'map' );
					layer = new OpenLayers.Layer.OSM( "Simple OSM Map");
					map.addLayer(layer);
					map.zoomToMaxExtent();
				}
				{/literal}
				</script>
			</div>-->
			
			<div class="right">
				<div class="pancontainer" data-orient="center" data-canzoom="yes" style="width:420px; height:500px;">
					<img src="{$cache_dir_http}{$storm.storm_id}.dot.jpg" id="neato" style="width:480px;" />
				</div>
			</div>
		</div>
		
		<div class="table-cell _30">
			<div style="clear:both;margin-top:15px;">&nbsp;</div>
			
			<div class="fiche">		
				<h4>{$i18n.fiche|sprintf:$rootCap}</h4>
				<label class="date">{t}Création du storm :{/t}</label>
					<span class="data">{$storm.date|date_format:"%a, %d %B %Y %Hh%M:%S GMT"}</span><br />
				<label class="author">{t}Auteur du storm :{/t}</label>
					<span class="data">{$storm.author}</span><br />
				<!--<label class="connected">{t}Utilisateurs connectés :{/t}</label>
					<span class="data"></span>
				-->
			</div><!-- //fiche -->

			{if $cloud ne ""}
			<div class="nuage">
				<h4>{t}nuage{/t}</h4>
				{$cloud}
			</div><!-- //nuage -->
			<div class="clearboth" style="padding: 0 0 20px 0;"></div>
			{/if}
			
			<div style="clear:both;">&nbsp;</div>
			<div class="outils">
				<h4>{t}outils{/t}</h4>
				<ul>
					<li><a href="{$base_url}/odsExport/{$storm.permaname|url}/" class="stormExport">{t}export2ods{/t}</a></li>
					<li>{include file="../share/share.tpl" base_url_http=$base_url_http}</li>
				</ul>
			</div><!-- //outils -->
		</div>
	</div>
</div>

<div style="clear:both;">&nbsp;</div>