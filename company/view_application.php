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
   	<div class="row">
     <div class="panel panel-info">
       <div class="panel-heading">User Application</div>
       <div class="panel-body">
         <?php
         $sql ="SELECT * from apply_job_post INNER JOIN users on apply_job_post.id_user=users.id_user where apply_job_post.id_user ='$_GET[id_user]' AND apply_job_post.id_jobpost='$_GET[id_jobpost]'";
          $result=$conn->query($sql);
          if ($result->num_rows>0) {
            while ($row =$result->fetch_assoc()) {
         ?>
         <p>Name:<?php echo $row['fullname']; ?></p>
         <p>Email:<?php echo $row['email']; ?></p>
         <p>Date Of Birth:<?php echo $row['dob']; ?></p>
         <p>Country:<?php echo $row['country']; ?></p>
         <p>City:<?php echo $row['city']; ?></p>
         <p>Address:<?php echo $row['address']; ?></p>
         <p>Contact:<?php echo $row['contact']; ?></p>
         <p>Qualification:<?php echo $row['qualification']; ?></p>
         <p>Stream:<?php echo $row['stream']; ?></p>
         <p>Passing Year:<?php echo $row['passingyear']; ?></p>
         <p>Age:<?php echo $row['age']; ?></p>
         <p>Course:<?php echo $row['course']; ?></p>
         <?php 
         if (isset($row['resume'])) {
           ?>
           <a href="../uploads/resume/<?php echo $row['resume']; ?>" class="btn btn-success" download="<?php echo $row['fullname'].'Resume'; ?>">Download Resume</a>

        <?php } ?>
        <a href="reject_user.php?id_user=<?php echo $_GET['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>" class="btn btn-danger">Rejected User</a>
         <?php } } ?>
       </div>
     </div>
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

