<div id="mon-compte">
	<div id="menu">
		<ul>
			<li><a href="{$base_url}/users/gettab/mes-informations/" class="tab-hightlight" onclick="tab(this.name, this.id, 'utilisateurs');return false;" name="mes-informations" id="mes-informations">{t}mes_informations{/t}</a></li>
			<li><a href="{$base_url}/users/gettab/mes-parametres/" class="tab" onclick="tab(this.name, this.id, 'utilisateurs');return false;" name="mes-parametres" id="mes-parametres">{t}mes_parametres{/t}</a></li>
			<li><a href="{$base_url}/users/gettab/mes-storms/" class="tab" onclick="tab(this.name, this.id, 'utilisateurs');return false;" name="mes-storms" id="mes-storms">{t}mes_storms{/t}</a></li>
			<li><a href="{$base_url}/users/gettab/mes-favoris/" class="tab" onclick="tab(this.name, this.id, 'utilisateurs');return false;" name="mes-favoris" id="mes-favoris">{t}Mes favoris{/t}</a></li>
		</ul>
	</div><!-- // menu -->
	<div id="content">
		{$tabcontent}
	</div><!-- // content -->
</div><!-- // compte -->