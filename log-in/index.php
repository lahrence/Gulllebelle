 <?php
    include("../head.php");
?>
<?php
    include('../navbar.php');
    if (isset($_SESSION['userId'])) {
        header("Location: ../index.php");
        exit();
    } else {
        
    }
?>

<head>
    <script src="/assets/js/main.js"></script>
</head>
<body class="signuploginBackground">
    <?php
        $loginerror = '';
        $mailuidL = '';
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                $loginerror = '<p class="error-message">Please fill in the fields</p>';
                $mailuidL = $_GET['mailuid'];
            } else if ($_GET['error'] == "wrongpwd") {
                $loginerror = '<p class="error-message">Wrong password</p>';
                $mailuidL = $_GET['mailuid'];
            } else if ($_GET['error'] == "usernotfound") {
                $loginerror = '<p class="error-message">Invalid user</p>';
            }
        } else if (isset($_GET['signup'])) {
            if ($_GET['signup'] == "success") {
                $mailuidL = $_GET['uid'];
            }
        }

        if (isset($_SESSION['userId'])) {
            header("Location: ../");
        } else {
            echo '
                <div class="signup-div">
                    <form action="/includes/login.inc.php" method="post" class="signupform">
                        <h1>Log In</h1>
                        <hr>
                        <input type="text" name="mailuid" id="login username" placeholder="username" value='.$mailuidL.'>
                        <input type="password" name="pwd" id="password" placeholder="password">
                        <div class="reveal loginReveal" onclick="reveal()">
                            <img src="/assets/png/visibility-black-18dp/1x/outline_visibility_black_18dp.png" class="material-icons" id="reveal-icon">
                        </div>'.$loginerror.'
                        <button type="submit" name="login-submit" id="log-in">Log In</button>';
                        if (isset($_GET['signup'])) {
                            if ($_GET['signup'] == "success") {
                                echo '<p class="success-message">You have successfully registered to Gull le Belle! Log in to your account here.</p>';
                            }
                        } else {
                            echo '<p>Don\'t have an account? <a href="../signup/">Register</a></p>';
                        }
                        echo '
                    </form>
                    ';
            echo '
                </div>
            ';
        }
    ?>
</body>
<footer class="signuploginFooter">
    <div class="footer-content">
        <p>© Gull le Belle 
            <?php
                echo date('Y');
            ?></p>
    </div>
</footer>
</html>