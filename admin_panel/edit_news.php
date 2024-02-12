<?php
include "../db_connect/db_connect.php";
include "./admin_shears/css_link.php";
include "./admin_shears/nav.php";
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
                    <form action="update_news.php" method="post"  enctype="multipart/form-data">

                      <?php
                        $id = $_GET['id'];
                        $result = mysqli_query($con, "select * from news where id='$id'");
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                      ?>
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label>News Title</label>
                                    <input type="text" name="news_title" class="form-control" id="news_title" placeholder="Enter Title"  value="<?php echo $row['news_title']; ?>">
                                  </div>
                                  <!-- /.form-group -->
                                  <div class="form-group">
                                    <label>Popular</label>
                                    <select class="form-control " name="popular_news" style="width: 100%;" value="<?php echo $row['popular_news']; ?>">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                  </div>
                                  <!-- /.form-group -->
                                  <div class="form-group">
                                      <label>Photo</label>
                                      <input type="file" name="fileToUpload" class="form-control" id="fileToUpload">
                                  </div>
                                  <img width="40px" src="uploads/<?php echo $row['photo'];?>" alt="">
                              </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control " id="category" required="" value="<?php echo $row['category']; ?>">
                                    <?php
                                        $result = mysqli_query($con, "select * from category_names order by id asc");
                                        while($row2=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                    ?>
                                    <option value="<?php echo $row2['category_name'];?>"><?php echo $row2['category_name'];?></option>
                                    <?php  } ?>
                                </select>
                              </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Banner</label>
                                    <select class="form-control " name="news_banner" style="width: 100%;" value="<?php echo $row['news_banner']; ?>">
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
                                    <textarea class="form-control" name="news_description" id="news_description" rows="5" ><?php echo $row['news_description']; ?></textarea>
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