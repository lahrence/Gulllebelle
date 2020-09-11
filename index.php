
    <?php
        $root = realpath($_SERVER["DOCUMENT_ROOT"]);
        include('head.php');
        require $root.'/includes/inactivity.php';
    ?>
    <body>
        <?php 
        if (isset($_GET['timeout'])) {
            if (!isset($_SESSION['userId'])) {
                
            }
        }
    
    if (isset($_SESSION['userId'])) {
        echo '
        <script>
        var functionName = quizTimer();
        setInterval(function () {
            quizTimer();
        }, 1000);
        
        </script>';
    }
        
        ?>
        <?php
            include('login.php');
        ?>
        <?php
            include('navbar.php');
        ?>
        <div class="welcome" id='home'>
            <h1>Welcome<?php
                if (isset($_SESSION['userId'])) {
                    echo ' back ';
                } else {
                    echo ' ';
                }
                ?>to <br> Gull <span class="le">le</span> Belle Banking</h1>
            <p class="slogan" style="font-family: 'Dancing Script', cursive;"><?php
                $slogan = rand(1, 101);
                switch (true) {
                    case $slogan <= 10:
                        echo "Money problems? Where we're going we won't have money problems.";
                        break;
                    case $slogan <= 20:
                        echo "THIS IS AMERICA!!!";
                        break;
                    case $slogan <= 30:
                        echo "That's not true! That's impossible!";
                        break;
                    case $slogan <= 40:
                        echo "Also try Minecraft!";
                        break;
                    case $slogan <= 50:
                        echo "Legitimate companies do not use gift cards as a payment method.";
                        break;
                    case $slogan <= 60:
                        echo "Just wait a moment sir!";
                        break;
                    case $slogan <= 70:
                        echo "Gull le Belle will help with each and everything!";
                        break;
                    case $slogan <= 80:
                        echo "What do you think I'm fool here bro?";
                        break;
                    case $slogan <= 90:
                        echo "Sir!!";
                        break;
                    case $slogan <= 91:
                        echo "Don't log in!!! They are scamming you!!!";
                        break;
                    case $slogan <= 101:
                        echo "Did you connect on teamviewer, supportme, or something else?";
                        break;
                    default:
                        echo "Money is our priority.";
                        break;
                }
            ?></p>
        </div>
        <div class="gullart" style="<?php
        if (isset($_SESSION['userId'])) {
            echo 'left: 1200px;';
        } else {
            echo 'left: 775px;';
        }
        ?>"><img src="/assets/png/Flock.png"></div>
        <div id="innerHere"></div>
        <div class="page">
        <section class="about section fff" id="about">
            <div class="about-content content">
                <h1>The unanimous Declaration of the thirteen united States of America</h1>
                <p>When in the Course of human events, it becomes necessary for one people to dissolve the political bands which have connected them with another, and to assume among the powers of the earth, the separate and equal station to which the Laws of Nature and of Nature's God entitle them, a decent respect to the opinions of mankind requires that they should declare the causes which impel them to the separation.</p>
            </div>
        </section>
        <section class="account-options section accounts" id="accounts">
            <div class="account-content content">
                <h1>We Offer Competitive Rates & Low Prices</h1>
                <div class="prices"><h2>15 Year Fixed Rate</h2><h3>6.9%</h3><p>Interesting Rate</p></div>
                <div class="prices"><h2>30 Year Fixed Rate</h2><h3>66.6%</h3><p>Interesting Rate</p></div>
                <div class="prices"><h2>Flock Rate</h2><h3>9%</h3><p>Very Interesting</p></div>
            </div>
            <div class="Gullcard">
                <a href="/signup/">
                    <img src="/assets/png/GullCard.png">
                    <br>
                    <p>Register now to get your <br>members only Gullcard</p>
                </a>
            </div>
        </section>
        <section class="other-info fraud section fff" id="fraud">
            <div class="other-content content">
                <h1>Don't accept refunds from unknown numbers</h1>
                <p>Due to recent increase of scams, Gull le Belle has restricted transfer amount to $5000 per transfer. Please do not accept refunds from random callers, they are scammers. Gull le Belle will protect our customers ensuring each and everyone are kept away from scams. Microsoft will never ask you to log in to your bank or ask to buy gift cards.</p>
            </div>
        </section>
        <section class="affiliated-banks section eee" id="banks">
            <div class="affiliated-content content">
                <h1>Some of Our Affilliated Banks</h1>
                <div class="banks"><h2>X Æ A-12</h2><img src="/assets/png/XEALogo.png" height="100px"></div>
                <div class="banks"><h2>Scotiabutt</h2><img src="/assets/png/ScotiabuttLogo.png" height="100px"></div>
                <div class="banks"><h2>Flockbank</h2><img src="/assets/png/FlockLogo.png" height="100px"></div>
                <div class="banks"><h2>Tetris Depot</h2><img src="/assets/png/TDLogo.png" height="100px"></div>
            </div>
        </section>
        </div>
        <?php
            require 'footer.php';
        ?>
        <script src="/assets/js/observe.js"></script>
    </body>
</html>