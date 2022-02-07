<?php require_once "header.php" ;?>

<?php 
    require_once "vendor/autoload.php";
    require_once "header.php" 
?>
<?php 
    use App\classes\Category;
    $category = Category::allActiveCategory();
    $getId = $_GET['id']; 
    $singlePost = Category::singlePost($getId);
    $post = mysqli_fetch_assoc($singlePost);

    
?>
        <!-- Page header with logo and tagline-->
        <header class="py-2 bg-light border-bottom mb-2">
            
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <img class="card-img-top" src="uploads/<?= $post['photo'] ?>" alt="..." />
                        <div class="card-body">
                            <h3 class="card-title"><?= $post['title'] ?></h3>
                            <p class="card-text"><?= $post['content'] ?>></p>
                        </div>
                        <div class="card-footer text-muted">
                            Posted On <?= date('d M Y',strtotime($post['createtime'])) ?> by
                            <a href=""><?= $post['name'] ?></a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    
                </div>
                <!-- Side widgets-->
                <?php require_once "widget.php" ?>

            </div>
        </div>
        


<?php require_once "footer.php" ;?>

