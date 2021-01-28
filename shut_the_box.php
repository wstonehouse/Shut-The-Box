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

    // Cookies code here
    if (!isset($_COOKIE['username'])) {
        header('Location: welcome.php');
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Shut The Box</title>
        <script src="username.js" defer></script>
        <script src="shut_the_box.js" defer></script>
    </head>

    <body>

        <header>
            <h1>Shut The Box</h1>
        </header>

        <main>
            <h2>The Rules</h2>
            <ol type="i">
                <li>Each turn, you roll the dice (or die) and select 1 or more boxes which sum to the value of your roll. </li>
                <li>You will not be allowed to pick the boxes which you choose on subsequent turns.</li>
                <li>When the sum of the boxes which are left is less than or equal to 6, you will only roll a single dice.</li>
                <li>When you cannot make a move or you give up, the sum of the boxes which are left gives your score.</li>
                <li>Lower scores are better and a score of 0 is "shutting the box".</li>
            </ol>
            <h2>Dice roll</h2>
            <fieldset>
                <input type="button" value="Roll dice" onclick="roll_dice();" id="dice_button">
                <span>Result: </span>
                <span></span> <!-- Display results here -->
            </fieldset>
            <h2>Box Selection</h2>
            <table>
                <tr>
                    <th class="box">1</th>
                    <th class="box">2</th>
                    <th class="box">3</th>
                    <th class="box">4</th>
                    <th class="box">5</th>
                    <th class="box">6</th>
                    <th class="box">7</th>
                    <th class="box">8</th>
                    <th class="box">9</th>
                </tr>
                <tr>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                    <td><input type="checkbox" class="check"></td>
                </tr>
            </table>
            <fieldset>
                <input type="button" value="Submit box selection" id="submit_box" onclick="check_submission();">
                <input type="button" value="I give up/I can't make a valid move" id="give_up" onclick="finish();">
            </fieldset>
        </main>

    <footer>
        <hr>
        <small>
            &copy; Will Stonehouse Salinas, 2020
        </small>
    </footer>
    
    <br>
    <br>
    <br>

    </body>

</html>