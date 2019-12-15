<?php
include("includes/header.php");

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql_query = "SELECT * FROM photos LIMIT {$items_per_page} OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql_query);
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

        <div class="row">
            <div class="col-md-12">
                <nav class="text-center">
                    <ul class="pagination">
                        <?php
                            if ($paginate->page_total() > 1) {
                                if ($paginate->has_previous()) {
                                    echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                                }

                                for ($i = 1; $i <= $paginate->page_total(); $i++) {
                                    if ($i == $paginate->current_page) {
                                        echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                    } else {
                                        echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                    }
                                }

                                if ($paginate->has_next()) {
                                    echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                                }
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>

        <?php include("includes/footer.php"); ?>
