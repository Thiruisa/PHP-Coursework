<!-- Q4 -->

<?php
	$title = "List All Members";
	require_once('head.php');	
	
	echo "<body>";
		echo "<h2> List All Members </h2>";
		$conn = mysqli_connect('localhost', 'root', 'password', 'canary');
		
		$query = "SELECT * FROM member";				
		$result = mysqli_query($conn, $query);
		
		echo "<table>";
		echo "<tr> <th> ID </th> <th> First Name </th> <th> Last Name </th> <th> Grade </th></tr>";
			while ($row = mysqli_fetch_assoc($result))
			{
				echo "<tr>";
					echo "<td>".$row['memberID']."</td>";
					echo "<td>".$row['firstName']."</td>";
					echo "<td>".$row['lastName']."</td>";
					echo "<td>".$row['grade']."</td>";
				echo "</tr>";
			}
		echo "</table>";
		mysqli_close($conn);
		
		echo "<a href='Index.php'> Back To Index </a>";
		require_once('footer.php');		
	echo "</body>";
	
	
echo "</html>";
?>          
