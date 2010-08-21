<div id="admin">
	<div id="menu">
		<ul>
			<li><a href="{$base_url}/admin/gettab/list-plugins/" class="tab-hightlight" onclick="tab(this.name, this.id, 'admin');return false;" id="list-plugins" name="list-plugins">{t}liste_plugins{/t}</a></li>
			<li><a href="{$base_url}/admin/gettab/configuration/" class="tab" onclick="tab(this.name, this.id, 'admin');return false;" id="configuration" name="configuration">{t}configuration{/t}</a></li>
			<li><a href="{$base_url}/admin/gettab/list-users/" class="tab" onclick="tab(this.name, this.id, 'admin');return false;" id="list-users" name="list-users">{t}list_users{/t}</a></li>
			{foreach from=$adminmenu item=menu}
			<li><a href="{$menu.1}" class="tab" onclick="tab(this.name, this.id, 'admin', '{$menu.3}');return false;" id="{$menu.2}" name="{$menu.1}">{$menu.0}</a></li>
			{/foreach}
		</ul>
	</div><!-- // menu -->
	<div id="content">
		{$tabcontent}
	</div><!-- // content -->
</div><!-- // admin -->