<?php include("includes/header.php") ?>
</head>
<body>

	<!-- Navigation -->
	<?php include("includes/navigation.php") ?>
	<!-- Navigation -->

<!--==========================
    INSIDE HERO SECTION Section
============================-->	
<section class="page-image page-image-portfolio md-padding">
    <h1 class="text-white text-center">PORTFOLIO</h1>
</section>
    
<!--==========================
    PORTFOLIO Section
============================-->
<section id="portfolio" class="md-padding">
    <div class="container">

			<div class="row text-center">
				<div class="col-md-4 offset-md-4">
					<div class="section-header">
						<h2 class="title">Our Works</h2>
					</div>
				</div>
			</div>
        <div class="row">

        <?php
        $sql_query = "SELECT * FROM portfolios";
        $select_all_portfolios = mysqli_query($conn, $sql_query);

        while($row = mysqli_fetch_assoc($select_all_portfolios)){
            $portfolio_id = htmlspecialchars($row["portfolio_id"]);
            $portfolio_name = htmlspecialchars($row["portfolio_name"]);
            $portfolio_category = htmlspecialchars($row["portfolio_category"]);
            $portfolio_img_bg = htmlspecialchars($row["portfolio_img_bg"]);
            ?>
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="img/<?php echo $portfolio_img_bg ?>" class="portfolio-link" data-lightbox="background" data-title="<?php echo $portfolio_name ?>" >
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-search fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/<?php echo $portfolio_img_bg ?>" alt="">
                </a>
                <div class="portfolio-caption">
                    <h4><?php echo $portfolio_name ?></h4>
                    <p class="text-muted"><?php echo $portfolio_category ?></p>
                </div>
            </div>

        <?php } ?>





            


        </div>
    </div>
</section>


<?php include("includes/footer.php"); ?>

</body>

</html>