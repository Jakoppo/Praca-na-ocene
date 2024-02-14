<?php
session_start();
// Zniszcz zmienną sesji
session_destroy();
// Przekieruj użytkownika do strony logowania
header("Location:log in.php");
exit;
?>
