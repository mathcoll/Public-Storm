<h3>{t}liste_plugins{/t}</h3>
<ul class="list-plugins">
	<li class="header">
		<span class="icon">&nbsp;</span>
		<span class="name">{t}Nom{/t}</span>
		<span class="description">{t}Description{/t}</span>
		<span class="last_updated">{t}Date de mise à jour{/t}</span>
		<span class="update_link">{t}Lien de mise à jour{/t}</span>
		<span class="status">{t}Statut{/t}</span>
	</li>
{foreach from=$plugins item=plugin}
	<li>
		<span class="icon">{if $plugin.icon ne ''}<img src="{$plugin.icon}" width="32" alt="{$plugin.name|ucfirst}" />{else}&nbsp;{/if}</span>
		<span class="name"><strong>{$plugin.name|ucfirst}</strong><br />v. {$plugin.version}</span>
		<span class="description">{if $plugin.description ne ''}{$plugin.description}{/if}<br />{t}by{/t} <a href="mailto:{$plugin.author_email}">{$plugin.author_name}</a></span>
		<span class="last_updated">{$plugin.last_updated|date_format:"%A %e %B %Y %H:%M GMT"|ucfirst}</span>
		<span class="update_link">{if $plugin.update_link ne ''}{$plugin.update_link}{else}&nbsp;N/A&nbsp;{/if}</span>
		<span class="status">
			{if $plugin.status eq "1"}<img src="{$theme_dir}plugins/admin/img/active.png" width="32" />{else}<img src="{$theme_dir}plugins/admin/img/inactive.png" width="32" />{/if}
			<div class="status_actions">
				<ul>
					{if $plugin.status eq "0"}<li><a href="{$base_url}/admin/action/activer/{$plugin.name|lower}/">{t}Activer{/t}</a></li>{/if}
					{if $plugin.status eq "1"}<li><a href="{$base_url}/admin/action/desactiver/{$plugin.name|lower}/">{t}Désactiver{/t}</a></li>{/if}
					<li><a href="{$base_url}/admin/gettab/configuration/{$plugin.name|lower}/" name="configuration" onclick="tab(this.name, this.name, 'admin', '{$plugin.name|lower}');return false;">{t}Configurer{/t}</a></li>
				</ul>
			</div>
		</span>
	</li>
	
{/foreach}
</ul>