 <?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    include("../head.php");
    include("../includes/variables.php");
    require $root.'/includes/inactivity.php';
    $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
    $arr = json_decode($json, true);
    $accountInfo = array_reverse($arr);
    
    $json = trim(file_get_contents("../setup.json"), "\xEF\xBB\xBF");
    $settings = json_decode($json, true);
?>
<?php
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
    include("../assets/php/account-nav.php");
?>
<body>
    <div class="innerHere"></div>
    <div class="dashboard user_bank_information">
        <div class="Wrap">
            <div class="InWrap">
                <p class="dashboard-text" onclick="turnOne(1)">Make a transfer, <?php
                    echo $_SESSION['firstname'];
                ?>.</p>
            </div>
        </div>
        <section class="user-information dashboard-section" id="user-information">
            <div class="available">
                <h2>Transfer</h2>
                <form action="/includes/transaction.inc.php" method="post">
                    <div class="Card CardDoubleHor CardTrippleVert CardNoHover CardHiddenFlow">
                        <div class="wrap-step">
                            <div class="step">
                            </div>
                        </div>
                        <div class="CardSection CardSectionFirst firstSection">
                            <h1>To Account</h1>
                            <?php
                                if (!isset($_GET['external']) || $_GET['external'] == 'false') {
                                    echo '<select name="inaccount">';
                                echo '<option value="chckAcc"';
                                if (isset($_GET['transferfrom'])) {
                                    if ($_GET['transferfrom'] !== 'check') {
                                        echo "selected='selected'";
                                    }
                                }
                                echo '>';
                                    echo 'Checking (';
                                    if ($userCheckingBal < 0) {
                                        echo '-';
                                    }
                                    echo '$'.number_format(abs($userCheckingBal), 2, '.', ',');
                                echo ')';
                                echo '</option>';
                                echo '<option value="credits"';
                                if (isset($_GET['transferfrom'])) {
                                    if ($_GET['transferfrom'] !== 'cred') {
                                        if ($_GET['transferfrom'] !== 'sav') {
                                            echo "selected='selected'";
                                        }
                                    }
                                } else {
                                    echo "selected='selected'";
                                }
                                echo '>';
                                    echo 'Credits (';
                                    if ($userCreditsBal < 0) {
                                        echo '-';
                                    }
                                    echo '$'.number_format(abs($userCreditsBal), 2, '.', ',');
                                echo ')';
                                echo '</option>';
                                echo '<option value="savAcc"';
                                if (isset($_GET['transferfrom'])) {
                                    if ($_GET['transferfrom'] !== 'sav') {
                                        if ($_GET['transferfrom'] !== 'check') {
                                            echo "selected='selected'";
                                        }
                                    }
                                }
                                echo '>';

                                    echo 'Savings (';
                                    if ($userSavingsBal < 0) {
                                        echo '-';
                                    }
                                    echo '$'.number_format(abs($userSavingsBal), 2, '.', ',');
                                echo ')';
                                echo'</option>';
                                echo '</select>';
                                }
                            ?>
                        </div>
                        <div class="CardSection">
                            <h1>Description</h1>
                            <input name="desc" type="text" placeholder="description" required>
                        </div>
                        <div class="CardSection">
                            <h1>Amount(<?php echo $settings['currencySymbol']; ?>)</h1>
                            <input name="amount" type="number" placeholder="amount" required pattern="[0-9\.]+" value="0.00" step="0.01">
                            <br>
                            <button type="submit" name="transfer-submit" id="transferbtn">Transfer</button>
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
    </div>
        <?php
            require '../footer.php';
        ?>
</body>