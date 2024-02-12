<?php
include "../db_connect/db_connect.php";
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
&& $imageFileType != "gif" ) {
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
    $id = $_POST['id'];
    $news_title = $_POST['news_title'];
    $category = $_POST['category'];
    $popular_news=$_POST['popular_news'];
    $news_banner = $_POST['news_banner'];
    $news_description =$_POST['news_description'];

    $update = mysqli_query($con, "update news set news_title='$news_title', category ='$category',popular_news ='$popular_news',news_banner ='$news_banner',news_description ='$news_description', photo='$file_name' where id='$id'");
    if ($update){
        echo "<script>alert('data has been updated successfully.'); location.replace('view_news.php');</script>";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>