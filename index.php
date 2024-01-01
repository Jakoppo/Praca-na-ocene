<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzanie połączenia
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Zapytanie SQL z klauzulą ORDER BY
$sql = "SELECT * FROM nazwa_tabeli ORDER BY nazwa_kolumny";

// Wykonanie zapytania
$result = $conn->query($sql);

// Sprawdzenie, czy zapytanie zwróciło wyniki
if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Kolumna1</th><th>Kolumna2</th></tr>";

    // Wyświetlanie wyników
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["kolumna1"] . "</td><td>" . $row["kolumna2"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "Brak danych do wyświetlenia.";
}

// Zamykanie połączenia
$conn->close();
?>
