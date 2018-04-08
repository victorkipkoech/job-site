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
      <h2 class="text-center">My Resume</h2>
      <div class="col-md-2">
        <a href="generate_resume.php" class="btn btn-success">Generate Resume</a>
      </div>
      <div class="col-md-2">
        <a href="resume_upload.php" class="btn btn-success">Upload Resume</a>
      </div>
      <?php
      $sql ="SELECT resume FROM users where id_user='$_SESSION[id_user]' AND resume IS NOT NULL";
        $result =$conn->query($sql);
        if ($result->num_rows>0) {
          $row =$result->fetch_assoc();
      ?>
      <div class="col-md-2">
        <a href="../uploads/resume/<?php echo $row['resume'];?>" class="btn btn-info" download="MyUploadedResume">Download Resume</a>
      </div>
      <?php } ?>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

