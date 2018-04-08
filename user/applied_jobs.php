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
   		<div class="col-md-12 ">
		   		<!-- <form class="well"> -->
            <h2 class="text-center">Applied Jobs</h2>
            <hr>
		   		  <table class="table table-striped">
             <thead>
               <th>Job Name</th>
               <th> Job Description</th>
               <th>Minimum Salary</th>
               <th>Maximum Salary</th>
               <th>Experience</th>
               <th>Qualification</th>
               <th>Created At</th>
             </thead>
             <tbody>
               <?php
                    $sql ="SELECT * from job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost where apply_job_post.id_user='$_SESSION[id_user]'";
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row =$result->fetch_assoc()) 
                      {
                        
                        ?>
                        <tr>
                          <td><?php echo $row['jobtitle']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['minimumsalary']; ?></td>
                          <td><?php echo $row['maximumsalary']; ?></td>
                          <td><?php echo $row['experience']; ?></td>
                          <td><?php echo $row['qualification']; ?></td>
                          <td><?php echo date("d-M-Y",strtotime($row['createdat'])); ?></td>
                      
                        </tr>
                        <?php
                      }
                    }
                    $conn->close();
               ?>
             </tbody>
           </table>
           <a href="dashboard.php" class="btn btn-warning pull-right">Back</a>
		   		<!-- </form> -->
   		</div>
   	</div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

