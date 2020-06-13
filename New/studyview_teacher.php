<?php
session_start();
include("../includes/db.php");
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //has to be logged in

} else
    header("refresh:2; url=login_teacher.php");
if (isset($_GET['sem'])) {
    $sem_sub = $_GET['sem'];
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
            <div class="container mt-3 custom-form-container " style="width:1000px; margin:0 auto;">
                <center>
                    <h3>View Study Material</h3>
                </center>
                <div class="p-2"></div>
                <div class="border-decoration">
                <form>
                    <div class="form-group text-center">
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;
                                <label for="sem">Semester</label>
                                <div class="p-2"></div>
                                <input id="semsub" type="number" class="form-control w-25 col-xs-6" id="num" value="<?php echo $sem_sub; ?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
                                <div class="p-2"></div>
                                <button type="submit" class="btn btn-primary col-xs-6">Search</button>
                            </div>
                            <!--row----->
                        </div>
                        <!--container------>
                    </div>
                    <!---form group----->


                </form>
                <?php
                if (isset($_GET["sem"]) && $_GET['sem'] != "") {
                    $get_subject = "select * from sem_subject where sem=$sem_sub AND teacher='$username'";
                    $run_subject = mysqli_query($con, $get_subject);

                    if (mysqli_num_rows($run_subject) > 0) {
                ?>
                        <form action="" method="post">
                            
                            <input name="semester" value="<?php echo $_GET["sem"]; ?>" type="hidden">
                            <div class="null">
                            <div class="row d-flex justify-content-center">
                                <div class="text-center ">
                                    <label for="exampleFormControlSelect1">Subject</label>
                                </div>
                                <div class="p-4"></div>
                                <div class="form-group col-xs-6 w-50">

                                    <select class="form-control" name="subject">
                                        <!---the subject is the variable where the selected item is stored-->

                                        <?php

                                        //$sem_sub=$_GET["sem"];


                                        while ($row_subject = mysqli_fetch_array($run_subject)) {

                                            $subject = $row_subject['subject'];
                                            echo "<option>$subject</option>";
                                        }



                                        ?>

                                    </select>
                                </div>
                                <div class='p-2'></div>    
                                <div class="d-flex justify-content-center  col-xs-6">
                                <button type="submit" name="upload" class="btn btn-primary">View</button>
                            </div>
                            <!---</div>table decoration-------->
                           
                            </div>
            </div>
            </form>
    <?php
                    } else { ?>
                    <div class="p-2"></div>
                    <div class="container d-flex justify-content-center">
                    <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                        <?php echo "Enter correct semester"; ?>
                    </div>
                    </div>
                    <?php }
                } else {?> 
                <div class="p-2"></div>
                <div class="container d-flex justify-content-center">
                <div class="d-flex justify-content-center alert alert-primary" style="width:30%">
                   <?php  echo 'Search a semester first'; ?>
                </div>
                </div>
                <?php }
    ?>
    <?php
    if (isset($_POST['subject']) && isset($_POST['semester'])) {
        $sem_sub=$_POST['subject'];
        $semester= $_POST['semester'];
        $query = "SELECT * FROM study_material where subject='$sem_sub' and sem='$semester'";
        $data = mysqli_query($con, $query);

        if (mysqli_num_rows($data)>0) {
            $counter=1;       
            while($result =mysqli_fetch_array($data))
            {                        ?>
                  <div class="p-4"></div>
               
                  <table class="table-design ">
                        <thead class="table-dark bg-primary">
                                <tr>
                                        <th scope="col">Serial No.</th>
                                        <th scope="col">Topic Name</th>
                                        <th scope="col">Study Material</th>
                                </tr>
                        </thead>    
                        <?php
                               
				        ?>
                                    <tbody class="table-design">
                                    <tr>
                                        <th scope="row"><?php echo $counter++ ;?></th>
                                        <td><?php echo $result['name'] ?></td>
                                        <td><a href="<?php echo $result['link'] ?>">Click Here</a></td>
                                                                
                                    </tr>
                                    </tbody>
        <?php } }else { ?>
            <div class="p-2"></div>
            <div class="container d-flex justify-content-center">
            <div class="d-flex justify-content-center alert alert-danger" style="width:30%">
                <?php echo "No Study Materials";?>
            </div>
            </div>
        <?php }
    }
    ?>
     </table>
     </div><!--border-decoration--->
        </div>
        <!--container mt-5----->
    </div>
    <!----page content wrapper---->
    </div>
    <!---toggled-------->
</body>

</html>