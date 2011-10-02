
	<div id="footer">
		&copy; Internet Collaboratif 2009-{$smarty.now|date_format:'%Y'}<br />
		{t}Nous contacter :{/t} <a href="mailto:contact@internetcollaboratif.info">contact@internetcollaboratif.info</a><br />
		<a href="{$base_url}/articles/a-propos/">{t}a_propos{/t}</a><br />
		<a href="{$base_url}/">{$site_name} {t}version{/t} {$version}</a><br />
	</div><!-- end of footer -->
</div><!-- end of page -->
<a href="javascript:habillage_sondage();" title="Sondage Public-Storm" id="a_habillage"></a>
</div><!-- end of habillage -->

{if $statuses.analytics eq 1}{include file="plugins/analytics/analytics.tpl" analytics=$plugins.analytics}{/if}
	<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
	  {literal}{lang: 'fr'}{/literal}
	</script>
</body>
</html>