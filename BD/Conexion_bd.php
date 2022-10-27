<?php

    class Conexion
    {
        //crear funcion
        public static function con()
        {
            try
            {
                $conexion=mysqli_connect("localhost","root","","pizzeria") or die(" NO SE PUDO REALIZAR LA CONEXION A LA BASES DE DATOS");
                return $conexion;
            }//fin try
            catch(Exception $e)
            {
                echo "Error al conectar con la BD $e";
            }//fin catch

        }//fin funcion

    }//fin clase Conexion
    //validar conexion a la base de datos

    /*
    $prueba = new Conexion();
    if ($prueba->con())
    {
        echo "si hay conexion a la base de datos";
    }//fin if
    else
    {
        echo "no se pudo conectar a la base de datos";
    }//fin else
    */
?>