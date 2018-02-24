<?php
session_start();
if(isset($_SESSION['sessUserId'])){
header('location:admin.php');
}
require '../connect.php';
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$statement=$pdo->prepare("SELECT * FROM login
WHERE username=:username AND password=:password
");

unset($_POST['login']);
$statement->execute($_POST);
if($statement->rowCount()>0){
$user=$statement->fetch();
$_SESSION['sessUserId']=$user['id'];
header('location:admin.php');
}
else{
?>
<script type = "text/Javascript">
alert("Sorry , wrong username or password");
setTimeout("location.href = '../index.php';");
</script>
<?php
}
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
    <!--connecting the css file-->
    <link href="form.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <h3>Login here</h3>
    <form action="" method="post">
      <div class="imghold">
        <img src="../images/login.png" alt="men" class="pp">
      </div>
      <div class="insert">
        <label>Username:</label><input type="text" name="username"><br><br>
        <label>Password:</label><input type="password" name="password"><br><br>
        <input type="submit" name="login" value="Login"><br><br>
        <input type="checkbox" checked="checked"> Remember me
        <a href ="../index.php">Go back to News portal</a>
      </div>
    </form>
  </body>
</html>