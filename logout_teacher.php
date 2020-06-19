<?php
session_start();
include("includes/db.php");
if (isset($_SESSION['username'])) {
        $username = $_SESSION['username']; //has to be logged in

} else
        header("refresh:2; url=login_teacher.php");
if (isset($_GET['semester'])) {
        $sem_sub = $_GET['sem'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Logout</title>
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
    <link rel="stylesheet" href="small.css">
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
        <div class="container m-5 custom-form-container " style="width:1000px; margin:0 auto;">
                <form>
                <div class="p-5">
                <div class="container border-decoration">
                
                <div class="form-group text-center">
                    
                    <h3 style="font-family:Geneva; color:black">Confirm Logout</h3>
                    <div class="p-2"></div>
                    <button type="submit" name="out" style=" font-family:Geneva; color:black " class="btn btn-white col-xs-6 s"><h4>Logout</h4></button>
                </div>
                </div>
                </div>
                </form>
                <?php if(isset($_GET['out'])) {
                    session_destroy();
                    unset($_SESSION['username']);
                    echo "You have been logged out";
                    header('location:../');
                }?>
        </div><!---container--->
        </div><!--page content wrapper--->
    </div><!--wrapper toggled--->
</body>
</html>