<?php
    function insert_category(){
        global $connect;
        if(isset($_POST['Submit'])) {
            $cat_title = $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)) {
                echo " This filed should not be empty";
            } else {
                $query = "INSERT INTO categories (cat_title)";
                $query .= "VALUE ('{$cat_title}')";
                $crate_category_query = mysqli_query($connect,$query);
                if(!$crate_category_query) {
                    die("QUERY FAILED".mysqli_error($connect));
                }
            }
        }
    }


    function findAllCateogies() {
        global $connect;
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id=  $row['cat_id'];
            $cat_title =  $row['cat_title'];
            echo  "<tr>";
            echo " <td>{$cat_id}</td>";
            echo " <td>{$cat_title}</td>";
            echo " <td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo " <td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
            echo "</tr>";
        }
    }

   function deleteQuery() {
       global $connect;
       if(isset($_GET['delete'])) {
           $the_cat_id = $_GET['delete'];
           $query = "DELETE FROM categories WHERE  cat_id = {$the_cat_id}";
           $deleteQuery = mysqli_query($connect,$query);
           header("Location:categories.php"); // redirect the page

       }
   }
 ?>