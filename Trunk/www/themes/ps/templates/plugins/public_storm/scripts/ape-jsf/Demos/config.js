/***
 * APE JSF Setup
 */
APE.Config.baseUrl = 'http://noir/public-storm.internetcollaboratif.info/themes/ps/templates/plugins/public_storm/scripts/ape-jsf'; //APE JSF 
APE.Config.domain = 'auto'; 
APE.Config.server = 'noir:6969'; //APE server URL

(function(){
	for (var i = 0; i < arguments.length; i++)
		APE.Config.scripts.push(APE.Config.baseUrl + '/Source/' + arguments[i] + '.js');
})('mootools-core', 'Core/APE', 'Core/Events', 'Core/Core', 'Pipe/Pipe', 'Pipe/PipeProxy', 'Pipe/PipeMulti', 'Pipe/PipeSingle', 'Request/Request','Request/Request.Stack', 'Request/Request.CycledStack', 'Transport/Transport.longPolling','Transport/Transport.SSE', 'Transport/Transport.XHRStreaming', 'Transport/Transport.JSONP', 'Core/Utility', 'Core/JSON');
