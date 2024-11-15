<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "denis";
    $password = "admin123";
    $dbname = "denis";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexiunea la baza de date a eșuat: " . $conn->connect_error);
    }

    // Datele de la formular
    $numeUtilizator = isset($_POST['nume']) ? $_POST['nume'] : '';
    $parola = isset($_POST['parola']) ? $_POST['parola'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    if (empty($numeUtilizator) || empty($parola)) {
        echo "Eroare: Numele și parola sunt obligatorii.";
    } else {
        if ($parola != $confirmPassword) {
            echo "Eroare: Parolele introduse nu coincid.";
        } else {
            $hashedPassword = password_hash($parola, PASSWORD_DEFAULT);

            $sql = "INSERT INTO conturi (nume, parola) VALUES ('$numeUtilizator', '$hashedPassword')";

            if ($conn->query($sql) === TRUE) {
                echo "Contul a fost creat cu succes!Urmeaza sa fiți redirecționați...";
                echo '<script>
                        setTimeout(function() {
                            window.location.href = "membri.php";
                        }, 3000);
                      </script>';
            } else {
                echo "Eroare la crearea contului: " . $conn->error;
            }
        }
    }
    $conn->close();
}
?>
