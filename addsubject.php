<?php
session_start();
include("includes/db.php");
if (isset($_SESSION['username']))
  $username = $_SESSION['username']; //has to be logged in
else
  header("refresh:2; url=login_teacher.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Subject</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="navigation.js"></script>
  <link href="navigation.css" rel="stylesheet" id="naviagtion-css">
  <link rel="stylesheet" href="cardstyles.css">
  <link rel="stylesheet" href="tablestyle.css">
  <link rel="stylesheet" href="formborder.css">
  <style>
    body {
      background-color: #ededed;
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand navbar-dark bg-primary fixed-top"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarsExample02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="firstteacher.php">Dashboard</a> </li>
      </ul>
      <form class="form-inline my-2 my-md-0"> </form>
    </div>
  </nav>
  <div id="wrapper" class="toggled">
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand"> <a href="firstteacher.php"> <?php echo $_SESSION['username'] ?> </a> </li>
        <li> <a href="firstteacher.php">Dashboard</a> </li>
        <li> <a href="subjects.php">Subjects</a> </li>
        <li> <a href="assignmentinside.php">Assignments</a> </li>
        <li> <a href="noticeinside.php">Notices</a> </li>
        <li> <a href="studyinside.php">Study Material</a> </li>
        <li> <a href="logout_teacher.php">Logout</a> </li>
      </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
      <div class="container mt-3 custom-form-container" style="width:1000px; margin:0 auto;">
        <center>
          <h2>Add Subject</h2>
        </center>
        <div class="p-4"></div>
        <div class="border-decoration">
        
        <form action="" method="get">
          <div class="form-group text-center">
            <div class="container">
            <div class="row d-flex justify-content-center">
            <label for="sel1" class="col-xs-6">Semester</label>
            <div class="p-2"></div>
            <select class="form-control w-25 col-xs-6" id="sel1" name="sem">
              <!---we can et the selected option using sem-->
              <option value="" selected disabled>Select</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
              <option>7</option>
              <option>8</option>
            </select>
            </div><!---row--->
          </div><!---container-------->
          </div><!--from group text centre---->
          
          <div class="form-group text-center">
            <div class="container">
            <div class="row d-flex justify-content-center">
            <label class="col-xs-6" >Subject</label>
            <div class="p-3"></div>
            <input type="text" name="subject" value="" class="form-control w-50 col-xs-6" placeholder="Subject">
            </div>
            </div>
          </div>
          </div>
          <div class="p-3"></div>
          <div class="d-flex justify-content-center">
          <button type="submit" name="button" class="btn btn-primary">Add</button>
          </div>
          <!-------Checks if user has submitted using button so get[button]------->
        </form>
        <?php

        if (isset($_GET['button'])) {
          $sem = $_GET["sem"];
          $subject = $_GET["subject"];
          if ($subject != "") {
            $query = "INSERT INTO sem_subject values($sem,'$subject','$username')";
            $data = mysqli_query($con, $query);
            if ($data) {?>
            <div class="p-2"></div>
            <div class="container d-flex justify-content-center">
            <div class="d-flex justify-content-center alert alert-success" style="width:30%">
              <?php echo "Subject added successfully"; ?>
            </div>
            </div>
            <?php }
          } else {?>
          <div class="p-2"></div>
          <div class="container d-flex justify-content-center">
          <div class="d-flex justify-content-center alert alert-success" style="width:30%">
          <?php echo "Select a subject First";?>
          </div>
          </div>
          <?php }
        }


        ?>
      </div>
      <!--container mt-5------->
    </div>
    <!--page content wrapper---->
  </div>
  <!---toggled----->
</body>

</html>