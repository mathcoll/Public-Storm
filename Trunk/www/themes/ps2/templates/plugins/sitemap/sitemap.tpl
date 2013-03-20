<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="{$base_url_http}/gsitemap.xsl"?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
{foreach from=$storms item=storm}
	{if $storm.permaname ne ""}
	<url>
		<loc>{$base_url_http}/storm/{$storm.permaname}/</loc>
		<lastmod>{$smarty.now|date_format:"%Y-%m-%dT%k:%M:00+00:00"}</lastmod>
		<changefreq>hourly</changefreq>
		<priority>0.8</priority>
	</url>
	{/if}
{/foreach}
{foreach from=$users item=user}
	<url>
		<loc>{$base_url_http}/utilisateurs/{$user.login}/</loc>
		<lastmod>{$smarty.now|date_format:"%Y-%m-%dT%k:%M:00+00:00"}</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.5</priority>
	</url>
{/foreach}
</urlset>