<!-- Q6 -->

<?php
	$title="Assign Members";
	require_once('head.php');
	
	echo "<body>";
		echo"<h2> Assign Members</h2>";

		if(empty($_POST['memberID']))
			echo "<p>You must enter a memberID</p>";
		else if(empty($_POST['raceID']))
			echo "<p>You must enter a raceID</p>";
		
		else{
			$memberID =$_POST['memberID'];
			$raceID =$_POST['raceID'];
								
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');		
		
		$query = "SELECT memberID FROM member WHERE '$memberID' = member.memberID";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$memberID = $row['memberID'];
		
		$query = "SELECT raceID FROM race WHERE '$raceID' = race.raceID";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$raceID = $row['raceID'];	
		
		if(!$memberID)
			echo "<p> Member does not exist</p>";
		else if(!$raceID)
			echo "<p> Race does not exist</p>";
		else{
			$query = "INSERT INTO competitor VALUES(NULL, '$memberID', '$raceID', NULL)";	
			$result = mysqli_query($conn, $query);
		
		
		echo "<p> Member $memberID has been successfully been added to race $raceID </p>";
		
		mysqli_close($conn);		
		}
				
		echo "<a href='index.php'>  Back To Index  </a>";
		}
		require_once('footer.php');
		
	echo "</body>";
echo "</html>";
?>