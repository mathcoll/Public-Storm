<?xml version="1.0" encoding="UTF-8"?>
{setlocale type="all" locale="en_US.utf8"}

<feed xmlns="http://www.w3.org/2005/Atom">
	<title>{$title}</title>
	<link href="{$base_url_http}?utm_source=backend&amp;utm_medium=atom&amp;utm_campaign={$version}"/>
	<subtitle>{t}baseline{/t}</subtitle>
	<updated>{$date}</updated>
	<author>
		<name>{$atom_webmaster_name}</name>
		<email>{$atom_webmaster_email}</email>
	</author>
	<id>urn:uuid:60a76c80-d399-11d9-b91C-0003939e0af6</id>
	{foreach from=$storms item=storm}
	{if $storm.root ne ""}
	<entry>
		<title>{t}Storm{/t} {$storm.root|ucfirst} {t}by{/t} {$storm.author}</title>
		<link href="{$base_url_http}/storm/{$storm.permaname}/?utm_source=backend&amp;utm_medium=atom&amp;utm_campaign={$version}"/>
		<id>{$base_url_http}/storm/{$storm.permaname}/?utm_source=backend&amp;utm_medium=atom&amp;utm_campaign={$version}</id>
		<updated>{$storm.date|date_format:"%Y-%m-%dT%R:%M+02:00"}</updated>
		<summary type="html"><![CDATA[
			{assign var=rootCap value=$storm.root|ucfirst}{$i18n.suggest_it|sprintf:$rootCap}
			<p>{t}Storm{/t} <a href="{$base_url_http}/storm/{$storm.permaname}/?utm_source=backend&amp;utm_medium=atom&amp;utm_campaign={$version}">{$storm.root|ucfirst}</a> - <i>Public-Storm</i></p>
			<p><a href="{$base_url_http}/utilisateurs/{$storm.author_login}/?utm_source=backend&amp;utm_medium=atom&amp;utm_campaign={$version}">{t 1=$storm.author}Tous les Storms de %1{/t}</a></p>
			{if $storm.author_nbsuggestions}
				<p>{t 1=$storm.author 2=$storm.author_nbsuggestions}%1 est un utilisateur régulier de Public-Storm, avec ses %2 suggestions{/t}</p>
			{/if}
		]]></summary>
	</entry>
	{/if}
	{/foreach}
</feed>
