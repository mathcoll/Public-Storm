<div id="mon-compte">
	<div id="menu">
		<ul>
			<li><a href="{$base_url}/users/gettab/mes-informations/" class="tab-hightlight" onclick="tab(this.name, this.name, 'utilisateurs');return false;" name="mes-informations"><span id="mes-informations"></span>{t}mes_informations{/t}</a></li>
			<li><a href="{$base_url}/users/gettab/mes-parametres/" class="tab" onclick="tab(this.name, this.name, 'utilisateurs');return false;" name="mes-parametres"><span id="mes-parametres"></span>{t}mes_parametres{/t}</a></li>
			<li><a href="{$base_url}/users/gettab/mes-storms/" class="tab" onclick="tab(this.name, this.name, 'utilisateurs');return false;" name="mes-storms"><span id="mes-storms"></span>{t}mes_storms{/t}</a></li>
			<li><a href="{$base_url}/users/gettab/mes-favoris/" class="tab" onclick="tab(this.name, this.name, 'utilisateurs');return false;" name="mes-favoris"><span id="mes-favoris"></span>{t}Mes favoris{/t}</a></li>
		</ul>
	</div><!-- // menu -->
	<div id="content">
		{$tabcontent}
	</div><!-- // content -->
</div><!-- // compte -->