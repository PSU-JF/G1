<?php 
$host="localhost";
$basedatos="tiendalogin";
$usuario="root";
$contrasena="";

$basedatos= new mysqli( $host , $usuario , $contraseña, $basedatos );

 if( $db -> connect_errno ){
	die("fallo al conectar a la base de datos : (" . $conectar-> mysqli_connect_errno() . ")" .  $conectar ->mysqli_connect_error() );
	
}

else{
	
	
}
?>