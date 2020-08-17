<!DOCTYPE html>
<head>
    <title>View Study Material</title>
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
<body style="cursor: auto;">
    <nav class="navbar navbar-expand navbar-dark bg-primary fixed-top"> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="firstteacher.php">Dashboard</a> </li>
            </ul>
            <form class="form-inline my-2 my-md-0"> </form>
        </div>
    </nav>
    <div id="wrapper" class="">
        <div id="sidebar-wrapper">
&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD
&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD:studyview_teacher.php
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="firstteacher.php"> Amit Paul </a> </li>
                <li> <a href="firstteacher.php">Dashboard</a> </li>
                <li> <a href="subjects.php">Subjects</a> </li>
                <li> <a href="assignmentinside.php">Assignments</a> </li>
                <li> <a href="noticeinside.php">Notices</a> </li>
                <li> <a href="studyinside.php">Study Material</a> </li>
                <li> <a href="logout_teacher.php">Logout</a> </li>
            </ul>
        <ul class="sidebar-nav">
            <li class="sidebar-brand"> <a href="firstteacher.php"> Amit Paul </a> </li>
            <li> <a href="firstteacher.php">Dashboard</a> </li>
            <li> <a href="subjects.php">Subjects</a> </li>
            <li> <a href="assignmentinside.php">Assignments</a> </li>
            <li> <a href="noticeinside.php">Notices</a> </li>
            <li> <a href="studyinside.php">Study Material</a> </li>
            <li> <a href="logout_teacher.php">Logout</a> </li>
        </ul>
   <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a href="firstteacher.php"> Amit Paul </a> </li>
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
                                <input id="semsub" type="number" class="form-control w-25 col-xs-6" value="4" name="sem" aria-describedby="semester" placeholder="Enter Semester">
                                <div class="p-2"></div>
                                <button type="submit" class="btn btn-primary col-xs-6">Search</button>
                            </div>
                            <!--row----->
                        </div>
                        <!--container------>
                    </div>
                    <!---form group----->


                </form>
                
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <input name="semester" value="4" type="hidden">
                            <div class="null">
                            <div class="row d-flex justify-content-center">
                                <div class="text-center ">
                                    <label for="exampleFormControlSelect1">Subject</label>
                                </div>
                                <div class="p-4"></div>
                                <div class="form-group col-xs-6 w-50">

                                    <select class="form-control" name="subject">
                                        <!---the subject is the variable where the selected item is stored-->

                                        <option>Computer Organization</option>
                                    </select>
                                </div>
                                <div class="p-2"></div>    
                                <div class="d-flex justify-content-center  col-xs-6">
                                <button type="submit" name="upload" class="btn btn-primary">View</button>

                                </div>
                            </div>
                            <!---</div>table decoration-------->
                            </div>
                            <div class="p-2"></div>
                            
            </form></div>
            
                  <div class="p-4"></div>
               
                  <div class="p-4"></div><table class="table-design ">
                        <thead class="table-dark bg-primary">
                                <tr>
                                        <th scope="col">Serial No.</th>
                                        <th scope="col">Topic Name</th>
                                        <th scope="col">Study Material</th>
                                </tr>
                        </thead>    
                                                            <tbody class="table-design">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Network Types</td>
                                        <td><a href="http://localhost:8080/New/uploads/5eec82ba6b9a36.48132102.pdf">Click Here</a></td>
                                                                
                                    </tr>
                                    </tbody>
                          
               
                  </table>
     </div><!--border-decoration--->
        </div>
        <!--container mt-5----->
    </div>
    <!----page content wrapper---->
    
    <!---toggled-------->


<script>$(".custom-file-input").on("change", function() { var fileName = $(this).val().split("\\").pop(); $(this).siblings(".custom-file-label").addClass("selected").html(fileName); }); </script>

</body>
</html>
