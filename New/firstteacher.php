<?php
        session_start();
        include("../includes/db.php");
        if(isset($_SESSION['username'])){
            $username=$_SESSION['username'];//has to be logged in
           
         }
        else
                header( "refresh:2; url=login_teacher.php" );
        $semester = !empty($_GET['sem']) ? $_GET['sem'] : '';
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
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
<center><h1><?php echo "Welcome ".$_SESSION['username'];?></h1></center>
<span class="border border-dark">
<div class="row">
            <div class="pl-5"></div>
            <div class="col-sm">
                    <div class="card" style="width: 25rem; height:15rem">
                            <a href="postnotice.php"><img class="card-img-top" src="notice.jpg" height="290rem" alt="Notice image cap" width="400px"></a>
                    </div>
            </div>
            <div class="col-sm">
                    <div class="card" style="width: 25rem; height:15rem">
                    <a href="assignmentupload.php"><img class="card-img-top" src="assignment.jpg" height="290rem" alt="Assignment image cap" width="400px"></a>
                    </div>
            </div>
            <div class="col-sm">
                    <div class="card" style="width: 25rem;height:15rem">
                            <a href="studyupload.php"><img class="card-img-top" src="study-material.jpg" height="290rem" alt="Study Material image cap" style="width:400px"></a>
                            
                    </div>
            </div>
            <div class="pr-5"></div>
                
</div>
</span>
<div class="p-5"></div>
<!-----<div class="row">----->
    <div class="row justify-content-center">
            <div class="col-align-self-centre">
            <form>
                        <div class="form-group">
                                
                                <a href="addsubject.php" type="submit" name="button" class="btn btn-info" style="align:centre">Add Subject</a>
                        </div>
            </form>
            </div>
            <div class="p-3"></div>
            <div class="col-align-self-centre">
            <form>
                        <div class="form-group">  
                                <a href="deletesubject.php" type="submit" name="button" class="btn btn-info">Delete Subject</a>
                        </div>
            </form>
            </div>
            <div class="p-3"></div>
            <div class="col-align-self-centre">
            <form>
                        <div class="form-group">  
                                <a href="assview_teacher.php" type="submit" name="button" class="btn btn-info">View Assignment</a>
                        </div>
            </form>
            </div>
            <div class="p-3"></div>
            <div class="col-align-self-centre">
            <form>
                        <div class="form-group">  
                                <a href="viewstudyteacher.php" type="submit" name="button" class="btn btn-info">View Study Materials</a>
                        </div>
            </form>
            </div>
            <div class="p-3"></div>
            <div class="col-align-self-centre">
            <form>
                        <div class="form-group">  
                                <a href="submissionreport.php" type="submit" name="button" class="btn btn-info">View Submissions</a>
                        </div>
            </form>
            </div>
            <div class="p-3"></div>
            <div class="col-align-self-centre">
            <form>
                        <div class="form-group">  
                                <a href="deletestudyteacher.php" type="submit" name="button" class="btn btn-info">Delete Study Materials</a>
                        </div>
            </form>
            </div>
    </div>
<!-----</div>----->
</body>
</html>
