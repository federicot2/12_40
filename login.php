<?php
	session_start();
	include ("conexion.php");
	//variables
	$name = $body ="";

	if (isset($_POST['enviar'])) {/*
		//si presiono enviar se ejecuta estas intrucciones
		$name = $conex->real_escape_string($_POST['name']);
		$body = $conex ->real_escape_string($_POST['pin']);
		//$name = $_POST['name'];  
		//$body  = $_POST['pin'];
		
		//conectamos a la base de datos
		mysqli_select_db($conex, $bd) or die ("Error al conectar a la base de Datos");
		//insertamos
	 	$result = mysqli_query($conex, "SELECT * FROM comentarios WHERE name = '$name' AND body = '$body'");
		//validamos si encontramos los datos
	 	if(mysqli_fetch_array($result)){
			//guardamos la sesión
			$_SESSION['user']=$name;
			//enviamos al usuarios a la pagina de bienvenida
	 		header("Location: hola.php");
	 	}
	 	else{
	 	 echo"No se encontro el usuario ",$name;
	 	}*/
		
		
		$name = $_POST['name'];  
		$body  = $_POST['pin'];
		
		$sql = "SELECT name, body FROM  comentarios where name=? and body=?";
		$stmt = $conex->prepare($sql);

		$stmt->bind_param("ss", $name,$body);
		$stmt->execute();
		
		$stmt->bind_result($name, $body);
		
		if ($stmt->fetch()){
			$_SESSION['user'] = $name;
			header("Location: hola.php");
			

		}
		else{
			echo"No se encontro el usuario ",$name;
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>

<body>

    <form method="post">
        <h2>Login</h2>
        Nombre: <input type="text" name="name" required>
        <br><br>
        Cedula: <input type="text" name="pin" required>
        <br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>

</body>

</html>