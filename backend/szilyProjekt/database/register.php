<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $username = mysqli_real_escape_string($connect, $_POST['username']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        // Ellenőrizzük, hogy a felhasználónév és jelszó nem üres
        if (!empty($username) && !empty($password))
        {
            // Jelszó hashelés
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Lekérdezés az új felhasználó létrehozásához
            $sql = "INSERT INTO Accounts (username, password) VALUES ('$username', '$hashed_password')";

            if (mysqli_query($connect, $sql))
            {
                // Az új felhasználó ID-jának lekérdezése
                $user_id = mysqli_insert_id($connect);

                // Létrehozzuk az új PHP fájlt a felhasználó ID alapján
                $filename = "../pages/profiles/" . $user_id . ".php";
                $file_content = "<?php\n";
                $file_content .= "echo 'Üdvözöllek, " . $username . "! Ez a te saját profil oldalad.';\n";
                $file_content .= "?>";

                // A fájl létrehozása és tartalmának írása
                if (file_put_contents($filename, $file_content))
                {
                    echo "Sikeres regisztráció és fájl létrehozva: " . $filename;
                } 
                else 
                {
                    echo "Sikeres regisztráció, de a fájl létrehozása sikertelen.";
                }
            } 
            else 
            {
                echo "Hiba történt: " . mysqli_error($connect);
            }
        } 
        else 
        {
            echo "Felhasználónév és jelszó nem lehet üres!";
        }
    } 
    else 
    {
        echo "Kérjük, töltse ki az összes mezőt!";
    }
}
?>
