<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("database.php");
session_start(); // Session indítása

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        // Ellenőrizzük, hogy a felhasználónév és jelszó nem üres
        if (!empty($username) && !empty($password)) {
            // Felhasználó keresése az adatbázisban
            $sql = "SELECT * FROM Accounts WHERE username='$username'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                // Ellenőrizd a jelszót
                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $user['username']; // Mentse el a felhasználónevet
                    echo "Sikeres bejelentkezés!";
                    header("../main/index.php");
                    exit();
                } else {
                    echo "Hibás jelszó!";
                }
            } else {
                echo "Felhasználónév nem található!";
            }
        } else {
            echo "Felhasználónév és jelszó nem lehet üres!";
        }
    } else {
        echo "Kérjük, töltse ki az összes mezőt!";
    }
}
?>
