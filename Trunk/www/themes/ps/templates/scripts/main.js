$jQuery(document).ready( function() {
	if ( $jQuery("#message").html() != "" )
	{
		$jQuery("#message").dialog({
			title: "Info",
			resizable: true,
			modal: true
		});
		$jQuery("#message").dialog( "option", "width", 420 );
		$jQuery("#message").dialog( "option", "height", 140 );
		$jQuery("#message").dialog( "option", "buttons", { "Fermer": function() { $jQuery(this).dialog("close"); } } );
	}
	if( $jQuery("input[type=submit]").html() ) {
		$jQuery("input[type=submit]").button({ icons: {primary:'ui-icon-gear', secondary:'ui-icon-triangle-1-s'} });
	}
	loadMeteor();
});

function habillage_sondage() {
	$jQuery("body").append("<div id=\"sondage\" style=\"position:relative;width:304px;height:204px;\"><span class=\"messageToHide\"></span><object style=\"padding:2px;position:absolute;overflow:hidden;clip:rect(2px 302px 202px 2px);\" data=\"http://www.easy-sondage.fr/sondages/index.php?num=b91b1facf3b3a7890177f02ac188f14c\" type=\"text/html\" width=\"304\" height=\"204\"><a href=\"http://www.blog-poll.com/p/Web/b91b1facf3b3a7890177f02ac188f14c.html\">Cliquez-ici pour accéder au sondage.</a></object></div>");
	//$jQuery("body").append("<div id=\"sondage\"><script type=\"text/javascript\" src=\"http://www.blog-poll.com/sondages/poll.php?num=b91b1facf3b3a7890177f02ac188f14c\"></script><noscript><p><a href=\"http://www.blog-poll.com/p/Web/b91b1facf3b3a7890177f02ac188f14c.html\">Cliquez-ici pour accéder au sondage.</a></p></noscript></div>");
	$jQuery("#sondage").dialog({title:"Veuillez patienter pendant le chargement...",width:340,height:240, open: function(event, ui) { $jQuery("#message").dialog( "option", "sondage", "Sondage Public-Storm" ); }});
}

function validerEmail(email)
{
	$jQuery.get(BASE_URL + "/utilisateurs/valideremail.php?email=" + email, function(data)
		{
	  		if (data)
	  		{
				$jQuery("#emailError").show();
				$jQuery("#emailValid").hide();
			}
			else
			{
				$jQuery("#emailError").hide();
				$jQuery("#emailValid").show();
			}
		}
	);
}

function validerIdentifiant(login)
{
	$jQuery.get(BASE_URL + "/utilisateurs/valideridentifiant.php?login=" + login, function(data)
		{
	  		if (data)
	  		{
				$jQuery("#identifiantError").show();
				$jQuery("#identifiantValid").hide();
			}
			else
			{
				$jQuery("#identifiantError").hide();
				$jQuery("#identifiantValid").show();
			}
		}
	);
}
function permaname(s)
{
	s = no_accent(no_spacer(s));
	return s;
}
function alea(m)
{
	var alea = "";
	for(n=0; n<m; n++)
	{
		alea += Math.floor(Math.random()*5);
	}
	return alea;
}
function no_accent(str)
{
	str = str.replace(/[ÀÂÄàâä]/g,"a");
	str = str.replace(/[ÈÉÊËèéêë]/g,"e");
	str = str.replace(/[ÎÏîï]/g,"i");
	str = str.replace(/[ÔÓÖôóö]/g,"o");
	str = str.replace(/[ÙÛùûü]/g,"u");
	str = str.replace(/[Çç]/g,"c");
	str = str.replace(/[°€]/g,"c");
	return str;
}
function ucfirst( str )
{
	str += '';
	var f = str.charAt(0).toUpperCase();
	return f + str.substr(1);
}
function no_spacer(str)
{
	str = str.replace(/[ ?!:;\.,]/g,"-");
	return str;
}

/* mon compte */
function tab(name, id, folder, subpage)
{
	if ( subpage !== null ) {
		name = name  + "/" + subpage;
	}
	$jQuery.get(BASE_URL + "/"+folder+"/gettab/" + name + "/", function(data)
		{
	  		if (data)
	  		{
				$jQuery("#content").html(data);
			}
			else
			{
				$jQuery("#content").html("ERREUR !!");
			}
			
			$jQuery("#menu ul li a").each(function(i){$jQuery(this).removeClass('tab-hightlight');});
			
			$jQuery("#menu ul li a#"+id).addClass('tab-hightlight');
			$jQuery("#menu ul li a#"+id).removeClass('tab');
		}
	);
}