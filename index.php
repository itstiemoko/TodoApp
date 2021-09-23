<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="login.css">
        <title>Page de connexion</title>
    </head>
    <body>
        <form class="box-form" method="POST" action="backend/result.php">
            <h1 class="login">Connexion</h1>
            <p><input type="text" name="username" placeholder="Votre nom..." required></p>
            <p><input type="password" name="password" placeholder="Votre mot de passe..." required></p>
            <p><input type="submit" value="Envoyer"></p>
        </form>
    </body>
</html>