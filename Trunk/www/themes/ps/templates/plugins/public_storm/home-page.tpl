<div id="intro">
	<div class="table">
		<div class="table-row">
			<div class="table-cell _30 title">
				<h3>{t}intro_accroche{/t}</h3>
				<ul class="accroche">
				{foreach from=$storms item=storm name=liste}
					<li><a href="{$storm.url}">{$storm.root|ucfirst}</a>{if $storm.author_login ne ""} <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a>)</small>{/if}</li>
				{/foreach}
					<li><a href="{$base_url}/storms/">...</a></li>
				</ul>
				<a href="#" onclick="add_storm('{$base_url}', 'create_storm2');return false;" >{t}...ou créez un nouveau storm !{/t}</a>
				<span id="create_storm2"></span>
			</div>
			
			<div class="table-cell _100 right" id="screen">
				<div id="menu" class="intro">
					<ol class="navigation ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
						<li class="ui-state-default ui-corner-top" onmouseover="$jQuery(this).addClass('ui-state-hover');" onmouseout="$jQuery(this).removeClass('ui-state-hover');"><a href="#tab1" onclick="_gaq.push(['_trackEvent', 'tab1', 'clicked']);"><span class="free">1</span>. {t}intro_title1{/t}</a></li>
						<li class="ui-state-default ui-corner-top" onmouseover="$jQuery(this).addClass('ui-state-hover');" onmouseout="$jQuery(this).removeClass('ui-state-hover');"><a href="#tab2" onclick="_gaq.push(['_trackEvent', 'tab2', 'clicked']);"><span class="free">2</span>. {t}intro_title2{/t}</a></li>
						<li class="ui-state-default ui-corner-top" onmouseover="$jQuery(this).addClass('ui-state-hover');" onmouseout="$jQuery(this).removeClass('ui-state-hover');"><a href="#tab3" onclick="_gaq.push(['_trackEvent', 'tab3', 'clicked']);"><span class="free">3</span>. {t}intro_title3{/t}</a></li>
						<li class="ui-state-default ui-corner-top" onmouseover="$jQuery(this).addClass('ui-state-hover');" onmouseout="$jQuery(this).removeClass('ui-state-hover');"><a href="#tab4" onclick="_gaq.push(['_trackEvent', 'tab4', 'clicked']);"><span class="free">4</span>. {t}intro_title4{/t}</a></li>
					</ol>
				</div>
				<div class="clearboth"></div>
				<div class="scroll">
					<div class="scrollContainer">
						<div id="tab1" class="panel">
							<img src="{$theme_dir}img/creer_storms.png" title="{t}intro_title1{/t}" alt="{t}intro_title1{/t}" width="320" height="320" />
							<h4>{t}intro_title1{/t}</h4>
							<ul class="panel-desc">
								<li>{t}intro_p1{/t}</li>
								<li class="icon">
									<a href="#tab2"><button type="button" class="fg-button ui-state-default ui-corner-all" onclick="_gaq.push(['_trackEvent', 'tab2', 'clicked']);">&gt;</button></a>
								</li>
							</ul>
						</div>
						<div id="tab2" class="panel">
							<img src="{$theme_dir}img/suggest.png" title="{t}intro_title2{/t}" alt="{t}intro_title2{/t}" width="320" height="320" />
							<h4>{t}intro_title2{/t}</h4>
							<ul class="panel-desc">
								<li class="icon">
									<a href="#tab1"><button type="button" class="fg-button ui-state-default ui-corner-all" onclick="_gaq.push(['_trackEvent', 'tab1', 'clicked']);">&lt;</button></a>
								</li>
								<li>{t}intro_p2{/t}</li>
								<li class="icon">
									<a href="#tab3"><button type="button" class="fg-button ui-state-default ui-corner-all" onclick="_gaq.push(['_trackEvent', 'tab3', 'clicked']);">&gt;</button></a>
								</li>
							</ul>
						</div>
						<div id="tab3" class="panel">
							<img src="{$theme_dir}img/export.png" title="{t}intro_title3{/t}" alt="{t}intro_title3{/t}" width="320" height="320" />
							<h4>{t}intro_title3{/t}</h4>
							<ul class="panel-desc">
								<li class="icon">
									<a href="#tab2"><button type="button" class="fg-button ui-state-default ui-corner-all" onclick="_gaq.push(['_trackEvent', 'tab2', 'clicked']);">&lt;</button></a>
								</li>
								<li>{t}intro_p3{/t}</li>
								<li class="icon">
									<a href="#tab4"><button type="button" class="fg-button ui-state-default ui-corner-all" onclick="_gaq.push(['_trackEvent', 'tab4', 'clicked']);">&gt;</button></a>
								</li>
							</ul>
						</div>
						<div id="tab4" class="panel">
							<img src="{$theme_dir}img/creer_storms.png" title="{t}intro_title4{/t}" alt="{t}intro_title4{/t}" width="320" height="320" />
							<h4>{t}intro_title4{/t}</h4>
							<ul class="panel-desc">
								<li class="icon">
									<a href="#tab3"><button type="button" class="fg-button ui-state-default ui-corner-all" onclick="_gaq.push(['_trackEvent', 'tab3', 'clicked']);">&lt;</button></a>
								</li>
								<li>{t escape=""}intro_p4{/t}</li>
							</ul>
						</div>
					</div><!-- //scrollContainer -->
				</div><!-- //scroll -->
			</div>
		</div>
	</div>
</div><!-- intro -->