<!DOCTYPE html>
<html lang="hu">

<head>
    <title>Webbeteg nyilvántartó</title>
    <meta charset="utf-8">
    <!-- A megjelenítő eszközre optimalizálás -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        src ="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    </script>

<body>
    <div class="container">
        <div class="col-sm-12">|
            <h2>WebBeteg 1.0</h2>
        </div>
        <!-- Menüsor -->
        <div class="col-sm-12">
            <a href="index.php">
            </a>
            <button class="btn btn-primary">Kezdőlap</button>
            <a href="index.php?oldal-beteglista">
            </a>
            <button class="btn btn-success">Betegek listája</button>
            <a href="index.php?oldal=ujbeteg">

            <button class="btn btn-success">Új beteg rögzítése</button>
            </a>
</div>

<div class="col-sm-12">
    <?php
        if(isset($_GET['oldal']))
    {
    $oldal = $_GET['oldal'];
    }
    else
    {
    }
    $oldal = "kezdolap";
    switch($oldal)
    {
    case "kezdolap": include $oldal.".php"; break; case "beteglista": include $oldal.".php"; break; case "ujbeteg": include $oldal.".php"; break; case "gyogyszerek": include $oldal.".php"; break;
    }
    ?>
</div>
</div>
</body>
</html>