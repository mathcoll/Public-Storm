{setlocale type="all" locale="fr_FR.utf8"}
<h3>{t}liste_plugins{/t}</h3>
{setlocale type="all" locale="fr_FR.utf8"}
<ul class="list-plugins">
	<li class="header">
		<span class="icon">&nbsp;</span>
		<span class="name">Nom</span>
		<span class="description">Description</span>
		<span class="status">Status</span>
		<span class="version">Version</span>
		<span class="last_updated">Date de mise à jour</span>
		<span class="update_link">Lien de mise à jour</span>
	</li>
{foreach from=$plugins item=plugin}
	<li>
		<span class="icon">{if $plugin.icon ne ''}<img src="{$plugin.icon}" width="32" alt="{$plugin.name|ucfirst}" />{else}&nbsp;{/if}</span>
		<span class="name">{$plugin.name|ucfirst}</span>
		<span class="description">{if $plugin.description ne ''}{$plugin.description}{else}&nbsp;<br />{/if}<a href="mailto:{$plugin.author_email}">{$plugin.author_name}</a></span>
		<span class="status">
			{if $plugin.status eq "1"}<img src="{$theme_dir}plugins/admin/img/active.png" width="32" />{else}<img src="{$theme_dir}plugins/admin/img/inactive.png" width="32" />{/if}
			<div class="status_actions">
				<ul>
					{if $plugin.status eq "0"}<li><a href="{$base_url}/admin/action/activer/{$plugin.name|lower}/">Activer</a></li>{/if}
					{if $plugin.status eq "1"}<li><a href="{$base_url}/admin/action/desactiver/{$plugin.name|lower}/">Désactiver</a></li>{/if}
				</ul>
			</div>
		</span>
		<span class="version">{$plugin.version}</span>
		<span class="last_updated">{$plugin.last_updated|date_format:"%A %e %B %Y %H:%M GMT"|ucfirst}</span>
		<span class="update_link">{if $plugin.update_link ne ''}{$plugin.update_link}{else}&nbsp;{/if}</span>
	</li>
	
{/foreach}
</ul>