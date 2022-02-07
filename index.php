<?php 
    require_once "vendor/autoload.php";
    require_once "header.php" 
?>
<?php 
    use App\classes\Category;
    $category = Category::allActiveCategory();
    $post = Category::allActivePost();
?>
        <!-- Page header with logo and tagline-->
        <header class="py-2 bg-light border-bottom mb-2">
            
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                <h1 class="my-4"></h1>
                    <!-- Featured blog post-->
                    <?php if(isset($_GET['search'])) {
                       $search = $_GET['search'];
                        $search = Category::searchPost($search); 
                        if(mysqli_num_rows($search)> 0) {
                       while($row3 = mysqli_fetch_assoc($search)) {?>
                       <div class="card mb-4">
                        <img class="card-img-top" src="uploads/<?= $row3['photo'] ?>" alt="..." />
                        <div class="card-body">
                            <h3 class="card-title"><?= $row3['title'] ?></h3>
                            <p class="card-text"><?= substr($row3['content'],0,250) ?>...</p>
                            <a class="btn btn-primary" href="post.php?id=<?= $row3['id']?>"><?= $row3['name'] ?></a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted On <?= date('d M Y',strtotime($row3['createtime'])) ?> by
                            <a href=""><?= $row3['name'] ?></a>
                        </div>
                    </div>
                       <?php
                }
                } else{
                    echo '<h1 class="my-4" text-center>Not Found!</h1>';
                }
                }else { ?>
                    <?php while($row1 = mysqli_fetch_assoc($post)) { ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="uploads/<?= $row1['photo'] ?>" alt="..." />
                        <div class="card-body">
                            <h3 class="card-title"><?= $row1['title'] ?></h3>
                            <p class="card-text"><?= substr($row1['content'],0,250) ?>...</p>
                            <a class="btn btn-primary" href="post.php?id=<?= $row1['id']?>"><?= $row1['name'] ?></a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted On <?= date('d M Y',strtotime($row1['createtime'])) ?> by
                            <a href=""><?= $row1['name'] ?></a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <!-- Side widgets-->
                <?php require_once "widget.php" ?>

            </div>
        </div>
        <?php require_once "footer.php" ?>
