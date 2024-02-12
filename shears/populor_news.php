
    <div class="single_sidebar">
        <h2><span>MOST POPULAR</span></h2>
        <ul class="spost_nav">
        <?php
                $result_most_populor  = mysqli_query($con, "select * from news where popular_news='yes' order by id desc limit 1,4");
                while($most_populor = mysqli_fetch_array($result_most_populor, MYSQLI_ASSOC)){
        ?>
        <li>
            <div class="media wow fadeInDown"> <a href="single_page.php?id=<?php echo $most_populor['id'];?>" class="media-left"> <img alt=""
                src="admin_panel/uploads/<?php echo $most_populor['photo'];?>"> </a>
            <div class="media-body"> <a href="single_page.php?id=<?php echo $most_populor['id'];?>" class="catg_title"><?php echo $most_populor['news_title'];?></a> </div>
            </div>
        </li>
        <?php
        }
        ?>
        </ul>
    </div>
    <div class="single_sidebar">
        <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab"
            data-toggle="tab">CATEGORY</a></li>
        </ul>
        <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="category">
            <ul>
            <?php
                $result = mysqli_query($con, "select * from category_names order by id asc");
                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
            ?>
            <li class="cat-item"><a href="category_detail.php?id=4"><?php echo $row['category_name']?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
        </div>
    </div>