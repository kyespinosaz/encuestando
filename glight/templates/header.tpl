<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />    
        <link rel="stylesheet" href="assets/css/main.css" />

        <title>{$title}</title>


        <nav role="navigation" class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{$gvar.l_global}login.php"><b class="navbar-brand" >ENCUESTANDO</b></a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    {if isset($smarty.session.persona) && $smarty.get.option neq 'logout'} 
                        {if $smarty.session.persona.rol == "representante"}
                            <li><a href="{$gvar.l_global}suscribir_empresa.php">Suscribir empresa</a></li>
                            <li><a href=#>Crear encuesta</a></li>
                            <li><a href=#>Realizar pago</a></li>
                            <li><a href=#>Eliminar producto</a></li>
                            <li><a href=#>Agregar pregunta</a></li>
                            <li><a href=#>Buscar producto</a></li>
                            <li><a href=#>Crear producto</a></li>
                            <li><a href=#>Editar producto</a></li>
                        {/if}

                        {if $smarty.session.persona.rol == "usuario"}
                            <li><a href="{$gvar.l_global}c_buscar_encuesta.php">Buscar encuesta</a></li>
                            <li><a href=#>Realizar canje</a></li>
                            <li><a href=#>Responder encuesta</a></li>
                        {/if}

                        {if $smarty.session.persona.rol == "administrador"}
                            <a href="{$gvar.l_global}c_crear_plan.php">Crear plan</a>
                        {/if}
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{$gvar.l_global}login.php?option=logout">{$gvar.n_logout}</a>
                    </ul>
                {/if}
            </div>
        </nav>
    </head>
