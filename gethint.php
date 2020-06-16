<?php
	$db = mysqli_connect('localhost', 'root', '', 'project_baosam');
	mysqli_query($db,"SET NAMES 'UTF8'");
	$_id=$_GET["_id"];
	 $query = "SELECT * FROM location WHERE parent_id='$_id'";
  	$result = mysqli_query($db, $query);

  	echo "<select name='_District'>";
	while($row = mysqli_fetch_assoc($result))
	{
		echo "<option value = '". $row["Id"]."'>". $row['Name']." </option>";
	}
	echo "</select>";
?>