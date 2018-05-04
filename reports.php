<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Employee Time Reports</title>
<link href="lib/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<hgroup>
		<h2>Employee Time Reports</h2>
	</hgroup>
		

	<div id="reports">

	<p id="report">
	<?php
		include 'db_conn.php';
		
		echo "<table class=\"tabLayout\">";
		echo "<tr>";
		echo "<th colspan=\"5\" align =\"center\">";
		echo "<strong>Employee late arrivals and early leavers report</strong><br /><br />";
		echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td><strong>Employee Name</strong></td>";
		echo "<td><strong>Times left early</strong></td>";
		echo "<td><strong>Percent of time left early</strong></td>";
		echo "<td><strong>Times arrived late</strong></td>";
		echo "<td><strong>Percent of time arrived late</strong></td>";
		echo "</tr>";
		
							
		$sql = "SELECT * FROM user";
		$result = $conn->query($sql);
		
		while($row = $result->fetch_assoc())
		{
			$userid = $row['UserID'];
			$fName = $row['FirstName'];
			$lName = $row['LastName'];
			
			//echo "<strong>" . $fName . " " . $lName . "</strong><br />";
			
			$sql2 = "SELECT `UserID`, `InOut`, max(TheTime) as MaxTime, TheDay  FROM timetrack 
					WHERE UserID = $userid AND `InOut` = 'out' AND TheDay in 
						(SELECT DISTINCT TheDay FROM timetrack WHERE UserID = $userid ORDER BY TheDay DESC)
					GROUP BY TheDay
					ORDER BY TheDay DESC, TheTime DESC";
			
			$result2 = $conn->query($sql2);
			$count = 0;
			$leaveEarlyCount = 0;
			$leaveLateCount = 0;
			//end of work time
			$leaveTime = strtotime("17:30:00");
			
			while($row2 = $result2->fetch_assoc())
			{
				$uid = $row2['UserID'];
				$firstEnter = strtotime($row2['MaxTime']);
				$inOut = $row2['InOut'];
				$theDate = $row2['TheDay'];	
				$late = $firstEnter - $leaveTime;
				
				if ($late < 0)
				{
					$leaveEarlyCount++;	
				}
				else
				{
					$leaveLateCount++;
				}				
				$count++;						
			}
			
			if($count > 0)
			{
				//calculates percent of time this person leaves early
				$leavePercent = ($leaveEarlyCount / $count) * 100;
				//just to make it not have loads of potential decimal places
				$leavePercent2 = number_format($leavePercent, 2);
				
				echo "<tr>";
				echo "<td>". $fName . " " . $lName ."</td>";
				echo "<td>". $leaveEarlyCount ."</td>";
				echo "<td>". $leavePercent2 ."%</td>";
				//below is old code I have kept incase the table goes wrong
				//echo "<br />" . $fName . " " . $lName . " left early: ". $leaveEarlyCount . " times<br />";
				//echo $fName . " " . $lName . " left early: ". $leavePercent2 . "% of the time<br />";
			}
			else
			{
				//this happens if person has never clocked in before in database
				//echo "<br />Never clocked in.<br />";
			}
			
			$sql3 = "SELECT `UserID`, `InOut`, min(TheTime) as MinTime, TheDay  FROM timetrack 
					WHERE UserID = $userid AND `InOut` = 'in' AND TheDay in 
						(SELECT DISTINCT TheDay FROM timetrack WHERE UserID = $userid ORDER BY TheDay DESC)
					GROUP BY TheDay
					ORDER BY TheDay DESC";
			
			$result3 = $conn->query($sql3);
			$count2 = 0;
			$arrivedEarlyCount = 0;
			$arrivedLateCount = 0;
			//time of day work starts
			$arriveTime = strtotime("09:00:00");
			
			while($row3 = $result3->fetch_assoc())
			{
				$uid = $row3['UserID'];
				$firstEnter = strtotime($row3['MinTime']);
				$inOut = $row3['InOut'];
				$theDate = $row3['TheDay'];	
				$late = $firstEnter - $arriveTime;
				if ($late < 0)
				{
					$arrivedEarlyCount++;	
				}
				else
				{
					$arrivedLateCount++;
				}				
				$count2++;						
			}
			
			if($count2 > 0)
			{
				//calculates percent of time this person arrives late
				$arrivePercent = ($arrivedLateCount / $count) * 100;
				//just to make it not have loads of potential decimal places
				$arrivePercent2 = number_format($arrivePercent, 2);
				
				echo "<td>". $arrivedLateCount ."</td>";
				echo "<td>". $arrivePercent2 ."%</td>";
				echo "</tr>";
				//old code
				//echo "<br />" . $fName . " " . $lName . " arrived late: ". $arrivedLateCount . " times<br />";
				//echo $fName . " " . $lName . " arrived late: ". $arrivePercent2 . "% of the time<br /><br />";
			}
			else
			{
				//this happens if person has never clocked out before in database
				//echo "Never clocked out.<br /><br />";
			}
		}
		
		echo "</table>";
		echo "<br /><br />";
		
		echo "<table class=\"tabLayout\">";
		echo "<tr>";
		echo "<th colspan=\"5\" align =\"center\">";
		echo "<strong>Employee average time on premises</strong><br /><br />";
		echo "</th>";
		echo "</tr>";
		echo "<tr>";
		echo "<td width = \"50%\"><strong>Employee Name</strong></td>";
		echo "<td><strong>Average time on premises (in hours:minutes:seconds)</strong></td>";
		echo "</tr>";
				
		$sql = "SELECT * FROM user";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc())
		{
			
			$count = 1;
			//array index number count
			$arrCount = 0;
			//array to store time in premises for one session
			$timeArray = array();
			$userid = $row['UserID'];
			$fName = $row['FirstName'];
			$lName = $row['LastName'];
			
			//echo "<strong>" . $fName . " " . $lName . "</strong><br />";
			
			$sql2 = "SELECT * FROM timetrack WHERE UserID = $userid ORDER BY TheDay DESC, TheTime DESC";
			$result2 = $conn->query($sql2);
			while($row2 = $result2->fetch_assoc())
			{
				$inOut = $row2['InOut'];
				//if the person is clocking out and it is an odd number
				if($inOut == "out" && $count % 2 != 0)
				{
					$outTime = strtotime($row2['TheTime']);	
					$count++;					
				}
				//if the person is clocking in and it is an even number
				elseif($inOut == "in" && $count % 2 == 0) 
				{
					$inTime = strtotime($row2['TheTime']);	
					//calculates time in premises for session
					$totTime = $outTime - $inTime;
					//puts time in premises for that session into array
					$timeArray[$arrCount] = $totTime;					
					$arrCount++;
					$count++;
				}
				else
				{
					//nothing					
				}	
				
			}
			//minus count by 1 since it started at 1 and we need it to equal the number of results
			$count--;
			if($count > 0)
			{
				//to get average time we get the sum of the total time in the array and divide by number of results
				$avgTime = (array_sum($timeArray) / ($count / 2));
				echo "<tr>";
				echo "<td>". $fName . " " . $lName ."</td>";
				echo "<td>" . date("H:i:s", $avgTime) . "</td>";
				echo "</tr>";
				//echo $time = "Average time on premises: " . date("H:i:s", $avgTime)."<br /><br />";	
			}
			else
			{
				//this happens if the person has never been in and out of the premises
				//echo "This person has not been on the premises.<br /><br />";
			}
			
					
		}
		echo "</table>";
		mysqli_close($conn);
		
	?>
	</p>
	</div>
</body>
</html>