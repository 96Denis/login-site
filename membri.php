<?php
$servername = "localhost"; 
$username = "denis"; 
$password = "admin123"; 
$dbname = "denis"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

$sql = "SELECT nume FROM conturi";

$result = $conn->query($sql);

echo "<style>
    body {
    text-align: center;
    background-color: black;
    }
    h2 {
        font-weight: bold;
        animation: rainbow 5s infinite; 
    }

    @keyframes rainbow {
        0% { color: red; }
        16% { color: orange; }
        33% { color: yellow; }
        50% { color: green; }
        66% { color: blue; }
        83% { color: indigo; }
        100% { color: violet; }
    }

    table {
        border-collapse: collapse;
        width: 15%;
        margin: 20px auto;
    }

    th, td {
        border: 4px solid grey;
        padding: 2px;
        text-align: center;
        color: white;
    }

    th {
        background-color: ;
    }
</style>";

echo "<h2>Membrii comunității</h2>";
echo "<table>";
echo "<tr><th>Nume</th></tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["nume"] . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='1'>Nu există rezultate în tabelul 'conturi'.</td></tr>";
}

echo "</table>";

$conn->close();
?>
