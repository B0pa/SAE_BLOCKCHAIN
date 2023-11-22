<?php
    if(isset($_POST['submit'])){
        header('Location: home.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" />
</head>
<body>
<h1>Login</h1>
<main>

    <form action="">
        <img src="" alt="image login">
        <div>
            <label for="identifié">identifiant</label>
            <input type="text" id="identifié" >
        </div>


        <div>
            <label for="password">mot de passe</label>
            <input type="password" id="password">
        </div>

        <input type="submit" name="submit" value="Se connecter">
    </form>



</main>
</body>
</html>
