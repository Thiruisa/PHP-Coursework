<!-- Q12 -->

<?php
	$title="Assign Race";
	require_once('head.php');
	
	echo "<body>";
		echo"<h2> Assign Race</h2>";

		if(empty($_POST['firstName']))
			echo "<p>You must enter members first name</p>";
		else if(empty($_POST['lastName']))
			echo "<p>You must enter members last name</p>";
		else if(empty($_POST['raceName']))
			echo "<p>You must enter a race name</p>";
		else if(empty($_POST['seriesName']))
			echo "<p>You must enter a series name</p>";
		else if(empty($_POST['seriesYear']))
			echo "<p>You must enter a series year</p>";
		
		else{
			$firstName =$_POST['firstName'];
			$lastName =$_POST['lastName'];
			$raceName =$_POST['raceName'];
			$seriesName =$_POST['seriesName'];
			$seriesYear =$_POST['seriesYear'];				
							
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');

		$query = "SELECT memberID FROM member WHERE '$firstName' = member.firstName AND '$lastName' = member.lastName";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$memberID = $row['memberID'];
		
		$query = "SELECT seriesID FROM series WHERE '$seriesName' = series.seriesName AND '$seriesYear' = series.seriesYear";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$seriesID = $row['seriesID'];
		
		$query = "SELECT raceID FROM race WHERE '$raceName' = race.raceName AND '$seriesID' = race.seriesID";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$raceID = $row['raceID'];
		
		if(!$memberID)
			echo "<p> Member does not exist</p>";
		else if(!$seriesID)
			echo "<p> Series does not exist</p>";
		else if(!$raceID)
			echo "<p> Race does not exist</p>";
		else{
			$query = "INSERT INTO competitor VALUES(NULL, '$memberID', '$raceID', NULL)";	
			$result = mysqli_query($conn, $query);

        echo "<p> Member has been successfully been added to a race </p>";    
        echo "<p> MemberID: $memberID</p>";
        echo "<p> Member Name: $firstName $lastName</p>";         
        echo "<p> SeriesID: $seriesID</p>"; 
        echo "<p> Series Name: $seriesName</p>";         
        echo "<p> Series Year: $seriesYear</p>"; 
        echo "<p> RaceID: $raceID</p>";
        echo "<p> Race Name: $raceName</p>";         

		}
        mysqli_close($conn);
		}		
		echo "<a href='index.php'>  Back To Index </a>";
		
		require_once('footer.php');
	echo "</body>";
echo "</html>";
?>