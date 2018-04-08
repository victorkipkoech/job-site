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
    	<div class="col-md-8 col-md-offset-2">
    	<div class="panel panel-default">
    			<div class="panel-heading">Generate Resume</div>
    		<div class="panel-body">
    			<form class="form-horizontal" method="post" action="generate_resume_data.php">
    				<h3>Personal Details Section</h3>
    				<div class="form-group">
    					<label class="col-md-4 control-label">Name</label>
    					<div class="col-md-6">
    						<input type="text" name="name" class="form-control" required=" ">
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-md-4 control-label">Address</label>
    					<div class="col-md-6">
    						<input type="text" name="address" class="form-control" required=" ">
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-md-4 control-label">Phone</label>
    					<div class="col-md-6">
    						<input type="text" name="phone" class="form-control" required=" ">
    					</div>
    				</div>
    				<div class="form-group">
    					<label class="col-md-4 control-label">Email</label>
    					<div class="col-md-6">
    						<input type="email" name="email" class="form-control" required=" ">
    					</div>
    				</div>
    				<h3>Experience Section</h3>
    				<div class="form-group">
    					<label class="col-md-4 control-label">Number of company you want to add for Experience</label>
    					<div class="col-md-6">
    					<select name="experienceNo" class="form-control" id="experienceNo" required="">
    						<option>Select Value</option>
    						<option value="1">1</option>
    						<option value="2">2</option>
    						<option value="3">3</option>
    						<option value="4">4</option>
    						<option value="5">5</option>
    					</select>
    				</div>
    				</div> 
    				<div id="experienceSection"></div>
    				<div class="form-group">
    				<div class="col-md-6">
    					<button type="submit" class="btn btn-primary">Generate</button>
    				</div>
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
 <!--    <script>
    	$("#experienceNo").on("change", function(){
    		var numInputs =$(this).val();
    		$("#experienceSection").html('');
    		for (var i = 0; i < numInputs; i++) {
    			var j=i+1;
    			$("#experienceSection").append('<div class="form-group><label class="col-md-4 control-label">Company Name'+j+</label><div class="col-md-6"><input type="text" name="companyname[]")
    		}
    			});
    </script> -->
  </body>
</html>

