<?xml version="1.0" encoding="UTF-8"?>
{setlocale type="all" locale="en_US.utf8"}

<feed xmlns="http://www.w3.org/2005/Atom">
	<title>{$title}</title>
	<subtitle>{t}baseline{/t}</subtitle>
	<link href="{$base_url_http}"/>
	<updated>{$date}</updated>
	<author>
		<name>{$rss_webmaster}</name>
		<email>{$rss_webmaster}</email>
	</author>
	<id>urn:uuid:60a76c80-d399-11d9-b91C-0003939e0af6</id>
	{foreach from=$storms item=storm}
	{if $storm.root ne ""}
	<entry>
		<title>{t}Storm{/t} {$storm.root|ucfirst} {t}by{/t} {$storm.author}</title>
		<link href="{$base_url_http}/storm/{$storm.permaname}/"/>
		<id>{$storm.permaname}</id>
		<updated>{$storm.date|date_format:"%a, %d %b %Y %R:%M GMT"}</updated>
		<summary>
			{assign var=rootCap value=$storm.root|ucfirst}{$i18n.suggest_it|sprintf:$rootCap}
			<p>{t}Storm{/t} <a href="{$base_url_http}/storm/{$storm.permaname}/">{$storm.root|ucfirst}</a> - <i>Public-Storm</i></p>
			<p><a href="{$base_url_http}/utilisateurs/{$storm.author_login}/">{t 1=$storm.author}Tous les Storms de %1{/t}</a></p>
			{if $storm.author_nbsuggestions}
				<p>{t 1=$storm.author 2=$storm.author_nbsuggestions}%1 est un utilisateur régulier de Public-Storm, avec ses %2 suggestions{/t}</p>
			{/if}
		</summary>
	</entry>
	{/if}
	{/foreach}
</feed>
