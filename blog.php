<?php include("includes/header2.php")?>

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
				<main id="main" class="col-md-8">
					<div class="row">
					<?php

					if(isset($_GET["page"])){
						$page = htmlspecialchars(preg_replace('/[^A-Za-z0-9-]/', '', $_GET["page"]));
					}else{
						$page = 1;
					}

					if($page == "" || $page == 1){
						$starter_post = 0;
					}else{
						if(!(is_numeric($page))){
							header("Location: blog.php");
						}
						$starter_post = ($page * 4) - 4;
					}

					$sql_query2 = "SELECT * FROM posts";
					$look_all_post = mysqli_query($conn, $sql_query2);
					$all_post_count = mysqli_num_rows($look_all_post);
					$page_number = ceil($all_post_count / 4);

					$sql_query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $starter_post, 4";
					$select_all_posts = mysqli_query($conn, $sql_query);

					while($row = mysqli_fetch_assoc($select_all_posts)){
						$post_id = htmlspecialchars($row["post_id"]);
						$post_author = htmlspecialchars($row["post_author"]);
						$post_hits = htmlspecialchars($row["post_hits"]);
						$post_date = htmlspecialchars($row["post_date"]);
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
										<li><i class="fas fa-eye"></i><?php echo $post_hits ?></li>
									</ul>
									<div class="for-blog-header">
											<h3><?php echo $post_title ?></h3>
									</div>
									<div class="for-blog-header-p">
											<p><?php echo $post_text ?></p>
									</div>
									
									<a class="btn btn-primary" style="width: 31%; margin:0 auto;" href="post.php?id=<?php echo $post_id; ?>">Read More</a>
								</div>
							</div>
						</div>


					<?php } ?>

					
						
					
				</main>
				
				<!-- Sidebar -->
				<?php include("includes/sidebar.php"); ?>
				<!-- Sidebar -->
						<div>
							<nav>
								<ul class="pagination pull-right" style="float:right;">
<li class="page-item"><a class="page-link" href="blog.php?page=<?php
if($page > 1){
	echo $page-1;
}else{
	echo 1;
}  
?>">Previous</a></li>
									<?php for($i=1; $i<=$page_number; $i++){ ?>
<li class="page-item"><a class="page-link" href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
									<?php } ?>
<li class="page-item"><a class="page-link" href="blog.php?page=<?php
if($page_number > $page){
	echo $page+1;
}else{
	echo $page;
}  
?>">Next</a></li>
								</ul>
							</nav>
						</div>


				<!-- Not Delete-->
			</div>

		</div>
	</section>

	
	<?php include("includes/footer2.php")?>