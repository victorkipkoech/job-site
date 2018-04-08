<?php
session_start();
require_once("../connection.php");
// if (isset($_SESSION['id_user'])) {
//     header("Location:user/dashboard.php");
//     exit();
//   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>iJobs</title>

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="../stylesheet" type="text/css" href="custom.css">
    
  </head>
  <body>

   <header>
     <nav class="navbar navbar-expand-lg navbar-inverse navbar-fixed-top" >
   <a class="navbar-brand" href="#">iJob</a> 
    <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-target="#mainNavbar " data-toggle="collapse">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         </div>
             <div class="navbar-collapse collapse" id="mainNavbar">
               <!-- <ul class="nav navbar-nav">
                   <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul> -->
               <ul class="nav navbar-nav navbar-right">
                  <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> About
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Mission</a></li>
                          <li><a href="#"> Vission</a></li>
                          <li><a href="about.php">Products <span class="badge">10 </span></a></li>
                        </ul>
                  </li> -->
                <!-- <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li -->>
                <?php
                if (isset($_SESSION['id_user'])) {
                  ?>
                 <li><a href="user/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php
                }else {
                ?>
                <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php } ?>
               </ul>
             </div> 
     </div>
   </nav>
   </header>
   <br><br><br><br>
     <div class="container">
    <div class="row">
      <div class="col-md-5 has-success col-md-offset-4">
        <div class="well well-lg">
        <h3 class="text-center">Create Job Post </h3>
        <hr>
        <form action="addpost.php" method="post" >
          <div class="form-group">
            <label for="inputJob" >Job Tittle</label>
            <input  class="form-control" type="text" placeholder="Job Tittle" name="jobtitle" id="jobtitle" required="">
          </div>
          <div class="form-group has-success">
            <label for="inputDescription">Job Description</label>
            <textarea class="form-control" type="date" name="jobdescription" id="jobdescription" placeholder="Job Description" row="5"></textarea>
          </div>
          <div class="form-group">
            <label for="minsalary">Minimum Salary</label>
            <input class="form-control" type="number" name="minsalary" min="1000" id="minsalary" placeholder="Minimum Salary " required="">
          </div>
          <div class="form-group">
            <label for="maxsalary">Maximum salary</label>
            <input class="form-control" type="number" name="maxsalary" id="maxsalary" placeholder="Maximum Salary " required="">
          </div>
          <div class="form-group">
            <label for="experience">Experience (in Years) required</label>
            <input class="form-control" type="number" autocomplete="off" name="experience" id="experience" placeholder="Experience required">
          </div>
          <div class="form-group">
            <label for="qualification">Qualification required</label>
            <input class="form-control" type="text" name="qualification" id="qualification" placeholder="Qualification Required ">
          </div>
          <div class="text-center">
            <button class="btn btn-info" type="submit">Post</button>
          <button class="btn btn-warning col-sm-offset-2" type="reset">Cancel</button>
          </div>
          <br><br>
          <?php
          if (isset($_SESSION['registerError'])) {
          ?>
          <div>
            <p class="text-center">Email Already Exists! Choose A Different Email!</p>
          </div>
          <?php
          unset($_SESSION['registerError']); 
        }
          ?>
          <p>Already created a job post?<a href="view-job-post.php">View Jobs Posted</a></p>
        </form>
        </div>
      </div>
    </div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>