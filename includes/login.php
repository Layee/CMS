<?php include "db.php"; //include database ?>
<?php session_start(); //start session?>
<?php
 if(isset($_POST['login'])) {
     $username = $_POST['username'];
      $userpassword = $_POST['password'];
     $username = mysqli_real_escape_string($connect,$username); // clean the form from sql injection
     $userpassword = mysqli_real_escape_string($connect,$userpassword); // clean the form from sql injection

     $query = "SELECT * FROM users WHERE username = '{$username}'";
     $select_user_query = mysqli_query($connect,$query);
     if(!$select_user_query) {
         die("Query Failed".mysqli_error($connect));
     }

       while($row = mysqli_fetch_array($select_user_query)){
           $db_user_id = $row['user_id'];
           $db_user_name = $row['username'];
           $db_user_password = $row['user_password'];
           $db_user_firstname = $row['user_firstname'];
           $db_user_lastname = $row['user_lastname'];
           $db_user_role = $row['user_role'];
       }

     if($username === $db_user_name && $userpassword === $db_user_password) {
         $_SESSION['username'] = $db_user_name; // set session
         $_SESSION['firstname'] = $db_user_firstname; // set session
         $_SESSION['lastname'] = $db_user_lastname; // set session
         $_SESSION['user_role'] = $db_user_role; // set session
         header("Location:../admin/");  // if found, take them to the admin page
     }  else {
          header("Location: ../index.php");
     }

 }

?>