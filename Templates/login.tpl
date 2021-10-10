{include file='templates/header.tpl'}

<h1>{$titulo}</h1>
<form action="verify" method="POST">
    <input type="text" name="usuario" placeholder="Nombre de Usuario" value="">
    <input type="password" name="pass" placeholder="Contraseña" value="">
<input type="submit" value="INGRESAR" >
<a href="registro">Crear cuenta</a>


<h4>{$error}</h4>

</form>