<?php
  include "../db_connect/db_connect.php";
  if(isset($_SESSION['name'])){
  }
  else{
  
    echo "<script>location.replace('login.php'); alert('You are not authorized user')</script>";
  }
?>
<?php
include "./admin_shears/css_link.php";
include "./admin_shears/nav.php";
$date = date('Y-m-d');
$query_news = mysqli_query($con,"select * from news");
$news_rows = mysqli_num_rows($query_news);
$query_today_news = mysqli_query($con,"select * from news where date('insert_datetime')='$date'");
$today_news_rows = mysqli_num_rows($query_today_news);
$query_category = mysqli_query($con,"select * from category_names");
$category_rows = mysqli_num_rows($query_category);
$query_user = mysqli_query($con,"select * from users");
$user_rows = mysqli_num_rows($query_user);
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php echo " Total" . "<h3>$news_rows</h3>" . " News.";?>!
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php echo " Todays" . "<h3>$today_news_rows</h3>" . " News.";?>!
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php echo "Total " . "<h3>$category_rows</h3>" . " Categorys.";?>!
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                  <?php echo "Total " . "<h3>$user_rows</h3>" . " Users.";?>!
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div>
  </div>
<?php
  include "./admin_shears/footer.php";
?>