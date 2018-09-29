<div class="col-md-4">


<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="./search.php" method="post">
        <div class="input-group">
            <input  name= "search" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
                <button  name= "submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form> 
    <!-- /.input-group -->
</div>
<?php 
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($db_connection,$query);
    if($select_all_categories){
?>
<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php
                    while($row = mysqli_fetch_assoc($select_all_categories)){
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='#'>$cat_title</a></li>";
                    }
                ?> 
                
            </ul>
        </div>
        <?php
            }else{
                echo "QUERY FAILED !!!!";
            }

        ?>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include 'includes/widget.php' ?>

</div>