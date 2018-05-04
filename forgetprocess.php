<?php
	
	class Forgot
	{	
		var $firstname;
		var $lastname;
		//constructor
		public function __construct($firstname, $lastname)
		{		
			$this->firstname = $firstname;
			$this->lastname = $lastname;
		}			
		//displays the results if validation is ok
		function forget()
		{
			
			include 'db_conn.php';
					
			$sql = "SELECT * FROM user WHERE FirstName = '$this->firstname' AND LastName = '$this->lastname'";
			
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc())
			{				
				$fName = $row['FirstName'];
				$lName = $row['LastName'];
				$code = $row['DoorCode'];
				
				//checks to make sure the names are matched to those in the db
				if($this->firstname == $fName && $this->lastname == $lName)
				{
					echo $fName . " " . $lName . ", your door code is below.<br />";
					echo "<h1>" . $code . "</h1>";
					
				}	
				
				
			}
			$rowcount = mysqli_num_rows($result);
			
			//displays if person not found
			if($rowcount == 0)
			{
				echo "Name not in database. Please enter a correct name or <a href=\"register.php\">register</a>.";
			}
			
			mysqli_close($conn);
			
		}
		//validates that ok values are entered
		function validate()
		{
			error_reporting(0);	
			if($this->firstname == "")
			{
				$errors[] = "Please enter a name in the first name box";
			}
			if($this->firstname != "" && strlen($this->firstname) > 20)
			{
				$errors[] = "First name has to be under 20 characters long";
			}
			if($this->firstname != "" && !preg_match("/^[a-zA-Z\-]{0,255}$/i", $this->firstname))
			{
				$errors[] = "Please only enter text in the first name box. No spaces, numbers or symbols allowed.";
			}
			if($this->lastname == "")
			{
				$errors[] = "Please enter a name in the last name box";
			}
			if($this->lastname != "" && strlen($this->lastname) > 20)
			{
				$errors[] = "Last name has to be under 20 characters long";
			}
			if($this->lastname != "" && !preg_match("/^[a-zA-Z\-]{0,255}$/i", $this->lastname))
			{
				$errors[] = "Please only enter text in the last name box. No spaces, numbers or symbols allowed.";
			}
			//displays all errors in the array
			if($errors)
			{
				echo "<em>The following problem(s) occured:</em><br />\n";
				for ($a=0; $a < count($errors); $a++)
				{
					echo "$errors[$a] <br />\n";
				}
			}
			else
			{
				$this->forget();					
			}
		}
	}	
	
	//object of Register
	$ok = new Forgot($_POST['firstname'], $_POST['lastname']);
	//validating will in turn display the result since regNew function is inside
	$ok->validate();

		
?>