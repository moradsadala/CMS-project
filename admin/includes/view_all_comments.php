<h1 class="page-header">
    Welcome to Admin
</h1>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Respose to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
                                
<?php
    $query = "SELECT * FROM comments";
    $all_comments_info = mysqli_query($db_connection,$query);
    if($all_comments_info){
       while($row = mysqli_fetch_assoc($all_comments_info)){
           $comment_id = $row['comment_id'];
           $comment_post_id =$row['comment_post_id'];
           $comment_author = $row['comment_author'];
           $comment_email = $row['comment_email'];
           $comment_content = $row['comment_content'];
           $comment_status = $row['comment_status'];
           $comment_date = $row['comment_date'];
?>
        <tr>
            <td><?php echo $comment_id?></td>
            <td><?php echo $comment_author?></td>
            <td><?php echo $comment_content?></td>
            <td><?php echo $comment_email?></td>
<?php 
    // $query = "SELECT * FROM categories WHERE cat_id='$post_category_id'";
    // $select_all_categories = mysqli_query($db_connection,$query);
    // if($select_all_categories){
    //     while($row = mysqli_fetch_assoc($select_all_categories)){
    //         $cat_title = $row['cat_title'];
    //     }
    // }else{
    //     echo "QUERY FAILED !!!!";
    // }
    
?>
            <td><?php echo $comment_status?></td>
            <td><?php echo "inrespone to"?></td>
            <td><?php echo $comment_date?></td>
            <td><a href="?approve=yes&approve_id=<?php $comment_id ?>">Approve</a></td>
            <td><a href="?approve=no&approve_id=<?php $comment_id ?>">Unapprove</a></td>
            <td><a href="?delete=<?php echo $comment_id ?>">Delete</a></td>
            
        </tr>
<?php
       }
    }
?>
                                
    </tbody>
</table>