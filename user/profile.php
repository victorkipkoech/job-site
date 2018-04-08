<?php
session_start();
require_once("../connection.php");
if (empty($_SESSION['id_user'])) {
    header("Location:../index.php");
    exit();
  }
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
   <a class="navbar-brand" href="../index.php">iJob</a> 
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
                   <li><a href="../index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="../company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul> -->
               <ul class="nav navbar-nav navbar-right">
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
      <h2 class="text-center">View Profile</h2>
      <hr>
      <form action="updateprofile.php" method="post" >
          <?php
          $sql ="SELECT * from users where id_user='$_SESSION[id_user]'";
          $result =$conn->query($sql);
          if ($result->num_rows > 0) {
          while ($row =$result->fetch_assoc()) {
          ?>
      <div class="col-md-4 well well-lg">
        <!-- <div class="well well-lg"> -->
          <div class="form-group">
            <label for="inputName" >Name</label>
            <input  class="form-control" type="text" placeholder="Full Name" name="fullname" id="inputName" value="<?php  echo $row['fullname']; ?>" readonly>
          </div>
          <div class="form-group has-success">
            <label for="DateOfBirth">Date Of Birth</label>
            <input class="form-control" type="date" name="dateofbirth" placeholder="dd/mm/yyyy"  value="<?php  echo $row['dob']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input class="form-control" type="email" id="inputEmail" placeholder="Email Address" value="<?php  echo $row['email']; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4 well well-lg">
           <div class="form-group">
            <label for="country">Country</label>
            <input class="form-control" type="text" name="country" id="country" placeholder="Enter Country" value="<?php  echo $row['country']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input class="form-control" type="text" name="city" id="city" placeholder="Enter City" value="<?php  echo $row['city']; ?>" readonly>
          </div>
          <div class="form-group ">
            <label for="address">Address</label>
            <textarea class="form-control" type="text" name="address" id="address" row="5" value="<?php echo $row['address']; ?>" readonly></textarea>
          </div>
        </div>
         <div class="col-md-4 well well-lg">
           <div class="form-group">
            <label for="contactno">Contact Number</label>
            <input class="form-control" type="number" name="contacno" id="contactno" placeholder="Enter Contact Number" value="<?php  echo $row['contact']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="qualification">Highest Qualification</label>
            <input class="form-control" type="text" name="qualification" id="qualification" placeholder="Enter Highest qualification"  value="<?php  echo $row['qualification']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="stream">Stream</label>
            <input class="form-control" type="text" name="stream" id="stream" placeholder="Enter Stream" value="<?php  echo $row['stream']; ?>" readonly>
          </div>
         </div>
          <div class="row">
            <div class="col-md-4 col-md-offset-4 well well-lg">
              <div class="form-group">
            <label for="passingyear">Passing Year</label>
            <input class="form-control" type="date" name="passingyear" id="passingyear" placeholder="Enter Passing Year" value="<?php  echo $row['passingyear']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="text">Age</label>
            <input class="form-control" type="text" name="age" placeholder="Enter Age" value="<?php  echo $row['age']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="course">Course</label>
            <input class="form-control" type="text" name="course" id="course" placeholder="Enter Course" value="<?php  echo $row['course']; ?>" readonly >
          </div>
         <!--  <button class="btn btn-info" type="submit">Update</button>
          <button class="btn btn-warning col-sm-offset-2" type="reset">Cancel</button> -->
            </div>
          </div>
          
          <?php
           }
          }
          ?>
        </form>
        <!-- </div> -->
      </div>
    </div>

     <div class="container">
      <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="form-group">
                <!-- <button class="btn btn-info text-center" type="submit">Update</button> -->
                <button class="btn btn-primary pull-center" data-target="#editProfileModal" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>Edit</button>
                <button class="btn btn-warning col-sm-offset-2" type="reset">Cancel</button>
              </div>
            </div>
          </div>
    <div class="row">
      <div class="col-xs-12">  
        <div class="modal fade" id="editProfileModal" tabindex="-1">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profile</h4>
              </div>
              <div class="modal-body">
               <form action="updateprofile.php" method="post" >
          <?php
          $sql ="SELECT * from users where id_user='$_SESSION[id_user]'";
          $result =$conn->query($sql);
          if ($result->num_rows > 0) {
          while ($row =$result->fetch_assoc()) {
          ?>
      <div class="col-md-4 well well-lg">
        <!-- <div class="well well-lg"> -->
          <div class="form-group">
            <label for="inputName" >Name</label>
            <input  class="form-control" type="text" placeholder="Full Name" name="fullname" id="inputName" value="<?php  echo $row['fullname']; ?>">
          </div>
          <div class="form-group has-success">
            <label for="inputDateOfBirth">Date Of Birth</label>
            <input class="form-control" type="date" name="dateofbirth" id="dateofbirth" placeholder="dd/mm/yyyy"  value="<?php  echo $row['dob']; ?>" min="1960-01-01" max="2005-01-31">
          </div>
          <div class="form-group">
            <label for="inputEmail">Email</label>
            <input class="form-control" type="email" id="inputEmail" placeholder="Email Address" value="<?php  echo $row['email']; ?>" readonly>
          </div>
        </div>
        <div class="col-md-4 well well-lg">
           <div class="form-group">
            <label for="country">Country</label>
            <input class="form-control" type="text" name="country" id="country" placeholder="Enter Country" value="<?php  echo $row['country']; ?>">
          </div>
          <div class="form-group">
            <label for="city">City</label>
            <input class="form-control" type="text" name="city" id="city" placeholder="Enter City" value="<?php  echo $row['city']; ?>">
          </div>
          <div class="form-group has-warning">
            <label for="address">Address</label>
            <textarea class="form-control" type="text" name="address" id="address" row="5" value="<?php echo row['address']; ?>"></textarea>
          </div>
        </div>
         <div class="col-md-4 well well-lg">
           <div class="form-group">
            <label for="contactno">Contact Number</label>
            <input class="form-control" type="number" name="contacno" id="contactno" placeholder="Enter Contact Number" value="<?php  echo $row['contact']; ?>">
          </div>
          <div class="form-group">
            <label for="qualification">Highest Qualification</label>
            <input class="form-control" type="text" name="qualification" id="qualification" placeholder="Enter Highest qualification"  value="<?php  echo $row['qualification']; ?>">
          </div>
          <div class="form-group">
            <label for="stream">Stream</label>
            <input class="form-control" type="text" name="stream" id="stream" placeholder="Enter Stream" value="<?php  echo $row['stream']; ?>">
          </div>
         </div>
          <div class="row">
            <div class="col-md-4 col-md-offset-4 well well-lg">
              <div class="form-group">
            <label for="passingyear">Passing Year</label>
            <input class="form-control" type="date" name="passingyear" id="passingyear" placeholder="Enter Passing Year" value="<?php  echo $row['passingyear']; ?>">
          </div>
          <div class="form-group">
            <label for="text">Age</label>
            <input class="form-control" type="text" name="age" id="age" placeholder="Enter Age" value="<?php  echo $row['age']; ?>" readonly>
          </div>
          <div class="form-group">
            <label for="course">Course</label>
            <input class="form-control" type="text" name="course" id="course" placeholder="Enter Course" value="<?php  echo $row['course']; ?>" required="" >
          </div>
          <!-- <button class="btn btn-info" type="submit">Update</button>
          <button type="submit" class="btn btn-warning col-sm-offset-2" data-dismiss="modal">Close</button> -->
            </div>
          </div>
          
          <?php
           }
          }
          ?>
          <div class="modal-footer ">
                <button class="btn btn-info pull-left col-md-offset-5" type="submit"><span class="glyphicon glyphicon-refresh"></span>Update</button>
                 <button type="submit" class="btn btn-warning pull-left " data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Close</button>
                
              </div>
        </form>
              </div>
            </div>
          </div>
          
        </div>
      </div>
   </div>
      </div>
      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $('#dateofbirth').on('change',function(){
        var today =new Date();
        var birthDate =new Date($(this).val());
        var age =today.getFullYear() - birthDate.getFullYear();
        var m =today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m=== 0 && today.getDate() < birthDate.getDate())) {
          age--;
        }
        $('#age').val(age);
      });
    </script>
  </body>
</html> 