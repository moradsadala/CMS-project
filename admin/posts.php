<?php include 'includes/admin_header.php' ?>

    
        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                        </h1>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
<?php
    $query = "SELECT * FROM posts";
    $all_posts_info = mysqli_query($db_connection,$query);
    if($all_posts_info){
       while($row = mysqli_fetch_assoc($all_posts_info)){
           $post_id = $row['post_id'];
           $post_author = $row['post_author'];
           $post_title = $row['post_title'];
           $post_category_id = $row['post_category_id'];
           $post_status = $row['post_status'];
           $post_image = $row['post_image'];
           $post_tags = $row['post_tags'];
           $post_comment_count = $row['post_comment_count'];
           $post_date = $row['post_date'];
?>
                                <tr>
                                    <td><?php echo $post_id?></td>
                                    <td><?php echo $post_author?></td>
                                    <td><?php echo $post_title?></td>
                                    <td><?php echo $post_category_id?></td>
                                    <td><?php echo $post_status?></td>
                                    <td><img class = "img-responsive" src=<?php echo '../images/' .$post_image . ''?> height ='200' width ='200'></td>
                                    <td><?php echo $post_tags?></td>
                                    <td><?php echo $post_comment_count?></td>
                                    <td><?php echo $post_date?></td>
                                </tr>
<?php
       }
    }
?>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php' ?>