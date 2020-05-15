<?php
session_start();
include("../includes/db.php");
if (isset($_SESSION['username'])){
  $username = $_SESSION['username']; //has to be logged in
  $semester=$_SESSION['sem'];
  }
else
  header("refresh:2; url=login_teacher.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
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
        <li> <a href="assignmentinside.php">Assignments</a> </li>
        <li> <a href="noticeview.php">Notices</a> </li>
        <li> <a href="studyupload.php">Study Material</a> </li>
        <li> <a href="#">Contact</a> </li>
      </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
      <div class="container mt-3 custom-form-container" style="width:1000px; margin:0 auto;">
        <center>
          <h2>Delete Subject</h2>
        </center>
        <div class="p-4"></div>
        <div class="border-decoration">
        
        <form action="" method="get">
          <div class="form-group text-center">
            <div class="container">
            <div class="row d-flex justify-content-center">
            <label class="col-xs-6" >Subject</label>
            <div class="p-3"></div>
            <select class="form-control col-xs-6 w-50" id="subjectControlSelect1" name="subject">
                      <?php
                      $get_subject = "select * from sem_subject where teacher='$username'";
                      $run_subject = mysqli_query($con, $get_subject);

                      while ($row_subject = mysqli_fetch_array($run_subject)) {

                        $subject = $row_subject['subject'];
                        echo "<option>$subject</option>";
                      }

                      ?>


            </select>
            </div>
            </div>
          </div>
          </div>
          <div class="p-3"></div>
          <div class="d-flex justify-content-center">
          <button type="submit" name="button" class="btn btn-primary">Delete</button>
          </div>
          <!-------Checks if user has submitted using button so get[button]------->
        </form>
        <?php

        if (isset($_GET['button'])) {
         // $sem = $_GET["sem"];
          $subject = $_GET["subject"];
          if ($subject != "") {
            $query = "DELETE from sem_subject where subject ='$subject'";
            $data = mysqli_query($con, $query);
            if ($data) {?>
            <div class="p-2"></div>
            <div class="container d-flex justify-content-center">
            <div class="d-flex justify-content-center alert alert-success" style="width:30%">
                <?php echo "Subject Deleted Successfully";?>
            </div>
            </div>
            <?php }
          } else {?>
            <div class="p-2"></div>
            <div class="container d-flex justify-content-center">
            <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                <?php echo "Incorrect Details"; ?>
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