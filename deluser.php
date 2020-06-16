<?php
	if(isset($_POST['submit']))
	{
		$array=$_POST['deluser'];
		$i=0;
		foreach ($array as $key => $i) 
		{


			$DelID=$array[$key];
			$db = mysqli_connect("localhost","root","","project_baosam");
			$query = "DELETE FROM user_pass WHERE ID=$DelID ";
			$result = mysqli_query($db, $query);
			$query = "DELETE FROM user_infor WHERE ID=$DelID ";
			$result = mysqli_query($db, $query);

		}
		
		header('location:adminpage.php');
	}

?>