<?xml version="1.0" encoding="UTF-8"?>
{setlocale type="all" locale="en_US.utf8"}

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>{$title}, {t}baseline{/t}</title>
		<link>{$base_url_http}</link>
		<description>{t}baseline{/t}, {$site_description}</description>
		<language>fr-fr</language>
		<pubDate>{$date}</pubDate>
		<lastBuildDate>{$date}</lastBuildDate>
		<generator>{$rss_generator}</generator>
		<managingEditor>{$rss_managingeditor}</managingEditor>
		<webMaster>{$rss_webmaster}</webMaster>
		<atom:link href="{$base_url_http}/backend/rss.php" rel="self" type="application/rss+xml" />
		<ttl>60</ttl>
		<image>
			<title>{$title}, {t}baseline{/t}</title>
			<url>{$theme_dir_http}img/logo.jpg</url>
			<link>{$base_url_http}?utm_source=backendMeteor&amp;utm_medium=rss&amp;utm_campaign={$version}</link>
			<width>73</width>
			<height>70</height>
			<description>{$site_baseline}</description>
		</image>
		{foreach from=$channels item=channel}
		<item>
			<title>{$channel.storm}</title>
			<link>{$base_url_http}/storm/{$channel.storm}/?utm_source=backendMeteor&amp;utm_medium=rss&amp;utm_campaign={$version}</link>
			<source>{$base_url_http}/storm/{$channel.storm}/?utm_source=backendMeteor&amp;utm_medium=rss&amp;utm_campaign={$version}</source>
			<description><![CDATA[{$channel.users} {t}users{/t}<br />{$channel.suggestion} {t}suggestion(s){/t}<br />]]></description>
			<guid isPermaLink="false">{$channel.storm}</guid>
			<pubDate>{$date}</pubDate>
		</item>
		{/foreach}
	</channel>
</rss>