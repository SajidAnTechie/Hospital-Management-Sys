<?php include("includes/header2.php")?>
<?php
if(isset($_GET["id"])){
	$p_post_id = htmlspecialchars(preg_replace('/[^A-Za-z0-9-]/', '', $_GET["id"]));
}

$sql_query = "SELECT * FROM posts WHERE post_id = $p_post_id";
$select_all_posts = mysqli_query($conn, $sql_query);

while($row = mysqli_fetch_assoc($select_all_posts)){
	$post_id = htmlspecialchars($row["post_id"]);
	$post_tags = htmlspecialchars($row["post_tags"]);
	$post_title = htmlspecialchars(strtoupper($row["post_title"]));
	$post_text = htmlspecialchars($row["post_text"]);
?>
<meta name="description" content="TOBSTERA || <?php echo $post_title; ?> || <?php echo $post_text; ?>">
<meta name="keywords" content="<?php echo $post_tags; ?>">
<meta name="author" content="TOBSTERA">
<?php } ?>

	<!-- Navigation -->
	
	<!-- Navigation -->

	<!--==========================
    INSIDE HERO SECTION Section
============================-->
<div class="about-people-with-dogs">
            <div class="for-about-contenet">
                    <h3><font color="#192b82">Blog</font></h3>
										<p>Meet the humans who will care for and love your pets as their own.</p>
            </div>
         
   </div>

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container">
			<div class="row">
			<?php
			
			if(isset($_GET["id"])){
				$p_post_id = htmlspecialchars(preg_replace('/[^A-Za-z0-9-]/', '', $_GET["id"]));
				if(!(is_numeric($p_post_id))){
					header("Location: blog.php");
				}
				$sql_query2 = "UPDATE posts SET post_hits = post_hits + 1 WHERE post_id = $p_post_id";
				$sql_query2_run = mysqli_query($conn, $sql_query2);

			}else{
				//vulnerable
				header("Location: blog.php");
			}

					$sql_query = "SELECT * FROM posts WHERE post_id = $p_post_id";
					$select_all_posts = mysqli_query($conn, $sql_query);

					while($row = mysqli_fetch_assoc($select_all_posts)){
						$post_id = htmlspecialchars($row["post_id"]);
						$post_author = htmlspecialchars($row["post_author"]);
						$post_hits = htmlspecialchars($row["post_hits"]);
						$post_date = htmlspecialchars($row["post_date"]);
						$post_tags = htmlspecialchars($row["post_tags"]);
						$post_title = htmlspecialchars(strtoupper($row["post_title"]));
						$post_text = htmlspecialchars($row["post_text"]);
						$post_image = htmlspecialchars($row["post_image"]);
						?>
<main id="main" class="col-md-8">
					<div class="blog">
						<div class="blog-img">
							<img class="img-fluid-for-post" src="img/<?php echo $post_image; ?>" alt="">
						</div>
						<div class="blog-content-for-post">
							<ul class="blog-meta">
								<li><i class="fas fa-user"></i><?php echo $post_author; ?></li>
								<li><i class="fas fa-clock"></i><?php echo $post_date; ?></li>
								<li><i class="fas fa-eye"></i><?php echo $post_hits ?></li>
							</ul>
							<h3><?php echo $post_title; ?></h3>
							<p><?php echo htmlspecialchars($row["post_text"]); ?></p>
						</div>

						<?php } ?>

<!-- comment fetching start when accepted -->
						<?php
$query = "SELECT * FROM comments WHERE comment_post_id = {$p_post_id} AND comment_status = 'accept' 
ORDER BY comment_id DESC";		
						
$select_comments_query = mysqli_query($conn, $query);
$count_post_comments = mysqli_num_rows($select_comments_query);

						?>
						<!-- blog comments -->
						<div class="blog-comments">
							<h3>(<?php echo $count_post_comments ?>) Comments</h3>

<?php
while($row = mysqli_fetch_assoc($select_comments_query)){
$comment_date = htmlspecialchars($row["comment_date"]);
$comment_author = htmlspecialchars($row["comment_author"]);
$comment_text = htmlspecialchars($row["comment_text"]);
?>
<!-- comment -->
<div class="media">
	<div class="media-body">
		<h4 class="media-heading"><?php echo $comment_author ?><span class="time"><?php echo $comment_date ?></span></h4>
		<p><?php echo $comment_text ?></p>
	</div>
</div>
<!-- /comment -->
<?php } ?>
</div>
<!-- /blog comments -->

						<?php
						if(isset($_POST["create_comment"])){
							sleep(5);
							$p_post_id = htmlspecialchars($_GET["id"]);
							$comment_author = htmlspecialchars($_POST["comment_author"]);
							$comment_email = htmlspecialchars($_POST["comment_email"]);
							$comment_text = htmlspecialchars($_POST["comment_text"]);

							

$query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_text,comment_status,
comment_date)";

$query .= "VALUES ($p_post_id,'{$comment_author}','{$comment_email}','{$comment_text}','deny',now())";

$create_comment_query = mysqli_query($conn, $query);
header("Location: post.php");

}
?>


						<!-- reply form -->
						<div class="reply-form">
							<h3>Leave A Comment</h3>
							<form action="" method="POST">
								<input style="margin-bottom: 1.5rem!important;margin-top: 15px;" class="form-control mb-4" name="comment_author" type="text" placeholder="Name">
								<input style="margin-bottom: 1.5rem!important;margin-top: 15px;" class="form-control mb-4" name="comment_email" type="email" placeholder="Email">
								<textarea style="margin-bottom: 1.5rem!important;margin-top: 15px;" class="form-control mb-4" name="comment_text" row="5" placeholder="Add Your Commment"></textarea>
                                
								<button type="submit" href="#" name="create_comment" class="main-btn">Submit</button>
							</form>
						</div>
						<!-- /reply form -->
					</div>
				</main>
				<!-- /Main -->
			

				<!-- Sidebar -->
				<?php include("includes/sidebar.php"); ?>
				<!-- Sidebar -->

				
				
			</div>

		</div>
	</section>

	<?php include("includes/footer2.php")?>