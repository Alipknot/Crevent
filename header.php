<?php
session_start();
$comp=0;
if(isset($_SESSION['id'])){
$comp=1;

}
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Crevent</title>
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
        rel="stylesheet" type="text/css">
        <script>
            $(document).ready(function(){
            //Handles menu drop down
            $('.dropdown-menu').find('form').click(function (e) {
                e.stopPropagation();
            });
        });
        </script>
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
        rel="stylesheet" type="text/css">
    </head>

    <body>
        <div class="navbar navbar-default navbar-fixed-top navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Crevent</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="index.html">Inicio</a>
                        </li>
                        <?php
                        if($comp===0){
                        ?>
                        <li>
                            <a href="Registro.html">Registrarse</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ingresar <strong class="caret"></strong></a>
                            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
                                <form method="post" action="login.php" accept-charset="UTF-8">
                                    <input style="margin-bottom: 15px;" type="text" placeholder="Usuario"
                                    id="username" name="user_name">
                                    <input style="margin-bottom: 15px;" type="password" placeholder="Password"
                                    id="password" name="password">
                                    <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me"
                                    id="remember-me" value="1">
                                    <label class="string optional" for="user_remember_me">Recordarme</label>
                                    <input class="btn btn-primary btn-block" type="submit"
                                    id="sign-in" value="Ingresar">
                                </form>
                            </div>
                        </li>
                        <?php
                      }elseif ($comp===1) {
                        # code...

                        ?>
                        <li>  <a href="Buscar.php">Buscar</a></li>
                        <li>
                            <a href="Logout.php">Desconectar</a>
                        </li>

                        <?php
                      }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
