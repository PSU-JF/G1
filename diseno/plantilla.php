<!DOCTYPE html>
<html>
<head>
	<title>PIZZERIA DE ALBERT</title>
	<link rel="shortcut icon" href="img/logo.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, user-
	scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">
  	<!--estilos propios-->
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <!--conecta a bootstrap-->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<!--Icono_encabezado-->
	<link rel="icon" type="image/jpg" href="img\icono_encabezado.png">
</head>
<body>
	<header id="logo">
		<?php include("diseno/header.php"); ?>
	</header>
	<section>
		<nav id="menu">
			<?php include("diseno/nav.php"); ?>
		</nav>
	</section>
	<section id="info">
		<?php include("enrutador.php"); ?>
	</section>
	<footer id="pie">
		<?php include("diseno/footer.php"); ?>
	</footer>
	<script src="main.js"></script>
</body>
</html>