<?php
	session_start();
	if(!isset($_COOKIE['ID']) && !isset($_SESSION['ID']))
		header('location:index.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Your's Page</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="./css/style.css" media="screen, projection">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class = "background_web">
		<div class = "header">
				<div class="icon_header"><i class="fas fa-cannabis"></i></div>
				<div class = "welcome_div"><center>WELCOME TO MY HOME</center></div>
				<div class="icon_header_2"><i class="fas fa-cannabis"></i></div>
		</div>
		<div class="body_div" style="background-color: #660000; height: 1500px">
			<div class="infor" style="width: 600px; height: 1300px;margin-left: 293px">
				<br/>
				<center><h2> YOUR INFORMATION </h2></center>
				<br/>
				<br/>
				<br/>
				<?php
					if(isset($_COOKIE['ID']))
						$ID= $_COOKIE['ID'];
					if(isset($_SESSION['ID']))
						$ID= $_SESSION['ID'];
					$db = mysqli_connect("localhost","root","","project_baosam");
					$query = "SELECT * FROM user_infor WHERE PersonID='$ID' ";
					$result = mysqli_query($db, $query);
					while($row = $result->fetch_assoc())
						{
							if(!is_null($row["avatar"]))
								echo "<center><img class='avatar' src='".$row["avatar"]."'></center>";
							echo "<p class='userinfor'> ID: " . $row["PersonID"]. "</p><br/>";
							echo "<p class='userinfor'> Name: " . $row["FirstName"]. " " . $row["LastName"]. "</p><br/>";
							echo "<p class='userinfor'> Birthday: " . $row["BirthDay"]."</p><br/>";
							echo "<p class='userinfor'> Gender: " . $row["Gender"]."</p><br/>";
							echo "<p class='userinfor'> PhoneNumber: " . $row["PhoneNumber"]."</p><br/>";
							echo "<p class='userinfor'> Email: " . $row["Email"]."</p><br/>";
							
						}

				?>
				
				<br/>
				<form action="upload.php" method="post" enctype="multipart/form-data">
				<br/>
			    <label class="label_login">Avatar:</label><br/><br/>
			    <input type="file" name="fileToUpload" id="fileToUpload" ><br/>
			    <br/>
			    <center><input type="submit" value="Upload Image" name="submit" class="submit" style="margin-left: -10px"><br/></center>
			    <br/>

				<center><a href="logout.php"> LOG OUT</a></center>
				
			</div>
		</div>
	</div>
	
</body>
</html>