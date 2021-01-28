#!/usr/local/bin/php
<?php
    session_save_path(__DIR__ . '/sessions/');
    session_name('login_w_password');
    session_start();

    if ($_SESSION['loggedin'] === false){
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
        <script src="scores.js" defer></script>
    </head>

    <body>
        <header>
            <h1>Shut The Box</h1>
        </header>
        <main>
            <section>
            <h2>Scores</h2>
            <p>Well done! Here are the scores so far...</p>
            <p id="response"></p>
            </section>
            <fieldset>
                <input id="button3" type="button" value="PLAY AGAIN!!!" onclick="window.location.href='welcome.php'">
            </fieldset>
            <fieldset>
                <input id="button4" type="button" value="Force update / start updating" onclick="force_print()">
                <input id="button5" type="button" value="Stop updating" onclick="stop_printing()">
            </fieldset>
        </main>
        <footer>
            <hr>
            <small>
                &copy; Will Stonehouse Salinas, 2020
            </small>
        </footer>
    </body>
</html>