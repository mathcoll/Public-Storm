function add_suggestion(form, base_url)
{
	var exists = suggestion_exists(permaname(form.suggestion.value));
	if( exists == false )
	{
		var id = 'elt_'+alea(5);
		var e = $(
			'<li class="size_10 hidden bulle" id="'+id+'">' +
			'<blockquote title=""><a href="'+base_url+'/storm/'+permaname(form.suggestion.value)+'/">'+ucfirst(form.suggestion.value)+'</a>' +
			'	<span class="size" id="total_'+permaname(form.suggestion.value)+'">(1)</span>' +
			'	<span id="suggestions_'+permaname(form.suggestion.value)+'" class="hidden" style="vertical-align:top;" />' +
			'	<input type="hidden" name="suggestion" value="'+permaname(form.suggestion.value)+'">' +
			'</blockquote>' +
			'	<cite>' +
			'		Suggérée par xxxx, le xx/xx/xxxx' +
			'	</cite>' +
			'</li>'
		);
	}
	if( $("#storm_"+form.storm_id.value+" li.no_suggestion") )
	{
		$("#storm_"+form.storm_id.value+" li.no_suggestion").hide();
	}
	$.post(
		form.action,
		{
			suggestion: form.suggestion.value,
			storm_id: form.storm_id.value
		},
		function(data)
		{
			if( e )
			{
				$('#storm_'+form.storm_id.value).append(e);
				$('#'+id).fadeIn("slow");
			}
		},
		"text"
	);
	display_new_suggestion('storm_'+form.storm_id.value, '+1', form.suggestion.value);
	form.suggestion.value = "";
}

function suggestion_exists(suggestion)
{
	if ( $('#total_' + suggestion).length )
	{
		return true;
	}
	else
	{
		return false;
	}
}

function add_storm(base_url)
{
	$.get(base_url+"/storm/add_storm.php",
		function(data)
		{
			var e = $(data);
			$('#message').after(e);
		}
	);
}

function add_this_storm(form, base_url)
{
	document.location.href = form.action + permaname(form.storm.value) + '/' + encodeURI(form.storm.value) + '/';
}

function display_new_suggestion(id, inhtml, elt)
{
	$('#' + id + ' li input[name=suggestion]').each(
		function(index, element)
		{
			var v = $(element).val();
			if (v == elt) {
				$("#suggestions_"+v).text(inhtml);
				$("#suggestions_"+v).fadeIn('fast');
				$("#suggestions_"+v).css('font-size', '0em');
				$("#suggestions_"+v).css('display', 'inline');
				$("#suggestions_"+v).animate({
					opacity: 1,
					fontSize: "2.4em",
					},
					1500
				);
				$("#suggestions_"+v).fadeOut('slow');
				var totalText = $("#total_"+v).text();
				var totalInt = totalText.substring(1, totalText.length-1);
				var total = eval(totalInt+"+"+1);
				$("#total_"+v).text("("+total+")");

			}
		}
	);
}