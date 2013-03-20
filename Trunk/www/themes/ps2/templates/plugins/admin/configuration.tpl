<h3>{t}configuration{/t}</h3>
<p>
	<a href="#" id="show_all">{t}Afficher tout{/t}</a>
	<a href="#" id="hide_all">{t}Masquer tout{/t}</a>
</p>
<p>&nbsp;</p>
<ul class="listCustoms" style="width:700px;">
	<li class="header" style="width:700px;">
		<span class="icon">&nbsp;</span>
		<span class="description">{t}Description{/t}</span>
		<span class="nom">{t}Nom{/t}</span>
		<span class="val">{t}Valeur{/t}</span>
		<span>&nbsp;</span>
	</li>
{foreach from=$customizable item=custom}
	{assign var=type value=$custom.3}
	{if $type ne $prevtype}
	<li class="type" style="width:700px;">
		<span class="icon"><img src="{$theme_dir}plugins/{if $custom.3=="global_settings"}admin{else}{$custom.3}{/if}/img/icon.png" width="32" rel="{$custom.3}" /></span>
		<span><a href="{$base_url}admin/gettab/configuration/{$type|lower}/#top" onclick="tab(this.name, this.name, 'admin', '{$type|lower}');return false;" name="configuration">{$type|ucfirst}</a></span>
		<span>&nbsp;</span>
		<span>&nbsp;</span>
		<span>&nbsp;</span>
	</li>
	{/if}
	<li class="hide {$custom.3}" style="width:700px;">
		<span class="icon"><img src="{$theme_dir}plugins/{if $custom.3=="global_settings"}admin{else}{$custom.3}{/if}/img/icon.png" width="22" /></span>
		<span>{$custom.2}</span>
		<span><label for="{$custom.0}">{$custom.0}</label></span>
		<span class="val"><input type="text" name="{$custom.0}" id="{$custom.0}" value="{$custom.1}" class="ui-state-default ui-corner-all field" /></span>
		<span><input type="submit" value="{t}Ok{/t}" class="ui-state-default ui-corner-all field" /></span>
	</li>
	{assign var=prevtype value=$type}
{/foreach}
</ul>
<script>{literal}
$jQuery("ul.listCustoms > li.type span.icon img").each(function() {
	$jQuery(this).click(function(i) {
		var rel = $jQuery(this).attr("rel");
		var disp = $jQuery(this).parent().parent().parent().find("li."+rel).first().hasClass("hide")?"show":"hide";
		var oldDisp = disp=="hide"?"show":"hide";
		$jQuery(this).parent().parent().parent().find("li."+rel).each( function() {
			$jQuery(this).removeClass(oldDisp);
			$jQuery(this).addClass(disp);
		});
	});
});
$jQuery("#show_all").click(function(i) {
	$jQuery("ul.listCustoms > li:not('.header')").each(function() {
		$jQuery(this).addClass("show");
		$jQuery(this).removeClass("hide");
	});
});
$jQuery("#hide_all").click(function(i) {
	$jQuery("ul.listCustoms > li:not('.type'):not('.header')").each(function() {
		$jQuery(this).removeClass("show");
		$jQuery(this).addClass("hide");
	});
});
{/literal}</script>