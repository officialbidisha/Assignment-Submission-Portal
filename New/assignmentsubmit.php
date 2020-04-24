<?php
        session_start();
        include("../includes/db.php");
        if(isset($_SESSION['username'])){
            $username=$_SESSION['username'];//has to be logged in
            $semester=$_SESSION['sem'];
         }
        else
                header( "refresh:2; url=login_student.php" );
        
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
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">Student Dashboard</a>
    </li>
  </ul>
</nav>
<div class="container mt-5">
     <form action=" " method="post">
     <h3>Upload Assignment</h3>
            <!-----<form>------>
                <div class="form-group">
                                <label for="subject">Select Subject</label>
                                <select class="form-control" id="subjectControlSelect1" name="subject">
                                        
                                        <?php
                                                $get_subject="select * from sem_subject where sem=$semester"; 	
                                                $run_subject=mysqli_query($con,$get_subject);
                            
                                                while($row_subject=mysqli_fetch_array($run_subject))
                                                {
                                            
                                                    $subject=$row_subject['subject'];
                                                    echo "<option>$subject</option>";
                                                }
                                                
                                        ?>
                                        
                                        
                                </select>
                        <div class="form-group">
                            <label for="Assignment Number">Assignment Number</label>
                            <input type="number" name="number" class="form-control" id="assignmentNo" aria-describedby="assignmentNoHelp" placeholder="Assignment Number" required>
                        </div>
                        <div class="form-group">
                            <labe l for="AssignmentLink">Assignment Link</label>
                            <input type="text" name="link" class="form-control" id="assignmentLink" placeholder="Assignment Link" required> 
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            
              
            <!-----</form>---->

     </form>
                    <?php
                            if((isset($_POST['number'])==true) && (isset($_POST['subject'])==true) && (isset($_POST['link'])==true)){
                                    $subject = $_POST['subject'];
                                    $number = $_POST['number'];
                                    $link = $_POST['link'];
                                    date_default_timezone_set('Indian/Antananarivo');
                                    $date=date("Y/m/d");
                                    
                                    $query="INSERT INTO submission(ass_no,subject,link,student_name,date) VALUES('$number','$subject','$link','$username','$date')";
                                    $data=mysqli_query($con,$query);
                                    if($data)
                                    {
                                        echo "Assignment Submitted on ";
                                        echo $date;
                                    }
                                        
                                    else
                                    {
                                        echo "Incorrect Format";
                                    
                                    }
                            }
                            
                            ?>

</div>
</body>
</html>
