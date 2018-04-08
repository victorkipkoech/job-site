<?php
session_start();
require_once('connection.php');
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
    <style type="text/css">
    body  {
    background-color: #cccccc;
  }
      .well{ 
  background-color: #0000;
  }
    </style>
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
                 <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="contact.php"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['id_user']) && empty($_SESSION['companylogged'])) {
                  ?>
                 <li><a href="user/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                 <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                 <?php 
               }else  if(isset($_SESSION['id_user']) && isset($_SESSION['companylogged'])) { 
                ?>
                <li><a href="company/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php } else {
                ?>
                <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php } ?>
                  
               </ul>
             </div> 
     </div>
   </nav>
   </header>
   <br><br><br>
  <section class="content-header">
      <div class="container">
        <div class="row latest-job margin-top-50 margin-bottom-20">
          <h1 class="text-center margin-bottom-20">Sign Up</h1>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-yellow padding-5">
              <div class="inner">
                <h3 class="text-center">Candidates Login</h3>
              </div>
              <a href="login-candidates.php" class="small-box-footer">
                Login <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <div class="col-md-6 latest-job ">
            <div class="small-box bg-red padding-5">
              <div class="inner">
                <h3 class="text-center">Company Login</h3>
              </div>
              <a href="login-company.php" class="small-box-footer">
                Login <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  
 
   
   
   <footer class="main-footer " style="margin-left: 0px;">
    <div class="text-center fixed-bottom">
      <strong>Copyright &copy; 2016-2017 <a href="victor.system">iJob Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){
        var maxHeight=0;
        $(".fixHeight").each(function(){
          maxHeight =($(this).height() > maxHeight ?$(this).height():maxHeight);
        });
        $(".fixHeight").height(maxHeight);
      });
    </script>
  </body>
</html>