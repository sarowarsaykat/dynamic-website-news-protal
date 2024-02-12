<?php
  include "shears/header.php";
?>
    <section id="sliderSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="slick_slider">
            <?php
                $result_news_banner  = mysqli_query($con, "select * from news where news_banner='yes' order by id desc limit 0,4");
                while($news_banner=mysqli_fetch_array($result_news_banner, MYSQLI_ASSOC)){
            ?>
            <div class="single_iteam"> <a href="single_page.php?id=<?php echo $news_banner['id'];?>"> <img src="admin_panel/uploads/<?php echo $news_banner['photo'];?>"
                  style="height:430px;width:100%;"></a>
              <div class="slider_article">
                <h2><a class="slider_tittle" href="single_page.php?id=<?php echo $news_banner['id'];?>"><?php echo $news_banner['news_title'];?></a></h2>
                <p><?php echo substr($news_banner['news_description'],0,90);?>...</p>
              </div>
            </div>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="latest_post">
            <h2><span>LATEST POST</span></h2>
            <div class="latest_post_container">
              <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
              <ul class="latest_postnav">
                <?php
                     $result_latest_post  = mysqli_query($con, "select * from news order by id desc limit 1,4");
                     while($latest_post=mysqli_fetch_array($result_latest_post, MYSQLI_ASSOC)){
                ?>
                <li>
                  <div class="media"> <a href="single_page.php?id=<?php echo $latest_post['id'];?>" class="media-left"> <img alt=""
                        src="admin_panel/uploads/<?php echo $latest_post['photo'];?>"> </a>
                    <div class="media-body"> <a href="single_page.php?id=<?php echo $latest_post['id'];?>" class="catg_title"><?php echo $latest_post['news_title'];?></a> </div>
                  </div>
                </li>
                <?php
                   }
                ?>
              </ul>
              <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="contentSection">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
          <div class="left_content">
            <div class="fashion_technology_area">
              <?php
                 $result = mysqli_query($con, "select * from category_names order by id asc");
                 while($main_category=mysqli_fetch_array($result, MYSQLI_ASSOC)){
              ?>
              <div class="fashion" style="width:50%;padding-right:15px;">
                <div class="single_post_content">
                  <h2><span><?php echo $main_category['category_name'];?></span></h2>
                  <?php
                      $result_sub_category  = mysqli_query($con, "select * from news where category='$main_category[category_name]' order by id desc limit 0,1");
                      while($sub_category=mysqli_fetch_array($result_sub_category, MYSQLI_ASSOC)){
                  ?>
                  <ul class="business_catgnav wow fadeInDown">
                    <li>
                      <figure class="bsbig_fig"> <a href="single_page.php?id=<?php echo $sub_category['id'];?>" class="featured_img"> <img alt=""
                            src="admin_panel/uploads/<?php echo $sub_category['photo'];?>" style="height:240px;"> <span class="overlay"></span>
                        </a>
                        <figcaption> <a href="single_page.php?id=<?php echo $sub_category['id'];?>"><?php echo $sub_category['news_title'];?></a> </figcaption>
                        <p>
                        <p><?php echo substr($sub_category['news_description'],0,250);?></p>
                      </figure>
                    </li>
                  </ul>
                  <?php
                      }
                  ?>
                  <ul class="spost_nav">
                  <?php
                      $result_sub_category  = mysqli_query($con, "select * from news where category='$main_category[category_name]' order by id desc limit 1,4");
                      while($sub_category=mysqli_fetch_array($result_sub_category, MYSQLI_ASSOC)){
                  ?>
                    <li>
                      <div class="media wow fadeInDown"> <a href="single_page.php?id=<?php echo $sub_category['id'];?>" class="media-left"> <img alt=""
                            src="admin_panel/uploads/<?php echo $sub_category['photo'];?>"> </a>
                        <div class="media-body"> <a href="single_page.php?id=<?php echo $sub_category['id'];?>" class="catg_title"> <?php echo $sub_category['news_title'];?><br />
                            <p><?php echo substr($sub_category['news_description'],0,80);?></p>
                          </a> </div>
                      </div>
                    </li>
                    <?php
                      }
                    ?>
                  </ul>
                </div>
              </div>
              <?php
                 }
                ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <aside class="right_content">
            <?php
                include "shears/populor_news.php";
            ?>
            <div class="single_sidebar wow fadeInDown">
              <h2><span>LINKS</span></h2>
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