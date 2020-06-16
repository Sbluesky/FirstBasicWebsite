<?php

// initializing variables
$_First_Name = $_POST['_First_Name'];
$_Last_Name=$_POST['_Last_Name'];
$_Email    = $_POST['_Email'];
$_Date=$_POST['_Date'];
$_Gender=$_POST['_Gender'];
$_Phone_Number=$_POST['_Phone_Number'];
$_User_Name="";
$_Pass="";
$errors = array(); 


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project_baosam');

// REGISTER USER
if (isset($_POST['_Submit'])) 
  {
  // receive all input values from the form
  //function mysqli_real_escape_string delete special character in string
    $_User_Name = mysqli_real_escape_string($db, $_POST['_User_Name']);
    $_Pass = mysqli_real_escape_string($db, $_POST['_Pass']);
   
    // form validation: ensure that the form is correctly filled
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($_User_Name)) { array_push($errors, "Username is required"); }
    if (empty($_Pass)) { array_push($errors, "Password is required"); }
    if (empty($_First_Name)) { array_push($errors, "First Name is required"); }
    if (empty($_Last_Name)) { array_push($errors, "Last Name is required"); }
    if (empty($_Email)) { array_push($errors, "Email is required"); }
    if (empty($_Date)) { array_push($errors, "Birth Day is required"); }
    if (empty($_Gender)) { array_push($errors, "Gender is required"); }
    if (empty($_Phone_Number)) { array_push($errors, "Phone Number is required"); }
  }

  // first check the database to make sure 
  // a user does not already exist with the same username 
  $user_check_query = "SELECT * FROM user_pass WHERE UserName='$_User_Name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);

  //Hàm mysqli_fetch_assoc () tìm nạp một hàng kết quả dưới dạng một mảng kết hợp.
  //Hàm mysqli_fetch_array () tìm nạp một hàng kết quả dưới dạng một mảng kết hợp, mảng số or cả hai.

  //Note: Các tên trường được trả về từ hàm này phân biệt chữ hoa chữ thường.
  $user = mysqli_fetch_assoc($result);
  
  if ($user) // if user exists
    if ($user['UserName'] === $_User_Name)
      array_push($errors, "Username already exists");


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) 
  {
  	$password = md5($_Pass);//encrypt the password before saving in the database

  	$query = "INSERT INTO user_pass (ID, Username, UserPass) 
  			  VALUES('', '$_User_Name', '$password')";
  	mysqli_query($db, $query);
    $query = "INSERT INTO user_infor (PersonID, FirstName, LastName, BirthDay, Gender, PhoneNumber, Email) 
          VALUES('', '$_First_Name', '$_Last_Name', '$_Date', '$_Gender', '$_Phone_Number', '$_Email')";

    //echo mysqli_insert_id($db); // in ra id được insert vào

    mysqli_query($db, $query);
  	header('location:index.php');
  }
  else
  {
    echo "Errors: ";
    print_r($errors);
  } 

?>