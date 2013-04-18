<h3>{t}list_users{/t}</h3>
<h4>{t 1=$nbusers escape=""}%1 subscribed users{/t}</h4>
<p>&nbsp;</p>

{if $nb_pages gt 0}
{t}Pages :{/t}
<ul class="list-pages">
	{section name=foo loop=$nb_pages}
	<li>
		{if $current_page eq $smarty.section.foo.iteration}
			<b>{$smarty.section.foo.iteration}</b>
		{else}
			<a href="{$base_url}/admin/gettab/list-users/{$smarty.section.foo.iteration}/" onclick="tab('list-users/{$smarty.section.foo.iteration}', 'list-users', 'admin');return false;">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>
{/if}

<ul class="list-users">
	<li class="header">
		<span class="icon">&nbsp;</span>
		<span class="nom">{t}Prénom{/t} {t}Nom{/t}</span>
		<span class="login">{t}Login{/t}</span>
		<span class="lang">{t}Lang{/t}</span>
		<span class="subscription_date">{t}date d'inscription{/t}<br />{t}Mise à jour{/t}</span>
	</li>
{foreach from=$users item=user}
	{assign var=role value=$user.role_id}
	{if $role ne $prevrole}
	<li class="role">
		<span class="icon">&nbsp;</span>
		<span class="nom">{$user.role_name|ucfirst}</span>
		<span class="login">&nbsp;</span>
		<span class="lang">&nbsp;</span>
		<span class="subscription_date">&nbsp;</span>
	</li>
	{/if}
	<li>
		<span class="icon"><img src="{$user.avatar}" alt="-" width="32" height="32" /></span>
		<span class="nom">{$user.prenom|ucfirst} {$user.nom|ucfirst}<br /><a href="mailto:{$user.email}">{$user.email}</a></span>
		<span class="login" title="{$user.uid}"><a href="{$base_url}/utilisateurs/{$user.login}/">{$user.login}</a></span>
		<span class="lang">{t}{$user.lang}{/t}</span>
		<span class="subscription_date">
			{$user.subscription_date|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}<br />
			{$user.updated_date|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}
		</span>
	</li>
	{assign var=prevrole value=$role}
	
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
			<a href="{$base_url}/admin/gettab/list-users/{$smarty.section.foo.iteration}/" onclick="tab('list-users/{$smarty.section.foo.iteration}', 'list-users', 'admin');return false;">{$smarty.section.foo.iteration}</a>
		{/if}
	</li>
	{/section}
</ul>
{/if}