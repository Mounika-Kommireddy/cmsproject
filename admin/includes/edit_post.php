<?php

    if(isset($_GET['p_id'])){
        $the_post_id=$_GET['p_id'];
    }
    $query="SELECT * FROM posts WHERE post_id=$the_post_id";
    $select_posts_by_id=mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_posts_by_id )){
    $post_id=$row['post_id'];
    $post_author=$row['post_author'];
    $post_title=$row['post_title'];
    $post_content=$row['post_content'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_comment_count'];
    $post_date=$row['post_date'];

    } 
    if(isset($_POST['update_post'])){
        $post_title=$_POST['post_title'];
        $post_author=$_POST['post_author'];
        $post_category_id=$_POST['post_category'];
        $post_status=$_POST['post_status'];

        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];

        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        move_uploaded_file($post_image_temp,"../images/$post_image");
        if(empty($post_image)){
            $query="SELECT * FROM posts WHERE post_id=$the_post_id";
            $select_image=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_image)){
                $post_image=$row['post_image'];
            }
        }

        $query="UPDATE posts SET ";
        $query.="post_title='{$post_title}',";
        $query.="post_category_id='{$post_category_id}',";
        $query.="post_date=now(),";
        $query.="post_author='{$post_author}', ";
        $query.="post_status='{$post_status}', ";
        $query.="post_tags='{$post_tags}', ";
        $query.="post_content='{$post_content}', ";
        $query.="post_image='{$post_image}' ";
        $query.="WHERE post_id={$the_post_id}";

        $update_post=mysqli_query($connection,$query);
        //confirm($update_post);

        
    }




?>









<form action="" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="title">post title</label>
        <input value="<?php echo  $post_title;?>"type="text" class="form-control" name="post_title">
    </div>
<br>
    <div class="form_group">
        <select name="post_category" id="">
        <?php
         $query="select * from categories ";
         $select_categories=mysqli_query($connection,$query);
         confirm($select_categories);
         while($row=mysqli_fetch_assoc($select_categories )){
             $cat_id=$row['cat_id'];
             $cat_title=$row['cat_title'];
              echo "<option value='$cat_id'>{$cat_title}</option>";
         }
        
        
        ?>


        </select>
    </div>

    <div class="form_group">
        <label for="post_author">post Author</label>
        <input value="<?php echo  $post_author;?>" type="text" class="form-control" name="post_author">
    </div>

    <div class="form_group">
        <label for="post_status">post status</label>
        <input value="<?php echo  $post_status;?>" tpye="text" class="form-control" name="post_status">
    </div>
        <br>
    <div class="form_group">
    <input type="file"  name="image">
        <img width="80" src="../images/<?php echo $post_image ?>" alt="">

    </div>

    <div class="form_group">
        <label for="post_tags">post tags</label>
        <input value="<?php echo  $post_tags;?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form_group">
        <label for="post_content">post content</label>
        <textarea  class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo  $post_content;?></textarea>
    </div>

<br>

    <div class="form_group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>