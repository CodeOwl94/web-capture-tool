$(document).ready(function(){

$(".clockpicker").clockpicker();

	//Populate the first dropdown
	$.getJSON("first_name.php", success = function(data)
	{
		var options = "";

		for(var i=0; i<Object.keys(data).length; i++)
		{
			//Have the value of the dropdown as the ID while we display the associated text
			options += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
		}


		$("#first_name").append(options);
		$("#first_name").change();	//On page load, simulate a change so that the second dropdown is populated as well

	});

	$('#submit_btn').click(function(){
		format_time();
		$('#submit_end').click();


	});

	/*$('#clock_start').change(function(){

		alert("Change");
		alert($('#clock_start').val())

	});*/

	//Do the time formatting
	function format_time(){

		//Start time 
		date = ($('#start_date').val());
		time = ($('#start_time').val());

		placeHolder = date + " " + time + ":00";

		$('<input>', {
			type: 'hidden',
			id: 'start_time_proper',
			name: 'start_time_proper',
			value: placeHolder
		}).appendTo('form');

		//End time
		date = ($('#end_date').val());
		time = ($('#end_time').val());

		placeHolder = date + " " + time + ":00";

		$('<input>', {
			type: 'hidden',
			id: 'end_time_proper',
			name: 'end_time_proper',
			value: placeHolder
		}).appendTo('form');
	}


});

