<ul class="nolist">
	<li>{$user.prenom} {$user.nom}</li>
	<li><a href="{$base_url}/utilisateurs/mon-compte/">{t}mon_compte{/t}</a></li>
	<li><a href="#" onclick="add_storm('{$base_url}');">{t}ajouter_un_storm{/t}</a></li>
	{if $user.isadmin eq 1}<li><a href="{$base_url}/admin/">{t}admin{/t}</a></li>{/if}
	<li><a href="{$base_url}/utilisateurs/logout/">{t}logout{/t}</a></li>
</ul>