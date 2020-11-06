<!-- Q11 -->

<?php
	$title="Add Race";
	require_once('head.php');
	
	echo "<body>";
		echo"<h2> Add Race </h2>";

		if(empty($_POST['raceName']))
			echo "<p>You must enter a race name</p>";
		else if(empty($_POST['raceDate']))
			echo "<p>You must enter a race date</p>";
		else if(empty($_POST['seriesName']))
			echo "<p>You must enter a series name</p>";
		else if(empty($_POST['seriesYear']))
			echo "<p>You must enter a series year</p>";
		
		else{
			$raceName =$_POST['raceName'];
			$raceDate =$_POST['raceDate'];
			$seriesName =$_POST['seriesName'];
			$seriesYear =$_POST['seriesYear'];
								
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
		
		$query = "SELECT seriesID FROM series WHERE '$seriesName' = series.seriesName AND '$seriesYear' = series.seriesYear";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$seriesID = $row['seriesID'];			
		if(!$seriesID)
			echo "<p> Series does not exist</p>";
		else{	
			$query = "INSERT INTO race VALUES(NULL, '$seriesID', '$raceName', '$raceDate')";	
			$result = mysqli_query($conn, $query);
							
		mysqli_close($conn);	
		
		echo "<p> Race successfully added </p>";
		echo "<p> SeriesID: $seriesID </p>";
		echo "<p> Race Name: $raceName </p>";  
		echo "<p> Race Date: $raceDate </p>";        
		}
		}
		echo "<a href='index.php'>  Back To Index  </a>";
		require_once('footer.php');
		
		
	echo "</body>";
echo "</html>";
?>