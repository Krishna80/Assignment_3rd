<?php
session_start();
if(!isset($_SESSION['sessUserId'])){
	header('location:index.php');
}
require '../connect.php';
if(isset($_POST['save'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$statement = $pdo->prepare("INSERT INTO login(username,password,fullname,email,contact)
		VALUES ('$username','$password','$fullname','$email','$contact')");
	$statement->execute();
	if($statement==true){
		echo "<p align='center'><font color='Green' size='10pt'>$fullname has been a new admin user</font></p>";
	}
	else{
		echo'Unable to insert the category';
	}
}
?>
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
			include '../navigation.php';
			?></li>
		</ul>
	</menu>
	<main class="register">
		<h3>Signup for New Admin</h3><br>
		<form method="POST" action="">
			<label>Enter the New username</label>
			<input type="text" name="username"><br><br>
			<label>Enter Password</label>
			<input type="password" name="password"><br><br>
			<label>Enter your full name</label>
			<input type="text" name="fullname"><br>
			<label>Enter your Email</label>
			<input type="text" name="email"><br>
			<label>Enter your Contact number</label>
			<input type="text" name="contact"><br>
			<input type="submit" name="save" value="save">
			
		</form>
		<article>
			
			<h2>List of Admin user</h2>
			<table border="2" cellpadding="20">
				<tr>
					<th>ID</th>
					<th>USERNAME</th>
					<th>FULLNAME</th>
					<th>EMAIL</th>
					<th>CONTACT</th>
				</tr>
				
				<?php
				$sun=$pdo->prepare("SELECT * FROM login");
				$sun->execute();
						//$resullt=$sun->fetchAll();
				foreach ($sun as $line) { ?>
				<tr>
					<td><?php echo $line['id']; ?></td>
					<td><?php echo $line['username']; ?></td>
					<td><?php echo $line['fullname']; ?></td>
					<td><?php echo $line['email']; ?></td>
					<td><?php echo $line['contact']; ?></td>
				</tr>
				<?php
			}
			?>
		</table>
	</article>
</main>
<ul><a href="logout.php">Logout</a></ul>
<ul><a href="admin.php"><-Back</a></ul>
<footer>
	&copy; Northampton -<?php echo date("Y");?>
</footer>
</body>
</html>