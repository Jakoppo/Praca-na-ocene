

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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_select = "SELECT * FROM `5` WHERE id=$id";
    $result = $conn->query($sql_select);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $first_name = $row['Imie'];
        $last_name = $row['Nazwisko'];
        $age = $row['Wiek'];
        $gender = $row['Plec'];
        $pesel = $row['Pesel'];
    } else {
        echo "Nie znaleziono użytkownika o podanym ID";
        exit();
    }
}

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
              <a class="nav__link" href="">.</a>
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
    <h2>Edycja danych</h2>

    <form action="edt.php" method="post">
        <input type="hidden" name="edit" value="<?php echo $id; ?>">
        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" required>
        <br>
        
        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>" required>
        <br>
        
        <label for="age">Wiek:</label>
        <input type="number" id="age" name="age" value="<?php echo $age; ?>" required>
        <br>
        
        <label for="gender">Płeć:</label>
        <select id="gender" name="gender" required>
            <option value="male" <?php echo $gender === 'male' ? 'selected' : ''; ?>>Mężczyzna</option>
            <option value="female" <?php echo $gender === 'female' ? 'selected' : ''; ?>>Kobieta</option>
        </select>
        <br>

        <label for="pesel">PESEL:</label>
        <input type="text" id="pesel" name="pesel" value="<?php echo $pesel; ?>" required>
        <br>
        
        <input type="submit" value="Zapisz zmiany">
    </form>
    </section>
      </div>
    </main>
    <footer>
      <div class="container">footer</div>
</footer>
</body>
</html>
