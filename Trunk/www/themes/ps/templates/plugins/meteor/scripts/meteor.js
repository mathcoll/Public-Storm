
function loadMeteor() 
{
	// Set this to something unique to this client
	Meteor.hostid = alea(15);
	// Our Meteor server is on the meteor. subdomain
	//Meteor.host = "meteor." + location.hostname;
	Meteor.host = "meteor.internetcollaboratif.info";
	// Call the processing() function when data arrives
	Meteor.registerEventCallback("process", processing);
	Meteor.registerEventCallback("statuschanged", statusHasChanged);
	var channel = getChannelName();
	//alert('ok'+channel);
	
	// Join the channel and get last five events, then stream
	if( channel )
	{
		Meteor.joinChannel(channel, 0);
		Meteor.mode = 'xhrinteractive';
		Meteor.connect();
		getSubscribers();
	}
	else
	{
		//alert('Meteor error CHANNEL=' + channel);
	}
}
function getChannelName()
{
	//alert($jQuery('#storm_permaname').val().toLowerCase());
	if ( $jQuery('#storm_permaname').length != 0 )
	{
		return permaname( $jQuery('#storm_permaname').val().toLowerCase() );
	}
	else
	{
		return false;
	}
}
function processing(data)
{
	window.status = data;
	
}
function sendCmd(cmd)
{
	$jQuery.post(
		'meteor.php',
		{
			command: cmd, 
			channel: getChannelName()
		}
	);
}
function getSubscribers()
{
	$jQuery.post(
		BASE_URL+'/admin/gettab/meteor/getSubscribers/'+getChannelName()+'/',
		{
			command: "getSubscribers", 
			channel: getChannelName()
		},
		function(data) { setSubscribers(data); },
		"json"
	);
}
function setSubscribers(data)
{
	$jQuery("#countSubscribers").html(data['nombre']);
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
		case 6: msg = "Meteor : End of stream, will not reconnect";
			break;
	}
	$jQuery('#meteorStatus').html(msg+' '+status);
}