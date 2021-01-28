#!/usr/local/bin/php
<?php
    session_save_path(__DIR__ . '/sessions/');
    session_name('login_w_password');
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
        $welcome = true;
    }
    else{
        $welcome = false;
    }
    
    if ($welcome === false){
        header('Location: login.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Shut The Box</title>
        <script src="welcome.js" defer></script>
        <script src="username.js" defer></script>
    </head>

    <body>

        <header>
            <h1>Welcome! Ready to play "Shut The Box"?</h1>
        </header>

        <section>
            <h2>Choose a username</h2>
            <p>So that we can post your score(s), please choose a username.</p>
            <fieldset>
                <label>Username:</label>
                <input id="textboxId" type="text" value=''>
                <input id="button2" type="button" value="Submit" onclick="create_cookie();">
            </fieldset>
        </section>

        <footer>
            <hr>
            <small>
                &copy; Will Stonehouse Salinas, 2020
            </small>
        </footer>

    </body>

</html>