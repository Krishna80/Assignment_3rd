<?php
session_start();
if(!isset($_SESSION['sessUserId'])){
	header('location:index.php');
}
//connecting to the database
require'../connect.php';
if(isset($_POST['update'])) {
	$id=$_POST['catid'];
	$name=$_POST['name'];
	//updating the category table
	$up= $pdo->prepare("UPDATE category SET name='$name' WHERE id='$id'");
	$up->execute();
	if($up==true){
		echo"<p align='center'><font color='green' size='10pt'> Your $name data has been updated.</font></p>";
	}
	else{
		echo"<p align='center'><font color='Red' size='10pt'> couldnot update the data.</font></p>";
	}
}
?>
<!--Admin Page-->
<!DOCTYPE html>
<html>
	<head>
		<!--connecting the css file-->
		<link rel="stylesheet" href="admin.css"/>
		<link rel="stylesheet" href="form.css"/>
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
			//including the navigation which is category
				include '../navigation.php';
			?></li>
		</ul>
		</menu>
		<main class="edit">
			<form action="" method="POST">
				<label>choose one category</label>
				<select name="catid">
					<option>Select any one option</option>
					<?php
					//Retriving the category from category table
					$print = $pdo->prepare("SELECT * FROM category");
					$print->execute();
					foreach ($print as $line) {
					
						$name=$line['name'];
						echo '<option value="'.$line['id'].'">'.$line['name'].'</option>';
					}
					?>
				</select><br>
				<label>Enter the new name of category: </label>
				<input type="text" name="name"><br>
				<input type="submit" name="update" value="update">
			</form>
			<article>
				
			
			</article>
		</main>
		<ul><a href="logout.php">Logout</a></ul>
		<ul><a href="admin.php"><<-Back</a></li>
		<footer>
			<!--dynamic date-->
			&copy; Northampton -<?php echo date("Y");?>
		</footer>
	</body>
</html>