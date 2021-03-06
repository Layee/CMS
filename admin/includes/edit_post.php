<?php
 if(isset($_GET['p_id'])) {
     $the_post_id= $_GET['p_id'];

 }
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id = mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row ['post_title'];
    $post_author = $row['post_author'];
    $post_category = $row['post_category_id'];
    $post_status = $row ['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row ['post_tags'];
    $post_comment = $row['post_comment_count'];
    $post_date = $row['post_date'];
    $post_content = $row['post_content'];
}

    if(isset($_POST['update_post'])) {
        $post_author = $_POST['author'];
        $post_title = $_POST['title'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_content = $_POST['post_content'];
         $post_tags = $_POST['post_tags'];
        move_uploaded_file($post_image_temp,"../images/$post_image");
         if(empty($post_image)){
             $query = "SELECT * FROM posts  WHERE post_id = $the_post_id";
              $select_image = mysqli_query($connect,$query);
              while ($row = mysqli_fetch_array($select_image)){
                  $post_image = $row['post_image']; // select the image from the database a
              }
         }

             $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}',post_date = now(), post_author ='{$post_author}',    post_status='{$post_status}',post_tags = '{$post_tags}', post_content='{$post_content}', post_image = '{$post_image}' WHERE  post_id = {$the_post_id}";
          $update_post = mysqli_query($connect,$query);
        if(!$update_post) {
             die(" Query Failed ".mysqli_errno($connect));
       }
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="title"value="<?php echo $post_title?>">
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" id="author" value="<?php echo $post_author?>">
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connect, $query);
            if(!$select_categories){
                die("Query Failed to Connect".mysqli_errno($connect));
            }
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }
            ?>
        </select>
    </div>



    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status"  value="<?php echo $post_status?>">
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" class="form-control" name="image" id="image">
    </div>


    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="post_tags" value="<?php echo $post_tags?>">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control" ><?php echo $post_content?></textarea>
    </div>

    <div class="form-group">
        <input  class="btn btn-primary" type="submit"  name="update_post" value="Update Post">
    </div>


</form>