		<?php
				$con = mysqli_connect('localhost', 'root', 'dbskibdimt', 'loginphp');
				if (!$con) {
					error_log("Connection failed: " . mysqli_connect_error());
					die("Connection failed: " . mysqli_connect_error());
				}

			$obras = "UPDATE `obras` SET `nota`=4.1 WHERE id = 15;";
			$sql = mysqli_query($con, $obras);

			if($sql){
				echo"obra atualizada com sucesso";
			}else{
				die("falha ao atualizar obra: " . mysqli_error($con));
			}
	?>