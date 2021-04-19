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

    <style>
    .cButton{
        margin-top : 20px;
    }
    .cButton{
        margin-bottom : 20px;
    }
    </style>
	
	<style type= "text/css"> 
	body
	{
		background-image: url(Images/view.jpg);
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
 include 'conn.php';

$ids = $_GET['id'];

$showquery = " select * from student where id=$ids";
$showdata = mysqli_query($con,$showquery);

$arrdata = mysqli_fetch_array($showdata);

 if(isset($_POST['updation'])){

    $idupdate = $_GET['id'];

     $rno = $_POST['rollno'];
     $fname = $_POST['fname'];
     $lname = $_POST['lname'];
     $faname = $_POST['faname'];
     $gender = $_POST['gender'];
     $dept = $_POST['dept'];
     $email = $_POST['email'];
     $password = $_POST['password'];


        $query = " UPDATE student set id=$id , rollno='$rno', fname='$fname', lname='$lname', faname='$faname', gender='$gender', dept='$dept', email='$email', password='$password' where id=$ids";
        
        $Resutl = mysqli_query($con,$query);
        if(Result){
            header('location:display.php');
        }
       else{
        header('location:update.php');
       }
    }
 
 ?>
 <div class="col-sm-3">
 
 </div>
 
 <div class="col-sm-6">
          <form method = "POST">
          <br> <br>
                  <div class="card">
                    <div class="card-header bg-dark">
                     <h1 class = "text-white text-center"> Update Student Record </h1>
                     </div>
<br>
                   <input type="text" name="rno" id="" class = "form-control" placeholder = "Student ID (eg. 01, 73, 116)" required value = "<?php echo $arrdata['rollno']; ?>"> <br>

                   <input type="text" name="fname" id="" class ="form-control" placeholder = "First Name" required value = "<?php echo $arrdata['fname']; ?>"> <br>

                   <input type="text" name="lname" id="" class ="form-control" placeholder = "Last Name" required value = "<?php echo $arrdata['lname']; ?>"> <br>

                   <input type="text" name="faname" id="" class ="form-control" placeholder = "Father Name" required value = "<?php echo $arrdata['faname']; ?>"> <br>

                  
                  <select name="gender" id="" class = "form-control" required value = "<?php echo $arrdata['gender']; ?>">
                  <option value="" disabled selected> Gender </option>
                  <option value="Male" > Male </option>
                  <option value="Female" > Female </option>
                  <option value="Others" > Others </option>
                  </select>
                      <br>
                  <select name="dept" id="" class = "form-control" required value = "<?php echo $arrdata['dept']; ?>">
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

                  <input type="email" name="email" id="" class ="form-control" placeholder = "Email" required  value = "<?php echo $arrdata['email']; ?>"> <br>

                  <input type="password" name="password" id="" class ="form-control" placeholder = "Password" required value = "<?php echo $arrdata['password']; ?>"> <br>

                   <button type = "submit" name = "updation" class = "btn btn-success text-white sButton"> UPDATE
                  </button>
                   
                  <button type = "submit" name = "cancel" class = "btn btn-danger text-white cButton"> <a href="display.php" class= "text-white">CANCEL</a>
                  </button>
                   
          </form>

 </div>
 <div class="col-sm-3">
 </div>
 </div>

    
</body>
</html>