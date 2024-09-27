<title><?=getenv("APP_NAME")?></title>
<link rel="stylesheet" href="/static/css/user_form.css">


<div class="form-container">
    <h2><?=$title ?? ucfirst($mode) . " User"?></h2>

    <form id="dataForm" method="POST" action=<?=$action?>>

        <?php if (isset($method)):?>
            <input type="hidden" name="_method" value=<?=$method?>>
        <?php endif ?>

        <div class="form-group">
            <?php if ($mode=="registro"):?>
                <label for="nombre">Nombre:</label>
                <input id="nombre" name="nombre" type="text" placeholder="user name" value="<?=$name ?? ""?>">
            <?php endif?>

            <label for="email">Email:</label>
            <input id="email" name="email" type="email"  placeholder="email" value="<?=$email ?? ""?>">

            <label for="contraseña">Contraseña:</label>
            <input id="contraseña" name="contraseña" type="password" placeholder="password">

            <?php if ($mode=="registro"):?>
                <label for="repass">Confirme la Contraseña:</label>
                <input id="repass" name="repass" type="password" placeholder="confirme password">
            <?php endif ?>
        </div>

        <?php if (isset($data["msg"])):?>
            <div class="divmsg">
                <div><?=$data["msg"]?></div>
            </div>
        <?php endif?>

        <div class="button-group">
            <?php if ($mode=="login"):?>
                <button>LOGIN</button>
                <p><a href="/registro">Registrarse</a></p>
            <?php else:?>
                <button>Confirmar</button>
                <p><a href="/login">Loguearse</a></p>
            <?php endif?>
            <button type="button" onclick="location.href='/';">Cancelar</button>
        </div>
    </form>
</div>