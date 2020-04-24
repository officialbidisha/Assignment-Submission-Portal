<?php
        session_start();
        include("../includes/db.php");
        if(isset($_SESSION['username']))
            $username=$_SESSION['username'];//has to be logged in
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
<div class="container" >
<div class="p-4"></div>
<h3 style="text-align:center">  ADD NOTICE</h3>
<form class="form-inline">
            <div class="form-group">
                <label for="sem">Semester</label>
                <div class="mr-1"></div>
                <input type="number" class="form-control" id="num" value="<?php echo $semester;?>" name="sem" aria-describedby="semester" placeholder="Enter Semester">
            </div>
            <div class="mr-3"></div>
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
                    
    </div>
  
  <?php
                }
                else{
                        //echo 'Search a semester first';
                    }
     ?>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Write Notice</label>
  <textarea class="form-control rounded-0" name="file" id="exampleFormControlTextarea1" rows="8"></textarea>
</div>

<button type="submit" name="post" class="btn btn-info">Post Notice</button>
</form>
<?php
		 
			$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
			$file = isset($_POST['file']) ? $_POST['file'] : '';
			
		if(isset($_POST['post']))
		{
      $sem_sub=$_POST["semester"];
      date_default_timezone_set('Indian/Antananarivo');
      $date=date("Y/m/d");
			if($sem_sub!="" &&  $file!="" && $subject!="")
			{
				$query="INSERT INTO notice(sem,file,subject,date) VALUES('$sem_sub','$file','$subject','$date')";
				$data=mysqli_query($con,$query);
			
				if($data)
				{
					echo "Notice Posted";
				}
				
			}
			else
			{
				echo "All fields required $sem_sub,$file,$subject"  ;
			}
		}
      ?>
</div>
</body>
</html>
