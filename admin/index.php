<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<?php include("includes/admin_header.php"); ?>
<?php include("includes/admin_sidebar.php"); ?>


          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?php
                  $query = "SELECT * FROM posts";
                  $select_all_posts = mysqli_query($conn,$query);
                  $post_count = mysqli_num_rows($select_all_posts);
                  echo "{$post_count} Posts";
                  ?></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white  o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5"><?php
                  $query = "SELECT * FROM portfolios";
                  $select_all_portfolios = mysqli_query($conn,$query);
                  $portfolio_count = mysqli_num_rows($select_all_portfolios);
                  echo "{$portfolio_count} Portfolios";
                  ?></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5"><?php
                  $query = "SELECT * FROM categories";
                  $select_all_categories = mysqli_query($conn,$query);
                  $category_count = mysqli_num_rows($select_all_categories);
                  echo "{$category_count} Categories";
                  ?></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5"><?php
                  $query = "SELECT * FROM comments";
                  $select_all_comments = mysqli_query($conn,$query);
                  $comment_count = mysqli_num_rows($select_all_comments);
                  echo "{$comment_count} Comments";
                  ?></div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

<!--Footer-->

<?php include("includes/admin_footer.php"); ?>

