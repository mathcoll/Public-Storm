<!--<div class="spacer">&nbsp;</div>-->
<div class="breadcrumb">{foreach from=$breadcrumb item=it name=breadcrumb}
{if $smarty.foreach.breadcrumb.last}
	{$it.name|ucfirst}
{else}
	{if $it.link ne ""}<a href="{$it.link}">{$it.name|ucfirst}</a>{else}{$it.name|ucfirst}{/if}&nbsp;>&nbsp;
{/if}
{/foreach}
</div>