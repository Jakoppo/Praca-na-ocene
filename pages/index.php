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

// Domyślne sortowanie po ID
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'id';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// Validate and sanitize user input for order_by to prevent SQL injection
$valid_columns = ['id', 'imie', 'nazwisko']; // Add valid column names here
$order_by = in_array($order_by, $valid_columns) ? $order_by : 'id';

// Validate and sanitize user input for order to prevent SQL injection
$valid_orders = ['ASC', 'DESC']; // Add valid orders here
$order = in_array($order, $valid_orders) ? $order : 'ASC';

// Pobranie danych z bazy danych i sortowanie
$sql = "SELECT * FROM `5` ORDER BY $order_by $order";
$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My World</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet" />
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
                        <a class="nav__link" href="edt.php">Tabela</a>
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
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }

                    th,
                    td {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    th {
                        cursor: pointer;
                    }
                </style>

                <h2>Sortowanie w tabeli</h2>

                <table>
                    <thead>
                        <tr>
                            <th><a href="?order_by=id&order=<?= $order === "ASC" ? "DESC" : "ASC" ?>">ID</a></th>
                            <th><a href="?order_by=imie&order=<?= $order === "ASC" ? "DESC" : "ASC" ?>">Imię</a></th>
                            <th><a href="?order_by=nazwisko&order=<?= $order === "ASC" ? "DESC" : "ASC" ?>">Nazwisko</a></th>
                            <th><a href="?order_by=wiek&order=<?= $order === "ASC" ? "DESC" : "ASC" ?>">Wiek</a></th>
                            <th><a href="?order_by=plec&order=<?= $order === "ASC" ? "DESC" : "ASC" ?>">Płeć</a></th>
                            <th><a href="?order_by=pesel&order=<?= $order === "ASC" ? "DESC" : "ASC" ?>">PESEL</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["Imie"] . "</td>";
                                echo "<td>" . $row["Nazwisko"] . "</td>";
                                echo "<td>" . $row["Wiek"] . "</td>";
                                echo "<td>" . $row["Plec"] . "</td>";
                                echo "<td>" . $row["Pesel"] . "</td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Brak danych do wyświetlenia.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <form action="logout.php" method="post">
                    <input type="submit" value="Wyloguj">
                </form>
            </section>
        </div>
    </main>
    <footer>
        <div class="container">footer</div>
    </footer>
</body>

</html>
<?php
$conn->close();
?>
