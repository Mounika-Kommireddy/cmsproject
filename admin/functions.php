
<?php
function confirm($result){
if(!$result){
    die("query failed".mysqli_error($connection));
}
}
function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title=$_POST['cat_title'];
        if($cat_title==''||empty($cat_title)){
            echo "This feild should not be empty";
        }else{
            $query="INSERT INTO categories(cat_title) VALUES('$cat_title')";
            $create_category_query=mysqli_query($connection,$query);
            if(!$create_category_query){
                die("query failed".mysqli_error($connection));
            }
        }
    }
}

function findAllCategories(){
    global $connection;
    $query="select * from categories";
    $select_categories_sidebar=mysqli_query($connection,$query);
    
    while($row=mysqli_fetch_assoc($select_categories_sidebar )){
        $id=$row['cat_id'];
        $title=$row['cat_title'];
        echo "<tr>";
         echo "<td>{$id}</td>";
         echo "<td>{$title}</td>";
         echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
         echo "<td><a href='categories.php?edit={$id}'>Edit</a></td>";
         echo "</tr>";
    }
}

function deleteCategories(){
    //DELETE QUERY
    global $connection;
    if(isset($_GET['delete'])){
        $the_cat_id=$_GET['delete'];
        $query="DELETE FROM categories WHERE cat_id={$the_cat_id}";
        $delete_query=mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}











?>