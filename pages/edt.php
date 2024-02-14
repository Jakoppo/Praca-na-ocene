<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obsługa edycji danych
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $pesel = $_POST['pesel'];

    $sql_update = "UPDATE `5` SET Imie='$first_name', Nazwisko='$last_name', Wiek=$age, Plec='$gender', Pesel='$pesel' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        echo "Dane zostały zaktualizowane pomyślnie";
    } else {
        echo "Błąd podczas aktualizacji danych: " . $conn->error;
    }
}

$sql_select = "SELECT * FROM `5`";
$result = $conn->query($sql_select);

$conn->close();
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My World</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <header class="header">
      <div class="container">
        <div class="branding">
          <a href="/">My Website</a>
        </div>

        <nav class="nav">
          <ul class="nav__list">
          <li class="nav__item">
              <a class="nav__link" href="">.</a>
            </li>
            <li class="nav__item">
              <a class="nav__link" href="index.php">Tabela</a>
            </li>
            <li class="nav__item">
              <a class="nav__link" href="../main.php">Rejestracja</a>
            </li>
            <li class="nav__item">
              <a class="nav__link" href="">.</a>
            </li>
            <li class="nav__item">
              <a class="nav__link" href="">.</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="main">
      <div class="container">
        <section>
    <body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
    <h2>Edycja danych</h2>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Wiek</th>
                <th>Płeć</th>
                <th>PESEL</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["Imie"] . "</td>";
                    echo "<td>" . $row["Nazwisko"] . "</td>";
                    echo "<td>" . $row["Wiek"] . "</td>";
                    echo "<td>" . $row["Plec"] . "</td>";
                    echo "<td>" . $row["Pesel"] . "</td>";
                    echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edytuj</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Brak danych do wyświetlenia.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </section>
      </div>
    </main>
    <footer>
      <div class="container">footer</div>
</footer>
</body>
</html>