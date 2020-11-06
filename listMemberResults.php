<!-- Q8 -->

<?php
	$title = "List Members Results";
	require_once('head.php');	
	
	echo "<body>";
		echo "<h2> List Members Results </h2>";
		
		if(empty($_POST['firstName']))
			echo "<p>You must enter members first name</p>";
		else if(empty($_POST['lastName']))
			echo "<p>You must enter members last name</p>";
		
		else{
			$firstName =$_POST['firstName'];
			$lastName =$_POST['lastName'];
		
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');	
		
		$query = "SELECT firstName, lastName, memberID FROM member 
		WHERE '$firstName' = member.firstName 
		AND '$lastName' = member.lastName"; 
		
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$memberID = $row['memberID'];
		if (!$memberID)
			echo"<p> Member does not exist </p>";
		else{
			$query = "SELECT firstName, lastName, grade, seriesName, seriesYear, raceName, 
			raceDate, position FROM member, series, race, competitor 
			WHERE '$memberID' = competitor.memberID AND member.memberID = competitor.memberID
			AND race.seriesID = series.seriesID AND competitor.raceID = race.raceID
			AND position != 'NULL' ORDER by position";
		$result= mysqli_query($conn, $query);
				
		echo "<table>";
		echo "<tr> <th> First Name </th> <th> Last Name </th> 
		<th> Grade </th> <th> Series Name </th> 
		<th> Series Year </th> <th> Race Name </th>
		<th> Race Date </th> <th> Position </th> </tr>";
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
					echo "<td>".$row['firstName']."</td>";
					echo "<td>".$row['lastName']."</td>";
					echo "<td>".$row['grade']."</td>";
					echo "<td>".$row['seriesName']."</td>";
					echo "<td>".$row['seriesYear']."</td>";
					echo "<td>".$row['raceName']."</td>";
					echo "<td>".$row['raceDate']."</td>";
					echo "<td>".$row['position']."</td>";					
				echo "</tr>";
			}
		echo "</table>";
		}
		mysqli_close($conn);
		}
		echo "<a href='Index.php'> Back To Index </a>";
		
		require_once('footer.php');		
	echo "</body>";
echo "</html>"
?>          