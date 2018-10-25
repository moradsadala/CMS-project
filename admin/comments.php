<?php
    ob_start();    //to use header 
    include 'includes/admin_header.php' ;
    include 'includes/admin_navigation.php';
    deleteComment();
    getCommentStatus();
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
            case 'add_comment':
                include 'includes/add_comment.php';
                break;
            case 'edit_comment':
                include 'includes/edit_comment.php';
                break;
            case 'view_all_comments':
                include 'includes/view_all_comments.php';
                break;
            default :
                include 'includes/view_all_comments.php'; 
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
        