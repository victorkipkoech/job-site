<?php
session_start();
require_once("connection.php");
if (isset($_SESSION['id_user'])) {
    header("Location:company/dashboard.php");
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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
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
                	 <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <!-- <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li> -->
               </ul>
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
                <!-- <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li> -->
                <?php
                if (isset($_SESSION['id_user'])) {
                  ?>
                 <li><a href="company/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php
                }else {
                ?>
                <li><a href="companylogin.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="companyregister.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
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
        <h3 class="text-center">Company Registration</h3>
   			<hr>
   			<form action="addcompany.php" method="post" >
   				<div class="form-group">
            <label for="companyname" >Company Name</label>
            <input  class="form-control" type="text" placeholder="Company Name" name="companyname" id="companyname" required="">
          </div>
          <div class="form-group has-success">
            <label for="headoffice">Head Office Location</label>
            <input class="form-control" type="text" name="headoffice" id="headoffice" placeholder="Enter Head Office Location" required="">
          </div>
          <div class="form-group">
            <label for="country">Country</label>
            <select id="country" class="form-control" name="country">
              <option selected="" value="">Select Country</option>
              <?php
              $sql="SELECT * from countries";
              $result=$conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row=$result->fetch_assoc()) {
                  echo "<option value='".$row['name']."' data-id='".$row['id']."'>".$row['name']."</option>";
                }
                }
              ?>
            </select>
            <div id="stateDiv" class="form-group" style="display: none;">
            <label for="state">State</label>
            <select id="state" class="form-control" name="state">
              <option value="" selected="">Select State</option>
            </select>
          </div>
            <div id="cityDiv" class="form-group" style="display: none;">
            <label for="city">City</label>
            <select id="city" class="form-control" name="city">
              <option selected="">Select city</option>
            </select>
          </div>
          <div class="form-group has-success">
            <label for="contactno">Contact Number</label>
            <input class="form-control" type="text" name="contactno" id="contactno" placeholder="Enter Contact Number" maxlength="12" minlength="10" autocomplete="off" onkeypress="return validatePhone(event);" required="">
          </div>
          <div class="form-group has-warning">
            <label for="website"> Website</label>
            <input class="form-control" type="text" name="website" id="website" placeholder="Enter Company Website">
          </div>
          <div class="form-group has-warning">
            <label for="type">Company Type </label>
            <input class="form-control" type="text" name="type" id="type" placeholder="Enter Company type ">
          </div>
          <div class="form-group has-warning">
            <label for="type">Company Address </label>
            <input class="form-control" type="text" name="address" id="address" placeholder="Company Address ">
          </div>
             <div class="form-group">
            <label for="email">Company Email</label>
            <input class="form-control" type="email" name="email" id="inputEmail" placeholder="Email Address" required="">
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password" name="password" id="inputPassword" placeholder="Enter Password" required="">
          </div>
          <button class="btn btn-info col-sm-offset-2" type="submit">Sign Up</button>
          <button class="btn btn-warning col-sm-offset-2" type="reset">Cancel</button>
          <br><br>
          <?php
          if (isset($_SESSION['registerError'])) {
          ?>
          <div>
            <p class="text-center">Email Already Exists! Choose A Different Email!</p>
          </div>
          <?php
          unset($_SESSION['registerError']); 
        }
          ?>
          <p>Already have an Account?<a href="companylogin.php">Login</a></p>
   			</form>
        </div>
   		</div>
   	</div>
   </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      function validatePhone(event){

        //event.keyCode will return unicode for characters and numbers like a,b,c 5 etc.
        //event.which will return key for mouse events and other events like ctrl,alt.
        var key =window.event ? event.keyCode:event.which;
        //8 means backspace
        //46 means delete
        //37 means left arrow
        //39 means right arrow
        if (event.keyCode==9 || event.keyCode==46 || event.keyCode==37|| event.keyCode==39) {
          return true;
        }else if (key<48 || key>57) {
          //48-57 is 0-9 numbers in the keyboard.
          return false;
        }else return true;
      }
    </script>
    <script>
      $("#country").on("change",function(){
        var id = $(this).find(':selected').attr("data-id");//.val();
        $("#state").find('option:not(:first)').remove();
        if (id !='') {
          $.post("state.php",{id: id}).done(function(data){
            // console.log(data); 
            $("#state").append(data);
          });
          $('#stateDiv').show();

        }else{
          $('#stateDiv').hide();
          $('#cityDiv').hide();
        }
      });
    </script>
    <script>
      $("#state").on("change",function(){
        var id = $(this).find(':selected').attr("data-id");//.val();
        $("#city").find('option:not(:first)').remove();
        if (id !='') {
          $.post("city.php",{id: id}).done(function(data){
            // console.log(data); 
            $("#city").append(data);
          });
          $('#cityDiv').show();

        }else{
          $('#cityDiv').hide();
        }
      });
    </script>
  </body>
</html> 