<!--Front End page of Online News Portal-->
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="main.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Northampton News</h1>
			</section>
		</header>
		<nav class="front-end">
			<ul class="front">
				<li class="front"><a href="javascript:window.location.reload(true)">Home</a></a></li>
				<li class="front"><a href="latest.php">Latest Articles</a></li>
				<li class="front"><a href="contact.php">Contact us</a></li>
				<li class="front"><a href="#">Select Category</a>
				<?php
				//connecting with the database
				require'connect.php';
				echo'<ul>';
				echo'<li>';
				//including the file naviagtion for category name
				include ('navigation.php');
				?>
			</ul>
		</nav>
		<img src="images/banners/randombanner.php" />
		<main>
			<nav>
			</nav>
			<article>
				<!--Addinig the Find me BUtton of Twitter and facebook-->
				<div class="book" style="position:fixed; right:0; top:170px;">
					<img src="images/tweet.png" usemap="#geometry" width="30" height="272" border="0">
					<map name="geometry" id="geometry">
						<area shape="rect" coords="-10,152,34,275" href="https://www.facebook.com/crackercreesh80" target="_blank">
						<area shape="rect" coords="0,30,36,148" href="https://twitter.com/prayash_karki" target="_blank">
					</map>
				</div>
				<?php
				//Retrivinig the News Article from database
				$print=$pdo->prepare("SELECT * FROM article");
				$print->execute();
				while($line = $print->fetch(PDO::FETCH_ASSOC)){
				$title=$line['title'];
				$date=$line['podate'];
				//$image=$line['image'];
				$content=$line['content'];
				$author=$line['author'];
				echo "<h2>".$title. "</h2>";
				echo "<h3>".$date."</h3>";
				echo $content;
				echo "<h3>".$author."</h3>";
				//including the file for the social button
				include 'social.php';
				}
				?>
			</article>
		</main>
		<footer>
			<!--Making the footer with dynamic date-->
			&copy; Northampton-<?php echo date("Y");?>
		</footer>
	</body>
</html>