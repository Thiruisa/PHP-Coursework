<!-- Q9 -->

<?php
	$title = "Members Participation Results";
	require_once('head.php');	
	
	echo "<body>";
		echo "<h2> Members Participation Results </h2>";
				
		if(empty($_POST['courseName']))
			echo "<p>You must enter a course name</p>";
		
		else{
			$courseName =$_POST['courseName'];
		
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');	
		
		$query = "SELECT courseName, courseID FROM course WHERE '$courseName' = course.courseName";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$courseID = $row['courseID'];		
		if (!$courseID)
			echo"<p> Course does not exist </p>";
		else{
			$query = "SELECT courseName, firstName, lastName, grade, seriesName, seriesYear, raceName, 
			raceDate, position, enrolmentID FROM course, member, series, race, competitor, enrolment		
			WHERE '$courseID' = enrolment.courseID AND member.memberID = enrolment.memberID 
			AND member.memberID = competitor.memberID AND race.seriesID = series.seriesID 
			AND competitor.raceID = race.raceID AND course.courseID = enrolment.courseID
			AND position != 'NULL' ORDER by lastName";
		$result= mysqli_query($conn, $query);
				
		echo "<table>";
		echo "<tr> <th> Course Name </th> <th> First Name </th> <th> Last Name </th> 
		<th> Grade </th> <th> Series Name </th> 
		<th> Series Year </th> <th> Race Name </th>
		<th> Race Date </th> <th> Position </th> </tr>";
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
					echo "<td>".$row['courseName']."</td>";
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