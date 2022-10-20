<?php include "includes/admin_header.php";?>
    <div id="wrapper">
    <!--navigation-->
    <?php include "includes/admin_navigation.php";?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welocome to admin
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                        <?php
                        //insert data
                        insert_categories();
                        ?>
                        <form action="" method="POST">
                        <div class="form-group">
                            <label for="cat_title">Add category</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                        </div>
                        </form>
                        <?php
                        //update query
                        if(isset($_GET['edit'])){
                            $cat_id=$_GET['edit'];
                            include "includes/edit_categories.php";
                        }
                        
                        
                        ?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                //select all data
                               findAllCategories();
                                ?>
                                <?php
                                //delete rows
                                deleteCategories();
                
                                ?>
                
                                </tbody>
                            </table>
                            

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php";?>