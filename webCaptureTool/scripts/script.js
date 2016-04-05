$(document).ready(function(){



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

	//Check the form inputs
	/*
	function check_inputs(){

		var failure = 0;

		if (!($('#start_date').val())) {
			alert("Please choose a start date");
			failure = 1;
		}

		if (!($('#start_time').val())) {
			alert("Please choose a start time");
			failure = 1;
		}
		else{ //Format the time a little
			date = ($('#start_date').val());
			time = ($('#start_time').val());
			
			placeHolder = date + " " + time + ":00";

			$('<input>', {
			    type: 'hidden',
			    id: 'start_time_proper',
			    name: 'start_time_proper',
			    value: placeHolder
			}).appendTo('form');

		}


		if (!($('#end_date').val())) {
			alert("Please choose a end date");
			failure = 1;
		}

		if (!($('#end_time').val())) {
			alert("Please choose a end time");
			failure = 1;
		}
		else{ //Format the time a little
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

		if (!($('#motor').val())) { //does the value exist?
			alert("Please choose a motor number");
			failure = 1;
		}
		else{ //check that value makes sense

			var value = +($('#motor').val()); //the + converts it to an int

			
			failure = 1;

		}

		if (!($('#tyre_ring').val())) {
			alert("Please choose a tyre ring set number");
			failure = 1;
		}

		if (!($('#drive_pulley').val())) {
			alert("Please choose a drive pulley number");
			failure = 1;
		}

		if (!($('#drive_belt').val())) {
			alert("Please choose a drive belt number");
			failure = 1;
		}

		if (!($('#comments').val())) {
			alert("Please add a comment");
			failure = 1;
		}

		if (!($('#fileToUpload').val())) {
			alert("Please add a file");
			failure = 1;
		}

		return failure;

	}

	//Was either submit button pressed? 
	$('#submit_begin').click(function(){
		
		var failure = check_inputs();
		if (failure) {

			alert("triggered");
		}
		
	});

	$('#submit_end').click(function(){

			var failure = check_inputs();
			if (failure) {

				return false;
			}	
	});
	*/


	


});

