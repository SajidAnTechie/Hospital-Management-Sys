<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<?php include("includes/admin_header.php"); ?>

    <?php include("includes/admin_sidebar.php"); ?>

            <h1 style="font-size: 27px;">Welcome to Admin Page</h1>
            <hr>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Author</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Response</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

    <?php
    $sql_query = "SELECT * FROM comments ORDER BY comment_id DESC";
    $select_all_comments = mysqli_query($conn, $sql_query);
    $edit = 1;
    while($row = mysqli_fetch_assoc($select_all_comments)){
        $comment_id = htmlspecialchars($row["comment_id"]);
        $comment_post_id = htmlspecialchars($row["comment_post_id"]);
        $comment_author = htmlspecialchars($row["comment_author"]);
        $comment_date = htmlspecialchars($row["comment_date"]);
        $comment_email = htmlspecialchars($row["comment_email"]);
        $comment_status = htmlspecialchars($row["comment_status"]);
        $comment_text = htmlspecialchars($row["comment_text"]);

        echo "<tr>
        <td>{$comment_id}</td>
        <td>{$comment_author}</td>
        <td>{$comment_email}</td>
        <td>{$comment_text}</td>
        <td>{$comment_date}</td>
        <td>{$comment_status}</td>";

$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
$select_post_id_query = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($select_post_id_query)){
    $post_id = $row["post_id"];
    $post_title = $row["post_title"];
}
?>
<td><?php echo @$post_title ?></td>
<?php
echo "<td>
    <div class='dropdown'>
        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown'
            aria-haspopup='true' aria-expanded='false'>
            Actions
        </button>
        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
            <a class='dropdown-item' data-toggle='modal' data-target='#view_modal$edit' href='#'>View</a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='comments.php?delete={$comment_id}'>Delete</a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='comments.php?accept={$comment_id}'>Accept</a>
            <div class='dropdown-divider'></div>
            <a class='dropdown-item' href='comments.php?deny={$comment_id}'>Deny</a>
        </div>
    </div>
</td>
</tr>";
    ?>
                    

                    <div id="view_modal<?php echo $edit; ?>" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Comments</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="comment_author">Comment Author</label>
<input type="text" class="form-control" name="comment_author" value="<?php echo $comment_author; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment_email">Comment Email</label>
<input type="text" class="form-control" name="comment_email" value="<?php echo $comment_email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment_text">Comment Text</label>
<textarea class="form-control" name="comment_text" id="" cols="20" rows="5"><?php echo $comment_text; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="comment_status">Comment Status</label>
                                            <select class="form-group" name="portfolio_category">

                                         <?php
                                         $accept = 'accept';
                                         $deny = 'deny';

                                         echo "<option>$accept</option>";
                                         echo "<option>$deny</option>";
                    
                                         ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="commented_post">Commented Post</label>
<input type="text" class="form-control" name="commented_post" value="<?php echo $post_title ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="comment_id" value="">
                                            <input type="submit" class="btn btn-primary" name="view_post" value="View Post">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $edit++; } ?>
                </tbody>
            </table>

            <?php
        if(isset($_GET["accept"])){
            
             $the_comment_id = htmlspecialchars($_GET["accept"]);
            
$sql_query = "UPDATE comments SET comment_status = 'accept' WHERE comment_id = {$the_comment_id}";
            
            $accept_comment_query = mysqli_query($conn, $sql_query);
            if(!$accept_comment_query){
                die("Query Failed: ". mysqli_error($conn));
            }else{
                header("Location: comments.php");
            }
        }
    
        ?>

        <?php
        if(isset($_GET["deny"])){
            
            $the_comment_id = htmlspecialchars($_GET["deny"]);
           
$sql_query = "UPDATE comments SET comment_status = 'deny' WHERE comment_id = {$the_comment_id}";
           
           $deny_comment_query = mysqli_query($conn, $sql_query);
           if(!$deny_comment_query){
            die("Query Failed: ". mysqli_error($conn));
        }else{
            header("Location: comments.php");
        }
       }
        ?>

            <?php
        if(isset($_GET["delete"])){
            
             $del_comment_id = htmlspecialchars($_GET["delete"]);
            
            $sql_query = "DELETE FROM comments WHERE comment_id ={$del_comment_id} ";
            
            $delete_comment_query = mysqli_query($conn, $sql_query);
            if(!$delete_comment_query){
                die("Query Failed: ". mysqli_error($conn));
            }else{
                header("Location: comments.php");
            }
        }
    
        ?>

            <?php include("includes/admin_footer.php"); ?>