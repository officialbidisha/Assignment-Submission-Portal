<?php
session_start();
include("../includes/db.php");
if (isset($_SESSION['username']))
  $username = $_SESSION['username']; //has to be logged in
else
  header("refresh:2; url=login_teacher.php");
if (isset($_GET['sem'])) {
  $semester = $_GET['sem'];
}

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
        <li class="sidebar-brand"> <a href="#"> <?php echo $_SESSION['username'] ?> </a> </li>
        <li> <a href="firstteacher.php">Dashboard</a> </li>
        <li> <a href="assignmentinside.php">Assignments</a> </li>
        <li> <a href="noticeview.php">Notices</a> </li>
        <li> <a href="studyupload.php">Study Material</a> </li>
        <li> <a href="#">Contact</a> </li>
      </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">

      <div class="container mt-3 custom-form-container " style="width:1000px; margin:0 auto;">
        <center>
          <h3>View Given Assignments</h3>
        </center>
        <form>

          <div class="form-group text-center">
            <div class="container">
              
              <div class="row d-flex justify-content-center">
                <label for="sem">Semester</label>
                <div class="p-2"></div>
                <input type="number" class="form-control w-25 col-xs-6" id="num" value="<?php echo $semester; ?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
                <div class="p-2"></div>
                <button type="submit" class="btn btn-primary col-xs-6">Search</button>
              </div>
              <!---row end--->
            </div>
            <!--container end---->
          </div>
        </form>
        <?php
        if (isset($_GET["sem"]) && $_GET["sem"] != "") {
          $get_subject = "select * from sem_subject where sem=$semester AND teacher='$username'";
          $run_subject = mysqli_query($con, $get_subject);
          if (mysqli_num_rows($run_subject) > 0) {
        ?>
            <form action="" method="post">
              <input name="semester" value="<?php echo $_GET["sem"]; ?>" type="hidden">
              
              <div class="row d-flex justify-content-center">
              <div class="text-center ">
                <label for="exampleFormControlSelect1">Select</label>
              </div>
              <div class="p-3"></div>
                <div class=" form-group col-xs-6 w-25">

                  <select class="form-control" name="subject">
                    <!---the subject is the variable where the selected item is stored-->

                    <?php

                    while ($row_subject = mysqli_fetch_array($run_subject)) {

                      $subject = $row_subject['subject'];
                      echo "<option>$subject</option>";
                    }

                    ?>

                  </select>


                </div>
                <div class="p-2"></div>
                <div class="text-center col-xs-6 ">
                  <button type="submit" name="upload" class="btn btn-primary">View</button>
                </div>
              </div>
              <!---row end----->
            </form>
          <?php
          } else { //first if else
          ?>
            <div class="container d-flex justify-content-center">
              <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                <?php echo "Enter correct semester"; ?>
              </div>
              <!--first warning container--->
            </div>
            <!---second warning container--->
          <?php }
        } else { //second if else
          ?>
          <div class="container d-flex justify-content-center">
            <div class="d-flex justify-content-center alert alert-primary" style="width:30%">
              <?php echo 'Search a semester first'; ?>
            </div>
          </div>

        <?php }
        ?>
        <?php
        if (isset($_POST['subject']) && isset($_POST['semester'])) {
          $subject = $_POST['subject'];
          $query = "SELECT * from assignment_new where subject like '$subject' AND sem ='$semester'";
          $data = mysqli_query($con, $query);
          $total = mysqli_num_rows($data);
          if ($total > 0) {
        ?>
            
            <table class="table-design" style="text-align:center">
              <thead class="table-dark bg-primary">
                <tr>
                  <!---<th scope="col">Serial No.</th>--->
                  <th scope="col" >No.</th>
                  <th scope="col" >Assignment Viewing Link</th>
                  <th scope="col" >Date</th>
                </tr>
              </thead>

              <?php
              $counter = 1;

              while ($result = mysqli_fetch_array($data)) {
              ?>
                <tbody class="table-design">
                  <tr>
                    <td><?php echo $result['ass_no']; ?></td>

                    <td><?php echo $result['link']; ?></td>
                    <td><?php echo $result['submit_date']; ?></td>

                  </tr>
                </tbody>
          <?php
              }
            } else {?>
                <div class="container d-flex justify-content-center">
                <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                <?php  echo 'No Submissions'; ?>
                </div>
                </div>
            <?php }
          }
          ?>
            </table>
        

      </div>
      <!---container-mt5---->
    </div>
    <!---content wrapper---->
  </div>
  <!---wrapper- toggled----->
  <!---end of wrapper--->
</body>

</html>