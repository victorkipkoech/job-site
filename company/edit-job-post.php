<?php
session_start();
require_once("../connection.php");
// if (isset($_SESSION['id_user'])) {
//     header("Location:user/dashboard.php");
//     exit();
//   }
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
                   <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul> -->
               <ul class="nav navbar-nav navbar-right">
                  <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> About
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Mission</a></li>
                          <li><a href="#"> Vission</a></li>
                          <li><a href="about.php">Products <span class="badge">10 </span></a></li>
                        </ul>
                  </li> -->
                <!-- <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li -->>
                <?php
                if (isset($_SESSION['id_user'])) {
                  ?>
                 <li><a href="company/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="../logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php
                }else {
                ?>
                <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php } ?>
               </ul>
             </div> 
     </div>
   </nav>
   </header>
   <br><br><br><br>
     <div class="container">
    <div class="row">
      <div class="col-md-5 has-success col-md-offset-4">
        <div class="well well-lg">
        <h3 class="text-center">Edit Job Post </h3>
        <hr>
        <form action="editpost.php" method="post" >

          <?php
          $sql ="SELECT * from job_post where id_jobpost='$_GET[id]'  AND id_company ='$_SESSION[id_user]'";
                    $result =$conn->query($sql);

                    if ($result->num_rows > 0) {
                      //output data
                      while ($row =$result->fetch_assoc()) 
                      {
          ?>
          <div class="form-group">
            <label for="inputJob" >Job Tittle</label>
            <input  class="form-control" type="text" placeholder="Job Tittle" value="<?php echo $row['jobtitle']; ?>" name="jobtitle" id="jobtitle" required="">
          </div>
          <div class="form-group has-success">
            <label for="inputDescription">Job Description</label>
            <textarea class="form-control" type="date" name="jobdescription" id="jobdescription" placeholder="Job Description" row="5"><?php echo $row['description'];?></textarea>
          </div>
          <div class="form-group">
            <label for="minsalary">Minimum Salary</label>
            <input class="form-control" type="text" name="minsalary" id="minsalary" value="<?php echo $row['minimumsalary']; ?>" placeholder="Minimum Salary " required="">
          </div>
          <div class="form-group">
            <label for="maxsalary">Maximum salary</label>
            <input class="form-control" type="text" name="maxsalary" id="maxsalary" value="<?php echo $row['maximumsalary']; ?>" placeholder="Maximum Salary " required="">
          </div>
          <div class="form-group">
            <label for="experience">Experience required</label>
            <input class="form-control" type="text" name="experience" id="experience" value="<?php echo $row['experience']; ?>" placeholder="Experience required">
          </div>
          <div class="form-group">
            <label for="qualification">Qualification required</label>
            <input class="form-control" type="text" name="qualification" id="qualification" value="<?php echo $row['qualification']; ?>" placeholder="Qualification Required ">
          </div>
          <input type="hidden" name="target_id" value="<?php echo $_GET['id']; ?>">
          <div class="text-center">
            <button class="btn btn-info" type="submit">Update</button>
          <!-- <button class="btn btn-warning col-sm-offset-2" type="reset">Cancel</button> -->
          </div>
          <br><br>
          <?php
          }
        }else{
          header("Location:dashboard.php");
          exit();
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
  </body>
</html>