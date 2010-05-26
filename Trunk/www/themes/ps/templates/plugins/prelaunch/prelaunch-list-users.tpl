<h3>{t}prelaunch_beta_users{/t}</h3>
{setlocale type="all" locale="fr_FR.utf8"}
{t}Pages :{/t}
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/admin/gettab/prelaunch-list-users/{$smarty.section.foo.iteration}/" onclick="tab('prelaunch-list-users/{$smarty.section.foo.iteration}', 'prelaunch_users', 'admin');return false;">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>

<ul class="list-users">
	<li class="header">
		<span class="icon">&nbsp;</span>
		<span class="email">Email</span>
		<span class="subscription_date">Date</span>
		<span class="referrer">Referrer</span>
	</li>
{foreach from=$users item=user}
	<li>
		<span class="icon">&nbsp;</span>
		<span class="email"><a href="mailto:{$user.email}">{$user.email}</a></span>
		<span class="subscription_date">{$user.date|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}</span>
		<span class="referrer">{$user.referrer}</span>
	</li>
	
{/foreach}
</ul>

Pages :
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/admin/gettab/list-users/{$smarty.section.foo.iteration}/" onclick="tab('list-users/{$smarty.section.foo.iteration}', 'admin');return false;">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>