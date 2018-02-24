<?php
session_start();
if(!isset($_SESSION['sessUserId'])){  //check for the correct login woth valid username*/
	header('location:index.php');
}
require '../connect.php';
$name= "";
if(isset($_POST['save'])){
	$name=$_POST['name'];
	$print = $pdo->prepare("INSERT INTO category(name) VALUES ('$name')");
	$print->execute();
	if($print==true){
		echo "<p align='center'><font color='Green' size='10pt'>$name is inserted into website.</font></p>";
	}
	else{
		echo'Unable to insert the category';
	}
}
//Inserting news article into database
//
$title = $date = $categoryid= $content = $author = "";
if(isset($_POST['insert'])){
	$title=$_POST['title'];
	$date=$_POST['podate'];
	$categoryid=$_POST['catid'];
	$content=$_POST['content'];
	$author=$_POST['author'];
	//prepare statment for inserting article
	$statement = $pdo->prepare("INSERT INTO article(title, podate, categoryid, content, author)
		VALUES('$title', '$date', '$categoryid', '$content', '$author')
		");
	$statement->execute();
	if(!$statement){
		echo "Unable to insert the article";
	}
	else{
		echo "<p align='center'><font color='Green' size='10pt'>Your news has been inserted to .</font></p>";
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<!--connecting the css file-->
		<link rel="stylesheet" href="admin.css"/>
		<title>Northampton News - Home</title>
	</head>
	<!--validating the form where title cannot be empty-->
	<script>
		function validation() {
			var x = document.forms["admin"]["title"].value;
			if(x== "") {
				alert("Error: Input is empty!");
				form.title.focus();
				return false;
			}
		}
	</script>
	<body>
		<header>
			<section>
				<h1>Welcome to Admin page</h1>
			</section>
		</header>
		<menu class="back">
		<ul>
			<li><?php
			//including the file navigation for displaying the category
				include '../navigation.php';
			?></li>
		</ul>
		</menu>
		<main>
			<div class=part>
				<form method="POST" action="">
					<h3>Adding category</h3>
					<label>Category name: </label>
					<input type="text" name="name" required><br>
					<input type="submit" name="save" value="save">
				</form>
			</div>
			<article>
				<h3>Adding News Article:</h3>
				<form name="admin" action=""  onsubmit="return validation(this);"  method="POST"><!--form validation with javascript-->
					<label>Enter the Title for the News: </label>
					<textarea name="title"></textarea><br>
					<label>Date</label>
					<input type="date" name="podate"><br>
					<label>choose the category</label>
					<select name="catid">
						<option>Select any one option</option>
						<?php
						//Retriving the name of category
						$print = $pdo->prepare("SELECT * FROM category");
						$print->execute();
						foreach ($print as $line) {
							$name=$line['name'];
							echo '<option value="'.$line['id'].'">'.$line['name'].'</option>';
						}
						?>
					</select><br>
					<label>Enter the details of news: </label>
					<textarea name="content"></textarea><br>
					<label>Enter the author of news: </label><input type="text" name="author" /><br>
					<input type="submit" name="insert" value="Insert">
				</form>
			</article>
		</main>
		<ul><a href="logout.php">Logout</a></ul>
		<ul><a href="admin.php"><-Back</a></ul>
		<footer>
			&copy; Northampton -<?php echo date("Y");?>
		</footer>
	</body>
</html>