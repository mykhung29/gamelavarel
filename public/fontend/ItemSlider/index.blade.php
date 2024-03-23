<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Simple Multi-Item Slider with CSS Animations and jQuery</title>
		<meta name="description" content="Simple Multi-Item Slider: Category slider with CSS animations" />
		<meta name="keywords" content="jquery plugin, item slider, categories, apple slider, css animation" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
	</head>
	<body>
		<div class="container">	
			<!-- Codrops top bar -->
			<div class="codrops-top clearfix">
				<a href="http://tympanus.net/Development/SliderPagination/"><strong>&laquo; Previous Demo: </strong>Slider Pagination Concept</a>
				<span class="right"><a href="http://tympanus.net/codrops/?p=13218"><strong>Back to the Codrops Article</strong></a></span>
			</div><!--/ Codrops top bar -->
			<header class="clearfix">
				<h1>Simple Multi-Item Slider <span>Category slider with CSS animations</span></h1>
			</header>
			<div class="main">
				<div id="mi-slider" class="mi-slider">
					<ul>
						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>><a href="#"><img src="images/4.jpg" alt="img04"><h4>Sneakers</h4></a></li>
					</ul>
					<ul>
						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>
					</ul>
					<ul>
						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>
					</ul>
					<ul>
						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
						  <img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
					  </a></li>

						<li><a href="#">
							<img src="{{('public/fontend/ItemSlider/images/1.jpg')}}" alt="img01"><h4>Boots</h4>
						</a></li>
					</ul>
					<nav>
						<a href="#">Shoes</a>
						<a href="#">Accessories</a>
						<a href="#">Watches</a>
						<a href="#">Bags</a>
					</nav>
				</div>
			</div>
		</div><!-- /container -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="{{('js/jquery.catslider.js')}}"></script>
		<script>
			$(function() {

				$( '#mi-slider' ).catslider();

			});
		</script>
	</body>
</html>