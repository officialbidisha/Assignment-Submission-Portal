<?php
        session_start();
        include("../includes/db.php");
        if(isset($_SESSION['username']))
            $username=$_SESSION['username'];//has to be logged in
        else
                header( "refresh:2; url=login_teacher.php" );
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
            
            <h2>Add a Subject</h2>
            
            <form action="" method="get">
                <div class="form-group">
                <label for="sel1">Choose a Semester</label>
                <select class="form-control" id="sel1" name="sem"><!---we can et the selected option using sem-->
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                </select>
                </div>
            <div class="form-group">
                     <label>Add Subject</label>
                     <input type="text" name="subject" value="" class="form-control" placeholder="Subject">
            </div>
            <button type="submit" name="button" class="btn btn-primary">Add</button> <!-------Checks if user has submitted using button so get[button]------->
            </form>
            <?php

                    if(isset($_GET['button']))
                    {
                        $sem=$_GET["sem"];
                        $subject=$_GET["subject"];
                        if($subject!=""){
                          $query="INSERT INTO sem_subject values($sem,'$subject','$username')";
                          $data=mysqli_query($con,$query);
                          if($data)
                          {
                              echo "Subject added successfully";
                          }
                      }
                        else{
                          echo "Select a subject First";
                        }
                    }


?>
</div>

</body>
</html>
