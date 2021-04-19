<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/bootstrap.min.css" >
    <script src="assets/jquery.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <title>Student Registration Form</title>

<style type= "text/css"> 
	body
	{
		background-image: url(Images/reg.jpg);
		background-size: cover;
		background-attachment: fixed;
	}
	.content
	{
		background: white;
		padding: 50px;
		width: 50%;
		margin: 100px auto;
	}
	p
	{
		font-size: 25px;
		color: black;
	}
	.log{
		margin-right : 30px;
	}
 </style>
    
</head>
<body>
 <div class="row">
 
 <div class="col-sm-4">
 </div>
 <div class="col-sm-4">
 </div>
 <div class="col-sm-4">
 </div>
 </div>

 <div class="row">
 <?php
 if(isset($_POST['registration'])){
     extract($_POST);

     if(strlen($rno) < 2){
         $error[] = ' Student id can not be less than 2 digits';
     }

     if(strlen($rno) > 4){
         $error[] = ' Student id can not be more than 4 digits';
     }

     if(!preg_match("/^[0-9]*$/", $rno)){
         $error[] = ' Student id can only be a numerical value';
     }
     
     if(strlen($fname)<3){
         $error[]= ' Please enter first name using 3 characters atleast!';
     }

     if(strlen($fname)>20){
        $error[]= ' First name can not be more than 20 characters long!';
     }
     if(!preg_match("/^[A-Za-z _]*[A-Za-z _]+[A-Za-z _]*$/",$fname)){
         $error[] = 'Invalid entry first name. Please enter letters without any digit or special symbols';
     }  
     
     if(strlen($lname)<3){
        $error[]= ' Please enter last name using 3 characters atleast!';
    }

    if(strlen($lname)>20){
       $error[]= ' Last name can not be more than 20 characters long!';
    }
    if(!preg_match("/^[A-Za-z _]*[A-Za-z _]+[A-Za-z _]*$/",$lname)){
        $error[] = 'Invalid entry last name. Please enter letters without any digit or special symbols';
    }  

    if(strlen($faname)<3){
        $error[]= ' Please enter father name using 3 characters atleast!';
    }

    if(strlen($faname)>20){
       $error[]= ' Father name can not be more than 20 characters long!';
    }
    if(!preg_match("/^[A-Za-z _]*[A-Za-z _]+[A-Za-z _]*$/",$faname)){
        $error[] = 'Invalid entry father name. Please enter letters without any digit or special symbols';
    }  
    if(strlen($email) > 50){
        $error[] = 'Email can not be more than 50 characters long!';
    }
    if(strlen($password) < 6){
        $error[] = 'Password can not be less than 6 characters!';
    }
    if(strlen($password) > 51){
        $error[] = 'Password can not be more than 50 characters!';
    }

    $sql = " select * from student where email = '$email';";
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0){
        $error[] = ' This email has been used already!';
    }

    $query = " select * from student where dept = '$dept' && rollno = '$rno';";
    $resSet = mysqli_query($con,$query);
    if(mysqli_num_rows($resSet) > 0){
            $error[] = 'Same id from same department has been regestered!';
    }
    

    $gender = $_POST['gender'];
    $dept = $_POST['dept'];

    if(!isset($error)){
        $dor = date('Y-m-d');
        
        $sql2 = "INSERT INTO student values('','$rno','$fname','$lname','$faname','$gender','$dept', '$dor','$email', '$password')";
        $result = mysqli_query($con,$sql2);

        if($result){
            $done = 2;
        }
         else{
             $error[] = 'Failed : Something went wrong';
         }
    }
 }
 ?>
 <div class="col-sm-3">
  <?php
  if(isset($error)){
      foreach($error as $error){
          echo '<p class= "errmsg">&#x26A0;'.$error.'</p>';
      }
  }
  ?>
 </div>
 <?php
 if(isset($done)){
 ?>
 <div class="successmsg">
 <span style = "font-size:100px;">&#9989;</span>
 YOU HAVE SUCCESSFULLY REGISTERED! &nbsp; &nbsp; &nbsp;
 <br> <br>
 <a href="login.php" style = "color:#fff"> Click here to Login..</a>
 <br>
 <br>
 </div>
 <?php
 } else {
 ?>
 <div class="col-sm-6">
          <form method = "POST">
          <br> <br>
                  <div class="card">
                    <div class="card-header bg-dark">
                     <h1 class = "text-white text-center"> Student Registration Form </h1>
                     </div>
<br>
                   <input type="text" name="rno" id="" class = "form-control" placeholder = "Student ID (eg. 01, 73, 116)" required value = "<?php if(isset($error)) { echo $rno;} ?>"> <br>

                   <input type="text" name="fname" id="" class ="form-control" placeholder = "First Name" required value = "<?php if(isset($error)) { echo $fname;} ?>"> <br>

                   <input type="text" name="lname" id="" class ="form-control" placeholder = "Last Name" required value = "<?php if(isset($error)) { echo $lname;} ?>"> <br>

                   <input type="text" name="faname" id="" class ="form-control" placeholder = "Father Name" required value = "<?php if(isset($error)) { echo $faname;} ?>"> <br>

                  
                  <select name="gender" id="" class = "form-control" required value = "<?php if(isset($error)) { echo $gender;} ?>">
                  <option value="" disabled selected> Gender </option>
                  <option value="Male" > Male </option>
                  <option value="Female" > Female </option>
                  <option value="Others" > Others </option>
                  </select>
                      <br>
                  <select name="dept" id="" class = "form-control" required value = "<?php if(isset($error)) { echo $dept;} ?>">
                  <option value="" disabled selected> Department </option>
                  <option value="Computer System Engineering" > Computer System Engineering </option>
                  <option value="Software Engineering" > Software Engineering </option>
                  <option value="Mechanical Engineering" > Mechanical Engineering </option>
                  <option value="Electrical Engineering" > Electrical Engineering </option>
                  <option value="Biomedical Engineering" > Biomedical Engineering </option>
                  <option value="Electronics Engineering" > Electronics Engineering </option>
                  <option value="Telecommunication Engineering" > Telecommunication Engineering </option>
                  <option value="Textile Engineering" > Textile Engineering </option>
                  </select>
                  <br>
                 
                  <input type="email" name="email" id="" class ="form-control" placeholder = "Email" required value = "<?php if(isset($error)) { echo $email;} ?>"> <br>

                  <input type="password" name="password" id="" class ="form-control" placeholder = "Password" required> <br>

                   <button type = "submit" name = "registration" class = "btn btn-success text-white "> SUBMIT
                  </button>
                  <?php } ?>
          </form>

 </div>
 <div class="col-sm-3">
 </div>
 </div>

    
</body>
</html>