
	<div id="footer">
		&copy; Internet Collaboratif 2009-{$smarty.now|date_format:'%Y'}<br />
		{t}Nous contacter :{/t} <a href="mailto:contact@internetcollaboratif.info">contact@internetcollaboratif.info</a><br />
		<a href="{$base_url}/articles/a-propos/">{t}a_propos{/t}</a><br />
		<a href="{$base_url}/">{$site_name} {t}version{/t} {$version}</a><br />
	</div><!-- end of footer -->
</div><!-- end of page -->
{*<a href="https://play.google.com/store/apps/details?id=info.internetcollaboratif.publicstorm.app&utm_source=skin&utm_medium=website&utm_term=key1-link-to-app&utm_campaign=Public-Storm" title="{t}Public-Storm-App sur Play{/t}" id="a_habillage"></a>*}
</div><!-- end of habillage -->

{if $statuses.analytics eq 1}{include file="plugins/analytics/analytics.tpl" analytics=$plugins.analytics}{/if}
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
	  {literal}{lang: 'fr'}{/literal}
	</script>
{if $user.isadmin eq 1}{if $statuses.php_bug_lost eq 1}{$bl_debug}{/if}{/if}
</body>
</html>