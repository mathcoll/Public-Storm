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
			<link>{$base_url_http}</link>
			<width>73</width>
			<height>70</height>
			<description>{$site_baseline}</description>
		</image>
		{foreach from=$storms item=storm}
		{if $storm.root ne ""}
		<item>
			<title>{t}Storm{/t} {$storm.root|ucfirst} {t}by{/t} {$storm.author}</title>
			<!--<author>({$storm.author})</author>-->
			<link>{$base_url_http}/storm/{$storm.permaname}/</link>
			<description><![CDATA[
				{assign var=rootCap value=$storm.root|ucfirst}
				<p><img src="{$theme_dir_http}favicon.ico" align="absmiddle" alt="{$title}" />&nbsp;{t}Storm{/t} <a href="{$base_url_http}/storm/{$storm.permaname}/">{$storm.root|ucfirst}</a> - <i>{$title}</i></p>
				<p>{t escape="" 1=$rootCap}suggest_it{/t} <a href="{$base_url_http}/storm/{$storm.permaname}/">{$storm.root|ucfirst}</a></p>
				<p><a href="{$base_url_http}/utilisateurs/{$storm.author_login}/">{t 1=$storm.author}Tous les Storms de %1{/t}</a></p>
				{if $storm.author_nbsuggestions}
					<p>
						{t 1=$storm.author 2=$storm.author_nbsuggestions}%1 est un utilisateur régulier de Public-Storm, avec ses %2 suggestions{/t}
					</p>
				{/if}
				<p><a href="{$base_url_http}/utilisateurs/creer-un-compte.php">{t}creer_un_compte{/t} {$title}</a></p>
			]]></description>
			<guid isPermaLink="false">{$storm.permaname}</guid>
			<pubDate>{$storm.date|date_format:"%a, %d %b %Y %R:%M GMT"}</pubDate>
			<source url="{$base_url_http}/backend/rss.php">Rss {$title}</source>
			<enclosure url="{$theme_dir_http}img/lightning.png" length="692" type="image/x-png" />
		</item>
		{/if}
		{/foreach}
	</channel>
</rss>