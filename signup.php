<?php
$showAlert = false;
$showError = false;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$name = $_POST["n1"];
$enrollment = $_POST["enrolls"];
$branch = $_POST["branc"];
$year = $_POST["yr"];
$college_name = $_POST["cname"];
$email = $_POST["ema"];
$pass = $_POST["pas"];
$confirm_password = $_POST['cpas'];


$servername = "localhost";
$username = "root";
$password = "";
$database ="Library_Std";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
          die("sorry  we are unable to connect".mysqli_connect());
}
if($pass == $confirm_password)
{
//$hash = password_hash($pass, PASSWORD_DEFAULT);
$sql = "INSERT INTO `library_std1` (`Sno`, `Student_name`, `Enrollment`, `Branch`, `Year`, `College`, `Email`, `Password`, `Date`)
 VALUES ('', '$name', '$enrollment', '$branch', '$year', '$college_name', '$email', '$pass', current_timestamp())";
$result = mysqli_query($conn,$sql);
if($result)
{
          $showAlert = true;
}
}
else 
{
          $showError = true;
}
}
?>





<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Signup Form</title>
  </head>
  <body>

  <?php include 'partial.php'; ?>

  <!-- <img src=" https://source.unsplash.com/1350x300/?school,boys"> -->
<?php
if($showAlert)
{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Your successfully sign in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
if($showError)
{
  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Password incorrect retry again.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>
 
  <body background="b6.jpg">

 
  <div class="container text-center my-5 text-white"><h1>Signup Form</h1></div>
   
  <div class="container my-5 col-6 text-white">

    <form actions="signup.php" method="POST">

  <div class="form-group">
    <label for="exampleInputEmail1">Student Name</label>
    <input type="text" class="form-control"placeholder="Name" name="n1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Enrollment no</label>
    <input type="text" class="form-control"placeholder="Enrollment no" name="enrolls">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Branch</label>
    <input type="text" class="form-control"placeholder="Branch" name="branc">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Year</label>
    <input type="text" class="form-control"placeholder="year" name="yr">
</div>

<div class="form-group">
    <label for="exampleInputEmail1">College name</label>
    <input type="text" class="form-control"placeholder="college name" name="cname">
</div>




  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" email" name="ema">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" maxlength="8" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pas">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Comfirm Password</label>
    <input type="password" maxlength="8" class="form-control" id="exampleInputPassword1" placeholder="Password"name="cpas">
    <small id="emailHelp" class="form-text text-muted">Sure to make password.</small>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>