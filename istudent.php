<?php
session_start();
include("includes/db.php");
if (isset($_SESSION['username'])) {
        $username = $_SESSION['username']; //has to be logged in

} else
        header("refresh:2; url=login_student.php");
if (isset($_GET['semester'])) {
        $sem_sub = $_GET['sem'];
}

?>
<!DOCTYPE html>
<html lang="en">
        

<head>
        <title>Assignment Inside</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="navigation.js"></script>
        <link rel="stylesheet" href="cardstyles.css">
        <link href="navigation.css" rel="stylesheet" id="naviagtion-css">

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
            <!-- Sidebar -->
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
            <div class="container"><!---a condition bases container----->
            <center>
                <h1><?php echo "Assignments "?></h1>
             </center>
                
             <div class="p-3"></div>
                        <div class="container row ">
                                <div class="col-sm-6">
                                        <a href="assview_student.php">
                                                <div class="custom-card card-seola" style="background-image:url('assignmentviewbystudent.png')">


                                                        <div class="custom-card-banner">
                                                                <h4> View Assignments</h3>

                                                        </div>
                                                </div>
                                        </a>
                                </div>

                                <div class="col-sm-6">
                                        <a href="assignmentsubmit.php">
                                                <div class="custom-card card-silverish-black" style="background-image:url('submitting.jpg')">


                                                        <div class="custom-card-banner ">
                                                                <h4>Submit Assignments</h3>

                                                        </div>
                                                </div>
                                        </a>
                                </div>

                                
                        </div>
                        <div class="p-5"></div>    
                </div><!---end of optional container--->    
            </div><!---end of page wrapper=---->
        </div>
</body>

</html>
