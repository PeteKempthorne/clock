<?php
	
	class ClockIn
	{	
		var $doorcode;
		var $clockDrop;		
		var $today;
		var $timeNow;
		//constructor
		public function __construct($doorcode, $clockDrop, $today, $timeNow)
		{		
			$this->doorcode = $doorcode;
			$this->clockDrop = $clockDrop;
			$this->today = $today;
			$this->timeNow = $timeNow;
		}			
		//displays the results if validation is ok
		function clockNew()
		{
			
			include 'db_conn.php';
			//searches database to see if door code is valid		
			$sql = "SELECT * FROM user WHERE DoorCode = '$this->doorcode'";	
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc())
			{
				$userID = $row['UserID'];
				$fName = $row['FirstName'];
				$lName = $row['LastName'];
			}	
			$rowcount = mysqli_num_rows($result);
			
			//this bit below is to check whether you clocked in or out kast time you used the system
			$sql3 = "SELECT * FROM timetrack WHERE UserID = $userID ORDER BY TheDay DESC, TheTime DESC Limit 1";	
			$result3 = $conn->query($sql3);
			while($row3 = $result3->fetch_assoc())
			{
				$inout = $row3['InOut'];
			}
			$rowcount2 = mysqli_num_rows($result3);
			//if there is 1 row returned from first query we know it is valid. If not then it is invalid
			if($rowcount == 1)
			{
				$sql2 = "INSERT INTO `timetrack` (`UserID`, `InOut`, `TheDay`, `TheTime`) VALUES ('$userID', '$this->clockDrop', '$this->today', '$this->timeNow');";				
				
				if($this->clockDrop == "out" && $inout == "in")
				{
					echo "Goodbye $fName. You are now clocked out.";
					$conn->query($sql2);
					mysqli_close($conn);
				}
				elseif($this->clockDrop == "in" && $inout == "out")
				{
					echo "Welcome back $fName. You are now clocked in.";
					$conn->query($sql2);
					mysqli_close($conn);
				}
				//this is to prevent clocking out when you clocked out last time
				elseif($this->clockDrop == "out" && $inout == "out")
				{
					echo "$fName, you are already clocked out. Please clock in before clocking out.";
					mysqli_close($conn);
				}
				//this is to prevent clocking in when you clocked in last time
				elseif($this->clockDrop == "in" && $inout == "in")
				{
					echo "$fName, you are already clocked in. Please clock out before clocking in.";
					mysqli_close($conn);
				}
				elseif($rowcount2 == 0 && $this->clockDrop == "out" )
				{
					echo "$fName, please clock in first.";
				}
				elseif($rowcount2 == 0 && $this->clockDrop == "in" )
				{
					echo "$fName, welcome to you first clock in!";
					$conn->query($sql2);
					mysqli_close($conn);
				}
				else
				{
					echo "Error: " . $sql2 . "<br>" . $conn->error;
				}
				mysqli_close($conn);
			
			}
			//this happens when door code isnt valid
			else
			{
				echo "Invalid door code. Try again";	
				mysqli_close($conn);				
			}		

			
		}
		//validates that ok values are entered
		function validate()
		{
			error_reporting(0);	
			
			if($this->clockDrop == "no")
			{
				$errors[] = "Please select either in or out from the drop down box.";
			}
			if($this->doorcode == "")
			{
				$errors[] = "Please enter numbers in the door code box.";
			}
			if($this->doorcode != "" && strlen($this->doorcode) != 4)
			{
				$errors[] = "Door code can only be 4 numbers long.";
			}
			if($this->doorcode != "" && !preg_match("/^[0-9\-]{0,255}$/i", $this->doorcode))
			{
				$errors[] = "Please only enter numbers in the door code box. No spaces, letters or symbols allowed.";
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
				$this->clockNew();					
			}
		}
	}	
	
	//object of ClockIn
	$ok = new ClockIn($_POST['doorcode'], $_POST['clockDrop'], date("Y-m-d"), date("H:i:s"));
	//validating will in turn display the result since regNew function is inside
	$ok->validate();

		
?>