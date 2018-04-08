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
                      <!-- <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li> -->
               </ul>
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
                <!-- <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li> -->
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
   <br><br><br><br>
     <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <br>
        <div class="well well-sm">
          <h2 class="text-center">Forgot Password</h2>
          <hr>
          <form action="passwordreset.php" method="post">
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input class="form-control" type="email" name="email" placeholder=" Enter Email" id="inputEmail" required="">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success">Reset Password</button>
            </div>
          <?php
          if (isset($_SESSION['emailNotFoundError'])) {
          ?>
          <div>
            <p id="successMessage" class="text-center">This Email Does Not Exist In Database!</p>
          </div>
          <?php
          unset($_SESSION['emailNotFoundError']); 
        }
          ?>
          <?php
          if (isset($_SESSION['passwordChanged'])) {
          ?>
          <div>
            <p class="text-center">Check Email For New Password!- <?php echo $_SESSION['passwordChanged']; ?></p>
          </div>
          <?php
          unset($_SESSION['passwordChanged']); 
        }
          ?>
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
        $("#successMessage:visible").fadeOut(10000);
      });
    </script>
  </body>
</html> 