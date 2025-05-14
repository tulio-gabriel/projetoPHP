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

<body id="bodyinfo">
	<header>
		<div class="uppage">
			<h1 class="titu">Informações</h1>
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

				$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
				$stmt = $con->prepare("SELECT * FROM obras WHERE id = ?");
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$sql = $stmt->get_result();

				if (mysqli_num_rows($sql) > 0) {
					echo "<h3>Lista de Obras</h3><br>";
		while ($obra = mysqli_fetch_assoc($sql)) {
			echo "<div>";
			echo "<h4 id=\"titulo\">". "Titulo: " . htmlspecialchars($obra['titulo']) . "</h4><br>";
			echo "<h4 id=\"titulo\">" ."Categoria : ". htmlspecialchars($obra['tipo']) . "</h4><br>";
			echo "<h4 id=\"titulo\">" ."Nota: ". htmlspecialchars($obra['nota']) . "</h4><br>";
			echo "<img id=\"imglist\" src='" . htmlspecialchars($obra['image']) . "' alt='Image not found'/><br>";
			echo "<h4 id=\"titulo\">" ."Resenhas: ". htmlspecialchars($obra['resenha']) . "</h4>";
			echo "<div>";
			echo "</div>";
			echo "</div>";
		}
		} else {
		echo "<h3>Erro ao encontrar os usuários</h3>";
		}
		?>
	</div>
</body>

</html>