<!--<div class="spacer">&nbsp;</div>-->
<div class="breadcrumb">
	<ul>
	{foreach from=$breadcrumb item=it name=breadcrumb}
		<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		{if $smarty.foreach.breadcrumb.last}
			{$it.name|ucfirst}
		{else}
			{if $it.link ne ""}
				<a href="{$it.link}" itemprop="url"><span itemprop="title">{$it.name|ucfirst}</span></a>
			{else}
				<span itemprop="title">{$it.name|ucfirst}</span>
			{/if}
			&nbsp;>&nbsp;
		{/if}
		</li>
	{/foreach}
	</ul>
</div>
<div class="random">
	<a href="/random/">{t}Random{/t}</a>
</div>