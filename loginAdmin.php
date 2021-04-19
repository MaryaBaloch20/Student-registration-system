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

    <title>Admin login</title>

<style type= "text/css"> 
	body
	{
		background-image: url(Images/AdminLogin.jpg);
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
 <div class="col-12">
 <nav>
         Student Registration System
 </nav>
 </div>
 </div>
 <div class="row">
 <div class="col-sm-4">
 </div>
 <div class="col-sm-4 m-auto">

 <br>
                  <div class="card">
                    <div class="card-header bg-dark">
                     <h1 class = "text-white text-center"> Admin Login </h1>
                     </div>

          <form action="loginAdmin_process.php" method="POST">
          <div class="from-group">
          <br>
                    
<br>
                   <label for="" class = "lb">Email : </label>
                   <input type="text" name="email" id="" class = "form-control" required > <br>

            
                   <label for="" class = "lb">Password : </label>
                   <input type="password" name="password" id="" class ="form-control" required> <br>

                   <button type = "submit" name = "sublogin" class = "btn btn-success lbutton"> Login Now
                  </button>

                 

                  </div>           
          </form>
          </div>
 </div>
 <div class="col-sm-4">
 </div>
 </div>

    
</body>
</html>