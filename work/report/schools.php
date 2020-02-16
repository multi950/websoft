<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/school_style.css">
    <script src="js/jquery-3.4.1.js"></script>
</head>

<body>


    <?php 
        $pageIndex = 1;
        include 'views\menu.php';?>
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

    <?php include 'views\bird.html';?>
    <script type="text/javascript" src="js/schools.js">
    </script>
    <script>
        resetSchoolTable();
    </script>
</body>

</html>