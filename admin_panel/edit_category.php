<?php
include "../db_connect/db_connect.php";
include "./admin_shears/css_link.php";
include "./admin_shears/nav.php";
if(!empty($_POST)){
    $id = $_POST['id'];
    $category_name = $_POST['category_name'];
    $is_active = $_POST['is_active'];
    $update = mysqli_query($con, "update category_names set category_name ='$category_name', is_active ='$is_active' where id='$id'");
    if ($update){
        echo "<script>alert('data has been updated successfully.'); location.replace('view_category.php');</script>";
    } else {
        echo "<script>alert('Data not updated.');</script>";
    }
}



?>
<form action="" method="post">
    <?php
    $id = $_GET['id'];
    $result = mysqli_query($con, "select * from category_names where id='$id'");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Category" value="<?php echo $row['category_name']; ?>">
                      </div>
                      <div class="form-group">
                            <label>Active</label>
                            <select class="form-control" name="is_active" style="width: 100%;" value="<?php echo $row['is_active']; ?>">
                              <option>Yes</option>
                              <option>No</option>
                            </select>
                        </div>
                      <div>
                          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
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