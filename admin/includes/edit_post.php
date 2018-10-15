<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="post_title">Post Title</label>
      <input type="text" class="form-control" id="post_title" name="post_title">
    </div>
    <div class="form-group">
      <label for="post_category_id">Post Category Id</label>
      <input type="text" class="form-control" id="post_category_id" name="post_category_id">
    </div>
    <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" class="form-control" id="post_author" name="post_author">
    </div>
    <div class="form-group">
      <label for="post_status">Post Status</label>
      <input type="text" class="form-control" id="post_status" name="post_status">
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
      <textarea class="form-control" id="post_content" rows="4" cols="50" name="post_content"></textarea>
    </div>
    
    <button type="submit" class="btn btn-default btn-primary" name="post_submit">Submit</button>
  </form>

