<?php
  $post_id = $_GET['edit'];
  $query = "SELECT * FROM posts
            WHERE post_id='$post_id'";
  $select_posts = mysqli_query($db_connection,$query);
  if($select_posts){
      while($row= mysqli_fetch_assoc($select_posts)){
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
      }
  }else{
      echo "QUERY FAILED !!!!";
  }
?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input type="text" class="form-control" id="post_title" name="post_title" value=<?php echo $post_title ?> required>
    </div>
    <div class="form-group">
      <label for="post_category">Post Category</label>
      <select name="post_category_id" required>
<?php
  $query = "SELECT * FROM categories";
  $categories_id = mysqli_query($db_connection,$query);
  while($row=mysqli_fetch_assoc($categories_id)){
?>
    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_title'] ?></option>
<?php
  }

?>
      </select>
    </div>
    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" id="post_author" name="post_author"  required value=<?php echo $post_author ?>>
    </div>
    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input type="text" class="form-control" id="post_status" name="post_status"  required value=<?php echo $post_status ?> >
    </div>
    <div class="form-group">
      <label for="post_image">Post Image</label><br>
      <img width="100" src="../images/<?php echo $post_image?>">
      <input type="file" name="image">
    </div>
    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" id="post_tags" name="post_tags" value=<?php echo $post_tags ?>>
    </div>
    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea class="form-control" id="post_content" rows="4" cols="50" name="post_content" required><?php echo $post_content ?></textarea>
    </div>
    
    <button type="submit" class="btn btn-default btn-primary" name="post_edit">Submit</button>
  </form>
<?php
  if(isset($_POST['post_edit'])){
    $post_id = $_GET['edit'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];  
    $post_image_name = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('y-m-d');
    $post_comment_count = 4;
    move_uploaded_file($post_image_temp,"../images/$post_image_name");
    $query = "UPDATE posts
              SET post_title='$post_title',post_category_id='$post_category_id', post_author='$post_author',post_status='$post_status' ,post_image='$post_image_name',post_content='$post_content',post_tags='$post_tags',post_comment_count='$post_comment_count',post_status='$post_status'
              WHERE post_id='$post_id' ";
    $update_post_query = mysqli_query($db_connection,$query);      //To check the query correctness
    if(!$update_post_query){
        die("Query FAiled" . mysqli_error($db_connection));    
    }else{
      echo "hi";
      header("Location: posts.php?source=view_all_posts");
    }
  }


?>

