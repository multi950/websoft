<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>About this site</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>



    <header>
    <?php 
        $pageIndex = 3;
        include 'views\menu.php';?>
    </header>


    <div class="content">
        <article>

            <img src="img/webdev.jpg" width="100%" alt="WebDev">

            <figcaptionp>Software development for the web aims to develop skills in advanced web programming and
                software
                development.
                This site is a playground to practice knowlage obtained during the course</figcaptionp>


            <div class="link_container">
                <div class="link_logo">
                    <a href="https://hkr.instructure.com/courses/2432">
                        <img src="img/hkr.jpg" alt="hkr">
                        <figcaptionp>Course website</figcaption>
                    </a>
                </div>

                <div class="link_logo">
                    <a href="https://github.com/multi950/websoft">
                        <img src="img/fork.png" alt="forked_git">
                        <figcaptionp>Forked git</figcaption>
                    </a>
                </div>
                <div class="link_logo">
                    <a href="https://github.com/Webbprogrammering/websoft">
                        <img src="img/github.png" alt="source_git">
                        <figcaptionp>Source git</figcaption>
                    </a>
                </div>
</div>

        </article>
    </div>
        <footer>
        <?php include 'views\footer.html';?>
        </footer>


    <?php include 'views\bird.html';?>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>