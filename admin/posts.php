<?php
    ob_start();    //to use header 
    include 'includes/admin_header.php' ;
    include 'includes/admin_navigation.php';
    deletePost();
?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-12">
<?php
        if(isset($_GET['source'])){
            $source = $_GET['source'];
        }else{
            $source = '';
        }
        switch($source){
            case 'add_post':
                include 'includes/add_post.php';
                break;
            case 'edit_post':
                include 'includes/edit_post.php';
                break;
            case 'view_all_posts':
                include 'includes/view_all_posts.php';
                break;
            default :
                break;

    }
    
?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php' ?>
        