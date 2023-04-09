<?php
session_start();
$currentPage = basename($_SERVER['PHP_SELF']);
  $navLinks = array(
    'home.php' => 'Home page',
    'createAccount.php' => 'Create an account',
    'find.php' => 'Find a cat/dog',
    'dcare.php' => 'Dog Care',
    'ccare.php' => 'Cat Care',
    'give.php' => 'Have a Pet to Give Away',
    'contact.php' => 'Contact Us'
  );
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $pageTitle; ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet">
<script src="eventhandler.js">
</script>
</head>
<body>
<header>
  <table>
    <tr>
      <th style="font-size: 70px;">
        <a id="name" href="home.html">Plus's Adoption Center</a>
      </th>
      <th>
        <a href="home.php">
          <img src="aaaa.png" alt="logo" width="140" height="120">
        </a>
      </th>
    </tr>
  </table>
  <div id="logout">
    <button onclick="logout()">Log Out</button>
  </div>
  <div id="timecontainer">
    <p id="time"></p>
  </div>
</header>
<div class="section">
  <nav>
    <ul id="navigation">
      <?php
        foreach ($navLinks as $link => $title) {
          if ($currentPage == $link) {
            echo '<li class="bar"><a class="active" href="' . $link . '">' . $title . '</a></li>';
          } else {
            echo '<li class="bar"><a href="' . $link . '">' . $title . '</a></li>';
          }
        }
      ?>
    </ul>
  </nav>
  