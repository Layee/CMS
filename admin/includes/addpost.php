 <?php
     if(isset($_POST['create_post'])) {
         $title = $_POST['title'];
         $author = $_POST['author'];
         $post_category_id = $_POST['post_category'];
         $post_status = $_POST['post_status'];
         $post_image = $_FILES['image']['name'];
         $post_image_temp = $_FILES['image']['tmp_name'];

         $post_tags = $_POST['post_tags'];
         $post_content = $_POST['post_content'];
         $post_date = date('d-m-y');
          move_uploaded_file($post_image_temp, "../images/$post_image"); // move file to images folder
         //insert value to the database
         $query = "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
           $query .= "VALUES ({$post_category_id},'{$title}','{$author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
         // send the query to the database
         $crate_post_query = mysqli_query($connect,$query);
         if(!$crate_post_query){
              die("FAILED TO CONNECT TO THE DATABASE".mysqli_error($connect));
         }

     }
 ?>
<form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
         <label for="title">Post Title</label>
         <input type="text" class="form-control" name="title" id="title">
     </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" id="author">
    </div>
  <div>
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
        <input type="text" class="form-control" name="post_status" id="post_status">
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image" id="image">
    </div>


    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" id="post_content" cols="30" rows="10" class="form-control"></textarea>
    </div>

     <div class="form-group">
         <input  class="btn btn-primary" type="submit"  name="create_post" value="Publish Post">
     </div>



</form>