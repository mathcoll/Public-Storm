<h3>{$nb} {t}resultat_de_recherche{/t} "{$s}"</h3>

<ul id="res_recherche">
{assign var=num value=$start}
{foreach from=$items item=it}
	{include file="./row_resultat.tpl" item=$it base_url=$base_url i18n=$i18n num=$num}
	{assign var=num value=$num+1}
{/foreach}
</ul>

{section name=foo loop=$nb_pages}
    {if $current_page eq $smarty.section.foo.iteration}
		<b>{$smarty.section.foo.iteration}</b>
    {else}
		<a href="{$base_url_rech}{$smarty.section.foo.iteration}/">{$smarty.section.foo.iteration}</a>
    {/if}
{/section}