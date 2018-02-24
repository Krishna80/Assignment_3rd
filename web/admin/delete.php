<?php
session_start();
if(!isset($_SESSION['sessUserId'])){
header('location:index.php');
}
require'../connect.php';
if(isset($_POST['delete'])) {
	$id = $_POST['id'];
	//Deleting the category from database
$del= $pdo->prepare("DELETE FROM category WHERE id=$id");
$del->execute();
if($del==true){
	echo"<p align='center'><font color='green' size='10pt'> Your data has been deleted.</font></p>";
}
else{
	echo"<p align='center'><font color='green' size='10pt'> couldnot delete the data.</font></p>";
}
}
if(isset($_POST['Erase'])){
$artid = $_POST['artid'];
//Deleting the news article from database
$erase= $pdo->prepare("DELETE FROM article WHERE artid=$artid");
$erase->execute();
if($erase==true){
	echo"<p align='center'><font color='green' size='10pt'> Your news data has been deleted.</font></p>";
}
else{
	echo"<p align='center'><font color='green' size='10pt'> couldnot delete the data.</font></p>";
}
}
?>
<!DOCTYPE html>
<html>
	<head>
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
			//including the file navigation for the category
				include '../navigation.php';
			?></li>
		</ul>
		</menu>
		<main class="del">
			<div class="one">
				<form action="" method="POST">
					<h2>Delete the Category from Database</h2>
					<select name="id">
						<!--Drop down for selecting the category-->
						<option>Select any one option</option>
						<?php
						//Retriving the name of category along with their id
						$print = $pdo->prepare("SELECT * FROM category");
						$print->execute();
						foreach ($print as $line) {

							$name=$line['name'];
							echo '<option value="'.$line['id'].'">'.$line['name'].'</option>';
						}
						?>
					</select><br>
					<input type="submit" name="delete" value="delete">
				</form>
			</div>
			<article>
				<form action="" method="POST">
					<h2>Delete the News Article from Database</h2>
					<select name="artid">
						<!--Drop down for selecting the title of news-->
						<option>Select any one Title</option>
						<?php
						//Retriving the title of the news along with their id
						$print = $pdo->prepare("SELECT artid,title FROM article");
						$print->execute();
						foreach ($print as $line) {

							$title=$line['title'];
							echo '<option value="'.$line['artid'].'">'.$line['title'].'</option>';
						}
						?>
					</select><br>
					<input type="submit" name="Erase" value="delete">					
				</form>				
			</article>
		</main>
		<ul><a href="logout.php">Logout</a></ul>
		<ul><a href="admin.php"><-Back</a></li>
		<footer>
			&copy; Northampton -<?php echo date("Y");?>
		</footer>
	</body>
</html>