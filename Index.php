<?php
	$title = "Home Page";
	require_once('head.php');
?>

<body>
	<table>
	
	<tr>
	<td>
	<h1> Add Member </h1>
	<form action = "addMembers.php" method="post"><br>
		First Name: <br><input type="text" name = "firstName"><br>
		Last Name: <br><input type="text" name = "lastName"><br>
		Grade: <br><input type="text" name = "grade"><br>
		<input class = 'btn' type = "Submit" value = "Add Member">
	</form><br>
	</td>
	
	<td>
	<h1> Delete Race </h1>	
	<form action = "deleteRace.php" method="post"><br>
		Race ID: <br><input type="text" name = "raceID"><br>
	<input class = 'btn' type = "Submit" value = "Delete Race">
	</form><br>
	</td>
	
	<td>	
	<h1> Member List </h1>		
	<form action = "memberList.php" method="post"><br>
	<input class = 'btn' type = "Submit" value = "List all Members">
	</form><br>
	</td>
	
	<td>	
	<h1> Assign Member </h1>	
	<form action = "assignMember.php" method="post"><br>
		MemberID: <br><input type = "text" name = "memberID"><br>
		RaceID: <br><input type = "text" name = "raceID"><br>
		<input class = 'btn' type = "Submit" value = "Assign Member">
	</form><br>
	</td>

	<td>	
	<h1> Race Results </h1>		
	<form action = "raceResults.php" method="post"><br>
		MemberID: <br><input type = "text" name = "memberID"><br>
		RaceID: <br><input type = "text" name = "raceID"><br>
		Position: <br><input type = "text" name = "position"><br>
		<input class = 'btn' type = "Submit" value = "Race Results">
	</form><br>
	</td>
	</tr>
	
	<tr>
	<td>	
	<h1> Members Results </h1>
	<form action = "listMemberResults.php" method="post"><br>
		First Name: <br><input type="text" name = "firstName"><br>
		Last Name: <br><input type="text" name = "lastName"><br>
	<input class = 'btn' type = "Submit" value = "List Members Results">
	</form><br>
	</td>
	
	<td>	
	<h1> Participation Results </h1>
	<form action = "raceParticipated.php" method="post"><br>
		Course Name: <br><input type="text" name = "courseName"><br>
	<input class = 'btn' type = "Submit" value = "Member Participation">
	</form><br>
	</td>

	<td>	
	<h1> Enrol Member </h1>		
	<form action = "enrolMember.php" method="post"><br>
		First Name: <br><input type = "text" name = "firstName"><br>
		Last Name: <br><input type = "text" name = "lastName"><br>
		Course Name: <br><input type = "text" name = "courseName"><br>
		<input class = 'btn' type = "Submit" value = "Enrol Member">
	</form><br>
	</td>
	
	<td>	
	<h1> Add New Race </h1>		
	<form action = "addNewRace.php" method="post"><br>
		Race Name: <br><input type = "text" name = "raceName"><br>
		Race Date: <br><input type = "text" name = "raceDate"><br>
		Series Name: <br><input type = "text" name = "seriesName"><br>
		Series Year: <br><input type = "text" name = "seriesYear"><br>
		<input class = 'btn' type = "Submit" value = "Add Race">
	</form><br>
	</td>
	
	<td>	
	<h1> Assign Race </h1>		
	<form action = "assignRace.php" method="post"><br>
		First Name: <br><input type = "text" name = "firstName"><br>
		Last Name: <br><input type = "text" name = "lastName"><br>
		Race Name: <br><input type = "text" name = "raceName"><br>
		Series Name: <br><input type = "text" name = "seriesName"><br>
		Series Year: <br><input type = "text" name = "seriesYear"><br>
		<input class = 'btn' type = "Submit" value = "Assign Race">
	</form><br>
	</td>
	</tr>
	</table>

<?php
	require_once('footer.php');
?>	
	
</body>
</html>  