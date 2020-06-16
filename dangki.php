<!DOCTYPE html>
<html>
<head>
	<title>Create a new account</title>
	<meta charset="utf-8">
	<link type="text/css" rel="stylesheet" href="./css/style_1.css" media="screen, projection">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	
	<script>
	function showHint(str) {
	    if (str.length == 0) { 
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else {
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET", "gethint.php?_id=" + str, true);
	        xmlhttp.send();
	    }
	}

	
	</script>

</head>
<body>
	<div class="_Container">
		<div class="_Header">
			<center><h2>CREATE A NEW ACCOUNT</h2></center>
		</div>
		<div class="_Name">
			<form method="POST" action="server.php" name="form_name" onsubmit="return Validate()" >
				<label class="_Label">First Name: </label>
				<input type="text" name="_First_Name" class="_Input"><br/>		
				<br/>

				<label class="_Label">Last Name: </label>
				<input type="text" name="_Last_Name" class="_Input"><br/>
				<br/>

				<label class="_Label" style="margin-right: 70px;">Birth Day: </label>
				<input type="date" name="_Date" class="_Input"><br/>
				<br/>

				<label class="_Label" style="margin-right: 36px;">Gender: </label>
				<input type="radio" name="_Gender" value="Female" style="margin-left: 50px;" ><label class="_Label" style="margin-left: 20px;" >Female</label><br/>
				<input type="radio" name="_Gender" value="Male" style="margin-left: 231px;"><label class="_Label" style="margin-left: 20px;">Male</label><br/>
				<input type="radio" name="_Gender" value="Other" style="margin-left: 231px;"><label class="_Label" style="margin-left: 20px;">Other</label><br/>
				<br/>

				<label class="_Label" style="margin-right: 33px;">Phone Number: </label>
				<input type="text" name="_Phone_Number" class="_Input">
				<br/>
				<br/>
				<div id="email_div" >
				<label class="_Label" style="margin-right: 95px;">Email: </label>
				<input type="text" name="_Email" class="_Input" style="width: 330px">
				<div id="email_error"></div>
				</div>
				<br/>
				<br/>


				<label class="_Label" style="margin-right: 71px;">City: </label>
				<Div id = "City" style="margin-left:  230px; margin-top: -15px">
				<select name="_City" onchange="showHint(this.value)"> <-!khi hàm select thay đổi dữ liệu->
				<?php
					$db = mysqli_connect('localhost', 'root', '', 'project_baosam');
					$query = "SELECT * FROM location";
					mysqli_query($db,"SET NAMES 'UTF8'");

				  	$result = mysqli_query($db, $query);
				  	
					while($row = $result->fetch_assoc())
					{
						if($row["parent_id"]== 0)
							echo "<option name = 'id_city' value = '". $row["Id"]."'>". $row['Name']." </option>";
					}
				?>
					
				</select>
				</Div>


				<br/>
				<br/>

				<label class="_Label" style="margin-right: 71px;">District: </label>
				<Div id="txtHint" style="margin-left:  230px; margin-top: -15px">
				<select name="_District" >
					
				</select>
				</Div>
				<br/>
				<br/>

				<div id="username_div">
				<label class="_Label" style="margin-right: 61px;">User Name: </label>
				<input type="text" name="_User_Name" class="_Input">
				<div id="name_error"></div>
				</div>
				
				<br/>
				<br/>
				<div id="pass_div">
				<label class="_Label" style="margin-right: 71px;">Password: </label>
				<input type="Password" name="_Pass" class="_Input">
				<br/>
				<div id="password_error"></div>
				<br/>

				<label class="_Label" style="margin-right: 19px;">Password Confirm: </label>
				<input type="Password" name="_Pass_Confirm" class="_Input">
				</div>
				<br/>
				<br/>
				<input type="submit" name="_Submit" value="Submit" class="_Submit">
				

			</form>
			<script type="text/javascript">
				//document.form[tên form][ tên trường].value= // lấy giá trị từ form html
				var username=document.forms['form_name']['_User_Name'];
				var email=document.forms ['form_name']['_Email'];
				var pass=document.forms['form_name']['_Pass'];
				var pass_confirm =document.forms['form_name']['_Pass_Confirm'];
				//Select all error display elements
				var name_error = document.getElementById('name_error'); 
				var email_error = document.getElementById('email_error');
				var password_error = document.getElementById('password_error');
				
				

				//validation functions

				function Validate()
				{
					//validate username
					if(username.value=="")
					{
						username.style.border = "1px solid red";
				        document.getElementById('username_div').style.color="red";
				       	name_error.textContent = "Username is required";
				        username.focus();
				        return false;
					}

					// //validate username
					if(username.value.length < 3)
				    {
				        username.style.border = "1px solid red";
				        document.getElementById('username_div').style.color="red";
				        name_error.textContent = "Username must be at least 3 character";
				        username.focus();
				        return false;

				    }

				    if(email.value=="")
					{
						email.style.border = "1px solid red";
				        document.getElementById('email_div').style.color="red";
				        email_error.textContent = "Email is required";
				        email.focus();
				        return false;
					}

					if(pass.value!=pass_confirm.value)
					{
						pass.style.border = "1px solid red";
						pass_confirm.style.border = "1px solid red";
				        document.getElementById('pass_div').style.color="red";
				        password_error.textContent = "Pass isn't same";
				        pass.focus();
				        return false;
					}

				}
			</script>
		</div>

	</div>
</body>