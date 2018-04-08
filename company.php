<?php
session_start();
if (isset($_SESSION['id_user'])) {
    header("Location:user/dashboard.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>iJobs</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
  </head>
  <body>

   <header>
     <nav class="navbar navbar-expand-lg navbar-inverse navbar-fixed-top" >
   <a class="navbar-brand" href="index.php">iJob</a> 
    <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-target="#mainNavbar " data-toggle="collapse">
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         </div>
             <div class="navbar-collapse collapse" id="mainNavbar">
               <ul class="nav navbar-nav">
                      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li class="active"><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> About
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Mission</a></li>
                          <li><a href="#"> Vission</a></li>
                          <li><a href="about.php">Products <span class="badge">10 </span></a></li>
                        </ul>
                  </li>
                <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li>
                <?php
                if (isset($_SESSION['id_user'])) {
                  ?>
                 <li><a href="user/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
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
   <br><br>
   <section>
     <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
         <div class="jumbotron text-center">
        <h1>iJob Portal</h1>
        <p>Find Your Dream Job</p>
        <p>...</p>
        <div class="container">
    <div class="row">
      <div class="col-xs-12">
      <button class="btn btn-primary btn-sm pull-center disabled" data-target="#registerModal" data-toggle="modal">Register</button>  
        <div class="modal fade" id="registerModal" tabindex="-1">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="inputName" >Name</label>
                    <input  class="form-control" type="text" placeholder="Full Name" name="fullname" id="inputName">
                  </div>
                  <div class="form-group has-success">
                    <label for="inputDateOfBirth">Date Of Birth</label>
                    <input class="form-control" type="text" name="dateofbirth" id="inputDateOfBirth" placeholder="dd/mm/yyyy">
                  </div>
                  <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input class="form-control" type="email" name="email" id="inputEmail" placeholder="Email Address">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input class="form-control" type="password" name="password" id="inputPassword" placeholder="Enter Password">
                  </div>
                  <div class="form-group has-warning">
                    <label for="inputconfirmPassword">Confirm Password</label>
                    <input class="form-control" type="password" name="confirmpassword" id="inputconfirmPassword" placeholder="Confirm Password">
                  </div>
                  <button class="btn btn-info" type="submit">Sign Up</button>
                  <button class="btn btn-warning col-sm-offset-2" type="reset">Cancel</button>
                  <br><br>
                  <p>Already have an Account?<a href="login.php">Login</a></p>
                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Register</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
          
        </div>
      </div>
   </div>
      </div>
       </div>
     </div>
   </div>
 </div>
   </section>
     <div class="container">
    <div class="row">
      <style>
        .well{
          background: #FAFAD2;
        }
      </style>
      <div class="col-md-4 col-md-offset-4 well">
        <h2 class="text-center">Company</h2>
        <p class="text-center">Let talented employees Know of available job vacancies in your company</p>
        <div class="pull-left">
          <a href="companyregister.php" class="btn btn-default">Company Register</a>
        </div>
        <div class="pull-right">
          <a href="companylogin.php" class="btn btn-default">Company Login</a>
        </div>
      </div>
    </div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>