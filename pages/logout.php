<?php
    session_start();
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    session_unset();
    session_destroy();

    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';
    header("Location: " . BASE_URL . "index.php");
    exit;
?>