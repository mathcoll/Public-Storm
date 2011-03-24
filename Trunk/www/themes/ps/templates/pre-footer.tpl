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
							{include file="plugins/trackbacks/trackbacks.tpl" trackbacks=$trackbacks base_url=$base_url}
						{/if}
					{/if}
					
					<h3>{t}partagez{/t}</h3>
					<iframe src="http://www.facebook.com/plugins/like.php?href=http%253A%252F%252Fpublic-storm.internetcollaboratif.info%252F&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;font&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none;overflow:hidden;height:80px;" allowTransparency="true"></iframe>
					<script type="text/javascript" src="http://www.ohloh.net/p/483246/widgets/project_users_logo.js"></script><br />
					<a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="publicstorm" data-lang="fr">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				</div>
			</div><!-- table-row -->	
		</div><!-- table -->
	</div><!-- end of pre-footer -->