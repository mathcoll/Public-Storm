<h3>{t}Cron list{/t}</h3>

{if $nb_pages gt 0}
{t}Pages :{/t}
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/admin/gettab/cronlist/{$smarty.section.foo.iteration}/" onclick="tab('cronlist/{$smarty.section.foo.iteration}', 'cronlist', 'admin');return false;">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>
{/if}

<ul class="list-users">
	<li class="header">
		<span class="command">{t}Command{/t}</span>
		<span class="parameters">{t}Parameters{/t}</span>
		<span class="time">{t}Time{/t}</span>
	</li>
{foreach from=$crons item=cron}
	<li>
		<span class="command">{$cron.command}</span>
		<span class="parameters">{$cron.parameters|stripslashes}</span>
		<span class="time">{$cron.time|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}</span>
	</li>
{/foreach}
</ul>

{if $nb_pages gt 0}
{t}Pages :{/t}
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/admin/gettab/cronlist/{$smarty.section.foo.iteration}/" onclick="tab('cronlist/{$smarty.section.foo.iteration}', 'cronlist', 'admin');return false;">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>
{/if}