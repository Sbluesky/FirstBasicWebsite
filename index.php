<?php
	
	session_start();
	$db = mysqli_connect("localhost","root","","project_baosam");
	if(isset($_SESSION['ID']) || isset($_COOKIE['ID']))
	{
		$ID=$_COOKIE['ID'];
		$query = "SELECT * FROM user_pass WHERE ID='$ID'";
		$result = mysqli_query($db, $query);
		$row = mysqli_fetch_assoc($result);
		if($row["UserName"]=="admin")
			header('location:adminpage.php');
		else
			header('location:userpage.php');
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>BaoSam's web</title>
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

		<div class="body_div">
			<div class="container_infor">
				<div class="infor">
					<div class="log_in_text" > <center>LOG IN</center>
					</div>
					 
					<form method="POST" action="getform.php">
						<label class="label_login"> User name </label>
						<input type="text" name="User_name" class="input_login" required><br/>
						<label class="label_login" style="margin-left: -60px"> Pass </label>
						<input type="password" name="Pass" minlenght="8" class="input_login" style="margin: -35px 0px 0px 120px; " required><br/>
						<input type="checkbox" name="Remember_me" value="YES" style="margin: 80px 0px 0px -250px;" ><p style="margin: -17px 0px 0px 50px;">Remember me</p><br/>
						<input type="submit" value="LOG IN" name="Submit" class="submit">
					</form>
					<br/>
					<a href="dangki.php" style="margin-left: 30px">Register a new account</a>
				</div>

				<div class="infor" style="height: 730px">
					<label class="label_login" style="width: 200px; font-size: 20px; margin-left: 75px;">Home's Infor</label>
					<br/>
					<img src="./images/sam.jpg" style="width: 200px; margin-left: 50px; border-radius: 20px;">
					<br/>
					<br/>
					<center><p class="my_infor"> My Name: Trần Bảo Sam </p></center>
					<br/>
					<center><p class="my_infor"> BirthDay: 15-02-1997</p></center>
					<br/>
					<center><p class="my_infor"> HomeTown: Quy Nhơn </p></center>
					<br/>
					<br/>
					<center><p class="my_infor">Look up to the sky, not just the floor</p></center>

				</div>

			</div>
			<div class="container_infor" style="width: 835px">
				<div class="body_image" >
					<center><img class="image" src="./images/maple.jpg"/></center>
				</div>
				<div class="body_image" style="height: 540px">
					<center><img class="image" src="./images/autumn2.jpg"/></center>
				</div>
			</div>
		</div>

	</div>
</body>
</html>