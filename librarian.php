<?php 
$showright = false;
$showerror = false;
if($_SERVER['REQUEST_METHOD']=="POST")
{
$en =$_POST['Enroll']; 

$username = "localhost";
$password = "root";
$document = "";
$database = "library_std";
$conn = mysqli_connect($username,$password,$document,$database);

$sql = "SELECT * FROM `library_std1` WHERE Enrollment='$en'";
$result = mysqli_query($conn,$sql);
$no = mysqli_num_rows($result);
if($no>0)
{
while($row = mysqli_fetch_assoc($result))
{
  if(!password_verify($en, $row['Enrollment']))
  {
  $showright = true;


  header("Location: librarian.php?cat_id=$en");
  echo "kaleem khan improve your skill ";
  }
  else 
  {
   
    echo "plz check your enrollment";
  }
}
}
else 
{
   $showerror = true;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <title>Member</title>
</head>
<body>
       <?php include 'partial.php' ?>
       <?php include 'dbconnect.php' ?>
       <img src="https://source.unsplash.com/1366x200/?nature,water"> 
       
       
<br><br><br><br>

       <form action="librarian.php" method="POST">
  <div class="form-group  offset-4">
    <label for="exampleInputPassword1">Enter Student Enrollment No:</label>
    <input type="text" class="form-control col-4" id="exampleInputPassword1" placeholder="Enrollment" name="Enroll">
    </div>
  <button type="submit" class="btn btn-primary offset-4 ">Search</button>
</form>





<br><br>
<center><b><h1><i>Student Id</i> </h1></b></center>
<table class="table table-borderless table-dark">
  <thead>
    <tr>
      <th scope="col">Enrollment</th>
      <th scope="col">College</th>
      <th scope="col">Branch</th>
      <th scope="col">Year</th>
    </tr>
  </thead>

 
  <?php
  $showAlert = false;
   if($_SERVER['REQUEST_METHOD']=="GET")
  {
    $enrollment = $_GET['cat_id'];
    $sql = "SELECT * FROM `library_std1` WHERE Enrollment = '$enrollment'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $name = $row['Student_name'];
        $roll_no = $row['Enrollment'];
        $college = $row['College'];
        $year = $row['Year'];
        $branch = $row['Branch'];
        $showAlert = true;
    }
   
  }
else 
{
  echo "please check your enrollment";
}
if($showAlert)
{
echo 'Student name :  <b>'.$name.'</b>
<tbody>
        <tr>
          <th scope="row">'.$roll_no.'</th>
          <td>'.$college.'</td>
          <td>'.$branch.'</td>
          <td>'.$year.'</td>
        </tr>
      </tbody>';
}
if($showerror)
{
  //echo "Test plz";
}
?>
</table>

<br><br>
<center><b><h1><i>Book List </i> </h1></b></center>
<table class="table table-borderless table-dark text-center">
  <thead>
    <tr>
      <th scope="col">Book </th>
      <th scope="col">Code</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php 
  {
  if($_SERVER['REQUEST_METHOD']=="GET")
  {
    $enroll = 10;
  $enroll = $_GET['cat_id'];
  $sql = "SELECT * FROM `content` WHERE Enroll = '$enroll'";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result))
  {
    $b_name = $row['Subject_name'];
    $code = $row['Action'];
    $date = $row['Datetime'];
    $action = $row['Enroll'];
    $sno = $row['Sno'];
    $delete = "DELETE FROM `content` WHERE `content`.`Sno` = '$sno'";
echo'<tbody>
    <tr>
      <th scope="row">'.$b_name.'</th>
      <td>'.$code.'</td>
      <td>'.$date.'</td>
      <td> <button type="'.$delete.'" class="btn btn-primary offset-0 ">Return</button> </td>
    </tr>
  </tbody>';
  }
}
}
  ?>
 
</table>

</body>
</html>