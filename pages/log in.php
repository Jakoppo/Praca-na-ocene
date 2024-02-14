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
          <a href="../main.php">My Website</a>
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
              <a class="nav__link" href="../logout.php">Logout</a>
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
        <h2>Logowanie</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Nazwa użytkownika:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Zaloguj">
    </form>
</section>
</div>
</body>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

$conn = new mysqli($servername, $username, $password, $dbname);

// Dane do logowania
$valid_username = 'user123';
$valid_password = 'password123';

// Sprawdź, czy formularz został przesłany
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sprawdź, czy dane są poprawne
    if ($username === $valid_username && $password === $valid_password) {
        // Dane są poprawne - ustaw zmienną sesji
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php"); // Przekieruj do strony powitalnej
        exit;
    } else {
        // Dane są niepoprawne - wyświetl komunikat
        echo "Nieprawidłowa nazwa użytkownika lub hasło.";
    }
}
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobierz dane z formularza
    $username = $_POST['imie'];
    $password = $_POST['haslo'];

    // Zabezpiecz dane
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Zapytanie do bazy danych
    $sql = "SELECT * FROM `5` WHERE imie='$username' AND haslo='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Użytkownik istnieje w bazie danych - zaloguj go
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header("Location: welcome.php"); // Przekieruj do strony powitalnej
        exit;
    } else {
        // Użytkownik nie istnieje lub błędne hasło - wyświetl komunikat
        echo "Nieprawidłowa nazwa użytkownika lub hasło.";
    }
}

$conn->close();
?>
