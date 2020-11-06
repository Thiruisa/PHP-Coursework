<!-- Q5 -->

<?php
	$title="Delete Race";
	require_once('head.php');
	echo "<body>";
		echo"<h2> Delete Race</h2>";
		
		if(empty($raceID=$_POST['raceID']))
			echo"<p> You must enter a race ID </p>";
		else{
			$raceID=$_POST['raceID'];



			$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
		
		$query = "SELECT raceID FROM race WHERE '$raceID' = race.raceID";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$raceID = $row['raceID'];
			
			
		if(!$raceID)
			echo "<p> Race does not exist</p>";
		else{				
			$query = "DELETE FROM competitor WHERE raceID = '$raceID'";
			$result = mysqli_query($conn, $query);
			$query2 = "DELETE FROM race WHERE raceID = '$raceID'";
			$result = mysqli_query($conn, $query2);

			echo "<p> Delete Race number $raceID <p>";
			
			echo "<p>Record deleted successfully</p>";
				
			mysqli_close($conn);
			
			}
		}
		echo "<a href='Index.php'> Back To Index </a>";
		
		require_once('footer.php');
	echo "</body>";
echo "</html>";
?>