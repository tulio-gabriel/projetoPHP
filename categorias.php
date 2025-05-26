<?php
session_start();

// Destroy session after 5 minutes (300 seconds) of inactivity
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
	session_unset();
	session_destroy();
	header("Location: index.php?timeout=1");
	exit();
}
$_SESSION['LAST_ACTIVITY'] = time();

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
</head>

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
			<br>
			<a href="categorias.php" id="categ">Categorias</a>
		</div>
	</header>
	<div class="container" id="obrasContainer">
		<div class="info">
			<form action="obrasCategoria.php" method="post">
				<button name="categoria" value="filmes">Filmes</button>
				<button name="categoria" value="jogos">Jogos</button>
				<button name="categoria" value="livros">Livros</button>
				<button name="categoria" value="musica">Música</button>
				<br>
			</form>
		</div>
	</div>
</body>

</html>
<?php
} else {
	header("Location: index.php");
	exit();
}