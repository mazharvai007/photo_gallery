<?php
include("includes/header.php");

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$photos = Photo::find_all();
?>


        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php foreach ($photos as $photo) : ?>
                        <div class="col-md-3 col-xs-6">
                            <div class="item">
                                <a href="photo.php?id=<?php echo $photo->id; ?>">
                                    <img src="admin/<?php echo $photo->image_path(); ?>" alt="" class="thumbnail img-responsive" style="width:100%;height:150px;">
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<!--                 --><?php //include("includes/sidebar.php"); ?>
<!--            </div>-->

        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
