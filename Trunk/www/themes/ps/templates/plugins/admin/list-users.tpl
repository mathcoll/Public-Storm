<h3>{t}list_users{/t}</h3>
{setlocale type="all" locale="fr_FR.utf8"}
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


<ul class="list-users">
	<li class="header">
		<span class="icon">&nbsp;</span>
		<span class="nom">Nom</span>
		<span class="prenom">Prénom</span>
		<span class="login">Login</span>
		<span class="email">Email</span>
		<span class="lang">Lang</span>
		<span class="subscription_date">Inscription</span>
		<span class="updated_date">Mise à jour</span>
	</li>
{foreach from=$users item=user}
	{assign var=role value=$user.role_id}
	{if $role ne $prevrole}
	<li class="role">
		<span class="icon">&nbsp;</span>
		<span class="nom">{$user.role_name|ucfirst}</span>
		<span class="prenom">&nbsp;</span>
		<span class="login">&nbsp;</span>
		<span class="email">&nbsp;</span>
		<span class="lang">&nbsp;</span>
		<span class="subscription_date">&nbsp;</span>
		<span class="updated_date">&nbsp;</span>
	</li>
	{/if}
	<li>
		<span class="icon">&nbsp;</span>
		<span class="nom">{$user.nom}</span>
		<span class="prenom">{$user.prenom}</span>
		<span class="login" title="{$user.uid}">{$user.login}</span>
		<span class="email"><a href="mailto:{$user.email}">{$user.email}</a></span>
		<span class="lang">{$user.lang}</span>
		<span class="subscription_date">{$user.subscription_date|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}</span>
		<span class="updated_date">{$user.updated_date|date_format:"%A %e %B %Y, %H:%M:%S"|ucfirst}</span>
	</li>
	{assign var=prevrole value=$role}
	
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