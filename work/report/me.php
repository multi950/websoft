<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ME!</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>

<?php 
        $pageIndex = 4;
        include 'views\menu.php';?>

<div class="content">
<article>

<p><img src="img/me.png" width="30%" alt="Me on an image" style="border-radius: 100%; margin-left: 35%;" ></p>

<p style="text-align: center;">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
     Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
       Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

</article>
</div>
<footer>
    <?php include 'views\footer.html';?>
</footer>


<?php include 'views\bird.html';?>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
