<?php
	session_start(); //bắt đầu session
	$errors=array();
	if(isset($_POST['Submit']))
	{
		
		//kết nối database
		$db = mysqli_connect("localhost","root","","project_baosam");

		if(!$db)
		{
			die('Could not connect' . mysql_error()); // sau hàm die thì k chạy code nữa 
		}

		$username = mysqli_real_escape_string($db, $_POST['User_name']);
		$password = mysqli_real_escape_string($db, $_POST['Pass']);

		if (empty($username)) 
			array_push($errors, "Username is required");
		if (empty($password))
			array_push($errors, "Password is required");

		if (count($errors) == 0) 
		{

			$password = md5($password);
			$query = "SELECT * FROM user_pass WHERE UserName='$username' AND UserPass='$password'";
			$results = mysqli_query($db, $query); // send query 

			//num_rows trả về số dòng result
			if (mysqli_num_rows($results) == 1) //Kiểm tra xem đúng user và pass không
			{

				$ID=$results -> fetch_assoc()["ID"]; // lấy ID của user đăng nhập
				
	   			$_SESSION['ID'] = $ID;

	   			//cookie
				if($_POST['Remember_me']=="YES")
				{
					
					setcookie('ID',$ID, time() + (60)); //lưu thông tin trong vòng 30 ngày kể từ thời điểm này //68400==1day
				}

				

				if($username=='admin') //kiểm tra phải Admin hay không
					header('location:adminpage.php');
				else
					header('location:userpage.php' );

				
			}
			else 
			{
				array_push($errors, "Wrong username/password combination");
				print_r($errors);
			}
		}
				
		 	//user=root, pass=null

		mysqli_close($db);//đóng kết nối
	
	}

	
		
?>