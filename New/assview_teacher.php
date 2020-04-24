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
    <h3>Delete Subject</h3>
    <form>
            <div class="form-group">
                <label for="sem">Semester</label>
                <input type="number" class="form-control" id="num" value="<?php echo $semester;?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <?php
                if(isset($_GET["sem"])){

    ?>
    <form action="" method="post">
    <input name="semester" value="<?php echo $_GET["sem"];?>" type="hidden">
    <div class="form-group">
                    <label for="exampleFormControlSelect1">Select</label>
                    <select class="form-control" name="subject"><!---the subject is the variable where the selected item is stored-->
                       
                            <?php
                             
                                    $sem_sub=$_GET["sem"];
                                    $get_subject="select * from sem_subject where sem=$sem_sub AND teacher='$username'"; 	
                                    
                                    $run_subject=mysqli_query($con,$get_subject);
                
                                    while($row_subject=mysqli_fetch_array($run_subject))
                                    {
                                       
                                        $subject=$row_subject['subject'];
                                        echo"<option>$subject</option>";
                                    }
                            
                            
                            ?>
                       
                    </select>
                    
                    <button type="submit" name="delete" class="btn btn-info">View Assignmennt</button>
                    
    </div>
    </form> 
     <?php
                }
                else{
                        echo 'Search a semester first';
                    }
     ?>
                <?php
			
			if(isset($_POST['subject']) && isset($_POST['semester']))
			{
                                $sem_sub=$_POST['semester'];
                                $subject=$_POST['subject'];
				$query="SELECT * from assignment_new where subject='$subject' order by submit_date";
				$data=mysqli_query($con,$query);
				$total=mysqli_num_rows($data);
				if($total !=0)
				{
		?>

                                <table class="table">
                                <thead>
                                        <tr>
                                                <th scope="col">Serial No.</th>
                                                <th scope="col">Submission Date</th>
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
                                                        </th>
                                                </tr>
                                                </tbody>

				<?php
                                                        }
                                }
                                                
                                                else
                                                {
                                                        echo "No assignments yet";
                                                }
                                        }
				?>



                </table>
</div>
</body>
</html>