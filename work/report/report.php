<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Report from the course sections</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.ico">
</head>

<body>
    <header>
    <?php 
        $pageIndex = 2;
        include 'views\menu.php';?>
    </header>


    <div class="content">

        <article>

            <section>
                <h2 class="clickable_header">S01</h2>
                <div class="text_container"><p>20 Jan 20

                    Assignment 1

                    • Did you before knowing about the techniques Git, GitHub, Markdown and/or GitHub Pages?
                    I did have some previous experiences with git and GitHub but not markdown or GitHub pages.
                    Because we have had programming related projects at previous courses, we have used git as revision
                    control.
                    In previous projects we worked mostly with push, pull, merge, branch, commit and in some cases merge
                    conflicts,
                    revert and reset. Of course, there are many practices that I still need and want to learn about
                    revision control.

                    • Have you ever created websites before?
                    Yes, I had a similar course in the senior high school (gymnasium), if I recall it was called
                    “Webbutveckling”,
                    which included HTML and CSS. We did some PHP as well, but I have forgotten most of it. When I
                    created my websites,
                    I did not use any js which I am excited to work with.

                    • Briefly explain your experience and knowledge of web application development.
                    My previous experience with web development is that I enjoy it a lot however I did not work with
                    very complex implementations,
                    simpler HTML and CSS. I remember enjoying the designing aspect of it. We did not work too much with
                    the backend side.

                    • What is your TIL for this course section?
                    • Tagging the version of the commit.
                    • Git hub pages, I learned that it is possible to host your website on GitHub
                    • Live server extension on visual studio to be able to visually see your changes as you work.
                    • Being able to create other upstreams and down streams
                </p></div>
            </section>

            <section>
            <h2 class="clickable_header">S02</h2>
                <div class="text_container"><p>26 Jan 20

                    Assignment 2

                    • Have you any previous experience of HTML, CSS and/or JavaScript?
                    Yes, as I mentioned before I have some previous knowledge about HTML and CSS but only a very little
                    amount about JavaScript. I am, however, very interested in learning more about
                    JavaScript since I have always been interested in designing and creating neat interfaces. Something
                    that I did not learn about HTML and CSS is what the best practices are, which I think is very
                    important.

                    • Explain the role of HTML, CSS, and JavaScript in web development.
                    Hypertext Markup Language is a standard used to display documents on web browsers. The web browsers
                    download the HTML documents from the internet to render them and display them to the user.
                    The amount of visual customization on an HTML document is limited, it is possible to add images and
                    such. CSS was invented to add some customization options to HTML documents, like fonts, colors, and
                    backgrounds.
                    JavaScript makes it possible for webpages to become interactive, used for example in games or image
                    editing.

                    • Give a brief explanation of how the browser, the HTTP protocol, and the webserver interacts.
                    The browser uses HTTP to send almost all kinds of files over the internet. The communication between
                    the browser and a server starts with a contact initialization from the client-side.
                    The client sends an HTTP request to the server and based on the request and possibly some data, the
                    server sends a response. The server can not start to communicate with a client.

                    • What is your TIL for this course section?
                    • I learned how the version number is used to show what has been changed in an update.
                    • A little about common practices using git.
                    • jQuery can be used to insert HTML documents in a div.</p></div>
            </section>

            <section>
                <h2 class="clickable_header">S03</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <section>
                <h2 class="clickable_header">S04</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

             <section>
                <h2 class="clickable_header">S05</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <section>
                <h2 class="clickable_header">S06</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <section>
                <h2 class="clickable_header">S07</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <section>
                <h2 class="clickable_header">S08</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <section>
                <h2 class="clickable_header">S09</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <section>
                <h2 class="clickable_header">S10</h2>
                <div class="text_container">
                    <p>Here is the text for this section.</p>
                </div>
            </section>

            <footer>
            <?php include 'views\footer.html';?>
            </footer>

        </article>

    </div>
            <footer>
            <?php include 'views\footer.html';?>
            </footer>
    <script type="text/javascript" src="js/main.js"></script>

        <script>

            var clickableHeaderList = document.getElementsByClassName("clickable_header");
            var textContainerList = document.getElementsByClassName("text_container");
            for(var i = 0; i < clickableHeaderList.length; i++){
                clickableHeaderList[i].id = i;
                clickableHeaderList[i].onclick = function(){
                    textContainerList[this.id].classList.toggle('appear');
                }
            }
            
             
    
    </script>
    <?php include 'views\bird.html';?>
</body>

</html>