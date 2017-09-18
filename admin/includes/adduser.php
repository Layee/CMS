 <?php
     if(isset($_POST['create_user'])) {
          $user_firstname = $_POST['user_firstname'];
         $user_lastname = $_POST['user_lastname'];
         $user_role = $_POST['user_role'];
//         $post_image = $_FILES['image']['name'];
//         $post_image_temp = $_FILES['image']['tmp_name'];
         $username = $_POST['username'];
         $user_email = $_POST['user_email'];
         $user_password = $_POST['user_password'];

////         $post_date = date('d-m-y');
//          move_uploaded_file($post_image_temp, "../images/$post_image"); // move file to images folder
//         //insert value to the database
         $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password)";
           $query .= "VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}',  '{$username}', '{$user_email}', '{$user_password}')";
         // send the query to the database
         $crate_user_query = mysqli_query($connect,$query);
         if(!$crate_user_query){
              die("FAILED TO CONNECT TO THE DATABASE".mysqli_error($connect));
         }

     }
 ?>
<form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
         <label for="title">Firstname</label>
         <input type="text" class="form-control" name="user_firstname" id="title">
     </div>

    <div class="form-group">
        <label for="author">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="author">
    </div>
  <div>
      <select name="user_role" id="">
          <option value="subscriber">Select Options</option>
          <option value="Admin">Admin</option>
          <option value="Subscriber">Subscriber</option>
      </select>
  </div>

<!--    <div class="form-group">-->
<!--        <label for="post_status">Post Status</label>-->
<!--        <input type="text" class="form-control" name="post_status" id="post_status">-->
<!--    </div>-->

<!--    <div class="form-group">-->
<!--        <label for="image">Post Image</label>-->
<!--        <input type="file" class="form-control" name="image" id="image">-->
<!--    </div>-->


    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" id="post_tags">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>

     <div class="form-group">
         <input  class="btn btn-primary" type="submit"  name="create_user" value="Add User">
     </div>



</form>