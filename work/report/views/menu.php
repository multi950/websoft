<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/menu-style.css">
    <script type="text/javascript"></script>
    <script src="js/jquery-3.4.1.js"></script>

</head>

<body>
    <div class="menu">
        <ul class="menu-list">
            <li><a class="menu-item" href="#">Menu</a>
                <ul class="sub-menu">
                    <li><a href="../s01/">S01</a></li>
                </ul>
            </li>
            <li><a class="menu-item" href="schools.php">Schools</a></li>
            <li><a class="menu-item" href="report.php">Report</a></li>
            <li><a class="menu-item" href="about.php">About course</a></li>
            <li><a class="menu-item" href="me.php">About me</a></li>
            <li class="right-list-item"><a class="menu-item language-icon"></a>

                <ul id="language-submenu" class="sub-menu">
                    <li><?php include 'views\flags.html';?></li>
                </ul>
            </li>

            <script>
                $('.menu-item').eq( <?php echo $pageIndex ?> ).addClass('selected');
            </script>


        </ul>
    </div>

    <script>
        var flagElementList = document.getElementsByClassName("flag");
        var LanguageSubMenuElement = document.getElementById("language-submenu");
        for (var i = 0; i < flagElementList.length; i++) {
            flagElementList[i].onclick = function () {
                console.log(this.id + " selected");
                LanguageSubMenuElement.classList.add('close');
                setTimeout(function () {
                    LanguageSubMenuElement.classList.remove('close');
                }, 500);
            }
        }
    </script>
</body>

</html>