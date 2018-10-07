<?php

function insertCategories(){            //Add new categories in database 
    global $db_connection;
    if(isset($_POST['add'])){                   
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
}
function getCategories(){      //Show all categories in table
    global $db_connection;
    
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
                <td><a href='categories.php?delete=<?php echo $cat_id ?>'>Delete</a></td>
                <td><a href='categories.php?update=<?php echo $cat_id ?>'>Edit</a></td>
            </tr>
<?php
        }
    }else{
        echo "QUERY FAILED !!!!";
    }
}
function deleteCategories(){             //Delete category
    global $db_connection;

    if(isset($_GET['delete'])){
        $cat_id = $_GET['delete'] ;
        $query = "DELETE FROM categories WHERE cat_id = $cat_id";
        $delete_query =mysqli_query($db_connection,$query);
        if(!$delete_query){
            die('QUERY FAILED' . mysqli_error($db_connection));
        }
        header("Location: categories.php"); //To redirect your page into this site
    }

}

function sendUpdatedInfo(){                 //Send the selected recored to the database to update it
    global $db_connection;

    if(isset($_GET['update'])){
        $cat_id = $_GET['update'];
        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
        $selected_category = mysqli_query($db_connection,$query);
        while($row = mysqli_fetch_assoc($selected_category)){
            $updated_cat_id = $row['cat_id'];
            $updated_cat_title = $row['cat_title'] ;
        }
?>
    <form action="" method="post">
        <div class="form-group">
            <label for="cat_title">Edit Category</label>
            <input type="text" class="form-control"name="cat_title" value=<?php if(isset($updated_cat_title)){echo $updated_cat_title;}?>>   
        </div>
        <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update" value="Update">
        </div>
    </form>
    
<?php
    }
    if(isset($_POST['update'])){
        $new_cat_title = $_POST['cat_title'];
        updateCategories($updated_cat_id,$new_cat_title);
    }
    
}

function updateCategories($cat_id,$cat_title){
    global $db_connection;
    $query = "UPDATE categories SET cat_title='$cat_title' WHERE cat_id=$cat_id";
    $new_record = mysqli_query($db_connection,$query);         //To check the query correctness
    if(!$new_record){
        die("QUERY FAILED " . mysqli_error($db_connection));
    }
}
















// function updateCategories(){           //Update existe category  
//     global $db_connection;
//     if(isset($_POST['update'])){  
                  
//         $new_cat_title = $_POST['cat_title'];
//         if($new_cat_title == "" || empty($new_cat_title)){
//             echo "This feild should not be empty";
//         }else{
//             $query = "UPDATE categories SET cat_title='$new_cat_title' WHERE cat_id=$updated_cat_id";
//             $create_category_query = mysqli_query($db_connection,$query); //To check the query correctness
//             if(!$create_category_query){
//                 die("QUERY FAILED " . mysqli_error($db_connection));
//             }
//         }
//     }
//  }

