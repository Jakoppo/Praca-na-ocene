<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$pesel = $_POST['pesel'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


if ($password !== $confirm_password) {
    die("Hasła się nie zgadzają");
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO `5` (Pesel, Wiek, Plec, Imie, Nazwisko, haslo) 
        VALUES ('$pesel', $age, '$gender', '$first_name', '$last_name', '$hashed_password')";


if ($conn->query($sql) === TRUE) {
    echo "Rejestracja zakończona pomyślnie";
    echo " <button><a href='../main.php'>back</a></button>";
} else {
    echo "Błąd podczas rejestracji: " . $conn->error;
}

$conn->close();
?>
