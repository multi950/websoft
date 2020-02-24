<!doctype html>
<html lang="en">

<head>
        <base href="/home/OneDrive/Dokument/Webdevelopment/Git/websoft/work/">
    <link rel="stylesheet" type="text/css" href="report/css/school_style.css">
    <script src="report/js/jquery-3.4.1.js"></script>
</head>

<body>


    <?php 
        $pageIndex = 2;
        include dirname(__DIR__) . '\report\views\menu.php';?>
    <div class="school_container">


        <select onchange={onRegionChange()} onclick={onSelectClick()} id='region-selector' name="Regions"></select>
        <div class='slide'>

            <table onchange="onRegionChange" id="school_info_table">

            </table>
        </div>
    </div>

    <footer>
    <?php include 'views\footer.html';?>
    </footer>

    <?php include dirname(__DIR__) . '\report\views\bird.html';?>
    <script type="text/javascript" src="report/js/schools.js">
    </script>
    <script>
        resetSchoolTable();
    </script>
</body>

</html>