#!/usr/local/bin/php
<?php
    session_save_path(__DIR__ . '/sessions/');
    session_name('login_w_password');
    session_start();

    // Store whether someone made an incorrect pasword?
    $incorrect_submission = false;

    // If a password has been submitted, check it and update $incorrect_submiss and $_Su
    if (isset($_POST['passwordSubmitted'])){
        validate($_POST['passwordSubmitted'], $incorrect_submission);
    }

    function validate($submission, &$incorrect_submission){
        $file = fopen('h_password.txt', 'r') or die('Unable to find the hashed password');

        $hashed_password = fgets($file);
        $hashed_password = trim($hashed_password);

        fclose($file);

        $hashed_submission = hash('md2', $submission);

        if ($hashed_submission !== $hashed_password) {
            $_SESSION['loggedin'] = false;
            $incorrect_submission = true;
        }
        else {
            $_SESSION['loggedin'] = true;
            header('Location: welcome.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Shut The Box</title>
    </head>

    <body>
        <header>
            <h1>Welcome! Ready to play "Shut The Box"?</h1>
        </header>

        <main>
            <section>
                <h2>Login</h2>
                <p>In order to play you need the password.</p>
                <p>If you know, please enter it below and login.</p>
                <fieldset>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <label for="passwordEntry">Password: </label>
                        <input id="passwordEntry" type="password" name="passwordSubmitted">
                        <input type="submit" value="Login" id= "button1">
                    </form>
                </fieldset>
                <?php
                    if ($incorrect_submission){
                        echo '<p>Invalid password!</p>';
                    }
                ?>
            </section>

            <footer>
                <hr>
                <small>
                    &copy; Will Stonehouse Salinas, 2020
                </small>
            </footer>
        </main>
    </body>
</html>