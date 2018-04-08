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
    <?php
     if (isset($_SESSION['jobApplySuccess'])) { ?>
    <div class="row">
      <div class="col-md-12 successMessage">
        <div class="alert alert-success">
          You Have Applied Successfully!
        </div>
      </div>
    </div>
    <?php unset($_SESSION['jobApplySuccess']); } ?> 
    <div class="row">
      <h2 class="text-center">My Dashboard</h2>
      <div class="col-md-2">
        <a href="applied_jobs.php" class="btn btn-success">Applied Jobs</a>
      </div>
      <div class="col-md-2">
        <a href="resume.php" class="btn btn-success">Resume</a>
      </div>
    </div>
   	<div class="row">
   		<div class="col-md-12 ">
		   		<!-- <form class="well"> -->
            <h2 class="text-center">Active Jobs</h2>
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
               <th>Action</th>
             </thead>
             <tbody>
               <?php
                    $sql ="SELECT * from job_post";
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0) {
                      while ($row =$result->fetch_assoc()) 
                      {
                        $sql1 ="SELECT * from apply_job_post where id_user='$_SESSION[id_user]' AND id_jobpost='$row[id_jobpost]'";
                        $result1 =$conn->query($sql1);
                        ?>
                        <tr>
                          <td><?php echo $row['jobtitle']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['minimumsalary']; ?></td>
                          <td><?php echo $row['maximumsalary']; ?></td>
                          <td><?php echo $row['experience']; ?></td>
                          <td><?php echo $row['qualification']; ?></td>
                          <td><?php echo date("d-M-Y",strtotime($row['createdat'])); ?></td>
                          <?php  
                          if ($result1 ->num_rows > 0) { 
                            ?>
                            <td><strong>Applied</strong></td>
                            <?php
                          }else{
                            ?>
                            <td><a href="apply_job_post.php?id=<?php echo $row['id_jobpost']; ?> ">Apply</a></td>
                            <?php } ?>
                        </tr>
                        <?php
                      }
                    }
                    $conn->close();
               ?>
             </tbody>
           </table>
		   		<!-- </form> -->
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

