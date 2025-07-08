<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Log Waktu</title>
  <style>
    body {
      font-family: sans-serif;
      background: #e3f2fd;
      padding: 40px;
      text-align: center;
    }
    h2 {
      color: #333;
    }
    ul {
      list-style-type: none;
      padding: 0;
    }
    li {
      background-color: #ffffff;
      padding: 10px;
      margin: 8px auto;
      border-radius: 8px;
      width: 150px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    button, a {
      margin-top: 20px;
      padding: 10px 20px;
      border-radius: 6px;
      background:rgb(243, 33, 33);
      color: white;
      text-decoration: none;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Log Waktu yang Tersimpan</h2>
  <ul>
    <?php
    if (isset($_SESSION['log']) && count($_SESSION['log']) > 0) {
        foreach ($_SESSION['log'] as $time) {
            $minutes = floor($time / 60);
            $seconds = $time % 60;
            echo "<li>" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" .
                str_pad($seconds, 2, "0", STR_PAD_LEFT) . "</li>";
        }
    } else {
        echo "<li>Belum ada data</li>";
    }
    ?>
  </ul>
  <form method="post">
    <button type="submit" name="clear">Hapus Semua Log</button>
  </form>
  <br>
  <a href="index.html">Kembali ke Timer</a>

  <?php
  if (isset($_POST['clear'])) {
      $_SESSION['log'] = [];
      header("Location: log.php");
  }
  ?>
</body>
</html>
