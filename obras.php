<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<script src="js/script.js"></script>

<body id="bodyus">
	<header>
		<div class="uppage">
			<h1 class="titu">Listagem de Obras</h1>
			<br>
			<a href="index.php" id="log">Login</a>
			<br>
			<a href="cad.php" id="cad">Cadastro</a>
			<br>
			<a href="obras.php" id="obras">Obras</a>
		</div>
	</header>
	<div class="container" id="obrasContainer">
		<div class="info">
		</div>
		<?php
				$con = mysqli_connect('localhost', 'root', 'dbskibdimt', 'loginphp');
				if (!$con) {
					error_log("Connection failed: " . mysqli_connect_error());
					die("Connection failed: " . mysqli_connect_error());
				}

				$obras = "SELECT * FROM obras";
				$sql = mysqli_query($con, $obras);

				if (mysqli_num_rows($sql) > 0) {
					echo "<h3>Lista de Obras</h3><br>";
		while ($obra = mysqli_fetch_assoc($sql)) {
			echo "<div id=\"obraslist\">";
			echo "<h4 id=\"titulo\">" . htmlspecialchars($obra['titulo']) . "</h4>";
			echo "<a href=\"data.php?id={$obra['id']}\" id=\"imglink\"><img id=\"imglist\" src='" . htmlspecialchars($obra['image']) . "' alt='Image not found'/></a>";
			echo "</div>";
		}
		} else {
		echo "<h3>Erro ao encontrar os usuários</h3>";
		}
		?>
	</div>
</body>

</html>
<?php
} else {
	// Redirect to login page if not logged in

	// Destroy session after 15 minutes of inactivity
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
		session_unset();
		session_destroy();
		header("Location: index.php?timeout=1");
		exit();
	}
	$_SESSION['LAST_ACTIVITY'] = time();
	header("Location: index.php");
	exit();
}
?>
?>