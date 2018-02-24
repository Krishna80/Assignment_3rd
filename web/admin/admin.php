<?php
//checking the verification
session_start();
require '../connect.php';
if(!isset($_SESSION['sessUserId'])){
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<!--connecting the css file-->
		<link rel="stylesheet" href="admin.css"/>
		<title>Northampton News - Home</title>
	</head>
	<body>
		<header>
			<section>
				<h1>Welcome to Admin page</h1>
			</section>
		</header>
		<menu class="back">
		<ul>
			<li><?php
			//including the file navigation
				include '../navigation.php';
			?></li>
			
		</ul>
		</menu>
		<main>
			<nav>
				<ul>
					<li><a href="category.php">Add category and News</a></li>
					<li><a href="delete.php">Delete the Records</a></li>
					<li><a href="update.php">Update the Records</a></li>
					<li><a href="signup.php">Register for new user</a></li>
				</ul>
				
			</nav>
			<article>
				<table border="2" cellpadding="20">
					<tr>
						<th>ID</th>
						<th>TITLE</th>
						<th>DATE</th>
						<th>CATEGORY</th>
						
						<th>AUTHOR</th>
						
					</tr>
					
					<?php
					$sun=$pdo->prepare("SELECT * FROM article");
					$sun->execute();
							
					foreach ($sun as $line) { ?>
					<tr>
						<!--Fetching the data from database in the table-->
						<td><?php echo $line['artid']; ?></td>
						<td><?php echo $line['title']; ?></td>
						<td><?php echo $line['podate']; ?></td>
						<td><?php echo $line['categoryid']; ?></td>
						
						<td><?php echo $line['author']; ?></td>
						
					</tr>
					<?php
					}
					?>
				</table>
			</article>
		</main>
		<ul>
			<li><a href="logout.php">Logout</a></li><!--logout from the admin page-->
		</ul>
		<footer>
			&copy; Northampton -<?php echo date("Y");?>
		</footer>
	</body>
</html>