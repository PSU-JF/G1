<?php
require('modelo/logica_empleado.php');
class Login
{
    /*function inicio()
    {
        require('vista/login/login_inicio.php');
    }*/

    public function reporte_clave()
    {
        /*Instanciar */
        //$reporte=new Logica_Empleado(null,null,null,null,null,null);
        /*Llamar al formulario principal */
        //$imp=$reporte->reporte_gral();
        //Llamar formulario login inicio
        include("vista/pagina/inicio.php");
    }

    public function ingreso()
    {
        /*Verificar la llegada de datos */
        $usu1=$_POST['tx_user'];
        $pass1=$_POST['tx_pass'];
        
        //Instanciar
        //$user=new Logica_Empleado(null,$pass1,$usu1,null,null,null);
        /*Esperar respuesta */
        //$res1=$user->login_empleado();
        /*Validar respuesta */
        //if ($res1!=1)
        {
            echo '<script>
                    alert("USUARIO Y CONTRASEÑA CORRECTOS");
                </script>';
            $this->reporte_clave();
            
        }//Fin if
        //else
        {
            echo '<script>
                    alert("LA CLAVE O USUARIO SON INCORRECTOS O NO EXISTEN");
                </script>';
            //$this->inicio();
        }//Fin else

    }

}

?><!DOCTYPE html>
<html lang="en">
<head>
    <title>Regristro de usuario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcon.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min-js"></script>
</head>
<body>

<div class="container">
    <h2>cree un cuenta</h2>
    <form class="form-horizontal" action="registrar-usuario.php" name="username" required>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">usuario</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" maxlength="20" placeholder="Ingresar tu Usuario" name="username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" maxlength="20"
                id="email" placeholder="Enter Email" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Contraseña</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" maxlength="30"
                id="pwd" placeholder="Ingresa una Contraseña" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <label><input type="checkbox" name="remember">recordarme</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn.default">crear</button>
                <button type="button" class="btn btn-defeault" onclick="location.href='login.html'">login</button>
            </div>
        </div>
    </form>
</div>
    
</body>
</html>
