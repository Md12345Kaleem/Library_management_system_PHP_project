<!DOCTYPE html>
<html lang="en">
<head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<title>Content Form</title>
</head>
<body>
          <?php include 'partial.php' ?>
          <?php include 'dbconnect.php' ?>


          <?php 
          $en = $_GET['catid'];
          $sql = "SELECT * FROM `library_std1` WHERE `Enrollment` LIKE '$en'";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $enrollment = $row['Enrollment'];
            $college = $row['College'];
            $branch = $row['Branch'];
            $year = $row['Year'];
            $Name = $row['Student_name'];
          }

          ?>
         
         <?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "library_std";
  $conn1 = mysqli_connect($servername, $username, $password, $database);
  $book = $_POST['Book'];
  $action = $_POST['Action'];

  $sql ="INSERT INTO `content` (`Subject_name`, `Action`, `Datetime`, `Enroll`)
   VALUES ('$book', '$action', current_timestamp(), '$en')";
   $result = mysqli_query($conn1, $sql);
}
?>


          <img src="https://source.unsplash.com/1349x200/?library,book">
          <br><br><center><h1><i><b>Student Detail</b></i></h1></center>
         Student Name = <b><?php echo $Name ?></b>
          <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Enrollment</th>
      <th scope="col">College</th>
      <th scope="col">Branch</th>
      <th scope="col">Year</th>
    </tr>
  </thead>


 
 <tbody>
    <tr>
      <th scope='row'><?php echo $enrollment; ?></th>
      <td><?php echo $college; ?></td>
      <td><?php echo $branch; ?></td>
      <td><?php echo $year; ?></td>
    </tr>
  </tbody>
         
</table>
          <br><br><br><br>


          <center><h1><i><b>Library Entry Box</b></i></h1></center><br><br><br>
         <form class="form-inline offset-3" action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
  <div class="form-group mb-2">
    <label for="staticEmail2" class="sr-only">Enter Book name</label>
    <input type="text" id="Books" name="Book" placeholder="Book's Name">
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Enter code of book</label>
    <input type="text"  id="inputPassword2" name="Action" placeholder="Book's Code">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>
<br><br>

<center><h1><i><b>Library Content</b></i></h1></center>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <!-- <th scope="col">S.no</th> -->
      <th scope="col">Subject</th>
      <th scope="col">Action</th>
      <th scope="col">Datetime</th>
    </tr>
  </thead>

  <?php 
          $en = $_GET['catid'];
         // $sql = "SELECT * FROM `content` WHERE `Enroll` LIKE '$en'";
         $sql = "SELECT * FROM `content` WHERE Enroll=$en";
          $result = mysqli_query($conn, $sql);
          while($row = mysqli_fetch_assoc($result))
          {
            $enroll = $row['Enroll'];
            $subject = $row['Subject_name'];
            $action = $row['Action'];
            $year = $row['Datetime'];
            //$Name = $row['Student_name'];
          


 echo ' <tbody class="container text-center">
    <tr>
     <!-- <th scope="row">no<th> -->
      <td>'.$subject.'</td>
      <td>'. $action.'</td>
      <td>'.$year.'</td>
    </tr>
  </tbody>';

}

?>


</table>
</body>
</html>