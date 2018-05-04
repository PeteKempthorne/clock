<?php
	
	class Register
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
		function regNew()
		{
			
			include 'db_conn.php';
					
			$sql = "SELECT DoorCode FROM user";
			
			$result = $conn->query($sql);
			$codeArray = array();
			$count = 0;
			
			while($row = $result->fetch_assoc())
			{
				
				$code = $row['DoorCode'];
				$codeArray[$count] = $code;
				$count++;
			}				
			//This is so we get a unique code so we dont get multiple people with the same code
			do
			{
				$doorcode = rand(1000, 9999);
			}
			while(in_array($doorcode, $codeArray));
			
			$sql2 = "INSERT INTO user (FirstName, LastName, DoorCode) VALUES ('$this->firstname', '$this->lastname', $doorcode)";
			
			if($conn->query($sql2) === TRUE)
			{
				echo "Registration Complete. Your door code is below<br />";
				echo "<h1>$doorcode</h1>";
			}
			else
			{
				echo "Error: " . $sql2 . "<br>" . $conn->error;
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
				$this->regNew();					
			}
		}
	}	
	
	//object of Register
	$ok = new Register($_POST['firstname'], $_POST['lastname']);
	//validating will in turn display the result since regNew function is inside
	$ok->validate();
	
	//test code
	//echo $ok->firstname;
	//echo $ok->lastname;
		
?>