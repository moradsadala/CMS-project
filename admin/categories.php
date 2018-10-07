<?php   
    ob_start();    //to use header 
    include 'includes/admin_header.php' ;
    include 'includes/admin_navigation.php';
    insertCategories();
    deleteCategories();
                    
    
    
    
    
    

    
        
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
                            <input class="btn btn-primary" type="submit" name="add" value="Add">
                            </div>
                        </form>
                        <?php sendUpdatedInfo();  ?>

                    </div>
                    <div class="col-xs-8">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Title</th>
                                    <th>Category Delete</th>
                                    <th>Category Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php getCategories(); ?>
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

                    