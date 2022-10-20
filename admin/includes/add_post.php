<?php

if(isset($_POST['create_post'])){
        $post_title=$_POST['post_title'];
        $post_author=$_POST['post_author'];
        $post_category_id=$_POST['post_category'];
        $post_status=$_POST['post_status'];

        $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];

        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];
        $post_date=date('d-m-y');
        $post_comment_count=4;

        move_uploaded_file($post_image_temp,"../images/$post_image");

        $query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,
        post_tags,post_comment_count,post_status)";
        $query.=
        "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}',
        '{$post_tags}','{$post_comment_count}','{$post_status}')";

        $create_post_query=mysqli_query($connection,$query);

        confirm($create_post_query);
        
}







?>







<form action="" method="post" enctype="multipart/form-data">
    <div class="form_group">
        <label for="title">post title</label>
        <input type="text" class="form-control" name="post_title">
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
        <input type="text" class="form-control" name="post_author">
    </div>

    <div class="form_group">
        <label for="post_status">post status</label>
        <input tpye="text" class="form-control" name="post_status">
    </div>

    <div class="form_group">
        <label for="post_image">post Image</label>
        <input type="file"  name="image">
    </div>

    <div class="form_group">
        <label for="post_tags">post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form_group">
        <label for="post_content">post content</label>
        <textarea  class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

<br>

    <div class="form_group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>