<?php
session_start();
require_once('connection.php');
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.css">
  </head>
  <body>

   <header>
     <nav class="navbar navbar-expand-lg navbar-inverse navbar-fixed-top" >
   <a class="navbar-brand" href="index.php">iJob</a> 
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
                 <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                      <li><a href="#"><span class="glyphicon glyphicon-earphone"></span> Contact</a></li>
                      <li><a href="company.php"><span class="glyphicon glyphicon-tower"> Company</span></a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-info-sign"></span> About
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Mission</a></li>
                          <li><a href="#"> Vission</a></li>
                          <li><a href="about.php">Products <span class="badge">10 </span></a></li>
                        </ul>
                  </li>
                <li><a href="career.php"><span class="glyphicon glyphicon-education"></span> Careers</a></li>
                <?php
                if (isset($_SESSION['id_user']) && empty($_SESSION['companylogged'])) {
                  ?>
                 <li><a href="user/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                 <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                 <?php 
               }else  if(isset($_SESSION['id_user']) && isset($_SESSION['companylogged'])) { 
                ?>
                <li><a href="company/dashboard.php"><span class="glyphicon glyphicon-user"></span> Dashboard</a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php } else {
                ?>
                <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <?php } ?>
             </div> 
     </div>
   </nav>
   </header>
   <br><br>
   <section>
     <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
         <div class="jumbotron text-center">
        <h1>Search Job </h1>
        <p>Find Your Dream Job</p>
       </div>
     </div>
   </div>
 </div>
   </section>
  <!-- Latest Jobs --> 
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <form id="myForm" class="form-inline" >
            <div class="form-group">
              <label>Experience</label>
              <select id="experience" class="form-control">
                <option value="" selected="">Select Experience</option>
                <!-- <option value="1 Year">1 Year</option>
                <option value="2 Year">2 Year</option>
                <option value="3 Year">3 Year</option>
                <option value="4 Year">4 Year</option>
                <option value="5 Year">5 Year</option> -->
                <?php 
                $sql ="SELECT DISTINCT (experience) from job_post where experience IS NOT NULL ORDER BY experience";
                $result =$conn->query($sql);
                if ($result->num_rows >0) {
                  while ($row =$result->fetch_assoc()) {
                    echo "<option value'".$row['experience']."'>".$row['experience']."</option>";
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Qualification</label>
              <select id="qualification" class="form-control">
                <option value="" selected="">Select Qualification</option>
                <?php
                $sql ="SELECT DISTINCT (qualification) from job_post where qualification IS NOT NULL";
                $result =$conn->query($sql);
                    if ($result->num_rows >0) {
                      while($row =$result->fetch_assoc()){
                        echo "<option value'".$row['qualification']."'>".$row['qualification']."</option>";
                      }
                    }
                ?>
              </select>
            </div>
            <button class="btn btn-success">Search</button>
          </form>
        </div>
      </div> 
      <div class="row" style="margin-top: 5%;">
        <div class="table-responsive">
          <table id="myTable" class="table">
            <thead>
               <th>Job Name</th>
               <th> Job Description</th>
               <th>Minimum Salary</th>
               <th>Maximum Salary</th>
               <th>Experience</th>
               <th>Qualification</th>
               <th>Action</th>
             </thead>
             <tbody>
               
             </tbody>
          </table>
        </div> 
      </div>
    </div>
  </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js "></script>
    <script src="https://bartaz.github.io/sandbox.js/jquery.highlight.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.15/features/searchHighlight/dataTables.searchHighlight.min.js"></script>

    <script type="text/javascript">
      $(function(){
        var oTable = $('#myTable').DataTable({
          "autoWidth": false,
          "ajax": {
            "url": "refresh_job_search.php",
            "dataSrc" :"",
            "data" :function(d){
              d.experience =$("#experience").val();
              d.qualification=$("#qualification").val();
            }
          }
        });
        oTable.on('draw', function(){
          var body = $(oTable.table().body());

          body.unhighlight();

          body.highlight(oTable.search());

        });
        $("#myForm").on("submit", function(e){
         e.preventDefault(); 
         oTable.ajax.reload(null,false);
        })
      });
    </script> 
  </body>
</html>