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
    $numarCard = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
    $dataExpirare = isset($_POST['expiryDate']) ? $_POST['expiryDate'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    $sql = "INSERT INTO carduri (`numar card`, `data expirare`, `cvv`) VALUES ('$numarCard', '$dataExpirare', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "Plata a fost înregistrată cu succes! Urmeaza sa fiți redirecționați...";
        echo '<script>
                        setTimeout(function() {
                            window.location.href = "conectare.html";
                        }, 3000);
                      </script>';
    } else {
        echo "Eroare la înregistrarea plății: " . $conn->error;
    }

    $conn->close();
}
?>
