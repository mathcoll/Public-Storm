$jQuery(document).ready( function() {
	 $jQuery("a span.sendToAFriend").parent().click(function() {
		 window.open($jQuery(this).attr("href"), 'sendToAFriend', 'width=500,height=500');
		 /*
		$jQuery("body").append('<div id="sendToAFriend"></div>');
		$jQuery("#sendToAFriend").dialog({
			title : "<span class='ui-icon ui-icon-mail-closed' style='float:left;margin:-2px 0 0;'></span> " + $jQuery(this).attr("title"),
			modal : true,
			width : 590, 
			height : 600
		}).load( $jQuery(this).attr("href") );
		*/
		return false;
	});
});

function openSendToAFriend(activeTab) {
	$jQuery("#accordion").accordion({
		collapsible: false,
		fillSpace: true,
		autoHeight: false,
		active: activeTab
	});
}

function populateFriends(json) {
	var liste = "";
	for( i=0; i<json.contacts.count; i++ ) {
		var email = json.contacts.contact[i].fields[0].value;
		var givenName = "";
		var familyName = "";
		if ( json.contacts.contact[i].fields[2] ) { givenName = json.contacts.contact[i].fields[2].value.givenName; }
		if ( json.contacts.contact[i].fields[2] ) { familyName = json.contacts.contact[i].fields[2].value.familyName; }
		liste += '<li><input type="checkbox" name="friends[]" value="'+email+'" id="friend'+i+'" /><label for="friend'+i+'">'+givenName+' '+familyName+' ('+email+')</label></li>\n';
	}
	$jQuery("#friends").html("");
	$jQuery("#friends").append(liste);
}