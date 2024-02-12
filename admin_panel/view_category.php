<?php
include "../db_connect/db_connect.php";
include "./admin_shears/css_link.php";
include "./admin_shears/nav.php";
?>
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table" id="myTable">
                <thead>
                <tr>
                  <th>SI</th>
                  <th>Category Name</th>
                  <th>Active</th>
                  <th>action</th>
                </tr>
                </thead>
                <?php
                $i = 1;
                $result = mysqli_query($con, "select * from category_names order by id desc");
                while ($row= mysqli_fetch_array($result, MYSQLI_ASSOC)){
                ?>
                <tbody>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $row['category_name'];?></td>
                  <td><?php echo $row['is_active']?></td>
                  <td>
                    <a href="edit_category.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square pr-2"></i>|</a>
                    <a href="delete_category.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-trash-can pl-2 text-danger"></i></a>
                  </td>
                </tr>
                </tbody>
                <?php
                }
                ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php
include "./admin_shears/footer.php";
?>