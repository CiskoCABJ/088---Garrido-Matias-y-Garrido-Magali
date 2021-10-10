{include file='templates/header.tpl'}

<h1>{$titulo}</h1>
<form action="verifyregister" method="POST">
    <input type="mail" name="mail" placeholder="ejemplo@ejemplo.com" value="">
    <input type="text" name="usuario" placeholder="Nombre de Usuario" value="">
    <input type="password" name="pass" placeholder="Contraseña" value="">
     
<input type="submit" value="CREAR" >
<a href="Login">Ya tenes cuenta? Ingresa</a>


<h4>{$error}</h4>

</form>