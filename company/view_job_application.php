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
   <a class="navbar-brand" href="dashboard.php">iJob</a> 
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
      <h2 class="text-center">User Application </h2>
      <hr>
   		<table class="table">
        <thead>
          <th>Job Post Name</th>
          <th>Job Description</th>
          <th>User Name</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php
          $sql ="SELECT * from apply_job_post INNER JOIN job_post on apply_job_post.id_jobpost=job_post.id_jobpost INNER JOIN users on apply_job_post.id_user=users.id_user where apply_job_post.id_company ='$_SESSION[id_user]' AND apply_job_post.status='0'";
          $result=$conn->query($sql);
          if ($result->num_rows>0) {
            while ($row =$result->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $row['jobtitle']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><a href="view_application.php?id_user=<?php echo $row['id_user']; ?>&id_jobpost=<?php echo $row['id_jobpost']; ?>">View</a></td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
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

