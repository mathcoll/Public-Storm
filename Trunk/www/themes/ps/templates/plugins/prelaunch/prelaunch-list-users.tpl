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
		<span class="email">{t}Email{/t}</span>
		<span class="subscription_date">{t}Date{/t}</span>
		<span class="referrer">{t}Referrer{/t}</span>
		<span class="action">{t}Action{/t}</span>
	</li>
{foreach from=$users item=user}
	<li>
		<span class="icon">&nbsp;</span>
		<span class="email"><a href="mailto:{$user.email}">{$user.email}</a></span>
		<span class="subscription_date">{$user.date|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}</span>
		<span class="referrer">{$user.referrer}</span>
		<span class="invitation"><a href="{$base_url}/prelaunch/invitation/{$user.email}/">{t}Invitation{/t}</a></span>
	</li>
	
{/foreach}
</ul>

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