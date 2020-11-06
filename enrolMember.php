<!-- Q10 -->

<?php
	$title = "Enrol Member";
	require_once('head.php');	
	
	echo "<body>";
		echo "<h2> Enrol Member </h2>";
		
		if(empty($_POST['firstName']))
			echo "<p>You must enter members first name</p>";
		else if(empty($_POST['lastName']))
			echo "<p>You must enter members last name</p>";
		else if(empty($_POST['courseName']))
			echo "<p>You must enter a course name</p>";
		
		else{
			$firstName =$_POST['firstName'];
			$lastName =$_POST['lastName'];
			$courseName =$_POST['courseName'];		
			
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');	

		$query = "SELECT memberID FROM member WHERE '$firstName' = member.firstName AND '$lastName' = member.lastName";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$memberID = $row['memberID'];
		
		$query = "SELECT courseID FROM course WHERE '$courseName' = course.courseName";				
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
		$courseID = $row['courseID'];	

		if(!$memberID)
			echo "<p> Member does not exist</p>";
		else if(!$courseID)
			echo "<p> Course does not exist</p>";
		else{				
			$query = "INSERT INTO enrolment VALUES(NULL, '$memberID', '$courseID')";				
			$result = mysqli_query($conn, $query);
								
		mysqli_close($conn);
		
		echo "<p> Your first name is $firstName and last name is $lastName </p>";
		echo "<p> Course Name $courseName </p>";
		}
		}
		echo "<a href='Index.php'> Back To Index </a>";
		require_once('footer.php');		
	echo "</body>";
echo "</html>"
?>          