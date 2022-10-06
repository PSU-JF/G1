<?php

	session_start();
	include ("log_xlogin.php");

	if(!empty($_POST['correo']) && !empty($_POST['clave'])){
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];
		$sql ="SELECT * FROM administrador WHERE correo='$correo' AND clave='$clave'";
		$query=mysqli_query($basedatos, $sql);
	if($resultado=mysqli_fetch_array($query)){
		//si usuario y contraseña son correctos manten la sesion iniciada
		$_SESSION['u_usuario'] = $correo;
		header("location:../?clase=pagina&&funcion=algo");
	}
	else{

	echo "<script>
		alert('usuario o contraseña equivocado ');
		document.location='../?clase=pagina&&funcion=intr';
		</script>";
	}	
	}else{
		echo "<script>
		  alert('te falto un campo por rellenar ');
		  document.location='../?clase=pagina&&funcion=intr';	
		</script>";	
	}

?>