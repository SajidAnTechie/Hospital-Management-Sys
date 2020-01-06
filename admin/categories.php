<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<html>
<?php include("includes/admin_header.php"); ?>
<?php include("includes/admin_sidebar.php"); ?>
        <h1 style="font-size: 27px;">Welcome to Admin Page</h1>
        <hr>
 
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Add - Edit - Delete</th>
                </tr>
            </thead>
            <tbody>
<a class='btn btn-large btn-primary' data-toggle='modal' href='#' data-target='#add_modal'>Add</a>
            <?php
            //delete function
            if(isset($_GET["delete"])){
                $del_cat_id = htmlspecialchars($_GET["delete"]);
 
            $sql_query = "DELETE FROM categories WHERE category_id = {$del_cat_id}";
           
            $delete_category_query = mysqli_query($conn, $sql_query);
 
            if(!$delete_category_query){
                die("Query Failed: ". mysqli_error($conn));
            }else{
                header("Location: categories.php");
            }
 
            }
            ?>
            <?php
            //Edit category
            if(isset($_POST["edit_category"])){
              $edit_cat_title = $_POST["category_namex"];
 
            $sql_query_edit = "UPDATE categories SET category_name = '$edit_cat_title' WHERE
            category_id = '$_POST[category_id];'";
 
            $edit_category_query = mysqli_query($conn,$sql_query_edit);
            if(!$edit_category_query){
                die("Query Failed: ". mysqli_error($conn));
            }else{
                header("Location: categories.php");
            }
            }
            ?>
            <?php
            //posting
            if(isset($_POST["add_category"])){
                $category_name = htmlspecialchars($_POST["category_name"]);
 
                if($category_name == "" || empty($category_name)){
                    echo '<div class="alert alert-danger" role="alert">
                    please do not leave blank lines!
                  </div>';
                }else{
                    $sql_query = "INSERT INTO categories(category_name) VALUE('$category_name')";
                    $add_new_category_query = mysqli_query($conn, $sql_query);
                    echo '<div class="alert alert-success" role="alert">
                    New Category Added!
                  </div>';
                  if(!$add_new_category_query){
                    die("Query Failed: ". mysqli_error($conn));
                }else{
                    header("Location: categories.php");
                }

                }
               
            }
            ?>
 
 
            <?php
            //selecting
            $sql_query = "SELECT * FROM categories ORDER BY category_id DESC";
            $select_all_categories = mysqli_query($conn, $sql_query);
            $edit = 1;
            while($row = mysqli_fetch_assoc($select_all_categories)){
                $category_id = htmlspecialchars($row["category_id"]);
                $category_name = htmlspecialchars($row["category_name"]);
                echo "<tr>
                <td>{$category_id}</td>
                <td>{$category_name}</td>
                <td>
                    <div class='dropdown'>
                        <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            Actions
                        </button>
                        <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                            <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$edit' href='#'>Edit</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='categories.php?delete={$category_id}'>Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            <div id='edit_modal<?php echo $edit ?>' class='modal fade'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Edit Category</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form action='' method='post'>
                                    <div class='form-group'>
 
                                        <input value='<?php if(isset($category_name)) {echo $category_name ;} ?>' type='text' class='form-control' name='category_namex'>
                                    </div>
                                    <div class='form-group'>
                                        <input type='hidden' name='category_id' value='<?php echo $category_id ?>'>
                                        <input type='submit' class='btn btn-primary' name='edit_category' value='Edit Category'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
                ?>
                <div id='edit_modal<?php echo $edit ?>' class='modal fade'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Edit Category</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form action='' method='post'>
                                    <div class='form-group'>
 
                                        <input value='<?php if(isset($category_name)) {echo $category_name ;} ?>' type='text' class='form-control' name='category_namex'>
                                    </div>
                                    <div class='form-group'>
                                        <input type='hidden' name='category_id' value='<?php echo $category_id ?>'>
                                        <input type='submit' class='btn btn-primary' name='edit_category' value='Edit Category'>
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
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_category" value="Add Category">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
 
 
 
<?php include("includes/admin_footer.php"); ?>
 
