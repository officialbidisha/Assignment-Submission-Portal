<?php
session_start();
include("includes/db.php");
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username']; //has to be logged in
  $semester = $_SESSION['sem'];
} else
  header("refresh:2; url=login_student.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Assignment Submission</title>
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
        <li class="nav-item active"> <a class="nav-link" href="firststudent.php">Dashboard</a> </li>
      </ul>
      <form class="form-inline my-2 my-md-0"> </form>
    </div>
  </nav>
  <div id="wrapper" class="toggled">
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand"> <a href="#"> <?php echo $_SESSION['username'] ?> </a> </li>
        <li> <a href="firststudent.php">Dashboard</a> </li>
        <li> <a href="istudent.php">Assignments</a> </li>
        <li> <a href="noticeview.php">Notices</a> </li>
        <li> <a href="studyview.php">Study Material</a> </li>
        <li> <a href="logout_student.php">Logout</a> </li>
      </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
      <div class="container mt-3 custom-form-container " style="width:1000px; margin:0 auto;">
        <form action=" " method="post" enctype="multipart/form-data">
          <center>
            <h3>Submit Assignment</h3>
            <center>
              <div class="p-3"></div>
              <!-----<form>------>
              <div class="border-decoration">
                <div class="form-group">
                  <div class="row d-flex justify-content-center">
                    <div class="text-center ">
                      <label for="subject">Subject</label>
                    </div>
                    <div class="p-3"></div>
                    <select class="form-control col-xs-6 w-50" id="subjectControlSelect1" name="subject">
                      <?php
                      $get_subject = "select * from sem_subject where sem=$semester";
                      $run_subject = mysqli_query($con, $get_subject);

                      while ($row_subject = mysqli_fetch_array($run_subject)) {

                        $subject = $row_subject['subject'];
                        echo "<option>$subject</option>";
                      }

                      ?>


                    </select>
                  </div><!--row--->
                </div><!--form group--->
                <div class="p-2"></div>
                <div class="form-group">
                                    <div class="row d-flex justify-content-center">
                                        <label for="Assignment Number" class="col-xs-6">Number</label>
                                        <div class="p-2"></div>
                                        <input type="number" name="number" class="form-control col-xs-6 w-25" id="assignmentNo" aria-describedby="assignmentNoHelp" placeholder="Number" required>
                                    </div>
                                   
                                </div>

                                <!---<div class="form-group">
                                    <div class="row d-flex justify-content-center">
                                        <label for="Assignment Name" class="col-xs-6">Name</label>
                                        <div class="p-3"></div>
                                        <input type="text" name="name" class="form-control col-xs-6 w-25" id="assignmentName" placeholder=" Name" required>
                                    </div>
                                </div>--->
                                <div class="form-group">
                                    <div class="row d-flex justify-content-center">
                                        <label for="Assignment Name" class="col-xs-6">File</label>
                                        <div class="p-4"></div>
                                        <div class= "custom-file mb-3 col-xs-6 w-25">
                                        <label class="custom-file-label col-xs-6" for="customFile">Choose file</label>
                                        <input type="file" name="file" class="custom-file-input col-xs-6" required >
                                        <!--<input type="text" name="link" class="form-control col-xs-6 w-25" id="assignmentLink" placeholder="Link" required>--->
                                        
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="p-2"></div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="upload" class="btn btn-primary">Confirm Upload</button>
                            </div>

              </div>
              <!----border-decoration---->
              <div class="p-2"></div>
              
              <!---toggled---->

              <!-----</form>---->

        </form>
        <?php
        if ((isset($_POST['number']) == true) && (isset($_POST['subject']) == true) && (isset($_POST['upload']))) {
          $file = $_FILES['file'];
          $fileName = $_FILES['file']['name'];

          $fileTmpName = $_FILES['file']['tmp_name'];
          $fileSize = $_FILES['file']['size'];
          $fileError = $_FILES['file']['error'];
          $fileType = $_FILES['file']['type'];
          $fileExt = explode('.', $fileName);
          $fileActualExt = strtolower(end($fileExt));
          $allow = array('jpg', 'jpeg', 'png', 'pdf', 'pptx', 'docx', 'mp3', 'mp4');
          if (in_array($fileActualExt, $allow)) {
            if ($fileError == 0) {
              if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
              } else {
                echo "Your file size was too big";
              }
            } else {
              echo "There was an error uploading your file";
              $err = $_FILES['file']['error'];
              if ($err == 1) {
                echo " File size exceeded";
              }
            }
          } else {
            echo "You cannot upload files of this type";
          }
          $subject = $_POST['subject'];
          $number = $_POST['number'];
          $link = "http://localhost:8080/".$fileDestination;
          date_default_timezone_set('Indian/Antananarivo');
          $date = date("Y/m/d");
          $q = "select * from assignment_new where subject='$subject' AND ass_no='$number'";
          $run = mysqli_query($con, $q);
          if (mysqli_num_rows($run) > 0) {
            $current = date("Y-m-d");
            $row11 = mysqli_fetch_assoc($run);
            $submit_date = $row11['submit_date'];

            if ($submit_date >= $current) {
              $query = "INSERT INTO submission(ass_no,subject,sem,link,date,student_name) VALUES('$number','$subject','$semester','$link','$date','$username')";
              $data = mysqli_query($con, $query);
              if ($data) {
        ?>
                <div class="p-2"></div>
                <div class="container d-flex justify-content-center">
                  <div class="d-flex justify-content-center alert alert-success" style="width:30%">
                    <?php echo "Assignment Submitted on "; ?>
                    <?php echo $date; ?>
                  </div>
                </div>
              <?php } else { ?>
                <div class="p-2"></div>
                <div class="container d-flex justify-content-center">
                  <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                    <?php echo "Assignment Already Submitted"; ?>
                  </div>
                </div>
              <?php }
            } else { ?>
              <div class="p-2"></div>
              <div class="container d-flex justify-content-center">
                <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                  <?php echo "Submission Date Over"; ?>
                </div>
              </div>
            <?php }
          } else { ?>
            <div class="p-2"></div>
            <div class="container d-flex justify-content-center">
              <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                <?php echo "No Assignment with this number"; ?>
              </div>
            </div>
        <?php }
        }

        ?>

      </div>
      <script>
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
      </script>
</body>

</html>
