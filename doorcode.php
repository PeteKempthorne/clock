<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Employee Door Control</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/door.js"></script>
<link href="lib/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<hgroup>
		<h2>Employee Door Control</h2>
	</hgroup>
		
	<form action="" method="post">
	
		<div id="formLayout">
		<fieldset>
		<legend>Form</legend>
		<label for="doorcode">Enter Door Code:</label>
		<input type="text" id="doorcode" name="doorcode" /><br /><br /><br />
		<label for="clockDrop">In/Out:</label>
		<select name="clockDrop" id="clockDrop">
			<option value="no" selected>---</option>
			<option value="in">In</option>
			<option value="out">Out</option>
		</select><br /><br /><br />
		<label for="submitcode">Submit:</label>
		<input type="button" value="Submit" id="submitcode"><br /><br /><br />
		<a href="register.php">Register new employee</a><br />
		<a href="codeforgot.php">Recover forgotten door code</a><br />
		<a href="reports.php">Employee time reports</a><br />
		</fieldset>
		</div>
	
	</form>
	<div id="door">
	<p id="result">
	
	</p>

	</div>
</body>
</html>