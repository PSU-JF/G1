<?php

    // print_r($_POST);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtNIT=(isset($_POST['txtNIT']))?$_POST['txtNIT']:"";
$txtCelular=(isset($_POST['txtCelular']))?$_POST['txtCelular']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";

$accion= (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("BD/conexionFormu.php");

switch ($accion) {
    case "acdcAgregar":

            $sentencia=$pdo->prepare("INSERT INTO proveedores(Nombre,Direccion,NIT,Celular,Estado)
            VALUES (:Nombre,:Direccion,:NIT,:Celular,:Estado) ");

            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':Direccion',$txtDireccion);
            $sentencia->bindParam(':NIT',$txtNIT);
            $sentencia->bindParam(':Celular',$txtCelular);
            $sentencia->bindParam(':Estado',$txtEstado);
            $sentencia->execute();

        header('location:?clase=pagina&&funcion=prov');
    break;
    case "acdcModificar":
        $sentencia=$pdo->prepare(" UPDATE proveedores SET
            Nombre=:Nombre,
            Direccion=:Direccion,
            NIT=:NIT,
            Celular=:Celular,
            Estado=:Estado WHERE
            id=:id");

        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':Direccion',$txtDireccion);
        $sentencia->bindParam(':NIT',$txtNIT);
        $sentencia->bindParam(':Celular',$txtCelular);
        $sentencia->bindParam(':Estado',$txtEstado);
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        header('location:?clase=pagina&&funcion=prov');
    
    break;
    case "acdcEliminar":
        $sentencia=$pdo->prepare(" DELETE FROM proveedores WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();

        header('location:?clase=pagina&&funcion=prov');
    break;
    case "acdcCancelar":
        header('location:?clase=pagina&&funcion=prov');

    break;
    case "Seleccionar":
    $accionAgregar="disabled";
    $accionModificar=$accionEliminar=$accionCancelar="";
    $mostrarModal=true;
         
    break;
    
}

    $sentencia=$pdo->prepare("SELECT * FROM `proveedores` WHERE 1");
    $sentencia->execute();
    $listaProveedores=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    // print_r($listaEmpleados);

?>