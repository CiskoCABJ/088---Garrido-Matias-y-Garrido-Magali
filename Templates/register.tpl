{include file='templates/header.tpl'}

<h1 class="titulo-seccion">{$titulo}</h1>
<div class="jc-center d-flex-column form-genero">

    <form class="d-flex-column" action="verifyregister" method="POST">
        <input type="mail" name="mail" placeholder="ejemplo@ejemplo.com" value="">
        <input type="text" name="usuario" placeholder="Nombre de Usuario" value="">
        <input type="password" name="pass" placeholder="Contraseña" value="">
        <input class="btn" type="submit" value="CREAR" >
    </form>
    <h4>{$error}</h4>
    
    <a class="btn texto-centrado" href="Login">Ya tenes cuenta? Ingresa</a>
</div>