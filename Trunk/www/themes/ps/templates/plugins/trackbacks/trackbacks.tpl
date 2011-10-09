<h3>{t}trackback{/t}</h3>
<p>{t}trackback_intro{/t}</p>

<br />
<a href="{$base_url_http}/trackbacks/index.php">{t}Lien de TrackBack{/t}</a>

{if $trackbacks|@sizeof gt 0}
	{foreach from=$trackbacks item=tb}
		<h4><a href="{$tb.url}" rel="follow" onclick="window.open(this.href); return false;">{$tb.title}</a>{if $tb.author ne ''} {$i18n.by} {$tb.author}{/if}{if $tb.datetime ne ''} {$i18n.on|ucfirst} {$tb.datetime|date_format:"%d/%m/%Y %Hh%M"}{/if}</h4>
		<p>{$tb.excerpt}<a href="{$tb.url}" rel="follow" onclick="window.open(this.href); return false;">...</a></p>
	{/foreach}
	<p>&nbsp;</p>
	<a href="{$base_url_http}/trackbacks/index.php">{t}Lien de TrackBack{/t}</a>
{/if}