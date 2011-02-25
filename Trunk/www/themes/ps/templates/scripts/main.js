$jQuery(document).ready( function() {
	if ( $jQuery("#message").html() != "" )
	{
		$jQuery("#message").dialog({
			title: "Info",
			resizable: true,
			modal: true,
			width:320,
			height:120
		});
		$jQuery("#message").dialog( "option", "width", "320" );
		$jQuery("#message").dialog( "option", "height", "120" );
	}
	loadMeteor();
});


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
	str = str.replace(/[ÙÛùû]/g,"u");
	str = str.replace(/[Çç]/g,"c");
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