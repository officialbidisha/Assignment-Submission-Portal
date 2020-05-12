<?php
        session_start();
        include("../includes/db.php");
        error_reporting(0);
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
      <a class="nav-link" href="#">Student Dashboard</a>
    </li>
  </ul>
</nav>
<div class="container mt-5">
    <form action=" " method="post">
        <h3>View Assignment</h3>
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
                            <div class="p-1"></div>
                            <button type="submit" name="view" class="btn btn-primary">View</button>
                </div>
    </form>
    <?php
              if(isset($_POST['view']) && isset($_POST['subject'])){
                  
          $subject=$_POST['subject'];
          $query="SELECT * FROM assignment_new where subject='$subject'";
					$data=mysqli_query($con,$query);
					$total=mysqli_num_rows($data);
                    if($total>0){
    ?>                
                        <table class="table">
                        <thead>
                                <tr>
                                        <th scope="col">Serial No.</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Assignment</th>
                                </tr>
                        </thead>    
                        <?php
                                $counter=1;       
                                while($result =mysqli_fetch_array($data))
                                {                        
				        ?>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $counter++ ;?></th>
                                        <td><?php echo $result['submit_date'] ?></td>
                                        <td><a href="<?php echo $result['link'] ?>">Click Here</a></td>
                                                                
                                    </tr>
                                    </tbody>

				    <?php
                                }
                    }
                     
                    else
                    {
                            echo "No Assignment Uploaded Yet";
                    }
            }
?>
    
</table>              
    
</div>
</body>
</html>
