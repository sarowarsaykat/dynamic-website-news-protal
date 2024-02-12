<?php
include "../db_connect/db_connect.php";
include "./admin_shears/css_link.php";
include "./admin_shears/nav.php";
?>
<form action="" method="post">
<?php
if(!empty($_POST)){
  $category_name = $_POST['category_name'];
  $is_active =$_POST['is_active'];
  $query = mysqli_query($con, "insert into `category_names`(`category_name`,`is_active`) values ('$category_name','$is_active')");
  if($query){
    echo "<script>alert('Data Inserted Successfull'); location.replace('view_category.php');</script>"; 
  }
}
?>



     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Category Name</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Category name</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                  <!-- form start -->
                  <form role="form">
                      <div class="card-body">
                      <div class="form-group">
                          <label for="Category Name">Category Name</label>
                          <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category">
                      </div>
                      <div class="form-group">
                            <label>Active</label>
                            <select class="form-control" name="is_active" style="width: 100%;">
                              <option>Yes</option>
                              <option>No</option>
                            </select>
                        </div>
                      <div>
                          <input type="submit" class="btn btn-primary" value="Submit">
                      </div>
                  </form>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
</form>
<?php
include "./admin_shears/footer.php";
?>