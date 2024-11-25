<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Hőmérséklet átváltása</h2>
    </div>
    <?php
    if (isset($_GET['kuld'])) {
        $celsius = $_GET['celsius'];
        echo "A celsius érték: $celsius C";

        $kelvin = $celsius * 273.15;
        $fahrenheit = $celsius * (9 / 5) + 32;

        echo "<br>Kelvin: $kelvin K";
        echo "<br>Fahrenheit: $fahrenheit F";

        echo "<a href='homerseklet.php'><br>Vissza az űrlaphoz! </a>";
    } else {
        ?>
        <div class="col-sm-6">
            <form action="homerseklet.php" name="adatok" method="GET">
                Hőmérséklet (C):
                <input type="text" name="celsius" placeholder="Írja be!" class="form-control" required>
                <input type="submit" name="kuld" value="Átvált!">
            </form>
        </div>
        <?php
    }
    ?>
</body>

</html>