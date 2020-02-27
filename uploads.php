

<?php
include("db.php");
$statusMsg = '';
// File upload path

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
  
$title = $_POST['title'];
$keyword = $_POST['keyword'];
$targetDir = "uploads/";
@$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','jpeg','doc','docx','pdf');
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
// Display status message

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Register </title>
  </head>
  <?php  include("nav.php"); ?>
  <body class="bg-light" >
    
    <div class="container ">
      <br> 
      <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card ">
              <header class="card-header bg-dark text-white text-center border border-warning rounded-top">
                <h4 class="card-title mt-2">Register Here</h4>
              </header>
              <article class="card-body border border-warning">
                  <form action="" method="post" enctype="multipart/form-data">
                    <label>Upload the doc </label>  <br>
                    <input type="file" name="file" capture="camera">
                    <br>    
                    <div class="form-group">
                      <label>Title </label>   
                      <input type="text" class="form-control" name="title" placeholder="" >
                    </div> <!-- form-group end.// -->
                    
                    <div class=" form-group">
                      <label>keyword </label>   
                      <input type="text" class="form-control" name="keyword" placeholder="" >
                    </div> <!-- form-group end.// -->
                    <div class=" form-group">
                      <label><?php  echo $statusMsg;?></label>   
                      
                    </div> <!-- form-group end.// -->

                   
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block"> Register  </button>
                    </div> <!-- form-group// -->      
                  </form>
              </article> <!-- card-body end .// -->
    
            </div> <!-- card.// -->
        </div> <!-- col.//-->
  
      </div> <!-- row.//-->
    </div> 
  <!--container end.//-->




  <!--container end.//-->
  
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>





</html>
