<!DOCTYPE html>
<html lang="en">
<?php
echo'
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
    <link rel="stylesheet" href="css/style.css" />
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
              <a class="nav__link" href="login.php">Logowanie</a>
            </li>
            <li class="nav__item">
              <a class="nav__link" href="">.</a>
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
        <h2>Formularz rejestracyjny</h2>
        <form action="pages/rejest.php" method="post">
        <label for="pesel">PESEL:</label>
        <input type="number" id="pesel" name="pesel" required>
        <br>
        
        <label for="age">Wiek:</label>
        <input type="number" id="age" name="age" required>
        <br>
        
        <label for="gender">Płeć:</label>
        <select id="gender" name="gender" required>
            <option value="male">Mężczyzna</option>
            <option value="female">Kobieta</option>
        </select>
        <br>

        <label for="first_name">Imię:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>

        <label for="last_name">Nazwisko:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>
        
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password" required>
        <br>
        
        <label for="confirm_password">Potwierdź hasło:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <br>
        
        <input type="submit" value="Zarejestruj">
    </form>

      
        </section>
      </div>
    </main>
   
    <footer>
      <div class="container">footer</div>
    </footer>
  </body>
</html>'
?>