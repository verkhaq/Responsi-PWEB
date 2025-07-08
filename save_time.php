<?php
session_start();

if (!isset($_SESSION['log'])) {
    $_SESSION['log'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['time'])) {
    $time = intval($_POST['time']);
    $_SESSION['log'][] = $time;
}
?>
