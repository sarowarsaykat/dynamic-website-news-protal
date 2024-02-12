<?php
    include "shears/header.php";
?>

<section id="sliderSection">
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
            <?php
                $category = $_GET['category'];
                $result = mysqli_query($con, "select * from news where category='$category' order by id desc limit 0,4");
               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <div class="single_iteam"> <a href="single_page.php?id=<?php echo $row['id'];?>"> <img src="admin_panel/uploads/<?php echo $row['photo'];?>" style="height:430px;width:100%;"></a>
                <div class="slider_article">
                    <h2><a class="slider_tittle" href="single_page.php?id=<?php echo $row['id'];?>"><?php echo substr($row['news_title'],0,80);?></a></h2>
                    <p><?php echo substr($row['news_description'],0,90);?></p>
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
                                    $category = $_GET['category'];
                                    $result = mysqli_query($con, "select * from news where category='$category' order by id desc limit 1,4");
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                ?>
                                <div class="fashion" style="padding-right:10px;width:50%;">
                                    <div class="single_post_content">
                                        <ul class="business_catgnav wow fadeInDown">
                                            <li>
                                                <figure class="bsbig_fig"> <a href="single_page.php?id=<?php echo $row['id'];?>" class="featured_img"> <img alt="" src="admin_panel/uploads/<?php echo $row['photo'];?>"> <span class="overlay"></span> </a>
                                                    <figcaption> <a href="single_page.php?id=<?php echo $row['id'];?>"><?php echo substr($row['news_title'],0,80);?></a> </figcaption>
                                                    <p><p><?php echo substr($row['news_description'],0,80);?></p>
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>  
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
</aside>                    </div>
                </div>
            </section>
            <footer id="footer">
                <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Flickr Images</h2>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Tag</h2>
            <ul class="tag_nav">
              <li><a href="#">Games</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Fashion</a></li>
              <li><a href="#">Business</a></li>
              <li><a href="#">Life &amp; Style</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Photo</a></li>
              <li><a href="#">Slider</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Contact</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <address>
            Perfect News,1238 S . 123 St.Suite 25 Town City 3333,USA Phone: 123-326-789 Fax: 123-546-567
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2045 <a href="index.html">NewsFeed</a></p>
      <p class="developer">Developed By Wpfreeware</p>
    </div>            </footer>
        </div>
        <script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>    </body>
</html>