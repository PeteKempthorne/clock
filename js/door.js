$(document).ready(function() {

	$('#submitcode').on('click', function() 
	{
		var doorcode = jQuery('#doorcode').val();
		var clockDrop = jQuery('#clockDrop').val();
			
			$.post('doorprocess.php', {doorcode: doorcode, clockDrop: clockDrop}, 
			function(data) 
			{
				//alert(data);
				$("#result").empty();
				$("#doorcode").val('');
				$("#clockDrop").val('no');
				$("#result").append(data);
			});			
			
	});
});