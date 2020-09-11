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
<div class="signup-div">
    <form action="/includes/signup.inc.php" method="post" class="signupform">
        <h1>Register</h1>
        <hr>
        <input type="text" name="uid" id="username" placeholder="username" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalidmail") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "emptyfields") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "characterlimit") {
                    echo $_GET['uid'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['uid'];
                }
            }
        ?>">
        <div class="sameLine">
        <input type="text" name="firstname" id="firstname" placeholder="firstname" maxlength="35" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalidmail") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "emptyfields") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "uidtaken") {
                    echo $_GET['firstname'];
                } else if ($_GET['error'] == "invaliduid") {
                    echo $_GET['firstname'];
                }
            }
        ?>">
        <input type="text" name="lastname" id="lastname" placeholder="lastname" maxlength="35" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "invalidmail") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "emptyfields") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "emailtaken") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "uidtaken") {
                    echo $_GET['lastname'];
                } else if ($_GET['error'] == "invaliduid") {
                    echo $_GET['lastname'];
                }
            }
        ?>">
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "characterlimit") {
                echo '<p class="error-message">Your name exceeds the character limit. Abbreviate your name if needed.</p>';
            }
        }
        ?>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "invaliduid") {
                echo '<p class="error-message">Invalid username</p>';
            } else if ($_GET['error'] == "uidtaken") {
                echo '<p class="error-message">This username has been taken</p>';
            }
        }
        ?>
        <input type="text" name="mail" id="email" placeholder="email" value="<?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "invaliduid") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "uidtaken") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "passwordCheck") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "characterlimit") {
                    echo $_GET['mail'];
                } else if ($_GET['error'] == "passlength") {
                    echo $_GET['mail'];
                }
            }
        ?>">
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "invalidmailuid") {
                echo '<p class="error-message">Invalid username and email</p>';
            } else if ($_GET['error'] == "invalidmail") {
                echo '<p class="error-message">Invalid email</p>';
            } else if ($_GET['error'] == "emailtaken") {
                echo '<p class="error-message">This email has been taken</p>';
            }
        }
        ?>
        <div class="sameLine">
        <input type="password" name="pwd" id="password" placeholder="password" min="6">
        <input type="password" name="pwd-repeat" id="password-repeat" placeholder="retype password">
        </div>
        <div class="reveal" onclick="reveal()">
            <img src="/assets/png/visibility-black-18dp/1x/outline_visibility_black_18dp.png" class="material-icons" id="reveal-icon">
        </div>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class="error-message">Please fill in the fields</p>';
            } else if ($_GET['error'] == "passwordcheck") {
                echo '<p class="error-message">Passwords do not match</p>';
            } else if ($_GET['error'] == "weakpass") {
                echo '<p class="error-message">Password is too weak, use symbols, and uppercase, lowercase letters</p>';
            } else if ($_GET['error'] == "passlength") {
                echo '<p class="error-message">Password is too short (enter at least 6 characters)</p>';
            }
        }
        ?>
        <button type="submit" name="signup-submit" id="log-in">Sign Up</button>
        <br>
        <p>Already have an account? <a href="../log-in/">Sign in</a></p>
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