/**
 * 
 */

function set_onchange() {
	$("#FlightDepartureTimeYear").change(function() {
		val = $("#FlightDepartureTimeYear").val();
		$("#FlightRealDepartureTimeYear").val(val);
		$("#FlightArrivalTimeYear").val(val);
		$("#FlightRealArrivalTimeYear").val(val);
	});

	$("#FlightDepartureTimeMonth").change(function() {
		val = $("#FlightDepartureTimeMonth").val();
		$("#FlightRealDepartureTimeMonth").val(val);
		$("#FlightArrivalTimeMonth").val(val);
		$("#FlightRealArrivalTimeMonth").val(val);

	});

	$("#FlightDepartureTimeDay").change(function() {
		val = $("#FlightDepartureTimeDay").val();
		$("#FlightRealDepartureTimeDay").val(val);
		$("#FlightArrivalTimeDay").val(val);
		$("#FlightRealArrivalTimeDay").val(val);
	});

	$("#FlightDepartureTimeHour").change(function() {
		val = $("#FlightDepartureTimeHour").val();
		$("#FlightRealDepartureTimeHour").val(val);
		$("#FlightArrivalTimeHour").val(val);
		$("#FlightRealArrivalTimeHour").val(val);
	});

	$("#FlightDepartureTimeMin").change(function() {
		val = $("#FlightDepartureTimeMin").val();
		$("#FlightRealDepartureTimeMin").val(val);
		$("#FlightArrivalTimeMin").val(val);
		$("#FlightRealArrivalTimeMin").val(val);
	});
}
