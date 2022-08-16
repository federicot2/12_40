<?php
	session_start();
	if (isset($_SESSION['user'])) {
        if (isset($_POST['enviar'])) {
            unset($_SESSION['user']);
            header("Location: login.php");
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>
</head>
<body>
    <h1>Bienvenido</h1>
    <form method="post">
  		<input type="submit" name="enviar" value="cerrar sesion">
	</form>
    
</body>
</html>
<?php
    }else{
    header("Location: login.php");
	}

?>