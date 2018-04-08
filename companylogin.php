<?php
  session_start();
  if (isset($_SESSION['id_user'])) {
    header("Location:company/dashboard.php");
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
               <ul class="nav navbar-nav">
                      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
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
                 <li><a href="company/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php
                }else {
                ?>
                <li><a href="companylogin.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="companyregister.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php } ?>
               </ul>
             </div> 
     </div>
   </nav>
   </header>
   <br><br><br><br>
     <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <br>
        <div class="well well-sm">
          <h2 class="text-center">Company Login</h2>
          <hr>
          <form action="checkcompanylogin.php" method="post">
          <div class="form-group has-feedback"> 
            <label for="inputEmail">Email</label>
            <input class="form-control" type="email" name="email" placeholder=" Enter Email" id="inputEmail" required="">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password" placeholder="Login Password" name="password" id="inputPassword" required="">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success">Login</button>
          </div>
          <?php
          if (isset($_SESSION['registerCompleted'])) {
          ?>
          <div>
            <p id="successMessage" class="text-center">You Have Registered Successfully!Your Account Approval Is Pending By Admin</p>
          </div>
          <?php
          unset($_SESSION['registerCompleted']); }
          ?>
          <?php
          if (isset($_SESSION['loginError'])) {
          ?>
          <div>
            <p class="text-center">Invalid Email/Password! Try Again!</p>
          </div>
          <?php
          unset($_SESSION['loginError']); 
        }
          ?>
          <?php
          if (isset($_SESSION['companyloginError'])) {
          ?>
          <div>
            <p class="text-center"><?php echo $_SESSION['companyloginError']; ?></p>
          </div>
          <?php
          unset($_SESSION['companyloginError']); 
        }
          ?>
          <p><b>You don't have an Account?</b><a href="companyregister.php">Register here</a></p>
        </form>
        </div>
      </div>
    </div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $("#successMessage:visible").fadeOut(2000);
      });
    </script>
  </body>
</html>