<?php
session_start();
if (empty($_SESSION['id_user'])) {
	header("Location:../index.php");
	exit();
}
require_once('../connection.php');
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
               <ul class="nav navbar-nav">
                 <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="../company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a href="../career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li>
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>
               </ul>
             </div> 
     </div>
   </nav>
   </header>
   <br><br><br><br>
   <div class="container">
    <div class="row">

      <?php
     if (isset($_SESSION['uploadError'])) { ?>
    <div class="row">
      <div class="col-md-12 successMessage">
        <div class="alert alert-danger">
          <?php echo $_SESSION['uploadError']; ?>
        </div>
      </div>
    </div>
    <?php unset($_SESSION['uploadError']); } ?>

      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
      <div class="panel-heading">Upload Resume</div>
      <div class="panel-body">
        <form action="upload_resume.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Upload Resume</label>
            <input type="file" name="resume" class="form-control" required="">
          </div>
          <div class="form-group">
            <input type="submit" name="" value="Upload" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
      </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

