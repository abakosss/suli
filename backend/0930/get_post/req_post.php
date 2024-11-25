<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <title>POST kérés bemutatása</title>
</head>

<body>
    <form method="POST" action="req_post.php"> 
        Név: <input type="text" name="name"> 
        <input type="submit" value="Küldés">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        echo "Hello, " . $name . "!";
    }
    ?>
</body>

</html>