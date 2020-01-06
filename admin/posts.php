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
    <thead class="thead-dark" >
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Comments</th>
            <th>Image</th>
            <th>Text</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
<a class='btn btn-large btn-primary' data-toggle='modal' href='#' data-target='#add_modal'>Add</a>
    <?php
    if(isset($_POST["add_post"])){
        $post_title = htmlspecialchars($_POST["post_title"]);
        $post_category = htmlspecialchars($_POST["post_category"]);
        $post_author = htmlspecialchars($_POST["post_author"]);
        $post_tags = htmlspecialchars($_POST["post_tags"]);
        $post_text = htmlspecialchars($_POST["post_text"]);
        $post_date = date("d-m-y");
        $post_comment_number = 8;

        $post_image = htmlspecialchars($_FILES["post_image"]["name"]);
        $post_image_temp = htmlspecialchars($_FILES["post_image"]["tmp_name"]);

        move_uploaded_file($post_image_temp, "../img/$post_image");
$query = "INSERT INTO posts (post_title,post_category,post_author,post_text,post_tags,post_date,
post_comment_number,post_image)";  
$query .= "VALUES('{$post_title}','{$post_category}','{$post_author}','{$post_text}','{$post_tags}',now()
,'{$post_comment_number}','{$post_image}')";

$create_post_query = mysqli_query($conn, $query);
if(!$create_post_query){
    die("Query Failed: ". mysqli_error($conn));
}else{
    header("Location: posts.php");
}
    }
      
    ?>

<?php
    if(isset($_POST["edit_post"])){
        $post_title = htmlspecialchars($_POST["post_title"]);
        $post_category = htmlspecialchars($_POST["post_category"]);
        $post_author = htmlspecialchars($_POST["post_author"]);
        $post_tags = htmlspecialchars($_POST["post_tags"]);
        $post_text = htmlspecialchars($_POST["post_text"]);
        $post_id = htmlspecialchars($_POST["post_id"]);
 
 
        $post_image = htmlspecialchars($_FILES["post_image"]["name"]);
        $post_image_temp = htmlspecialchars($_FILES["post_image"]["tmp_name"]);
 
        move_uploaded_file($post_image_temp, "../img/$post_image");
       
        if(empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = '$_POST[post_id]'";
            $select_image = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($select_image)){
                $post_image = htmlspecialchars($row["post_image"]);
            }
 
        }
 
$sql_query2 = "UPDATE posts SET post_title = '$post_title', post_category = '$post_category',
post_author = '$post_author', post_tags = '$post_tags', post_text = '$post_text', post_image = '$post_image'
WHERE post_id = '$post_id'";
 
$edit_post_query = mysqli_query($conn, $sql_query2);
if(!$edit_post_query){
    die("Query Failed: ". mysqli_error($conn));
}else{
    header("Location: posts.php");
}
 
    }
    ?>

    <?php
    $sql_query = "SELECT * FROM posts ORDER BY post_id DESC";
    $select_all_posts = mysqli_query($conn, $sql_query);
    $edit = 1;
    while($row = mysqli_fetch_assoc($select_all_posts)){
        $post_id = htmlspecialchars($row["post_id"]);
        $post_category = htmlspecialchars($row["post_category"]);
        $post_title = htmlspecialchars($row["post_title"]);
        $post_author = htmlspecialchars($row["post_author"]);
        $post_date = htmlspecialchars($row["post_date"]);

        $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'accept'";		
						
        $select_comments_query = mysqli_query($conn, $query);
        $post_comment_number = mysqli_num_rows($select_comments_query);

        $post_image = htmlspecialchars($row["post_image"]);
        $post_text = htmlspecialchars($row["post_text"]);
        $post_tags = htmlspecialchars($row["post_tags"]);
        echo "<tr>
        <td>{$post_id}</td>
        <td>{$post_title}</td>
        <td>{$post_category}</td>
        <td>{$post_author}</td>
        <td>{$post_date}</td>
        <td>{$post_comment_number}</td>
        <td><img src='../img/$post_image' width='100px' height='100px'></td>
        <td>{$post_text}</td>
        <td>{$post_tags}</td>
        <td>
            <div class='dropdown'>
                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton'
                    data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    Actions
                </button>
                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                    <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$edit' href='#'>Edit</a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item' href='posts.php?delete={$post_id}'>Delete</a>
                </div>
            </div>
        </td>
    </tr>";

    ?>


        <!-- edit-section-for-post-cms -->
        
        <div id="edit_modal<?php echo $edit; ?>" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="post_title">Post Title</label>
<input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
                            </div>
                            <div class="form-group">
                                <label for="post_category">Post Category</label>
                                <select class="form-group" name="post_category">
                    <?php
                    //edit
                    $edit_category_sql = "SELECT * FROM categories ORDER BY category_id DESC";
                    $post_category = htmlspecialchars($_POST["post_category"]);
                    $edit_cat_run = mysqli_query($conn, $edit_category_sql);
                    while ($edit_cat_rows = mysqli_fetch_assoc($edit_cat_run)){
                        $edited_category = htmlspecialchars($edit_cat_rows["category_name"]);

                            echo "<option>$edited_category</option>";
                    }
                    ?>
                                </select>
                            <div class="form-group">
                                <label for="post_author">Post Author</label>
<input type="text" class="form-control" name="post_author" value="<?php echo $post_author ?>">
                            </div>

                            <div class="form-group">
                                <label for="post_image">Post Image</label>
<img width="100" height="100" src="../img/<?php echo $post_image ?>">
                                <input type="file" class="form-control" name="post_image">

                            </div>
                            <div class="form-group">
                                <label for="post_tags">Post Tags</label>
<input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
                            </div>
                            <div class="form-group">
                                <label for="post_text">Post Text</label>
<textarea class="form-control" name="post_text" id="" cols="20" rows="5"><?php echo $post_text ?></textarea>
                            </div>

                            <div class="form-group">
                                <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                                <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php $edit++; } ?>
    </tbody>
</table>

                    

<div id="add_modal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Post Title</label>
                        <input type="text" class="form-control" name="post_title">
                    </div>
                    <div class="form-group">
                        <label for="post_category">Post Category</label>
                        <select class="form-group" name="post_category">
                    <?php
                    //edit
                    $edit_category_sql = "SELECT * FROM categories ORDER BY category_id DESC";
                    $post_category = $_POST["post_category"];
                    $edit_cat_run = mysqli_query($conn, $edit_category_sql);
                    while ($edit_cat_rows = mysqli_fetch_assoc($edit_cat_run)){
                        $edited_category = htmlspecialchars($edit_cat_rows["category_name"]);

                        echo "<option>$edited_category</option>";
                        
                    }
                    ?>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="post_author">Post Author</label>
                        <input type="text" class="form-control" name="post_author">
                    </div>

                    <div class="form-group">
                        <label for="post_image">Post Image</label>
                        <input type="file" class="form-control" name="post_image">
                    </div>
                    <div class="form-group">
                        <label for="post_tags">Post Tags</label>
                        <input type="text" class="form-control" name="post_tags">
                    </div>
                    <div class="form-group">
                        <label for="post_text">Post Text</label>
                        <textarea class="form-control" name="post_text" id="" cols="20" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="post_id" value="">
                        <input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
        if(isset($_GET["delete"])){
            
             $del_post_id = htmlspecialchars($_GET["delete"]);
            
            $sql_query = "DELETE FROM posts WHERE post_id ={$del_post_id} ";
            
            $delete_post_query = mysqli_query($conn, $sql_query);
            if(!$delete_post_query){
                die("Query Failed: ". mysqli_error($conn));
            }else{
                header("Location: posts.php");
            }
        }
    
?>

<?php include("includes/admin_footer.php"); ?>