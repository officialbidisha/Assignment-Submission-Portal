<?php
session_start();
include("includes/db.php");
?>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<style>
    body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #000;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}
</style>

<div class="sidenav">
         <div class="login-main-text">
            <h2><br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
             <form action="" method="post">
                  
                  <div class="form-group">
                      <label>User Id</label>
                      <input type="number" name="s_id" value="" class="form-control" placeholder="User Id"/>
                  </div>
                  
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" value="" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black" name="submit">Login</button>
                  <a class="btn btn-secondary" href="signupstudent.php">Register</a>
               </form>
               <?php
                    if(isset($_POST['submit']))
                    {
                        //$user=$_POST['username'];
                        $s_id=$_POST['s_id'];
                        $pwd=$_POST['password'];
                        $query="SELECT * FROM student where student_id='$s_id' && password='$pwd'";
                        $data=mysqli_query($con,$query);
                        $total=mysqli_num_rows($data);
                        
                        if($total==1)
                        {
                            $row = mysqli_fetch_assoc($data);
                            $user=$row['name'];
                            $_SESSION['username']=$user;
                            $_SESSION['sem']=$row['sem'];
                                
                            

                            header('location:firststudent.php');
                        }
                        else
                        {
                            echo'
                            <div class= "alert alert-danger" role="alert">
                                 Login failed
                            </div>';
                        }
                    }
                    ?>
            </div>
         </div>
</div>

</body>

</html>