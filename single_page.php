<?php
  include "shears/header.php";
?>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
            <?php
              $id = $_GET['id'];
              $result = mysqli_query($con, "select * from news where id='$id'");
              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            ?>
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">Technology</a></li>
              <li class="active">Mobile</li>
            </ol>
            <h1><?php echo $row['news_title'];?></h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Wpfreeware</a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>Test</a> </div>
            <div class="single_page_content"> <img class="img-center" src="admin_panel/uploads/<?php echo $row['photo'];?>" alt="">
              <p><?php echo $row['news_description'];?></p>
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">
                  <?php
                      $result = mysqli_query($con, "select * from news where category='$row[category]' order by id desc limit 1,4");
                      while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                  ?>
                <li>
                  <div class="media"> <a class="media-left" href="single_page.php?id=<?php echo $row['id'];?>"> <img src="admin_panel/uploads/<?php echo $row['photo'];?>" alt=""> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.php?id=<?php echo $row['id'];?>"><?php echo $row['news_title'];?></a> </div>
                  </div>
                </li>
                <?php
                  }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-slit"> <a class="prev" href="#"> <span class="icon-wrap"><i class="fa fa-angle-left"></i></span>
        <div>
          <h3>City Lights</h3>
          <img src="images/post_img1.jpg" alt=""/> </div>
        </a> <a class="next" href="#"> <span class="icon-wrap"><i class="fa fa-angle-right"></i></span>
        <div>
          <h3>Street Hills</h3>
          <img src="images/post_img1.jpg" alt=""/> </div>
        </a> </nav>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <?php
            include "shears/populor_news.php";
          ?>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
 
<?php
  include "shears/footer.php";
?>