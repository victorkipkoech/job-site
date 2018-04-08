<?php
  session_start();
  if (isset($_SESSION['id_admin'])) {
    header("Location:dashboard.php");
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
             
     </div>
   </nav>
   </header>
   <br><br><br><br>
     <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <br>
        <div class="well well-sm">
          <h2 class="text-center">Login</h2>
          <hr>
          <form action="checklogin.php" method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" placeholder=" Enter Username" id="username" required="">
            </div>
            <div class="form-group">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password" placeholder="Login Password" name="password" id="inputPassword" required="">
          </div>
          <button type="submit" class="btn btn-success">Login</button>
          <?php
          if (isset($_SESSION['loginError'])) {
          ?>
          <div>
            <p class="text-center">Invalid Username/Password! Try Again!</p>
          </div>
          <?php
          unset($_SESSION['loginError']); 
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
        $("#successMessage:visible").fadeOut(2000);
      });
    </script>
  </body>
</html>