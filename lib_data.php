<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD']=="POST")  // && $rows = mysqli_fetch_assoc($result1)   && !password_verify($passw, $rows['Password']))
{
$Email= $_POST['email1'];
$password1 = $_POST['pass1'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "library_std";
$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn)
{
  die("sorry can not connect ".mysqli_connect());
}
$sql = "INSERT INTO `administrator` (`password`, `email`, `Datetime`) 
VALUES ('$password1', '$Email', current_timestamp());";
$result = mysqli_query($conn,$sql);
// $sql1 = "SELECT * FROM `library_std1` WHERE Password ='$passw'";
// $result1 = mysqli_query($conn,$sql1);
// $no = mysqli_num_rows($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>librarian1</title>
</head>
<body>
         <?php include 'partial.php' ?>
         <?php include 'dbconnect.php' ?>
         <img src="https://source.unsplash.com/1366x200/?nature,water"> <br><br><br><br>
         <form action="lib_data.php" method="POST">
  <div class="form-group col-4 offset-4">
    <label for="exampleInputEmail1 text-align='left'">Please Enter Your Email I.D</label>
   <center> <input type="email" class="form-control" id="exampleInputEmail1" 
   name="email1" aria-describedby="emailHelp" placeholder="Email I.D"></center>
    </div>
  <div class="form-group col-4 offset-4">
    <label for="exampleInputPassword1">Enter Your Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass1" placeholder="Password">
  </div>

<button type="submit" class="btn btn-outline-primary offset-4 col-2">Submit</button>
<!-- <a class="nav-link btn btn-outline-primary offset-4 my-1 col-2" href="check.php">create new id</a> -->
</form>
</body>
</html>