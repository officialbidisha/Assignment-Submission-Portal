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
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Teacher Dashboard</a>
      </li>
    </ul>
  </nav>
  <div class="container mt-5">
    <h3>View Given Assignments</h3>
    <form>
      <div class="form-group">
        <label for="sem">Semester</label>
        <input type="number" class="form-control" id="num" value="<?php echo $semester; ?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php
    if (isset($_GET["sem"]) && $_GET["sem"]!="") {
        $get_subject = "select * from sem_subject where sem=$semester AND teacher='$username'";
        $run_subject = mysqli_query($con, $get_subject);
        if(mysqli_num_rows($run_subject)>0){
    ?>
      <form action="" method="post">
        <input name="semester" value="<?php echo $_GET["sem"]; ?>" type="hidden">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select</label>
          <select class="form-control" name="subject">
            <!---the subject is the variable where the selected item is stored-->

            <?php

            while ($row_subject = mysqli_fetch_array($run_subject)) {

              $subject = $row_subject['subject'];
              echo "<option>$subject</option>";
            }

            ?>

          </select>
          <button type="submit" name="upload" class="btn btn-dark">View</button>
        </div>
      </form>
    <?php
              }
              else{//first if else
                echo "Enter correct semester";
            }  
        }
        else{//second if else
                echo 'Search a semester first';
            }
    ?>
    <?php
      if (isset($_POST['subject']) && isset($_POST['semester'])) {
       $subject=$_POST['subject'];
       $query = "SELECT * from assignment_new where subject like '$subject' AND sem ='$semester'";
       $data = mysqli_query($con, $query);
       $total=mysqli_num_rows($data);
      if ($total>0) {
    ?>
                  <table class="table">
                        <thead>
                                        <tr>
                                                <!---<th scope="col">Serial No.</th>--->
                                                <th scope="col">Assignment Number</th>
                                                <th scope="col">Link</th>
                                                <th scope="col">Submit Date</th>
                                        </tr>
                        </thead>

                        <?php
                              $counter=1;

                              while($result=mysqli_fetch_array($data)){
                        ?>
                                <tbody>
                                       <tr>
                                            <td><?php echo $result['ass_no'];?></td>
                                            
                                            <td><?php echo $result['link']; ?></td>
                                            <td><?php echo $result['submit_date']; ?></td>

                                       </tr>
                                </tbody>
                              <?php
                                    }
                              }
                              else{
                                     echo 'No Submissions';

                              }
                          }
                    ?>
                  </table>

  </div>
</body>

</html>