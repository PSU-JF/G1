<?php

    // print_r($_POST);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtApellido=(isset($_POST['txtApellido']))?$_POST['txtApellido']:"";
$txtDocumento=(isset($_POST['txtDocumento']))?$_POST['txtDocumento']:"";
$txtCelular=(isset($_POST['txtCelular']))?$_POST['txtCelular']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";

$accion= (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("BD/conexionFormu.php");

switch ($accion) {
    case "acdcAgregar":

            $sentencia=$pdo->prepare("INSERT INTO empleados(Nombre,Apellido,Documento,Celular,Estado)
            VALUES (:Nombre,:Apellido,:Documento,:Celular,:Estado); ");

            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':Apellido',$txtApellido);
            $sentencia->bindParam(':Documento',$txtDocumento);
            $sentencia->bindParam(':Celular',$txtCelular);
            $sentencia->bindParam(':Estado',$txtEstado);
            $sentencia->execute();

        header('location:?clase=pagina&&funcion=empl');
    break;
    case "acdcModificar":
        $sentencia=$pdo->prepare(" UPDATE empleados SET
            Nombre=:Nombre,
            Apellido=:Apellido,
            Documento=:Documento,
            Celular=:Celular,
            Estado=:Estado WHERE
            id=:id");

        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':Apellido',$txtApellido);
        $sentencia->bindParam(':Documento',$txtDocumento);
        $sentencia->bindParam(':Celular',$txtCelular);
        $sentencia->bindParam(':Estado',$txtEstado);
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        header('location:?clase=pagina&&funcion=empl');
    
    break;
    case "acdcEliminar":
        $sentencia=$pdo->prepare(" DELETE FROM empleados WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        
     header('location:?clase=pagina&&funcion=empl');
    break;
    case "acdcCancelar":
        header('location:?clase=pagina&&funcion=empl');

    break;
    case "Seleccionar":
    $accionAgregar="disabled";
    $accionModificar=$accionEliminar=$accionCancelar="";
    $mostrarModal=true;
         
    break;
    
}

    $sentencia=$pdo->prepare("SELECT * FROM `empleados` WHERE 1");
    $sentencia->execute();
    $listaEmpleados=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    // print_r($listaEmpleados);

?>