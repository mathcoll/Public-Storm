<div id="intro">
	<div class="table">
		<div class="table-row">
			<div class="table-cell _30 title">
				<h3>{t}intro_accroche{/t}</h3>
				<ul class="accroche">
				{foreach from=$storms item=storm name=liste}
					<li><a href="{$storm.url}">{$storm.root|ucfirst}</a> <small class="author">({t}by{/t} <a href="{$base_url}/utilisateurs/{$storm.author_login}/">{$storm.author}</a>)</small></li>
				{/foreach}
					<li><a href="{$base_url}/storms/">...</a></li>
				</ul>
				<a href="#" onclick="add_storm('{$base_url}', 'create_storm2');return false;" >{t}...ou créez un nouveau storm !{/t}</a>
				<span id="create_storm2"></span>
			</div>
			
			<div class="table-cell _100 right" id="screen">
				<div id="menu" class="intro">
					<ol class="navigation">
						<li><a href="#tab1" onclick="_gaq.push(['_trackEvent', 'tab1', 'clicked']);">{t}intro_title1{/t}</a></li>
						<li><a href="#tab2" onclick="_gaq.push(['_trackEvent', 'tab2', 'clicked']);">{t}intro_title2{/t}</a></li>
						<li><a href="#tab3" onclick="_gaq.push(['_trackEvent', 'tab3', 'clicked']);">{t}intro_title3{/t}</a></li>
					</ol>
				</div>
				<div class="clearboth"></div>
				<div class="scroll">
					<div class="scrollContainer">
						<div id="tab1" class="panel">
							<img src="{$theme_dir}img/creer_storms.png" width="345" height="347" title="{t}intro_title1{/t}" alt="{t}intro_title1{/t}" />
							<h4>{t}intro_title1{/t}</h4>
							<p>{t}intro_p1{/t}</p>
							<p><a href="#tab2" onclick="_gaq.push(['_trackEvent', 'tab2', 'clicked']);">&gt;&gt;</a></p>
						</div>
						<div id="tab2" class="panel">
							<img src="{$theme_dir}img/suggest.png" width="345" height="348" title="{t}intro_title2{/t}" alt="{t}intro_title2{/t}" />
							<h4>{t}intro_title2{/t}</h4>
							<p>{t}intro_p2{/t}</p>
							<p><a href="#tab1" onclick="_gaq.push(['_trackEvent', 'tab1', 'clicked']);">&lt;&lt;</a> <a href="#tab3" onclick="_gaq.push(['_trackEvent', 'tab3', 'clicked']);">&gt;&gt;</a></p>
						</div>
						<div id="tab3" class="panel">
							<img src="{$theme_dir}img/export.png" width="345" height="348" title="{t}intro_title3{/t}" alt="{t}intro_title3{/t}" />
							<h4>{t}intro_title3{/t}</h4>
							<p>{t}intro_p3{/t}</p>
							<p><a href="#tab2" onclick="_gaq.push(['_trackEvent', 'tab2', 'clicked']);">&lt;&lt;</a></p>
						</div>
					</div><!-- //scrollContainer -->
				</div><!-- //scroll -->
			</div>
		</div>
	</div>
</div><!-- intro -->