<?php   
    ob_start();    //to use header 
    include 'includes/admin_header.php' ;
    include 'includes/admin_navigation.php';
    include '../includes/db.php';
    if(isset($_GET['delete'])){
        $cat_id = $_GET['delete'] ;
        $query = "DELETE FROM categories WHERE cat_id = $cat_id";
        $delete_query =mysqli_query($db_connection,$query);
        if(!$delete_query){
            die('QUERY FAILED' . mysqli_error($db_connection));
        }
        header("Location: categories.php"); //to redirect your page into this site
    }

    
        
?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                    </div>
                    <div class="col-xs-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control"name="cat_title">
                            </div>
                            <div class="form-group">
                            <input class="btn btn-primary"type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                    </div>
                    <?php
                        if(isset($_POST['submit'])){
                            $new_cat_title = $_POST['cat_title'];
                            if($new_cat_title == "" || empty($new_cat_title)){
                                echo "This feild should not be empty";
                            }else{
                                $query = "INSERT INTO categories(cat_title) VALUE('$new_cat_title')";
                                $create_category_query = mysqli_query($db_connection,$query); //To check the query correctness
                                if(!$create_category_query){
                                    die("Query FAiled" . mysqli_error($db_connection));
                                }
                            }
                            
                        }
                    ?>
                    <div class="col-xs-8">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Title</th>
                                    <th>Category Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                    <?php
                        $query = 'SELECT * FROM categories';
                        $select_all_categories = mysqli_query($db_connection,$query);
                        if($select_all_categories){
                            while($row = mysqli_fetch_assoc($select_all_categories)){
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                               
                    ?>
                                <tr>
                                    <td><?php echo $cat_id ?></td>
                                    <td><?php echo $cat_title ?></td>
                                    <td><a href='categories.php?delete=<?php echo $cat_id ?>'>delete</a></td>
                                </tr>
                    <?php
                            }
                        }else{
                            echo "QUERY FAILED !!!!";
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

                    