<?php
	session_start();

	//kiểm tra cookie và session
	if(!isset($_SESSION['ID']) && !isset($_COOKIE['ID']))
		header('location:index.php');

	//kiểm tra người truy cập có phải admin hay không
	$db = mysqli_connect("localhost","root","","project_baosam");
	if(isset($_SESSION['ID']))
		$ID=$_SESSION['ID'];
	else if(isset($_COOKIE['ID']))
		$ID=$_COOKIE['ID'];
	$query = "SELECT * FROM user_pass WHERE ID='$ID'";
	$result = mysqli_query($db, $query);
	$row = mysqli_fetch_assoc($result);
	if($row["UserName"]!="admin")
		header('location:index.php');
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN'S PAGE</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="./css/style.css" media="screen, projection">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	<div class = "background_web">
		<div class = "header">
				<div class="icon_header"><i class="fas fa-cannabis"></i></div>
				<div class = "welcome_div"><center>ADMIN'S PAGE</center></div>
				<div class="icon_header_2"><i class="fas fa-cannabis"></i></div>
		</div>
		<div class="body_div" style="background-color: #660000">
			<div class="infor" style="width: 600px; height: 1100px;margin-left: 293px">
				<br/>
				<center><h2> USER LIST </h2></center>
				<br/>
				<br/>
				<br/>
				<?php
					
					$db = mysqli_connect("localhost","root","","project_baosam");
					$query = "SELECT * FROM user_pass ";
					$result = mysqli_query($db, $query);
					echo "<form method='POST' action='deluser.php'>";
					
					while($row = $result->fetch_assoc())
						{
							$ID=$row["ID"]; //select cột ID
							
							if(isset($_COOKIE["ID"]))
							{
									if($ID != $_COOKIE["ID"]) //kiểm tra xem ID đang đăng nhập đó có phải ID của admin không
								{
									echo '<input type="checkbox" name="deluser[]""  value="'.$ID.'">';
									echo "<p class='userinfor' style='margin-top: -20px;'> ID: " . $row["ID"]. " _ User: " . $row["UserName"]. "</p><br/>";
								}
							}

							else if(isset($_SESSION['ID']))
							{
									if($ID != $_SESSION["ID"]) //kiểm tra xem ID đang đăng nhập đó có phải ID của admin không
								{
									echo '<input type="checkbox" name="deluser[]""  value="'.$ID.'">';
									echo "<p class='userinfor' style='margin-top: -20px;'> ID: " . $row["ID"]. " _ User: " . $row["UserName"]. "</p><br/>";
								}
							}
							
							
						}

					echo "<input type='submit' value='Delete User' name='submit' class='submit' style='margin-left: 230px;'>";
					echo "</form>";
					
				?>

				<center><a href="logout.php"> LOG OUT</a></center>

			</div>
		</div>
	</div>
	
</body>
</html>