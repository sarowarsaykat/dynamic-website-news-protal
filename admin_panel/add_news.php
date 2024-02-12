<?php
include "../db_connect/db_connect.php";
include "./admin_shears/css_link.php";
include "./admin_shears/nav.php";
?>
<?php
if(!empty($_POST)){
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" && $imageFileType != "pdf" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $file_name= basename( $_FILES["fileToUpload"]["name"]);
      //insert into data bese
      date_default_timezone_set('Asia/Dhaka');
      $date = date('Y-m-d H:i:s');
      $news_title = $_POST['news_title'];
      $popular_news=$_POST['popular_news'];
      $category =$_POST['category'];
      $news_banner = $_POST['news_banner'];
      $news_description =$_POST['news_description'];
      $query = mysqli_query($con,"insert into `news`(`news_title`,`popular_news`,`photo`,`category`,`news_banner`,`news_description`,`insert_datetime`)values ('$news_title','$popular_news','$file_name','$category','$news_banner','$news_description','$date')");
      if($query){
        echo "<script>alert('Data inserted successfully.'); location.replace('view_news.php');</script>";
      }
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add News</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add News</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-body">
                    <form action="" method="post"  enctype="multipart/form-data">
                        <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label>News Title</label>
                                    <input type="text" name="news_title" class="form-control" id="news_title" placeholder="Enter Title">
                                  </div>
                                  <!-- /.form-group -->
                                  <div class="form-group">
                                    <label>Popular</label>
                                    <select class="form-control " name="popular_news" style="width: 100%;">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                  </div>
                                  <!-- /.form-group -->
                                  <div class="form-group">
                                      <label>Photo</label>
                                      <input type="file" name="fileToUpload" class="form-control" id="fileToUpload">
                                  </div>
                              </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control " id="category" required="">
                                    <?php
                                        $result = mysqli_query($con, "select * from category_names order by id asc");
                                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    ?>
                                    <option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
                                    <?php  } ?>
                                </select>
                              </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Banner</label>
                                    <select class="form-control " name="news_banner" style="width: 100%;">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>News Description</label>
                                    <textarea class="form-control" name="news_description" id="news_description" rows="5"></textarea>
                                </div>
                                <input type="submit" class="btn btn-success" name="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php
include "./admin_shears/footer.php";
?>