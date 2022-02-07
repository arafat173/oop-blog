<?php require_once "header.php" ;?>

<?php 
    require_once "vendor/autoload.php";
    require_once "header.php" 
?>
<?php 
    use App\classes\Category;
    $category = Category::allActiveCategory();
    $catId = $_GET['id'];
    $catPost  = Category::catPost($catId);

?>
        <!-- Page header with logo and tagline-->
        <header class="py-2 bg-light border-bottom mb-2">
            
        </header>
        <!-- Page content-->
        <div class="col-lg-8">
                <h1 class="my-4"></h1>
                    <!-- Featured blog post-->
                    <?php while($row2 = mysqli_fetch_assoc($catPost)) { ?>
                    <div class="card mb-4">
                        <img class="card-img-top" src="uploads/<?= $row2['photo'] ?>" alt="..." />
                        <div class="card-body">
                            <h3 class="card-title"><?= $row2['title'] ?></h3>
                            <p class="card-text"><?= substr($row2['content'],0,250) ?>...</p>
                            <a class="btn btn-primary" href="post.php?id=<?= $row2['id']?>"><?= $row2['name'] ?></a>
                        </div>
                        <div class="card-footer text-muted">
                            Posted On <?= date('d M Y',strtotime($row2['createtime'])) ?> by
                            <a href=""><?= $row2['name'] ?></a>
                        </div>
                    </div>
                    <?php } ?>
                  
                </div>
                <?php require_once "widget.php" ?>

            </div>
        </div>
        


<?php require_once "footer.php" ;?>

