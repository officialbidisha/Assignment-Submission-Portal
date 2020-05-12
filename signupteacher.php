<?php
session_start();
include("../includes/db.php");
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
        margin-top: 40%;
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
            <h2>Teacher<br> Registration Page</h2>
            <p>Register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
             <form action="" method="post">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" value="" class="form-control" placeholder="User Name" required/>
                  </div>
                  <div class="form-group">
                     <label>Teacher Id</label>
                     <input type="text" name="id" value="" class="form-control" placeholder="Registration Number" required/>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="text" name="pwd" value="" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="text" name="conpwd" value="" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-black" name="submit">Register</button>
                
               </form>
               <?php

                        
                        if(isset($_POST['submit']))
                        {
                            $name=$_POST['name'];
                            $id=$_POST['id'];
                            $pwd=$_POST['pwd'];
                            $conpwd=$_POST['conpwd'];
                            if($pwd==$conpwd)
                            {
                                $query="INSERT INTO teacher values($id,'$name','$pwd')";
                                if($data=mysqli_query($con,$query)){
                                        echo "Successfully Registered";
                                        header( "refresh:2; url=login_teacher.php" );}
                                else{
                                    echo "Wrong Query";
                                }
                            }
                            else
                            {
                                echo "your password and confirm password doesnot match";
                            }
                        }
		
		?>
            </div>
         </div>
</div>

</body>

</html>