                    <?php
                      require('db.php');
                      error_reporting(0);
                      session_start();// If form submitted, insert values into the database.
                      if (isset($_POST['username'])){
                      $username1 = stripslashes($_REQUEST['username']);
                      $username1 = mysqli_real_escape_string($con,$username1);
                      $password1 = stripslashes($_REQUEST['password']);
                      $password1 = mysqli_real_escape_string($con,$password1);
                      $query2 = "SELECT * FROM `users` WHERE username='$username1'
                      and password='".md5($password1)."' ";
                      $result = mysqli_query($con,$query2) or die(mysql_error());
                      $rows = mysqli_num_rows($result);
                      if($rows==1){
                      $_SESSION['username'] = $username1;
                      $_SESSION['email'] = $email1;
                          header("Location:index.php");
                              }else{
                          $name_error1 =  "Username or Password is incorrect";
                          echo "<script type='text/javascript'> onload = function(){alert('$name_error1');
                          }</script>";
                      }
                          }
                    ?><!--login end-->


<!DOCTYPE html>
<html>
<title>login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 

<!-- Webpage Icon -->
<link rel="shortcut icon" type="image/x-icon" href="img/logo.PNG" /> 



  
<style>

body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
body {
    background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(img/Contact3.jpg);
    background-size: cover;
}
.input--style-3 {
    font-size: 16px;
    color: #ccc;
    background: transparent;
}
input {
    outline: none;
    margin: 0;
    border: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
    width: 100%;
    font-size: 14px;
    font-family: inherit;
}



</style>
<body class="">



<div class="p-5" id="main" >

  <div class="container-fluid " id="login1"  >
  
    <div class="text-white  h1 text-center"  style="font-family: 'Sigmar One', cursive;">DOC WRITER</div>

        <div class="row">
            <div class="col-md-6">
                <div class="card text-center text-white m-md-5 bg-transparent" style="width: 500x;">
                
                <div class="card-body ">
                    <h2 class="card-title">DOC WRITER</h2>
                    <h4 class="card-text text-white-50 text-justify">Doc Write is a Documents Downloading sites. Here you can Post and Download the Document. This site support only 'doc' and 'docx' file.</h4><br>
                    <h4 class="card-text text-white">Created By</h4>
                    <h4 class="card-text text-white-50 ">Ashishkumar Vishwakarma</h4>
                    <h4 class="card-text text-white-50">Aswad Shaikh</h4>
                    <h4 class="card-text text-white-50">Fahad Patel</h4>
                    <h4 class="card-text text-white-50">Mansi Nagrale</h4>
                    
                </div>
                </div>                
            </div>
            <div class=" col border p-5 rounded-pill border-primary">
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                <a class="nav-link active">LOGIN</a>
                </li>
            </ul>

            <!---Login start--->
                <div class="tab-pane p-md-5" id="login">
                   
                    <form action="" method="POST">
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" placeholder="Username" name="username" required class=" input--style-3 border-bottom" >
                       </div>
                       
                        <div class="form-group ">
                            <label for="exampleInputPassword1"></label>
                            <input type="password" placeholder="Password" name="password" required class=" input--style-3 border-bottom"  id="exampleInputPassword1">
                       </div>
                       <div class="form_error">
                            <span> <?php echo " <span class=\"text-danger\"> $name_error1 </span>" ; ?></span>
                       </div>
                       <br>
                       <div class="text-center">
                            <button  type="submit" class="btn btn-outline-primary rounded-pill btn-lg font-weight-bolder">Login</button>
                       </div>
                       <br>
                        <div  class="text-white  h4 text-center"  style="font-family: 'Sigmar One', cursive;">
                            Not registered! <a class="text-success h3" href="register.php"><u>Register Here</u> </a>
                        </div>
                    </form>
                </div>
        
          <!---Login end---> 
            </div>
           <!-- <div class=" col-sm-0 col-md-3">
            </div>-->
        </div>
    </div>
  </div>
</div><!--container end-->


      <!-- contained end-->
    </div>
   

</div>





<footer class="container-fluid text-white  bg-transparent  
    ">
        <div class="footer text-center p-3">
            <span> &copy; 2020 <a href="#">Doc Writer.</a> All Rights Reserved</span>
        </div>
      </footer><!-- contaner -->
 

  

<!-- END PAGE CONTENT -->
<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
</html>

 
 