<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="JIBACHHA Veterinary Hospital(P) Ltd,Nepal">
    <meta name="google-site-verification" content="IRXxxIkSoRDG2kuBt_TtIXllB2EbOkJwwyiYX23Ho4g" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<META NAME="keywords" CONTENT=" JIBACHHA Veterinary Hospital (P) Ltd Nepal,dogs in Nepal, animals in Kathmandu, stray dogs in Nepal,Veterinary Hospital,Veterinary shop,dog health,pet health,best Veterinary Hospital in nepal ">
  	<meta name="robots" content="index,follow">
    <meta name="language" content="en">
   <meta name="copyright" content="2019 JIBACHHA Veterinary Hospital All rights reserved">
   <meta name="author" lang="en" content="Sajid Ansari">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<?php $show="" ?>
  <?php 
			error_reporting(0);
				$show=$_GET['show'];
				if($show=="")
				{
				include("contain/main.php");
				}
				if($show=="services")
				{
				include("contain/services.php");
        }
        if($show=="blog")
				{
				include("blog.php");
				}
			
				if($show=="Gallery")
				{
				include("contain/Gallery.php");
				}
				if($show=="about")
				{
				include("contain/about.php");
        }
        if($show=="contact")
				{
				include("contain/contact.php");
        }
    ?>
		

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
  </body>
</html>