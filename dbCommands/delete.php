		<?php
				$con = mysqli_connect('localhost', 'root', 'dbskibdimt', 'loginphp');
				if (!$con) {
					error_log("Connection failed: " . mysqli_connect_error());
					die("Connection failed: " . mysqli_connect_error());
				}

			$obras = "DELETE FROM `obras` 
			WHERE id=3";
				$sql = mysqli_query($con, $obras);

			if($sql){
				echo"obra deletada com sucesso";
			}else{
				die("falha ao deletar obra: " . mysqli_error($con));
			}
	?>