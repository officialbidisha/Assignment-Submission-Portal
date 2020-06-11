<?php
session_start();
include("../includes/db.php");
if (isset($_SESSION['username']))
  $username = $_SESSION['username']; //has to be logged in
else
  header("refresh:2; url=login_teacher.php");
$semester = !empty($_GET['sem']) ? $_GET['sem'] : '';
?>
<!DOCTYPE html>
<head>
  <title>Delete Notice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="navigation.js"></script>
  <link href="navigation.css" rel="stylesheet" id="naviagtion-css">
  <link rel="stylesheet" href="cardstyles.css">
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
        <li> <a href="subjects.php">Subjects</a> </li>
        <li> <a href="assignmentinside.php">Assignments</a> </li>
        <li> <a href="noticeview.php">Notices</a> </li>
        <li> <a href="studyupload.php">Study Material</a> </li>
        <li> <a href="#">Contact</a> </li>
      </ul>
  </div> <!-- /#sidebar-wrapper -->
  </div> <!---wrapper toggled----->
  <div class="container mt-3 custom-form-container" style="width:1000px; margin:0 auto;">
  <div class="p-2"></div>
  <h3 style="text-align:center"> DELETE NOTICE </h3>
  <form  class="form-inline" >
        <div class="form-group">
          <label for="sem">Semester</label>
          <div class="mr-1"></div>
          <input type="number" class="form-control" id="num" value="<?php echo $semester; ?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
        </div>
        <div class="mr-3"></div>
        <button type="submit" class="btn btn-primary">Search</button>
  </form><!--Semester form ends---->
  <div class="p-2"></div>
  <?php
        $nosemchosen=0;
        if(isset($_GET["sem"]) && $_GET["sem"]!=""){?>
        <form class="form-inline" method="post" action="">
          <div class="form-group">
            
            <div class="mr-3"></div>
            <?php 
                  $sem_sub = $_GET["sem"];
                  $get_subject = "select * from sem_subject where sem='$sem_sub' AND teacher='$username'";
                  $run_subject = mysqli_query($con, $get_subject);
                  $num=mysqli_num_rows($run_subject);
                  if($num>0){
            ?>
             <label for="subject">Subject</label>
            <select class="form-control w-75" name="subject">
            <?php
                
                while ($row_subject = mysqli_fetch_array($run_subject)) {
                  $subject = $row_subject['subject'];
                  echo "<option>$subject</option>";
                }
              
            ?>
            </select>
            </div>
           
            <div class="mr-3"></div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form><!----subject form ends---->
            <?php
                  }
                  else{$nosemchosen=1;?>
                             
                              <div class="p-2"></div>
                              <div class="container d-flex">
                              <div class="d-flex  alert alert-info" style="width:30%">
                              <?php echo "Enter correct semester"; ?>
                              </div>
                              </div>
                  <?php }
            ?>
          
        <div class="p-2"></div>
        <?php
               if(isset($_POST["subject"]) && $_POST["subject"]!=""){
                $sem_sub = $_GET["sem"];
                $subject= $_POST["subject"];
                $get_subject = "select * from notice where sem='$sem_sub' AND subject='$subject'";
                $run_subject = mysqli_query($con, $get_subject);
                if(mysqli_num_rows($run_subject)>0){
                 ?>
                <form class="form-inline" method="post" action="">
                  <div class="form-group">
                    <label for="number">Number</label>
                    <div class="mr-3"></div>
                    <input type="hidden" name="subject" value="<?php echo $_POST["subject"]; ?>">
                    <select class="form-control" name="number">
                    <?php
                      while ($row_subject = mysqli_fetch_array($run_subject)) {  
                          $number = $row_subject['notice_num'];
                          echo "<option>$number</option>";
                        }
                    ?>
                    </select>
                  </div>
                  <div class="mr-3"></div>
                  <button type="submit" class="btn btn-primary">Delete</button>
                </form><!----Number form ends---->
                <?php }
                      else{
                                        ?>
                            <div class="p-2"></div>
                            <div class="container d-flex">
                            <div class="d-flex  alert alert-info" style="width:30%">
                            <?php    echo "No Notices found"; ?>
                            </div>
                            </div>
                      <?php }
  
                ?>

                <div class="p-2"></div>
  <?php
                      if(isset($_POST["number"]) && ($_POST["number"] != "")){
                              $sem_sub=$_GET["sem"];
                              $subject= $_POST["subject"];
                              $number=$_POST["number"];
                              if ($sem_sub != "" && $subject != "") {
                                    
                                    $query="DELETE from notice where sem='$sem_sub' AND subject='$subject' AND notice_num='$number'";
                                    $run_subject=mysqli_query($con,$query);
                                    if($run_subject){
                                      echo "Notice deleted";
                                    }
                                    else{
                                      echo "error.".mysqli_error($con);

                                    }
                              }
                              else{
                                echo "All fields required";
                              }
                      }
                ?>
               <?php }
               else if($nosemchosen==1){
                echo "";
              }
               else{
                  
                 ?>
                    <div class="p-2"></div>
                    <div class="container d-flex">
                    <div class="d-flex  alert alert-info" style="width:30%">
                     <?php echo "No subject Chosen"; ?>
                    </div>
                    </div>
               <?php }
        ?>
        <!---else of first condition----- dont touch---->
        <?php }
        
        else{
          ?>
            <div class="p-2"></div>
            <div class="container d-flex">
            <div class="d-flex  alert alert-info" style="width:30%">
            <?php    echo "Enter a semester first"; ?>
            </div>
            </div>
       <?php }
  ?>

  </div><!---container---->
</body>
</html>