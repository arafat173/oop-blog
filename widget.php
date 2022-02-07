 <!-- Side widgets-->
 <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                        <form action="index.php?search=" method="GET">
                            <div class="input-group">
                                <input class="form-control" type="text" name="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                            </div>
                        
                        </form>
                        </div>
                        
                    </div>
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                            <?php while($row = mysqli_fetch_assoc($category)) { ?>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="category.php?=<?= $row['id'] ?>"><?= $row['category_name'] ?></a></li>
                                     
                                    </ul>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>