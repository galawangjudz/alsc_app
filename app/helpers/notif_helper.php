<?php 


function flash()
{
    if (isset($_SESSION['flash'])) {
        $type = $_SESSION['flash']['type'];
        $message = $_SESSION['flash']['message'];

        echo "<div class='alert alert-{$type}'>{$message}</div>";

        unset($_SESSION['flash']); // Clear after showing
    }
}
