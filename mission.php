<?php
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="custom.css">
    
  </head>
  <body>
   <div class="container">
    <div class="row">
      <div class="col-xs-12">
      <button class="btn btn-primary btn-sm pull-right" data-target="#loginModal" data-toggle="modal">Login</button>  
        <div class="modal fade" id="loginModal" tabindex="-1">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="inputUserName">Username</label>
                    <input type="text" id="inputUserName" class="form-control" placeholder="Login Username">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      <br><br>
      <div class="col-xs-12">
        <button id="btnSubmit" class=" btn btn-primary">Submit</button>
        <br><br>
        <div id="myAlert" class="alert alert-danger collapse">
          <a id="linkClose" href="#" class="close">&times;</a>
          <strong>Error!</strong>There is a problem submitting your form
        </div>
      </div>
    </div>
     
   </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#btnSubmit').click(function(){
          $('#myAlert').show('fade'); 

          setTimeout(function(){
            $('#myAlert').hide('fade');
          },2000); 
        });
         $('#linkClose').click(function(){
          $('#myAlert').hide('fade');
        });
      });
    </script>
  </body>
</html> 
