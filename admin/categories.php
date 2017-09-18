            <?php include "includes/admin_header.php"; ?>
                <div id="wrapper">
                    <!-- Navigation -->
                 <?php include "includes/admin_navigation.php" ?>
                    <div id="page-wrapper">
                        <div class="container-fluid">
                            <!-- Page Heading -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header">
                                        Welcome to Admin
                                        <small>Author</small>
                                    </h1>
                                    <div class="col-xs-6">
                                        <?php  insert_category();?>  <!--insert category function -->
                                      

                                      <form class="" action="" method="post">
                                         <div class="form-group">
                                           <label for="cat_title"> Add Category</label>
                                           <input type="text" class="form-control" name="cat_title" value="">
                                         </div>
                                         <div class="form-group">
                                           <input class="btn btn-primary" type="submit" name="Submit" value="Add Category">
                                         </div>
                                      </form> <!--add category end-->
                                        <?php // UPDATE AND INCLUDE QUERY
                                           if(isset($_GET['edit'])) {
                                               $cat_id = $_GET['edit'];
                                               include "includes/update_categories.php";
                                           }
                                        ?>
                                   </div>   <!--Add Catefory Form -->
                                     <div class="col-xs-6">
                                         <h4>Blog Categories</h4>
                                         <div class="row">
                                             <div class="col-lg-12">
                                                 <ul class="list-unstyled">
                                         <table class="table table-bordered table-hover">
                                           <thead>
                                               <tr>
                                                 <th>Id</th>
                                                 <th>Category Title</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                           <?php findAllCateogies();// FIND ALL CATEGORIES QUER?>
                                           <?php     deleteQuery(); // DELETE QUERY ?>
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
                 <?php include 'includes/admin_footer.php'; ?>
