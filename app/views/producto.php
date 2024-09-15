<!DOCTYPE html>
<html>
<head> 
    <link href="styles/style.css" rel="stylesheet" type="text/css">
    <link href="styles/style2.css" rel="stylesheet" type="text/css">
    <script src="scripts/script.js"></script>
    <meta charset="UTF-8" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Eiffel Importaciones</title>
</head>
<body>
    <?php include  "segments/header.php" ?>
    <?php include  "segments/nav.php"    ?>


    <div id="back" onclick="history.back()"> 
        <img src="img/angle-left.png"> <p>[Pagina anterior]</p>
    </div>

    <div id=container>    
        <div id="producto">
            <img src="img/<?=$prd["imagen"]?>">
        </div>

        <div id="info">
            <h2><?=$prd["nombre"]?></h2>
            <hr style="width:100%;"> </hr>
            <br>
            <p><?=$prd["descripcion"]?></p>

            <div id="table">
                <table>
                <tr>
                    <th> CATEGORIA</th>
                    <td><?=$prd["categoria"]?></td>
                </tr>
                <tr>
                    <th> CATEGORIA</th>
                    <td><?=$prd["subcategoria"]?></td>
                </tr>
                </table> 
            </div>
        </div>

        <div id="compra">
            <h1> Precio: <span id="precio"> UYU <?=$prd["precio"]?> </span> </h1>
            <br>
            
            <div id="quitaragregar">
                Cantidad  <button onclick="quitar()">-</button>
                <input type="number" id="cantidad" value="1" min="1" max="99" readonly>
                <button onclick="agregar()">+</button>    
            </div>

            <div id="botones">
                <button> Comprar producto ya</button>
                <button> Añadir a carrito </button>
            </div>
       
        </div>
    </div>

    <?php include  "segments/footer.php" ?>
</body>
</html>