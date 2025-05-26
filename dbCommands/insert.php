		<?php
				$con = mysqli_connect('localhost', 'root', 'dbskibdimt', 'loginphp');
				if (!$con) {
					error_log("Connection failed: " . mysqli_connect_error());
					die("Connection failed: " . mysqli_connect_error());
				}

				$obras = "INSERT INTO `obras` (`image`,`titulo`,`tipo`,`nota`)
				VALUES ('imagemSql/amnesia.jpg','Amnésia','filme',4.3);
			";
				$sql = mysqli_query($con, $obras);

			if($sql){
				echo"obra inserida com sucesso";
			}else{
				die("falha ao inserir obra: " . mysqli_error($con));
			}
	?>