  <!-- Navigation -->
<?php include("db.php");

$user= $_SESSION['username'];
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand font-weight-bolder" href="#">DOC WRITER</a>
     
      <div class="text-white  h4" style="">
      <?php echo "Welcome <span class=\"text-primary\">".strtoupper($user)."</span>"; ?></div>
      <div class=""  >
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link font-weight-bolder" href="logout.php">Logout </a>
          </li>
          
          </li>
        </ul>
      </div>
    </div>
  </nav>