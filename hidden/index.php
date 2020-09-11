<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    require $root.'/includes/dbh.inc.php';
    require $root.'/head.php';
    require $root.'/includes/variables.php';
    require $root.'/includes/inactivity.php';
    if (!isset($_SESSION['userId'])) {
        header("Location: ../");
        exit();
    }

    $json = trim(file_get_contents("../setup.json"), "\xEF\xBB\xBF");
    $settings = json_decode($json, true);
    include("../assets/php/account-nav.php");
?>
<body>
    <div class="innerHere"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    function settingsRead() {
        var settings = new Array();
        $.getJSON("../setup.json", function(data) {
            settings = data;
            const inputs = document.querySelectorAll(".settings-input");
            var button = document.getElementById('updateBtn');
            var BreakException = {};
            inputs.forEach((input) => {
                inputName = input.getAttribute( 'name' );
                if (input.type == 'checkbox') {
                    if (input.checked == settings[inputName]) {
                        button.disabled = true;
                        button.setAttribute("title", 'Make some changes.');
                    } else {
                        button.disabled = false;
                        button.removeAttribute("title");
                        throw BreakException;
                    }
                } else {
                    if (input.value == settings[inputName]) {
                        button.disabled = true;
                        button.setAttribute("title", 'Make some changes.');
                    } else {
                        button.disabled = false;
                        button.removeAttribute("title");
                        throw BreakException;
                    }
                }
            });
        });
    }
    settingsRead();
    </script>
    <div class="dashboard user_bank_information">
        <div class="Wrap">
            <div class="InWrap">
                <p class="dashboard-text" onclick="turnOne(1)">Welcome to the dungeon, <?php
                    echo $_SESSION['firstname'];
                ?>.</p>
            </div>
        </div>
        <section class="user-information dashboard-section" id="user-information">
            <div class="available">
                <h2>Gull le Belle Settings</h2>
                <form action="/includes/setup.inc.php" method="post">
                    <div class="Card CardTrippleVert CardDoubleHor CardNoHover">
                        <div class="CardSection CardSectionFirst firstSection">
                            <h1>Overlay</h1>
                            <label class="container" oninput="settingsRead()">On/Off
                                <input name="overlay" class="settings-input" type="checkbox" <?php
                                    if ($settings['overlay'] == true) {
                                        echo 'checked';
                                    }
                                ?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="CardSection">
                            <h1>Download button</h1>
                            <label class="container" oninput="settingsRead()">On/Off
                                <input name="downloadButton" class="settings-input" type="checkbox" <?php
                                    if ($settings['downloadButton'] == true) {
                                        echo 'checked';
                                    }
                                ?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="CardSection">
                            <h1>Download button text</h1>
                            <input name="downloadButtonText" class="settings-input" type="text" oninput="settingsRead()" <?php
                                echo 'value="'.$settings['downloadButtonText'].'"';
                            ?>>
                        </div>
                        <div class="CardSection">
                            <h1>Download file location</h1>
                            <input name="downloadFileLink" class="settings-input" type="text" oninput="settingsRead()" <?php
                                echo 'value="'.$settings['downloadFileLink'].'"';
                            ?>>
                        </div>
                        <div class="CardSection">
                            <h1>Currency (ie. usd)</h1>
                            <input name="currency" class="settings-input" type="text" oninput="settingsRead()" <?php
                                echo 'value="'.$settings['currency'].'"';
                            ?>>
                        </div>
                        <div class="CardSection">
                            <h1>Currency symbol (ie. $, ¥)</h1>
                            <input name="currencySymbol" class="settings-input" type="text" oninput="settingsRead()" maxlength="1" <?php
                                echo 'value="'.$settings['currencySymbol'].'"';
                            ?>>
                        </div>
                        <div class="CardSection">
                            <h1>Transfer limitation</h1>
                            <input name="transferLimit" class="settings-input" type="number" oninput="settingsRead()" <?php
                                echo 'value="'.$settings['transferLimit'].'"';
                            ?>>
                        </div>
                        <div class="CardSection CardSectionFirst firstSection">
                            <h1>Dark Mode (not implemented)</h1>
                            <label class="container" oninput="settingsRead()">On/Off
                                <input name="darkMode" class="settings-input" type="checkbox" disabled <?php
                                    if ($settings['darkMode'] == true) {
                                        echo 'checked';
                                    }
                                ?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        <div class="CardSection CardSectionFirst firstSection">
                            <br>
                            <button id="updateBtn" title="Make some changes." disabled>Update</button>
                            <br>
                            <a href="/transaction/" class="toOne">Fake a transaction</a>
                        </div>
                            

                        <p class="error"><?php
                            if (isset($_GET['error'])) {
                                switch ($_GET['error']) {
                                    case 'limitreached':
                                        echo 'You have reached the limit of '.'$'.number_format(abs($settings["transferLimit"]), 2, '.', ',').' transfers.';
                                        break;
                                    case 'noamount':
                                        echo 'Please enter a valid value.';
                                        break;
                                    case 'invalidaccounts':
                                        echo 'Money cannot be transfered into the same account.';
                                        break;
                                    case 'insufficientfunds':
                                        echo 'You have insufficient funds in your account.';
                                        break;
                                }
                            }
                        ?></p>
                    </div>
                </form>
            </div>
        </section>
        <script>
            document.addEventListener('contextmenu', event => event.preventDefault());
            document.addEventListener("keydown", function(e) {
                if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                    e.preventDefault();
                    document.getElementById("updateBtn").click();
                }
            }, false);
            
            document.onkeydown = function(e) {
                if(event.keyCode == 123) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                    return false;
                }
                if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                    return false;
                }
            }
            
            document.addEventListener('contextmenu', e => e.preventDefault());
        </script>
    </div>
        <?php
            require '../footer.php';
        ?>
</body>