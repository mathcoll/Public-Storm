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
			<link>{$base_url_http}?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}</link>
			<width>73</width>
			<height>70</height>
			<description>{$site_baseline}</description>
		</image>
		{foreach from=$suggestions item=suggestion}
		{if $suggestion.suggestion ne ""}
		<item>
			<title>{t}Suggestion{/t} '{$suggestion.suggestion|ucfirst}' {t}by{/t} {if $suggestion.author!=" "}{$suggestion.author}{else}{t}Anonyme{/t}{/if}</title>
			<link>{$suggestion.url}?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}</link>
			<description><![CDATA[
				{assign var=rootCap value=$storm|ucfirst}
				<p><img src="{$theme_dir_http}favicon.ico" align="absmiddle" alt="{$title}" />&nbsp;{t}Storm{/t} <a href="{$base_url_http}/storm/{$storm}/?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}">{$storm|ucfirst}</a> - <i>{$title}</i></p>
				<p>{t escape="" 1=$rootCap}suggest_it{/t} <a href="{$base_url_http}/storm/{$storm}/?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}">{$storm|ucfirst}</a></p>
				{if $suggestion.author_login}
					<p><a href="{$base_url_http}/utilisateurs/{$suggestion.author_login}/?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}">{t 1=$suggestion.author}Tous les Storms de %1{/t}</a></p>
				{/if}
				{if $suggestion.author_nbsuggestions}
					<p>
						{t 1=$suggestion.author 2=$suggestion.authornbsuggestions}%1 est un utilisateur régulier de Public-Storm, avec ses %2 suggestions{/t}
					</p>
				{/if}
				<p><a href="{$base_url_http}/utilisateurs/creer-un-compte.php?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}">{t}creer_un_compte{/t}</a></p>
			]]></description>
			<guid isPermaLink="false">{$storm}</guid>
			<pubDate>{$suggestion.date|date_format:"%a, %d %b %Y %R:%M GMT"}</pubDate>
			<source url="{$base_url_http}/backend/rss.php?utm_source=backend&amp;utm_medium=rss_storm&amp;utm_campaign={$version}">Rss {$title}</source>
			<enclosure url="{$theme_dir_http}img/lightning.png" length="692" type="image/x-png" />
		</item>
		{/if}
		{/foreach}
	</channel>
</rss>