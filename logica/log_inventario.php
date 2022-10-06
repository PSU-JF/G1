<?php

    // print_r($_POST);

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtBodega=(isset($_POST['txtBodega']))?$_POST['txtBodega']:"";
$txtTienda=(isset($_POST['txtTienda']))?$_POST['txtTienda']:"";
$txtDescripcion=(isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
$txtFoto=(isset($_FILES['txtFoto']["name"]))?$_FILES['txtFoto']["name"]:"";

$accion= (isset($_POST['accion']))?$_POST['accion']:"";

$accionAgregar="";
$accionModificar=$accionEliminar=$accionCancelar="disabled";
$mostrarModal=false;

include ("BD/conexionFormu.php");

switch ($accion) {
    case "acdcAgregar":

            $sentencia=$pdo->prepare("INSERT INTO inventarios(Nombre,Bodega,Tienda,Descripcion,Foto)
            VALUES (:Nombre,:Bodega,:Tienda,:Descripcion,:Foto) ");

            $sentencia->bindParam(':Nombre',$txtNombre);
            $sentencia->bindParam(':Bodega',$txtBodega);
            $sentencia->bindParam(':Tienda',$txtTienda);
            $sentencia->bindParam(':Descripcion',$txtDescripcion);

            $Fecha= new DateTime();
            $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$FILES["txtFoto"]["name"]:"defaul.png";

            $tmpFoto=$_FILES["txtFoto"]["tmp_name"];

            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"img/fotosInven/".$nombreArchivo);
            }

            $sentencia->bindParam(':Foto',$nombreArchivo);
            $sentencia->execute();

        header('location:?clase=pagina&&funcion=inve');
    break;
    case "acdcModificar":
        $sentencia=$pdo->prepare(" UPDATE inventarios SET
            Nombre=:Nombre,
            Bodega=:Bodega,
            Tienda=:Tienda,
            Descripcion=:Descripcion WHERE id=:id");

        $sentencia->bindParam(':Nombre',$txtNombre);
        $sentencia->bindParam(':Bodega',$txtBodega);
        $sentencia->bindParam(':Tienda',$txtTienda);
        $sentencia->bindParam(':Descripcion',$txtDescripcion);
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();

        $Fecha= new DateTime();
        $nombreArchivo=($txtFoto!="")?$Fecha->getTimestamp()."_".$FILES["txtFoto"]["name"]:"defaul.png";

            $tmpFoto=$_FILES["txtFoto"]["tmp_name"];

            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto,"img/fotosInven/".$nombreArchivo);

            $sentencia=$pdo->prepare(" SELECT Foto FROM inventarios WHERE id=:id");
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();
            $inventarios=$sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($inventarios["Foto"])){
            if (file_exists("img/fotosInven/".$inventarios["Foto"])){

                if($item['Foto']!="defaul.png"){
                    unlink("img/fotosInven/".$inventarios["Foto"]);
                }
            }
        }

            $sentencia=$pdo->prepare(" UPDATE inventarios SET Foto=:Foto WHERE id=:id");
            $sentencia->bindParam(':Foto',$nombreArchivo);
            $sentencia->bindParam(':id',$txtID);
            $sentencia->execute();

            }

        header('location:?clase=pagina&&funcion=inve');
    
    break;
    case "acdcEliminar":

        $sentencia=$pdo->prepare(" SELECT Foto FROM inventarios WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();
        $inventarios=$sentencia->fetch(PDO::FETCH_LAZY);

        if(isset($inventarios["Foto"])&&($item['Foto']!="defaul.png")){
            if (file_exists("img/fotosInven/".$inventarios["Foto"])){
                    unlink("img/fotosInven/".$inventarios["Foto"]);
            }
        }

        $sentencia=$pdo->prepare(" DELETE FROM inventarios WHERE id=:id");
        $sentencia->bindParam(':id',$txtID);
        $sentencia->execute();

        header('location:?clase=pagina&&funcion=inve');
    break;
    case "acdcCancelar":
        header('location:?clase=pagina&&funcion=inve');

    break;
    case "Seleccionar":
    $accionAgregar="disabled";
    $accionModificar=$accionEliminar=$accionCancelar="";
    $mostrarModal=true;

    $sentencia=$pdo->prepare("SELECT * FROM inventarios WHERE id=:id");
    $sentencia->bindParam(':id',$txtID);
    $sentencia->execute();
    $inventarios=$sentencia->fetch(PDO::FETCH_LAZY);

    $txtNombre=$inventarios['Nombre'];
    $txtBodega=$inventarios['Bodega'];
    $txtTienda=$inventarios['Tienda'];
    $txtDescripcion=$inventarios['Descripcion'];
    $txtFoto=$inventarios['Foto'];
         
    break;
    
}

    $sentencia=$pdo->prepare("SELECT * FROM `inventarios` WHERE 1");
    $sentencia->execute();
    $listaInventarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    // print_r($listaEmpleados);

?>