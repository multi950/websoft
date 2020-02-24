<!DOCTYPE html>
<html>

<head>
    <base href="/home/OneDrive/Dokument/Webdevelopment/Git/websoft/work/"> 
    <link rel="stylesheet" href="report/css/menu-style.css">
    <script type="text/javascript"></script>
    <script src="report/js/jquery-3.4.1.js"></script>

</head>

<body>
    <div class="menu">
        <ul class="menu-list">
        <li><a class="menu-item" >Menu</a>
                <ul class="sub-menu">
                    <li><a href="s01/">S01</a></li>
                </ul>
            </li>
            <li><a class="menu-item" >Database</a>
                <ul class="sub-menu">
                    <li><a href="php/database/search.php">Search</a></li>
                    <li><a href="php/database/create.php">Create</a></li>
                    <li><a href="php/database/read.php">Read</a></li>
                    <li><a href="php/database/update.php">Update</a></li>
                    <li><a href="php/database/delete.php">Delete</a></li>

                </ul>
            </li>
            <li><a class="menu-item" href="report/schools.php">Schools</a></li>
            <li><a class="menu-item" href="report/report.php">Report</a></li>
            <li><a class="menu-item" href="report/about.php">About course</a></li>
            <li><a class="menu-item" href="report/me.php">About me</a></li>
            <li class="right-list-item"><a class="menu-item language-icon"></a>

                <ul id="language-submenu" class="sub-menu">
                    <li><?php include __DIR__ . '\flags.html';?></li>
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