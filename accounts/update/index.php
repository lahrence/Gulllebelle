<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root.'/includes/dbh.inc.php';
    /*
        $_SESSION['userCheckingBal'] = $row['chckAcc'];
        $_SESSION['userSavingsBal'] = $row['savAcc'];
        $_SESSION['userCreditsBal'] = $row['credits'];
        $_SESSION['userCheckingN'] = $row['chckNum'];
        $_SESSION['userSavingsN'] = $row['savNum'];
        $_SESSION['userCreditsN'] = $row['credNum'];*/
    require $root.'/head.php';
    require $root.'/includes/variables.php';
    require $root.'/includes/inactivity.php';
    if (isset($_SESSION['userId'])) {
        
    } else {
        header("Location: ../");
        exit();
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
    $json = trim(file_get_contents("../../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
    $arr = json_decode($json, true);
    $accountInfo = array_reverse($arr);
    
    $json = trim(file_get_contents("../../setup.json"), "\xEF\xBB\xBF");
    $settings = json_decode($json, true);
    require $root.'/assets/php/account-nav.php';
?>
    <body class="signuploginBackground">
        <div id="innerHere"></div>
        <div class="signup-div">
        <form action="/includes/update.inc.php" method="post" class="signupform">
            <h1>Change your password</h1>
            <input type="password" name="newpassword" id="newpassword" placeholder="new password">
            <input type="password" name="confirmpassword" id="confirmpassword" placeholder="confirm password">
            <hr>
            <input type="password" name="oldpassword" id="oldpassword" placeholder="current password">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "matchpwd") {
                    echo '<p class="error-message">Passwords do not match</p>';
                } else if ($_GET['error'] == "wrongpwd") {
                    echo '<p class="error-message">Wrong password</p>';
                } else if ($_GET['error'] == "sqlerror") {
                    echo '<p class="error-message">There was an error, please try again.</p>';
                } else if ($_GET['error'] == "loggedout") {
                    echo '<p class="error-message">You are logged out</p>';
                }
            } if (isset($_GET['update'])) {
                if ($_GET['update'] == "success") {
                    echo '<p class="success-message">Success!</p>';
                }
            }
            ?>
            <button type="submit" name="update-submit" id="log-in">Update</button>
        </form>
        </div>
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