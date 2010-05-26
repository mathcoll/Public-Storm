<?php
@header("Content-Type: text/javascript; charset=utf-8");
require("../../../../_specific.php");
?>
$(document).ready( function() {
	$("div#menu.intro ol.navigation li a").click(function(){
	
		//Find the width of a tab
		var TabWidth = $("div.panel:first").width();
		
		if(parseInt($("div.panel:first").css("margin-left")) > 0)
			TabWidth += parseInt($("div.panel:first").css("margin-left"));
			
		if(parseInt($("div.panel:first").css("margin-right")) >0)
			TabWidth += parseInt($("div.panel:first").css("margin-right"));
		
		//But wait, how far we slide to? Let find out
		var newLeft = -1* $("span").index(this) * TabWidth;
		
		//Ok, now slide
		$(".scrollContainer").animate({
			left: + newLeft + "px"
		},1000);
		
	});
});

var BASE_URL = "<?php print $BASE_URL; ?>";

function validerEmail(email)
{
	$.get(BASE_URL + "/utilisateurs/valideremail.php?email=" + email, function(data)
		{
	  		if (data)
	  		{
				$("#emailError").show();
				$("#emailValid").hide();
			}
			else
			{
				$("#emailError").hide();
				$("#emailValid").show();
			}
		}
	);
}

function validerIdentifiant(login)
{
	$.get(BASE_URL + "/utilisateurs/valideridentifiant.php?login=" + login, function(data)
		{
	  		if (data)
	  		{
				$("#identifiantError").show();
				$("#identifiantValid").hide();
			}
			else
			{
				$("#identifiantError").hide();
				$("#identifiantValid").show();
			}
		}
	);
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
function tab(name, id, folder)
{
	$.get(BASE_URL + "/"+folder+"/gettab/" + name + "/", function(data)
		{
	  		if (data)
	  		{
				$("#content").html(data);
			}
			else
			{
				$("#content").html("ERREUR !!");
			}
			
			$("#menu ul li a").each(function(i){$(this).removeClass('tab-hightlight');});
			
			$("#menu ul li a#"+id).addClass('tab-hightlight');
			$("#menu ul li a#"+id).removeClass('tab');
		}
	);
}