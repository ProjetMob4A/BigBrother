<!DOCTYPE html>

<html>

  <head>

    <meta charset="UTF-8" />

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="img/title.png" />

    <title>Elections 2017</title>

  </head>

  <body>

    <?php

      session_start();

      if ($_SESSION['password_checked'] != 1)

        header('Location: index.html');
    
    ?>

    <img src="img/title.png" alt="elections 2017" />

    <h2> Vérification de votre identité à l'aide de votre token sécurisé </h2>

    <h3> Veuillez brancher votre token et cliquer sur « Prêt » </h3>

    <form name="connexion" method="post" action="intermediaire_token.php">

    <table>

      <tr><td><input type="submit" name="Nom" value="Prêt"></td>

      <td></td></tr>

    </table>

    </form>

  </body>



</html>
