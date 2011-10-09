	<div id="pre-footer">
		<div class="table">
			<div class="table-row">
				{if $statuses.public_storm eq 1}
					{include file="plugins/public_storm/storm-pre-footer.tpl" base_url=$base_url}
				{/if}
				
				<div class="table-cell _30">
					
					{if $statuses.articles eq 1}
						{if $articles != ""}
							{include file="plugins/articles/articles.tpl" articles=$articles}
						{/if}
					{/if}
				
					{if $statuses.trackbacks eq 1}
						{if $trackbacks != ""}
							{include file="plugins/trackbacks/trackbacks.tpl" trackbacks=$trackbacks base_url_http=$base_url_http}
						{/if}
					{/if}

					{if false}
						<h3>{t}partagez{/t} </h3>
						<p class="share">
							<iframe src="http://www.facebook.com/plugins/like.php?href=http%253A%252F%252Fpublic-storm.internetcollaboratif.info%252F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none;overflow:hidden;height:80px;" allowTransparency="true"></iframe>
							<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="publicstorm" data-lang="fr">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
							{*<script type="text/javascript" src="http://www.ohloh.net/p/483246/widgets/project_users_logo.js"></script>*}
							<a title="{t}Support Public-Storm by adding it to your stack at Ohloh{/t}" class="ohloh_iusethis" href="http://www.ohloh.net/stack_entries/new?project_id=Public-Storm&amp;amp;ref=WidgetProjectUsersLogo"></a><br />
							{*<a href="http://www.wikio.fr/" target="_blank"><script src="http://www.wikio.fr/getvote?style=capsulewhite" type="text/javascript"></script></a>*}
							<div class="widgetWikioScoreButton layoutCapsule skinWhite">
								<a class="wikioScore">
									<span class="wikioScore_score">1</span>
								</a>
								<a class="wikioBoost" href="http://www.wikio.fr/#vurl={$base_url_http}" target="_blank">
									<span class="wikioBoost_boost">{t}Boost{/t}</span>
								</a>
							</div>
						</p>
					{/if}
				</div>
			</div><!-- table-row -->	
			<div class="table-row">
			</div>
		</div><!-- table -->
	</div><!-- end of pre-footer -->