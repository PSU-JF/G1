<?php

    // print_r($_POST);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtDireccion=(isset($_POST['txtDireccion']))?$_POST['txtDireccion']:"";
$txtDocumento=(isset($_POST['txtDocumento']))?$_POST['txtDocumento']:"";
$txtCelular=(isset($_POST['txtCelular']))?$_POST['txtCelular']:"";
$txtSaldo=(isset($_POST['txtSaldo']))?$_POST['txtSaldo']:"";
$txtEstado=(isset($_POST['txtEstado']))?$_POST['txtEstado']:"";

$accion= (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("BD/conexionFormu.php");

switch ($accion) {
    case "acdcAgregar":

            $sentencia=$pdo->prepare("INSERT INTO clientes (Nombre,Direccion,Documento,Celular,Saldo,Estado)
            VALUES (:Nombre,:Direccion,:Documento,:Celular,:Saldo,:Estado) ");

            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':Direccion',$txtDireccion);
            $sentencia->bindParam(':Documento',$txtDocumento);
            $sentencia->bindParam(':Celular',$txtCelular);
            $sentencia->bindParam(':Saldo',$txtSaldo);
            $sentencia->bindParam(':Estado',$txtEstado);
            $sentencia->execute();

        header('location:?clase=pagina&&funcion=clie');
    break;
    case "acdcModificar":
        $sentencia=$pdo->prepare(" UPDATE clientes SET
            Nombre=:Nombre,
            Direccion=:Direccion,
            Documento=:Documento,
            Celular=:Celular,
            Estado=:Estado,
            Saldo=:Saldo WHERE
            id=:id");

        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':Direccion',$txtDireccion);
        $sentencia->bindParam(':Documento',$txtDocumento);
        $sentencia->bindParam(':Celular',$txtCelular);
        $sentencia->bindParam(':Saldo',$txtSaldo);
        $sentencia->bindParam(':Estado',$txtEstado);
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        header('location:?clase=pagina&&funcion=clie');
    
    break;
    case "acdcEliminar":
        $sentencia=$pdo->prepare(" DELETE FROM clientes WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
    
    header('location:?clase=pagina&&funcion=clie');
    break;
    case "acdcCancelar":
        header('location:?clase=pagina&&funcion=clie');

    break;
    case "Seleccionar":
    $accionAgregar="disabled";
    $accionModificar=$accionEliminar=$accionCancelar="";
    $mostrarModal=true;
         
    break;
    
}

    $sentencia=$pdo->prepare("SELECT * FROM clientes WHERE 1");
    $sentencia->execute();
    $listaClientes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    // print_r($listaEmpleados);

?>