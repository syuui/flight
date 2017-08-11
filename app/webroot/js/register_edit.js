/**
 * 
 */



function getRegInfo() {
	var xmlhttp, xmlDoc, rid, rlt;

	$("#waiting").show();
	rid = $("#RegisterRegisterNo").val();

	// Prepare XMLHttpRequest ojbect for Ajax
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	// Send HTTP Request
	xmlhttp.open("GET", "/Register/aircraftRegisterJson/" + rid, true);
	xmlhttp.send();

	// Actions when HTTP Responses arrivaled
	rid = null;
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			rid = xmlhttp.responseText;
			
			rlt = JSON.parse(rid);
			
			$("#HintRegModel").html("机型："+rlt.model);
			$("#HintRegCompany").html("公司："+rlt.company);
			$("#HintRegDate").html("引进："+rlt.regDate);
		}
	}

	$("#waiting").hide();
}

function gotFocus(){
	$("#RegisterRegisterNo").blur(getRegInfo);	
}

function lostFocus(){
	getRegInfo();
	$("#RegisterRegisterNo").blur();
}