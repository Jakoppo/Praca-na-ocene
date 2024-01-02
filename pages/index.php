<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "5";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM nazwa_tabeli ORDER BY nazwa_kolumny";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Kolumna1</th><th>Kolumna2</th></tr>";

    
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["kolumna1"] . "</td><td>" . $row["kolumna2"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Brak danych do wyświetlenia.";
}


$conn->close();
?>
