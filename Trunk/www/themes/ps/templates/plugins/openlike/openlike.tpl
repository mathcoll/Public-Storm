<h4>{t 1=$rootCap}Partager %1 :{/t}</h4>

<script type="text/javascript">
{literal}
var cfg = {
		s: ['facebook', 'twitter', 'identica', 'digg', 'google', 'reddit', 'stumbleupon'],
		url: window.location.href,
		title: document.title,
		header: '',
		//css: OPENLIKE.assetHost + '/v1/openlike.css',
		css:'',
		category: ''
	},
	i, len, wrapper, title, list, li, a, source, css;
	//cfg = OPENLIKE.util.update(defaults, cfg);
{/literal}
OPENLIKE.Widget(cfg)
</script>