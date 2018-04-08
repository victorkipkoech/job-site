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
                      <li><a href="#contact"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> About
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <div class="well">
                            <li><a href="#mission">Mission</a></li>
                          <li><a href="#vission"> Vission</a></li>
                          <li><a href="#products">Products</a></li>
                          </div>
                        </ul>
                  </li>
                <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li>
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
                  <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Login/Register
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <div class="well well-sm">
                          <h3>Login Form</h3>
                          <hr>
                          <form >
                            <div class="form-group">
                              <label for="inputEmail">Email</label>
                              <input class="form-control" type="email" name="email" placeholder="Email" id="inputEmail">
                              </div>
                              <div class="form-group">
                              <label for="inputPassword">Password</label>
                              <input class="form-control" type="password" placeholder="Login Password" name="password" id="inputPassword">
                            </div>
                            <a class="btn btn-primary col-sm-offset-4" href="login.php" type="submit">Login</a>
                            <br><br>
                          <a class="btn btn-info col-sm-offset-1" href="register.php">Reg an iJob Account</a>
                            <br>
                            <strong>
                            <a href="#" class="col-sm-offset-2">Forgot Password?</a>
                            </strong>
                       </form>
                     </div>
                        </ul>
                      </li> -->
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
        <a name="#mission">
    <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <a href="search.php" class="btn btn-primary btn-lg pull-center"><span class="glyphicon glyphicon-search"></span> Search Job</a>
   </div>
      </div>
       </div>
     </div>
   </div>
 </div>
</div>
   </section>
  <!-- Latest Jobs -->
  <section>
    <div class="container">
      <div class="row">
        <h2 class="text-center">Latest Jobs</h2>
          <?php
          $sql ="SELECT * from job_post Order by rand() limit 6";
          $result =$conn->query($sql);

          if ($result->num_rows > 0) {
            //output data
            while ($row =$result->fetch_assoc()) 
            {
              ?>
        <div class="col-md-6 fixHeight" >
          <h3><?php echo $row['jobtitle']; ?> </h3>
          <p><?php echo $row['description']; ?></p>
          <button class="btn btn-info">view more</button>
        </div>
        <?php
      }
    }
    ?>
      </div>
    </div>
  </section>
   <!-- Companies List -->
   <section>
   <div class="container">
     <div class="row">
       <h2 class="text-center">Companies</h2>
       <div class="col-xs-6 col-md-3">
         <a href="#" class="thumbnail">
           <img src="..." alt="...">
         </a>
       </div>
       <div class="col-xs-6 col-md-3">
         <a href="#" class="thumbnail">
           <img src="..." alt="...">
         </a>
       </div>
       <div class="col-xs-6 col-md-3">
         <a href="#" class="thumbnail">
           <img src="..." alt="...">
         </a>
       </div>
       <div class="col-xs-6 col-md-3">
         <a href="#" class="thumbnail">
           <img src="..." alt="...">
         </a>
       </div>
       <div class="col-xs-6 col-md-3">
         <a href="#" class="thumbnail">
           <img src="..." alt="...">
         </a>
       </div>
     </div>
   </div>



   <!-- Mission -->

   <div class="container">
     <div class="row">
       <div class="well well-lg">
         <a id="mission"></a>
       <h3 class="text-center">The mission Of iJob</h3>
       </div>
     </div>
   </div>
    <div class="container">
     <div class="row">
       <div class="col-md-10 col-sm-offset-1">
         <div class="well well-lg">
         <a id="vission"></a>
       <h3 class="text-center">The Vission Of iJob</h3>
       </div>
       </div>
     </div>
   </div> 
   <div class="container">
     <div class="row">
       <div class="well well-lg">
         <a id="products"></a>
       <h3 class="text-center">The Products At iJob</h3>
       </div>
     </div>
   </div>
   </section>
   <section>
      <div class="container">
     <div class="row">
       <div class="col-md-10 col-sm-offset-1">
        <a id="contact"></a>
          <form>
        
            <h4>Email:</h4>
            <h4>Telephone:</h4>
            <h4>Fax:</h4>
            <h4>Address:</h4>
            <h4>map:</h4>
         
          </form>
      </div>
     </div>
   </div>
   </section>
   <ul class="pager">
     <li><a href="#">&larr;Previous</a></li>
     <li><a href="home.php">Next&rarr;</a></li>
   </ul>
   <footer class="main-footer fixed-bottom" style="margin-left: 0px;">
    <div class="text-center">
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