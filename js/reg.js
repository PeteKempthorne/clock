$(document).ready(function() {

	$('#submitreg').on('click', function() 
	{
		var firstname = jQuery('#firstname').val();
		var lastname = jQuery('#lastname').val();
			
			$.post('regprocess.php', {firstname: firstname, lastname: lastname}, 
			function(data) 
			{
				//empty both name boxes and the paragraph before displaying data
				$("#result").empty();
				$("#firstname").val('');
				$("#lastname").val('');
				$("#result").append(data);
			});			
			
	});
});