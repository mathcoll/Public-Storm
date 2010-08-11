function loadMeteor() 
{
	// Set this to something unique to this client
	Meteor.hostid = 13245;
	// Our Meteor server is on the meteor. subdomain
	//Meteor.host = "meteor." + location.hostname;
	Meteor.host = "meteor.internetcollaboratif.info";
	// Call the test() function when data arrives
	Meteor.registerEventCallback("process", processing);
	Meteor.registerEventCallback("statuschanged", statusHasChanged);
	
	// Join the channel and get last five events, then stream
	if( $jQuery('#storm_permaname').val() )
	{
		var chan = permaname( $jQuery('#storm_permaname').val().toLowerCase() );
		Meteor.joinChannel(chan, 5);
		Meteor.mode = 'longpoll';
		Meteor.connect();
	}
	else
	{
		//alert('Meteor error CHANNEL=' + chan);
	}
}

function processing(data)
{
	window.status = data;
}

function sendCmd(cmd, channel)
{
	$jQuery.post('meteor.php', {
		command: cmd, 
		channel: channel
	});
}

var status=0;
function meteorStartStop()
{
	if( document.status > 0 )
	{
		Meteor.disconnect();
		$jQuery('#meteorStatusPause a').html('Start');
	}
	else
	{
		Meteor.connect();
		$jQuery('#meteorStatusPause a').html('Stop');
	}
}

function statusHasChanged(status)
{
	var msg = "";
	document.status = status;
	switch(status)
	{
		case 0: msg = "Meteor : Uninitialised";
			break;
		case 1: msg = "Meteor : Loading stream";
			break;
		case 2: msg = "Meteor : Loading controller frame";
			break;
		case 3: msg = "Meteor : Controller frame timeout, retrying";
			break;
		case 4: msg = "Meteor : Controller frame loaded and ready";
			break;
		case 5: msg = "Meteor : Receiving data";
			break;
	}
	$jQuery('#meteorStatus').html(msg+' '+status);
}