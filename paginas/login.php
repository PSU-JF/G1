<?php
/*require('logica/log_empleado.php');*/
class Login
{
    function inicio()
    {
        require('login/login_inicio.php');
    }

    public function reporte_clave()
    {
        /*Instanciar */
        $reporte=new log_empleado(null,null,null,null,null,null);
        /*Llamar al formulario principal*/
        $imp=$reporte->reporte_gral();
        //Llamar formulario login inicio
        include("pagina/inicio.php");
    }

    public function ingreso()
    {
        /*Verificar la llegada de datos */
        $usu1=$_POST['tx_user'];
        $pass1=$_POST['tx_pass'];
        
        //Instanciar
        $user=new log_empleado(null,$pass1,$usu1,null,null,null);
        /*Esperar respuesta */
        $res1=$user->login_empleado();
        /*Validar respuesta */
        if ($res1!=1)
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

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card px-5 py-5" id="form1">
                <div class="form-data" v-if="!submitted">
                    <div class="forms-inputs mb-4"> <span>Email/usuario</span> <input autocomplete="off" type="text" v-model="email" v-bind:class="{'form-control':true, 'is-invalid' : !validEmail(email) && emailBlured}" v-on:blur="emailBlured = true">
                        <div class="invalid-feedback">validar correo</div>
                    </div>
                    <div class="forms-inputs mb-4"> <span>Password</span> <input autocomplete="off" type="password" v-model="password" v-bind:class="{'form-control':true, 'is-invalid' : !validPassword(password) && passwordBlured}" v-on:blur="passwordBlured = true">
                        <div class="invalid-feedback">password 8 caracteres</div>
                    </div>
                    <div class="mb-3"> <button v-on:click.stop.prevent="submit" class="btn btn-dark w-100">Login</button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>
