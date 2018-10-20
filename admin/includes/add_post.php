<?php
  if(isset($_POST['post_submit'])){
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
    $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status)
              VALUES('$post_category_id','$post_title','$post_author','$post_date','$post_image_name','$post_content','$post_tags','$post_comment_count','$post_status')";
    $create_post_query = mysqli_query($db_connection,$query); //To check the query correctness
    if(!$create_post_query){
        die("Query FAiled" . mysqli_error($db_connection));
        
    }
    
  }
?>
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input type="text" class="form-control" id="post_title" name="post_title" required>
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
    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" id="post_author" name="post_author" required>
    </div>
    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input type="text" class="form-control" id="post_status" name="post_status" required>
    </div>
    <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="file" name="image">
    </div>
    <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" class="form-control" id="post_tags" name="post_tags">
    </div>
    <div class="form-group">
      <label for="post_content">Post Content</label>
      <textarea class="form-control" id="post_content" rows="4" cols="50" name="post_content" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-default btn-primary" name="post_submit">Submit</button>
  </form>


