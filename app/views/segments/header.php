<header><img src="img/logo.jpg">
    <form action="/catalogo" method="GET">
        <input  id ="buscador" type="text" name="nombre" placeholder="Buscar...">
        <button type="submit">Buscar</button>
    </form>
    <?php if (isset($_SESSION["usuario"])): ?>
        <h3><?=$_SESSION["usuario"]["nombre"]?></h3>
    <?php else: ?>
    <a href="/login">Inicio sesion</a>
    <?php endif?>
</header>
