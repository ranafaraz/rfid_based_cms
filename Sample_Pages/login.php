<?php session_start(); ?>
<?php $conn = mysqli_connect("localhost", "root", "", "test") ?>
<?php
	if (isset($_POST["submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password' LIMIT 1";
		$result = mysqli_query($conn, $query);
		if ($result && mysqli_affected_rows($conn) == 1) {
			$found_user = mysqli_fetch_assoc($result);
			echo "Query Performed...!";
			$_SESSION["username"] = $found_user["username"];
			header("Location: " . "admin.php");
		} else {
			echo "Username/Password not found.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login form</title>
</head>
<body>
	<form method="POST">
		<input type="text" name="username" />
		<input type="password" name="password" />
		<input type="submit" name="submit" value="submit">
	</form>
</body>
</html>

<?php mysqli_close($conn); ?>

<a href="logout.php">Logout</a>

<?php
	if (!isset($_SESSION["username"])) {
		redirect login.php
	}
?>