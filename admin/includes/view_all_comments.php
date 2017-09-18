<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comments</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response To</th>
        <td>Date</td>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connect,$query);
    while($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row ['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row ['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row ['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";
         $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
          $select_post_id_query = mysqli_query($connect,$query);
           while($row = mysqli_fetch_assoc($select_post_id_query)){
               $post_id = $row['post_id'];
                $post_title = $row['post_title'];
               echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>"; // take you the specific article
           }
        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approve=$comment_id'>Approved</a></td>";//pass two parameters
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapproved</a></td>";
        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>


    <?php
    if(isset($_GET['approve'])) {
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id"; // approve query
        $approve_comment_query = mysqli_query($connect, $query);
        header("Location:comments.php"); // relocate to comment after deleting it
    }

    if(isset($_GET['unapprove'])) {
        $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id"; //unapprove query
        $unapprove_comment_query= mysqli_query($connect, $query);
        header("Location:comments.php"); // relocate to comment after deleting it
    }


    if(isset($_GET['delete'])) {
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}"; // delete comments
        $delete_query = mysqli_query($connect, $query);
        header("Location:comments.php"); // relocate to comment after deleting it
    }
    ?>

</table>
