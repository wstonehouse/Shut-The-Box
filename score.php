#!/usr/local/bin/php
<?php header('Content-Type: text/plain; charset=utf-8');
    // Retrieve info via query
    $username = $_POST['username'];
    $score = $_POST['box_score'];
    // Open file
    $file = @fopen('scores.txt', 'a') or die("Unable to open file!");
    // String with score and username
    $line = $username . ' ' . $score . "\n";
    // Write to text file
    fwrite($file, $line);
    // Close
    fclose($file);
?>