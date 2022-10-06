<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){

	switch($_POST['btnAccion']) {

		case 'Agregar':

			if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY ))){
				$ID=openssl_decrypt($_POST['id'],COD,KEY );
				$mensaje.="Ok ID correcto".$ID."<br/>";
			}
			else{
				$mensaje.="Upss.. ID incorrecto".$ID."<br/>";
			}

			if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
				$NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
				$mensaje.="Ok NOMBRE".$NOMBRE."<br/>";
			}else{ $mensaje.="Upss.. algo paso con el nombre"."<br/>"; break;}

			if(is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
				$CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
				$mensaje.="Ok CANTIDAD".$CANTIDAD."<br/>";
			}else{ $mensaje.="Upss.. algo paso con la cantidad"."<br/>"; break;}

			if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
				$PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
				$mensaje.="Ok PRECIO".$PRECIO."<br/>";
			}else{ $mensaje.="Upss.. algo paso con el precio"."<br/>"; break;}


			if(isset($_SESSION['CARRITO'])){
				$producto=array(
					'ID'=>$ID,
					'NOMBRE'=>$NOMBRE,
					'CANTIDAD'=>$CANTIDAD,
					'PRECIO'=>$PRECIO,
				); 
				$_SESSION['CARRITO'][]=$producto;
				$mensaje= "Producto agregado al carrito ";

			}else{
				$idProductos=array_column($_SESSION['CARRITO'],"ID");
				if(in_array($ID,$idProductos)){
					$mensaje= "";
				}else{
					$NumeroProductos=count($_SESSION['CARRITO']);
					$producto=array(
						'ID'=>$ID,
						'NOMBRE'=>$NOMBRE,
						'CANTIDAD'=>$CANTIDAD,
						'PRECIO'=>$PRECIO
					); 

					$_SESSION['CARRITO'][$NumeroProductos]=$producto;
					$mensaje= "Producto agregado al carrito "; 
				}
			}

			break;
			case "Eliminar":
			if(!isset($_POST['id'])) return;
				$CARRITO = $_POST['id'];

				array_splice($_SESSION['CARRITO'], $indice, 1);
		break;


		
	}

}

?>