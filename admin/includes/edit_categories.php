                        <form action="" method="POST">
                        <div class="form-group">
                            <label for="cat_title">Edit category</label>
                            <?php

                            if(isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];
                            
                            $query="select * from categories WHERE cat_id={$cat_id}";
                            $select_categories_sidebar=mysqli_query($connection,$query);
                            
                            while($row=mysqli_fetch_assoc($select_categories_sidebar )){
                                $id=$row['cat_id'];
                                $title=$row['cat_title'];
                                ?>                        
                                <input value="<?php if(isset($title)) echo $title;?>"class="form-control" type="text" name="cat_title">
                           <?php }} ?>
                           <?php
                           //update query
                            if(isset($_POST['update_category'])){
                                $the_cat_id=$_POST['cat_title'];
                                $query="UPDATE categories SET cat_title='{$the_cat_id}' WHERE cat_id={$id}";
                                $update_query=mysqli_query($connection,$query);
                                //header("Location: categories.php");
                            }
                           
                           
                           
                           
                           ?>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_category" value="Update category">
                        </div>
                        </form>