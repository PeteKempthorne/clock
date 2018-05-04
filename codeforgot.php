<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Employee Code Recover</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/forgot.js"></script>
<link href="lib/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<hgroup>
		<h2>Employee Code Recover</h2>
	</hgroup>
		
	<form action="" method="post">
	
		<div id="formLayout">
		<fieldset>
		<legend>Form</legend>
		<p id="codeRec">
			To recover your door code, please enter your details below.
		</p>
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname" /><br /><br /><br />
		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname" /><br /><br /><br />
		<label for="submito">Submit:</label>
		<input type="button" value="Submit" id="submito"><br />
		</fieldset>
		</div>
	
	</form>
	<div id="door">
	<p id="result">
	
	</p>	
	</div>
</body>
</html>