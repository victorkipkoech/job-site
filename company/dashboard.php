<?php
session_start();
if (empty($_SESSION['id_user'])) {
	header("Location:../index.php");
	exit();
}
require_once("../connection.php");
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
                 <li class="active"><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      
               </ul> -->
               <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="../company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li> -->
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-user"></span> logout</a></li>
               </ul>
             </div> 
     </div>
   </nav>
   </header>
   <br><br><br><br>
   <div class="container">
    <?php if (isset($_SESSION['jobPostSuccess'])) { ?>
    <div class="row successMessage">
      <div class="alert alert-success">
      Job Post Created Successfully!
    </div>
    </div>
    <?php  unset($_SESSION['jobPostSuccess']);} ?>

    
    <?php if (isset($_SESSION['jobPostUpdateSuccess'])) { ?>
    <div class="row successMessage">
      <div class="alert alert-success">
      Job Post Updated Successfully!
    </div>
    </div>
    <?php  unset($_SESSION['jobPostUpdateSuccess']);} ?>


    <?php if (isset($_SESSION['jobPostDeleteSuccess'])) { ?>
    <div class="row successMessage">
      <div class="alert alert-success">
      Job Post Deleted Successfully!
    </div>
    </div>
    <?php  unset($_SESSION['jobPostDeleteSuccess']);} ?>
   	<div class="row">
      <h2 class="text-center">Dashboard</h2>
      <hr>
   		<div class="col-md-3 col-sm-offset-1">
		   		<a href="create-job-post.php" class="btn btn-success btn-block btn-lg">Create Job Post</a>
   		</div>
      <div class="col-md-3 col-sm-offset-1">
        <a href="view-job-post.php" class="btn btn-success btn-block btn-lg">View Job Post</a>
      </div>
      <?php
      $sql ="SELECT * from apply_job_post where id_company ='$_SESSION[id_user]' AND status='0'";
      $result =$conn->query($sql);
      if ($result->num_rows>0) {
        ?>
        <div class="col-md-3">
          <a href="view_job_application.php" class="btn btn-info btn-block btn-lg">View Application<span class="badge"><?php echo $result->num_rows; ?></span> </a>
        </div>
        <?php
      }
      ?>
   	</div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(function(){
        $(".successMessage:visible").fadeOut(2000);
      });
    </script>
  </body>  
</html>

