<?php
        session_start();
        include("../includes/db.php");
        if(isset($_SESSION['username'])){
            $username=$_SESSION['username'];//has to be logged in
        
         }
        else
                header( "refresh:2; url=login_teacher.php" );
        if(isset($_GET['sem'])){
            $sem_sub=$_GET['sem'];
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
    <h3>Upload Study Material</h3>
    <form>
            <div class="form-group">
                <label for="sem">Semester</label>
                <input id="semsub" type="number" class="form-control" id="num" value="<?php echo $sem_sub;?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php
                if(isset($_GET["sem"]) && $_GET['sem']!=""){
                    $get_subject="select * from sem_subject where sem=$sem_sub AND teacher='$username'"; 	
                    $run_subject=mysqli_query($con,$get_subject);
                   
                    if( mysqli_num_rows($run_subject)>0){
    ?>
    <form action="" method="post">
    <input name="semester" value="<?php echo $_GET["sem"];?>" type="hidden">
    <div class="form-group">
                    <label for="exampleFormControlSelect1">Select</label>
                    <select class="form-control" name="subject"><!---the subject is the variable where the selected item is stored-->
                       
                            <?php
                                  
                                    //$sem_sub=$_GET["sem"];
                                    
                
                                    while( $row_subject=mysqli_fetch_array($run_subject))
                                    {
                                       
                                        $subject=$row_subject['subject'];
                                        echo"<option>$subject</option>";
                                    }
                            
                                
                                
                            ?>
                       
                    </select>
                        <div class="form-group">
                            <label for="Study Material Topic">Study Material Topic</label>
                            <input type="text" name="name" class="form-control"  aria-describedby="studyMaterialTopicHelp" placeholder="Topic" required>
                        </div>
                        <div class="form-group">
                            <labe l for="AssignmentLink">Study Material Link</label>
                            <input type="text" name="link" class="form-control" id="studyMaterialLink" placeholder="Link" required>
                        </div>
                        
                      
                    <button type="submit" name="upload" class="btn btn-dark">Upload</button>
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
            if(isset($_POST['subject']) && isset($_POST['semester']))
            {
               
                $name = $_POST['name'];
                $link = $_POST['link'];
                $query="INSERT INTO study_material(sem,link,subject,name) VALUES('$sem_sub','$link','$subject','$name')";
				$data=mysqli_query($con,$query);
			
				if($data)
				{
					echo "Study Material Uploaded";
                }
                else{
 
                    echo "All Fields Required";
                }
            }
     ?>
    
</div>
</body>
</html>
