<ul>
{foreach from=$articles item=article}
	<li><a href="{$article.uid}/">{$article.title}</a></li>
{/foreach}
</ul>