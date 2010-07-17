<h3>{$i18n.configuration}</h3>

<ul class="listCustoms">
	<li class="header">
		<span class="icon">&nbsp;</span>
		<span class="nom">{t}Nom{/t}</span>
		<span class="description">{t}Description{/t}</span>
		<span class="val">{t}Valeur{/t}</span>
	</li>
{foreach from=$customizable item=custom}
	{assign var=type value=$custom.3}
	{if $type ne $prevtype}
	<li class="type">
		<span>&nbsp;</span>
		<span><a href="{$base_url}admin/gettab/configuration/{$type|lower}/#top" onclick="tab(this.name, this.name, 'admin', '{$type|lower}');return false;" name="configuration">{$type|ucfirst}</a></span>
		<span>&nbsp;</span>
		<span>&nbsp;</span>
	</li>
	{/if}
	<li>
		<span class="icon"><img src="{$theme_dir}plugins/{$custom.3}/img/icon.png" width="32" /></span>
		<span><label for="{$custom.0}">{$custom.0}</label></span>
		<span>{$custom.2}</span>
		<span class="val"><input type="text" name="{$custom.0}" id="{$custom.0}" value="{$custom.1}" /></span>
	</li>
	{assign var=prevtype value=$type}
{/foreach}
</ul>