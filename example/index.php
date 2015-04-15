<?php

include_once("inc/dummy_image_placeholder.php");





$current_url = 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];			

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dummy Image Placeholder | C238</title>
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">

</head>
<body>
	
	
		
	<a href="https://github.com/Lukas238/dummy-image-placeholder.git"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://camo.githubusercontent.com/121cd7cbdc3e4855075ea8b558508b91ac463ac2/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f6c6566745f677265656e5f3030373230302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_left_green_007200.png"></a>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<header id="header">
					<h1>Dummy Image Placeholder</h1>
					<h2>Yet another simple image placeholder service.</h2>
				</header>
			</div>
		</div>
	</div>
	
	<main id="main">
		<div id="content">
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4 col-sm-offset-2">
						<h1 class="page-title">How to:</h1>
						<p>You just need to put the image size after our URL to get a dummy image.</p>
						
						<pre><?php echo $current_url; ?>100x150</pre>
						
						<p>You also can use it directly in your code:</p>
						
						<h5>HTML</h5>
						<pre>&lt;img src=&quot;<?php echo $current_url; ?>100x150&quot; alt=&quot;&quot; &gt;</pre>
						
						<h5>CSS</h5>
						<pre>.div{
	background: url(<?php echo $current_url; ?>100x150) no-repeat center center;
}</pre>
												
						
					</div>
					<div class="col-sm-4">
					
						<div id="previews">
							<img src="<?php echo $current_url; ?>350x150" alt="" class="img-responsive">
							<img src="<?php echo $current_url; ?>130x100" alt="" class="img-responsive inline">
							<img src="<?php echo $current_url; ?>200x100" alt="" class="img-responsive inline mar-l-8">
							<img src="<?php echo $current_url; ?>350x65" alt="" class="img-responsive">
						</div>
						
						
					</div>
					<div class="col-sm-8 col-sm-offset-2">
						
						<h2>Examples</h2>
						
						
						<h3>Add custom colors</h3>
						<div class="row">
							<div class="col-sm-6">
								<p>You can pass a background color and a text color as hexadecimal values.
								<pre><?php echo $current_url; ?>350x150/7E6979/EFCFAB</pre>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo $current_url; ?>350x150/7E6979/EFCFAB" alt="">	
							</div>
						</div>
						
						<h3>Add custom text</h3>
						<div class="row">
							<div class="col-sm-6">
								<p>You can define a custom text, insted of the image dimension.</p>
								<pre><?php echo $current_url; ?>350x150&t=Hello word!</pre>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo $current_url; ?>350x150&t=Hello world!" alt="">
							</div>
						</div>
						
						<h3>Add multiple lines of text</h3>
						<div class="row">
							<div class="col-sm-6">
								<p>You can add a break line adding two consecutive lower dash characters.
								<pre><?php echo $current_url; ?>350x150&t=Hello__World!</pre>
							</div>
							<div class="col-sm-6">
								<img src="<?php echo $current_url; ?>350x150&t=Hello__World!" alt="">	
							</div>
						</div>
						
						
						<hr/>
						
						<h2>Technical</h2>
						
						<ul>
							<li>Background color: #cccccc;</li>
							<li>Text color: #888888;</li>
							<li>Font family: BebasNeue Regular - TTF</li>
							<li>Image format: PNG;</li>
						</ul>
						
						
						
						
					</div>
				</div>
			</div>
			
		</div><!-- #content -->
	</main>
			
			
				
				
				
	<footer id="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<a href="http://www.c238.com.ar/">By C238</a>
				</div>
			</div>
		</div>
	</footer>
	
	
</body>
</html>