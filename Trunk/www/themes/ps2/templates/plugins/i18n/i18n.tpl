<div id="languages">
	<ul>
		{foreach from=$langs item=lang}
			{if $lang eq $current_lang}
			{assign var="selected" value="selected"}
			{else}
			{assign var="selected" value=""}
			{/if}
			{include file="plugins/i18n/inc_lang.tpl" code=$lang.code name=$lang.name prefix=$prefix selected=$selected}

		{/foreach}
		<li>&nbsp;</li>
		<li><a href="mailto:contact@internetcollaboratif.info">{t}Aider à la traduction{/t}</a></li>
	</ul>
	</ul>
</div>