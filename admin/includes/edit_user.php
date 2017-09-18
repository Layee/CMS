<?php
 if(isset($_GET['edit_user'])) {
     $the_user_id  = $_GET['edit_user'];
$query = "SELECT * FROM users WHERE user_id = $the_user_id";
$select_users_query = mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($select_users_query)) {
    $user_id = $row['user_id'];
    $username = $row ['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row ['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row ['user_image'];
    $user_role = $row ['user_role'];
}

 }
if(isset($_POST['edit_user'])) {
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
    $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role ='{$user_role}', username='{$username}',user_email = '{$user_email}', user_password ='{$user_password}' WHERE  user_id = {$the_user_id}";
    $update_user = mysqli_query($connect,$query);
    if(!$update_user) {
        die(" Query Failed ".mysqli_errno($connect));
    }

}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" id="title" value="<?php echo $user_firstname?>">
    </div>

    <div class="form-group">
        <label for="author">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="author" value="<?php echo $user_lastname?>">
    </div>
    <div>
        <select name="user_role" id="">
            <option value="subscriber"><?php echo $user_role?></option>
             <?php
                if($user_role == 'Admin') {
                  echo "<option value='Subscriber'>subscriber</option>";
                }  else {
                     echo  " <option value='Admin'>admin</option>";
                }
              ?>


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
        <input type="text" class="form-control" name="username" id="post_tags" value="<?php echo $username?>">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email?>">
    </div>

    <div class="form-group">
        <label for="email">Password</label>
        <input type="password" name="user_password" class="form-control" value="<?php echo $user_password?>">
    </div>

    <div class="form-group">
        <input  class="btn btn-primary" type="submit"  name="edit_user" value="Update User">
    </div>



</form>