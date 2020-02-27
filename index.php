
<?php
require("auth.php");
include("db.php");
$user= $_SESSION['username'];
$statusMsg = '';
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){ 
$title = $_POST['title'];
$keyword = $_POST['keyword'];
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('doc','docx','DOC','DOCX');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $con->query("INSERT into register (title,keyword,file_name, uploaded_on) VALUES ('$title','$keyword','".$fileName."', NOW())");
            if($insert){
                $statusMsg = "<span class=\"text-success\">The file ".$title. " has been uploaded successfully.</span>";
            }else{
                $statusMsg = "<span class=\"text-danger\">File upload failed, please try again.</span>";
            } 
        }else{
            $statusMsg = "<span class=\"text-danger\">Sorry, there was an error uploading your file.</span>";
        }
    }else{
        $statusMsg = "<span class=\"text-primary\">Sorry, doc and docx files are allowed to upload.</span>";
    }
}else{
    $statusMsg = "<span class=\"text-primary\">Please select a file to upload.";
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Doc Writer</title>
        <script src="js/jquery-1.10.2.min.js"></script>  
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Webpage Icon -->
<link rel="shortcut icon" type="image/x-icon" href="img/logo.PNG" /> 
    </head>
    <style>
    .body1 {
    background-image:linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url(img/Contact3.jpg);
    background-size: cover;
}
    </style>

<body>
    
<?php
include("db.php");
include("nav.php");

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `register` WHERE CONCAT(`title`, `keyword`) LIKE '%".$valueToSearch."%' ORDER BY id DESC";
    $search_result = mysqli_query($con, $query);
}
 else {
    $query = "SELECT * FROM `register` ORDER BY id DESC ";
    $search_result = mysqli_query($con, $query);
}
?>

 
  <div class="container-fluid ">
    <div class="row">
      <div class="col-lg-5  padding_1 bg-dark body1" style="padding:0;">
        <div class="sticky-top  mx-md-4" style="padding: 60px 0 0 0;">
          
            <div class=" mx-5 my-3">
              <header class="card-header text-white text-center border border-warning">
                <h4 class="card-title mt-2">Upload Document</h4>
              </header>
              <article class="card-body rounded-circle border border-warning">
                  <form action="" method="post" enctype="multipart/form-data" class=" py-3">
                    <div class="text-center">
                      <input type="file" class=" text-white" name="file" capture="camera" required>
                    </div>    
                    <div class="form-group py-3">
                      <input type="text" class="form-control bg-transparent text-white" name="title" placeholder="TITLE" required>
                    </div> <!-- form-group end.// -->
                    
                    <div class=" form-group">
                       
                      <input type="text" class="form-control bg-transparent text-white" name="keyword" placeholder="TAGS Separated by ' ,  '" required >
                    </div> <!-- form-group end.// -->
                    <div class=" form-group text-center">
                      <label><?php  echo $statusMsg;?></label>   
                      
                    </div> <!-- form-group end.// -->

                   
                    <div class="form-group text-center">
                        <button type="submit" name="submit" class="btn btn-primary "> Upload  </button>
                    </div> <!-- form-group// -->      
                  </form>
              </article> <!-- card-body end .// -->
    
            </div> <!-- card.// -->
            <footer class="container text-white  bg-transparent
                ">
                    <div class="footer text-center p-3">
                        <span> &copy; 2020 <a href="#">Doc Writer.</a> All Rights Reserved</span>
                    </div>
            </footer><!-- contaner -->
        </div>
      </div>
     

      <div class="col col-lg-7 col-md-12 p-0" style="padding: 60px 0 0 0;" >
      <div style="padding: 55px 0 0 0;">
          <nav class="navbar navbar-light bg-white justify-content-center " >
          
            <form action="" method="post" class="form-inline sticky-top">
              <?php  
                              /*  Only search option*/
              $query=mysqli_query($con, "SELECT * FROM `register` ORDER BY id DESC");
              echo "<input class=\"form-control mr-sm-2\" type=\"text\" name=\"valueToSearch\" placeholder=\"Value To Search\" list='dtlist' aria-label=\"Search\" >";
              echo "<datalist id='dtlist'>";
              while($row=mysqli_fetch_array($query))
              {
                  echo "<option>$row[title]</option>";  
              } 
              while($row=mysqli_fetch_array($query))
              {
              echo "<option>$row[keyword]</option>"; 
              } 
              echo"</datalist>";  
              echo "<button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\" name=\"search\" value=\"Search\" >";
              echo "<i class=\"fa fa-search\">";echo "</i>";
              echo "</button>";                          
              mysqli_close($con);
              ?>
            </form>
          </nav>
        <?php
          while($row = mysqli_fetch_array($search_result)){
          $image = 'uploads/'.$row['file_name'];
          $title = $row["title"];
          $title = ucwords($title);
          $keyword = $row["keyword"];
          $keyword = ucwords($keyword);
          $time = $row["uploaded_on"];
          $filesiz =  filesize($image);
          $filesize = round( $filesiz / 1024 , 2);
        ?>
                        <div class="media  p-4 border-bottom" >
                            <img width="100px"  src="img/doc.png"  class="mr-3" alt="...">
                            <div class="media-body">
                            
                                <h4 class="mt-0"><a href='<?php echo $image;?>'><?php echo $title;?></a></h4>
                                <h6 class="text-secondary"><?php echo "<span class=\"text-dark\">Tags:</span> "; $key=substr( $keyword, 0, 50 ); if(strlen($keyword) > 60){ echo " $key..";  }else { echo "$key";} ?></h6>
                                <div class="  align-items-center">
                                    <h6>File Size:
                                    <?php echo "<span class=\"text-info\"> $filesize </span> KB"  ;?></h6>
                                </div>
                                <div class="h6 ">
                                    Create Date:<span class="text-info">
                                    <?php echo  date('d-M-Y', strtotime($time));  ?></span>
                                </div>
                                <a class='wpdm-download-link btn btn-primary' href='<?php echo $image;?>'">Download</a>
                            </div>
                        </div> 
                        <?php }?>
                        <!-- Button trigger modal -->
                      

                   
            
      </div><!--second coloum-->
      
    </div><!--End row-->
  </div><!--End container-->
 
  
 
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>