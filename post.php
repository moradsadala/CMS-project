<?php include 'includes/header.php';?>
    <?php include 'includes/db.php';?>
    <?php include 'includes/functions.php';?>
    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

<?php 
    if(isset($_GET['post_id'])){
        $post_id = $_GET['post_id'];
    }
    $query = "SELECT * FROM posts WHERE post_id='$post_id'";
    $select_all_posts_query = mysqli_query($db_connection,$query);
    while($row = mysqli_fetch_assoc($select_all_posts_query)){
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
?>

                
                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    <?php } ?>
            <!-- Blog Comments -->
<?php 
            $comment_post_id = $_GET['post_id'];
            if (isset($_POST['create_comment'])){
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];
                $comment_status = "approved";
                $comment_date = date('y-m-d');

                $query = "INSERT INTO comments (comment_author, comment_post_id, comment_email, comment_content, comment_status, comment_date )
                VALUES ('$comment_author', '$comment_post_id', '$comment_email', '$comment_content', '$comment_status', '$comment_date')";
                $create_comment = mysqli_query($db_connection,$query);
                if(!$create_comment){
                    echo "QUERY FAILED " . mysql_error($db_connection);
                }
            }
?>

                <!-- Comments Form -->
                <div class="well">
                    <h4 class="h4 display-5">Leave a Comment:</h4>
                    <form action="" method="post" role="form" >
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" class="form-control" id="Author" placeholder="Author" name="comment_author" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" id="Email" placeholder="Email" name="comment_email" required>
                        </div>
                        <div class="form-group">
                            <label for="Comment">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content"required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
<?php 
    $comment_post_id = $_GET['post_id'];
    $query = "SELECT * FROM comments WHERE comment_post_id='$comment_post_id'";
    $query .= "AND comment_status='approved'";
    $query .= "ORDER BY comment_id DESC";
    $all_comments_for_post = mysqli_query($db_connection,$query);
    if($all_comments_for_post){
        while($row = mysqli_fetch_assoc($all_comments_for_post)){
                    $comment_author = $row['comment_author'];
                    //$comment_email = $_POST['comment_email'];
                    $comment_content = $row['comment_content'];
                    //$comment_status = $comment['comment_status'];
                    $comment_date = $row['comment_date'];
?>
                <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author ?>
                                    <small><?php echo $comment_date ?></small>
                                </h4>
                                <?php echo $comment_content ?>
                            </div>
                    </div>
<?php

                }
            
    }else{
        die('QUERY FAILED ') . mysqli_error($db_connection);
    }
?>
    
                
                
                




                

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->

                        <!-- Nested Comment -->
                        
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->

                        <!-- End Nested Comment -->

                    <!-- </div>
                </div> -->
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php'; ?>

        </div>
        <!-- /.row -->
        

        <hr>
        <!-- Footer -->

<?php
    include 'includes/footer.php';

?>


