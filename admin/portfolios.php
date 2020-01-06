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
                        <th>Portfolio Name</th>
                        <th>Portfolio Category</th>
                        <th>Small Image</th>
                        <th>Add - Edit - Delete</th>
                    </tr>
                </thead>
                <tbody>
<a class='btn btn-large btn-primary' data-toggle='modal' href='#' data-target='#add_modal'>Add</a>
                    <?php

    if(isset($_POST["add_portfolio"])) {
        
        $portfolio_name = htmlspecialchars($_POST["portfolio_name"]);
        $portfolio_category = htmlspecialchars($_POST["portfolio_category"]);
    
        
        $portfolio_image_bg = htmlspecialchars($_FILES["image"]["name"]);
        $portfolio_image_bg_temp = htmlspecialchars($_FILES["image"]["tmp_name"]);
        

        move_uploaded_file($portfolio_image_bg_temp, "../img/$portfolio_image_bg");
        
$query = "INSERT INTO portfolios (portfolio_name, portfolio_category, portfolio_img_bg) 
        VALUES('{$portfolio_name}', '{$portfolio_category}','{$portfolio_image_bg}')";
        
        
        $create_portfolio_query = mysqli_query($conn, $query);
        if(!$create_portfolio_query){
            die("Query Failed: ". mysqli_error($conn));
        }else{
            header("Location: portfolios.php");
        }
        
    }


?>

                    <?php 
                    if(isset($_POST["edit_portfolio"])){
                        $portfolio_name = htmlspecialchars($_POST["portfolio_name"]);
                        $portfolio_category = htmlspecialchars($_POST["portfolio_category"]);
                        $portfolio_img_bg = htmlspecialchars($_FILES["image"]["name"]);
                        $portfolio_img_bg_temp = htmlspecialchars($_FILES["image"]["tmp_name"]);
                        
                        
                        
                        if(empty($portfolio_img_bg)) {
                            $query = "SELECT * FROM portfolios WHERE portfolio_id = '$_POST[portfolio_id]'";
                            $select_image_bg = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_array($select_image_bg)){
                                $portfolio_img_bg = $row["portfolio_img_bg"];
                            }
                        }
                        
                
        move_uploaded_file($portfolio_img_bg_temp, "../img/$portfolio_img_bg");
                        
                    
$sql_query2 = "UPDATE portfolios SET portfolio_name = '{$portfolio_name}', portfolio_category = '{$portfolio_category}', portfolio_img_bg = '{$portfolio_img_bg}' WHERE portfolio_id = '$_POST[portfolio_id]'";
                        
                    $edit_portfolio_query = mysqli_query($conn, $sql_query2);
                    if(!$edit_portfolio_query){
                        die("Query Failed: ". mysqli_error($conn));
                    }else{
                        header("Location: portfolios.php");
                    }
                        
                        
                        
                        
                    }
                
                
                
                ?>




                    <?php
            $sql_query = "SELECT * FROM portfolios ORDER BY portfolio_id DESC";
            $select_all_portfolios = mysqli_query($conn, $sql_query);
                $edit = 1;
                while ($row = mysqli_fetch_assoc($select_all_portfolios)) {
                        $portfolio_id = htmlspecialchars($row["portfolio_id"]);
                        $portfolio_name = htmlspecialchars($row["portfolio_name"]);
                        $portfolio_category = htmlspecialchars($row["portfolio_category"]);
                        $portfolio_img_bg = htmlspecialchars($row["portfolio_img_bg"]);
                    
                    echo "<tr>
                    <td>{$portfolio_id}</td>
                    <td>{$portfolio_name}</td>
                    <td>{$portfolio_category}</td>
                    <td><img src='../img/$portfolio_img_bg' width='100px' height='100px'></td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Actions
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$edit' href='#'>Edit</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='portfolios.php?delete={$portfolio_id}'>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>";  
   
            ?>

                    <div id="edit_modal<?php echo $edit; ?>" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Portfolio</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="portfolio_name">Portfolio Name</label>
<input type="text" class="form-control" name="portfolio_name" value="<?php echo $portfolio_name ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="portfolio_category">Portfolio Category</label>
                                            <select class="form-group" name="portfolio_category">

                    <?php
                    //edit
                    $edit_category_sql = "SELECT * FROM categories ORDER BY category_id DESC";
                    $portfolio_category = htmlspecialchars($_POST["portfolio_category"]);
                    $edit_cat_run = mysqli_query($conn, $edit_category_sql);
                    while ($edit_cat_rows = mysqli_fetch_assoc($edit_cat_run)){
                        $edited_category = htmlspecialchars($edit_cat_rows["category_name"]);

                        echo "<option>$edited_category</option>";
                        
                    }
                    ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                        <label for="post_image">Post Image</label>
<img width="100" height="100" src="../img/<?php echo $portfolio_img_bg ?>">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="portfolio_id" value="<?php echo $portfolio_id ?>">
                                            <input type="submit" class="btn btn-primary" name="edit_portfolio" value="Edit Portfolio">
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
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="portfolio_name">Product Name</label>
                                    <input type="text" class="form-control" name="portfolio_name">
                                </div>
                                <div class="form-group">
                                    <label for="portfolio_category">Portfolio Category</label>
                                    <select class="form-group" name="portfolio_category">

                    <?php
                    //add
                    $edit_category_sql = "SELECT * FROM categories ORDER BY category_id DESC";
                    $edit_cat_run = mysqli_query($conn, $edit_category_sql);
                    while ($edit_cat_rows = mysqli_fetch_assoc($edit_cat_run)){
                        $edited_category = htmlspecialchars($edit_cat_rows["category_name"]);
                        
                        echo "<option>$edited_category</option>";
                        
                    }
                    ?>
                    
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="portfolio_image_bg">Big Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="add_portfolio" value="Add Portfolio">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        if(isset($_GET["delete"])){
            
             $del_port_id = $_GET["delete"];
            
            $sql_query = "DELETE FROM portfolios WHERE portfolio_id ={$del_port_id} ";
            
            $delete_portfolio_query = mysqli_query($conn, $sql_query);
            if(!$delete_portfolio_query){
                die("Query Failed: ". mysqli_error($conn));
            }else{
                header("Location: portfolios.php");
            }
        }
    
        ?>


            <?php include("includes/admin_footer.php"); ?>