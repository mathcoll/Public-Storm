/*
stream: xhrinteractive, iframe, serversent
longpoll
smartpoll
simplepoll
*/

Meteor = {

	callbacks: {
		process: function() {},
		reset: function() {},
		eof: function() {},
		statuschanged: function() {},
		changemode: function() {}
	},
	channelcount: 0,
	channels: {},
	debugmode: false,
	frameref: null,
	host: null,
	hostid: null,
	maxpollfreq: 60000,
	minpollfreq: 2000,
	mode: "stream",
	pingtimeout: 20000,
	pingtimer: null,
	pollfreq: 3000,
	port: 80,
	polltimeout: 30000,
	recvtimes: [],
	status: 0,
	updatepollfreqtimer: null,

	register: function(ifr) {
		ifr.p = Meteor.process;
		ifr.r = Meteor.reset;
		ifr.eof = Meteor.eof;
		ifr.ch = Meteor.channelInfo;
		clearTimeout(Meteor.frameloadtimer);
		Meteor.setstatus(4);
		Meteor.log("Frame registered");
	},

	joinChannel: function(channelname, backtrack) {
		if (typeof(Meteor.channels[channelname]) != "undefined") throw "Cannot join channel "+channelname+": already subscribed";
		Meteor.channels[channelname] = {backtrack:backtrack, lastmsgreceived:0};
		Meteor.log("Joined channel "+channelname);
		Meteor.channelcount++;
		if (Meteor.status != 0) Meteor.connect();
	},

	leaveChannel: function(channelname) {
		if (typeof(Meteor.channels[channelname]) == "undefined") throw "Cannot leave channel "+channelname+": not subscribed";
		delete Meteor.channels[channelname];
		Meteor.log("Left channel "+channelname);
		if (Meteor.status != 0) Meteor.connect();
		Meteor.channelcount--;
	},

	connect: function() {
		Meteor.log("Connecting");
		if (!Meteor.host) throw "Meteor host not specified";
		if (isNaN(Meteor.port)) throw "Meteor port not specified";
		if (!Meteor.channelcount) throw "No channels specified";
		if (Meteor.status) Meteor.disconnect();
		Meteor.setstatus(1);
		var now = new Date();
		var t = now.getTime();
		if (!Meteor.hostid) Meteor.hostid = t+""+Math.floor(Math.random()*1000000)
		document.domain = Meteor.extract_xss_domain(document.domain);
		if (Meteor.mode=="stream") Meteor.mode = Meteor.selectStreamTransport();
		Meteor.log("Selected "+Meteor.mode+" transport");
		if (Meteor.mode=="xhrinteractive" || Meteor.mode=="iframe" || Meteor.mode=="serversent") {
			if (Meteor.mode == "iframe") {
				Meteor.loadFrame(Meteor.getSubsUrl());
			} else {
				Meteor.loadFrame("http://"+Meteor.host+((Meteor.port==80)?"":":"+Meteor.port)+"/stream.html");
			}
			clearTimeout(Meteor.pingtimer);
			Meteor.pingtimer = setTimeout(Meteor.pollmode, Meteor.pingtimeout);

		} else {
			Meteor.loadFrame("http://"+Meteor.host+((Meteor.port==80)?"":":"+Meteor.port)+"/poll.html");
			Meteor.recvtimes[0] = t;
			if (Meteor.updatepollfreqtimer) clearTimeout(Meteor.updatepollfreqtimer);
			if (Meteor.mode=='smartpoll') Meteor.updatepollfreqtimer = setInterval(Meteor.updatepollfreq, 2500);
			if (Meteor.mode=='longpoll') Meteor.pollfreq = Meteor.minpollfreq;
		}
		Meteor.lastrequest = t;
	},

	disconnect: function() {
		if (Meteor.status) {
			clearTimeout(Meteor.pingtimer);
			clearTimeout(Meteor.updatepollfreqtimer);
			clearTimeout(Meteor.frameloadtimer);
			if (typeof CollectGarbage == 'function') CollectGarbage();
			if (Meteor.status != 6) Meteor.setstatus(0);
			Meteor.log("Disconnected");
		}
	},
	
	selectStreamTransport: function() {
		try {
			var test = ActiveXObject;
			return "iframe";
		} catch (e) {}
		if ((typeof window.addEventStream) == "function") return "iframe";
		return "xhrinteractive";
	},

	getSubsUrl: function() {
		var surl = "http://" + Meteor.host + ((Meteor.port==80)?"":":"+Meteor.port) + "/push/" + Meteor.hostid + "/" + Meteor.mode;
		for (var c in Meteor.channels) {
			surl += "/"+c;
			if (Meteor.channels[c].lastmsgreceived > 0) {
				surl += ".r"+(Meteor.channels[c].lastmsgreceived+1);
			} else if (Meteor.channels[c].backtrack > 0) {
				surl += ".b"+Meteor.channels[c].backtrack;
			} else if (Meteor.channels[c].backtrack < 0 || isNaN(Meteor.channels[c].backtrack)) {
				surl += ".h";
			}
		}
		var now = new Date();
		surl += "?nc="+now.getTime();
		return surl;
	},

	loadFrame: function(url) {
		try {
			if (!Meteor.frameref) {
				var transferDoc = new ActiveXObject("htmlfile");
				Meteor.frameref = transferDoc;
			}
			Meteor.frameref.open();
			Meteor.frameref.write("<html><script>");
			Meteor.frameref.write("document.domain=\""+(document.domain)+"\";");
			Meteor.frameref.write("</"+"script></html>");
			Meteor.frameref.parentWindow.Meteor = Meteor;
			Meteor.frameref.close();
			var ifrDiv = Meteor.frameref.createElement("div");
			Meteor.frameref.appendChild(ifrDiv);
			ifrDiv.innerHTML = "<iframe src=\""+url+"\"></iframe>";
		} catch (e) {
			if (!Meteor.frameref) {
				var ifr = document.createElement("IFRAME");
				ifr.style.width = "10px";
				ifr.style.height = "10px";
				ifr.style.border = "none";
				ifr.style.position = "absolute";
				ifr.style.top = "-10px";
				ifr.style.marginTop = "-10px";
				ifr.style.zIndex = "-20";
				ifr.Meteor = Meteor;
				document.body.appendChild(ifr);
				Meteor.frameref = ifr;
			}
			Meteor.frameref.setAttribute("src", url);
		}
		Meteor.log("Loading URL '"+url+"' into frame...");
		Meteor.frameloadtimer = setTimeout(Meteor.frameloadtimeout, 5000);
	},

	pollmode: function() {
		Meteor.log("Ping timeout");
		Meteor.mode="smartpoll";
		clearTimeout(Meteor.pingtimer);
		Meteor.callbacks["changemode"]("poll");
		Meteor.lastpingtime = false;
		Meteor.connect();
	},

	process: function(id, channel, data) {
		if (id == -1) {
			Meteor.log("Ping");
			Meteor.ping();
		} else if (typeof(Meteor.channels[channel]) != "undefined") {
			Meteor.log("Message "+id+" received on channel "+channel+" (last id on channel: "+Meteor.channels[channel].lastmsgreceived+")\n"+data);
			Meteor.callbacks["process"](data);
			Meteor.channels[channel].lastmsgreceived = id;
			if (Meteor.mode=="smartpoll") {
				var now = new Date();
				Meteor.recvtimes[Meteor.recvtimes.length] = now.getTime();
				while (Meteor.recvtimes.length > 5) Meteor.recvtimes.shift();
			}
		}
		Meteor.setstatus(5);
	},

	ping: function() {
		if (Meteor.pingtimer) {
			clearTimeout(Meteor.pingtimer);
			Meteor.pingtimer = setTimeout(Meteor.pollmode, Meteor.pingtimeout);
			var now = new Date();
			Meteor.lastpingtime = now.getTime();
		}
		Meteor.setstatus(5);
	},

	reset: function() {
		if (Meteor.status != 6) {
			Meteor.log("Stream reset");
			Meteor.ping();
			Meteor.callbacks["reset"]();
			var now = new Date();
			var t = now.getTime();
			var x = Meteor.pollfreq - (t-Meteor.lastrequest);
			if (x < 10) x = 10;
			setTimeout(Meteor.connect, x);
		}
	},

	eof: function() {
		Meteor.log("Received end of stream, will not reconnect");
		Meteor.callbacks["eof"]();
		Meteor.setstatus(6);
		Meteor.disconnect();
	},

	channelInfo: function(channel, id) {
		Meteor.channels[channel].lastmsgreceived = id;
		Meteor.log("Received channel info for channel "+channel+": resume from "+id);
	},

	updatepollfreq: function() {
		var now = new Date();
		var t = now.getTime();
		var avg = 0;
		for (var i=1; i<Meteor.recvtimes.length; i++) {
			avg += (Meteor.recvtimes[i]-Meteor.recvtimes[i-1]);
		}
		avg += (t-Meteor.recvtimes[Meteor.recvtimes.length-1]);
		avg /= Meteor.recvtimes.length;
		var target = avg/2;
		if (target < Meteor.pollfreq && Meteor.pollfreq > Meteor.minpollfreq) Meteor.pollfreq = Math.ceil(Meteor.pollfreq*0.9);
		if (target > Meteor.pollfreq && Meteor.pollfreq < Meteor.maxpollfreq) Meteor.pollfreq = Math.floor(Meteor.pollfreq*1.05);
	},

	registerEventCallback: function(evt, funcRef) {
		Function.prototype.andThen=function(g) {
			var f=this;
			var a=Meteor.arguments
			return function(args) {
				f(a);g(args);
			}
		};
		if (typeof Meteor.callbacks[evt] == "function") {
			Meteor.callbacks[evt] = (Meteor.callbacks[evt]).andThen(funcRef);
		} else {
			Meteor.callbacks[evt] = funcRef;
		}
	},

	frameloadtimeout: function() {
		Meteor.log("Frame load timeout");
		if (Meteor.frameloadtimer) clearTimeout(Meteor.frameloadtimer);
		Meteor.setstatus(3);
		Meteor.pollmode();
	},

	extract_xss_domain: function(old_domain) {
		if (old_domain.match(/^(\d{1,3}\.){3}\d{1,3}$/)) return old_domain;
		domain_pieces = old_domain.split('.');
		return domain_pieces.slice(-2, domain_pieces.length).join(".");
	},

	setstatus: function(newstatus) {
		// Statuses:	0 = Uninitialised,
		//				1 = Loading stream,
		//				2 = Loading controller frame,
		//				3 = Controller frame timeout, retrying.
		//				4 = Controller frame loaded and ready
		//				5 = Receiving data
		//				6 = End of stream, will not reconnect

		if (Meteor.status != newstatus) {
			Meteor.status = newstatus;
			Meteor.callbacks["statuschanged"](newstatus);
		}
	},

	log: function(logstr) {
		if (Meteor.debugmode) {
			if (window.console) {
				window.console.log(logstr);
			} else if (document.getElementById("meteorlogoutput")) {
				document.getElementById("meteorlogoutput").innerHTML += logstr+"<br/>";
			}
		}
	}
}

var oldonunload = window.onunload;
if (typeof window.onunload != 'function') {
	window.onunload = Meteor.disconnect;
} else {
	window.onunload = function() {
		if (oldonunload) oldonunload();
		Meteor.disconnect();
	}
}


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
	eval("var data = "+data+";");
	if( data.call == "newSuggestion" )
	{
		//alert(data.user + " says :\n" + data.suggestion);
		var storm_id = $jQuery("#storm_id").val();
		//alert('ok'+storm_id+'<--');
		//alert('ok'+permaname(data.suggestion)+'<--');
		display_new_suggestion('storm_'+storm_id, '+1', permaname(data.suggestion));
		//alert('ok');
	}
	//window.status = data;
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
		//BASE_URL+'/admin/gettab/meteor/getSubscribers/'+getChannelName()+'/',
		BASE_URL+'/meteor/meteor.php',
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
	$jQuery('#meteorStatus').html("");
	var e = '<span class="status status_'+status+'" title="'+msg+' '+status+'">&nbsp;</span>';
	$jQuery('#meteorStatus').append(e);
}





/* DEBUG */
/**
 * jquery.dump.js
 * @author Torkild Dyvik Olsen
 * @version 1.0
 * 
 * A simple debug function to gather information about an object.
 * Returns a nested tree with information.
 * 
 */
(function($) {

$jQuery.fn.dump = function() {
   return $jQuery.dump(this);
}

$jQuery.dump = function(object) {
   var recursion = function(obj, level) {
      if(!level) level = 0;
      var dump = '', p = '';
      for(i = 0; i < level; i++) p += "\t";
      
      t = type(obj);
      switch(t) {
         case "string":
            return '"' + obj + '"';
            break;
         case "number":
            return obj.toString();
            break;
         case "boolean":
            return obj ? 'true' : 'false';
         case "date":
            return "Date: " + obj.toLocaleString();
         case "array":
            dump += 'Array ( \n';
            $jQuery.each(obj, function(k,v) {
               dump += p +'\t' + k + ' => ' + recursion(v, level + 1) + '\n';
            });
            dump += p + ')';
            break;
         case "object":
            dump += 'Object { \n';
            $jQuery.each(obj, function(k,v) {
               dump += p + '\t' + k + ': ' + recursion(v, level + 1) + '\n';
            });
            dump += p + '}';
            break;
         case "jquery":
            dump += 'jQuery Object { \n';
            $jQuery.each(obj, function(k,v) {
               dump += p + '\t' + k + ' = ' + recursion(v, level + 1) + '\n';
            });
            dump += p + '}';
            break;
         case "regexp":
            return "RegExp: " + obj.toString();
         case "error":
            return obj.toString();
         case "document":
         case "domelement":
            dump += 'DOMElement [ \n'
                  + p + '\tnodeName: ' + obj.nodeName + '\n'
                  + p + '\tnodeValue: ' + obj.nodeValue + '\n'
                  + p + '\tinnerHTML: [ \n';
            $jQuery.each(obj.childNodes, function(k,v) {
               if(k < 1) var r = 0;
               if(type(v) == "string") {
                  if(v.textContent.match(/[^\s]/)) {
                     dump += p + '\t\t' + (k - (r||0)) + ' = String: ' + trim(v.textContent) + '\n';
                  } else {
                     r--;
                  }
               } else {
                  dump += p + '\t\t' + (k - (r||0)) + ' = ' + recursion(v, level + 2) + '\n';
               }
            });
            dump += p + '\t]\n'
                  + p + ']';
            break;
         case "function":
            var match = obj.toString().match(/^(.*)\(([^\)]*)\)/im);
            match[1] = trim(match[1].replace(new RegExp("[\\s]+", "g"), " "));
            match[2] = trim(match[2].replace(new RegExp("[\\s]+", "g"), " "));
            return match[1] + "(" + match[2] + ")";
         case "window":
         default:
            dump += 'N/A: ' + t;
            break;
      }
      
      return dump;
   }
   
   var type = function(obj) {
      var type = typeof(obj);
      
      if(type != "object") {
         return type;
      }
      
      switch(obj) {
         case null:
            return 'null';
         case window:
            return 'window';
         case document:
            return 'document';
         case window.event:
            return 'event';
         default:
            break;
      }
      
      if(obj.jquery) {
         return 'jquery';
      }
      
      switch(obj.constructor) {
         case Array:
            return 'array';
         case Boolean:
            return 'boolean';
         case Date:
            return 'date';
         case Object:
            return 'object';
         case RegExp:
            return 'regexp';
         case ReferenceError:
         case Error:
            return 'error';
         case null:
         default:
            break;
      }
      
      switch(obj.nodeType) {
         case 1:
            return 'domelement';
         case 3:
            return 'string';
         case null:
         default:
            break;
      }
      
      return 'Unknown';
   }
   
   return recursion(object);
}

function trim(str) {
   return ltrim(rtrim(str));
}

function ltrim(str) {
   return str.replace(new RegExp("^[\\s]+", "g"), "");
}

function rtrim(str) {
   return str.replace(new RegExp("[\\s]+$", "g"), "");
}

})(jQuery);
