<?php include("includes/header2.php")?>


	<!-- Navigation -->
		


	<div class="about-people-with-dogs">
            <div class="for-about-contenet">
                    <h3><font color="#192b82">Blog</font></h3>
										<p>Meet the humans who will care for and love your pets as their own.</p>
            </div>
         
   </div>
	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container">
			<div class="row">
				<main id="main" class="col-md-8">
					<div class="row">

                    <?php
                    if(isset($_GET["id"])){
                        $post_category_selected = htmlspecialchars($_GET["id"]);
                    }else{
						header("Location: blog.php");
					}
                    ?>

					<?php

					@$sql_query = "SELECT * FROM posts WHERE post_category = '$post_category_selected'";
                    $select_all_posts = mysqli_query($conn, $sql_query);

                    


					while($row = mysqli_fetch_assoc($select_all_posts)){
						$post_id = htmlspecialchars($row["post_id"]);
						$post_author = htmlspecialchars($row["post_author"]);
						$post_date = htmlspecialchars($row["post_date"]);
						$post_comment_number = htmlspecialchars($row["post_comment_number"]);
						$post_title = htmlspecialchars(strtoupper($row["post_title"]));
						$post_text = htmlspecialchars(substr($row["post_text"],0,100));
						$post_image = htmlspecialchars($row["post_image"]);

						?>
						<div class="col-md-6">
							<div class="blog">
								<div class="blog-img">
									<img src="img/<?php echo $post_image ?>" class="img-fluid">
								</div>
								<div class="blog-content">
									<ul class="blog-meta">
										<li><i class="fas fa-users"></i><span class="writer"><?php echo $post_author ?></span></li>
										<li><i class="fas fa-clock"></i><span class="writer"><?php echo $post_date ?></span></li>
										<li><i class="fas fa-comments"></i><span class="writer"><?php echo $post_comment_number ?></span></li>
									</ul>
									<div class="for-blog-header">
											<h3><?php echo $post_title ?></h3>
									</div>
									<p><?php echo htmlspecialchars($row["post_text"]); ?></p>
									<a class="btn btn-primary" style="width: 31%; margin:0 auto;" href="post.php?id=<?php echo $post_id; ?>">Read More</a>
								</div>
							</div>
						</div>


					<?php } ?>


				
				</main>
				
				<!-- Sidebar -->
				<?php include("includes/sidebar.php"); ?>
				<!-- Sidebar -->
				
				
			</div>

		</div>
	</section>

	<?php include("includes/footer2.php")?>