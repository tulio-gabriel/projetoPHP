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

<body id="bodylog">
	<?php $login = false; ?>
	<header>
		<div class="uppage">
			<h1 class="titu">Central de Cadastros e Login</h1>
			<br>
			<a href="index.php" id="log">Login</a>
			<br>
			<a href="cad.php" id="cad">Cadastro</a>
			<br>
			<a href="obras.php?login=<?php echo $login ? 'true' : 'false'; ?>" id="obras">Obras</a>
		</div>
	</header>
	<div class="container">
		<div class="info">
			<h1>Sistema de Login</h1>
		</div>
		<form action="index.php" method="post">
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" required placeholder="Insira seu nome">
			<label for="senha">Senha</label>
			<input type="password" name="senha" id="senha" required placeholder="Insira sua senha">
			<button type="submit">Logar</button>
		</form>
		<?php
			$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
			$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
			if (!empty($nome) && !empty($senha)) {

				function debug_to_console($data)
				{
					if ($_SERVER['REQUEST_METHOD'] === 'POST') {
						$output = $data;
					}
					if (is_array($output))
						$output = implode(',', $output);

					echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
				}

				$con = mysqli_connect('localhost', 'root', 'dbskibdimt', 'loginphp');
				if (!$con) {
					debug_to_console("Connection failed: " . mysqli_connect_error());
					die("Connection failed: " . mysqli_connect_error());
				}


				$user = "SELECT * FROM usuarios WHERE nome='$nome' AND senha='$senha'";
				$sql = mysqli_query($con, $user);

				if (mysqli_num_rows($sql) > 0) {
					echo "<h3>logado com sucesso</h3>";
					$login=true;
				// Start session and save user info
				session_start();
				$_SESSION['nome'] = $nome;
				$_SESSION['login'] = true;
				header("Location: obras.php");
				exit;
			} else {
				echo "<h3>usuario ou senha incorretos</h3>";
			}
			}
		?>
	</div>
</body>

</html>