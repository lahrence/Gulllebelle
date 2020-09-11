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
    
    if (isset($_SESSION['userId'])) {
        echo '
        <script>
        var functionName = quizTimer();
        setInterval(function () {
            quizTimer();
        }, 1000);
        
        </script>';
    }
    $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
    $arr = json_decode($json, true);
    $accountInfo = array_reverse($arr);
    
    $json = trim(file_get_contents("../setup.json"), "\xEF\xBB\xBF");
    $settings = json_decode($json, true);
    include("../assets/php/account-nav.php");
    $chckNum = chunk_split($_SESSION['chckNum'], 4, ' ');
    $savNum = chunk_split($_SESSION['savNum'], 4, ' ');
    $credNum = chunk_split($_SESSION['credNum'], 4, ' ');
?>
<body>
    <div class="innerHere"></div>
    <div class="dashboard user_bank_information">
        <div class="Wrap">
            <div class="InWrap">
                <p class="dashboard-text" onclick="turnOne(1)">Welcome back, <?php
                    echo $_SESSION['firstname'];
                ?>.</p>
            </div>
        </div>
        <section class="user-information dashboard-section" id="user-information">
            <div class="available">
                <h2>My Dashboard</h2>
                <div class="Card">
                    <p>Checking</p>
                    <h3><?php echo $settings['currencySymbol'].number_format(abs($userCheckingBal), 2, '.', ',');?></h3>
                    <span class="money-format third-line"><?php echo $settings['currency']?></span>
                    <a href="/activities/" class="toOne">Go to activities</a>
                </div>
                <div class="Card">
                    <p>Savings</p>
                    <h3><?php echo $settings['currencySymbol'].number_format(abs($userSavingsBal), 2, '.', ',');?></h3>
                    <span class="money-format third-line"><?php echo $settings['currency']?></span>
                    <a href="/activities/" class="toTwo">Go to activities</a>
                </div>
                <div class="Card">
                    <p>Available Credits</p>
                    <h3><?php echo $settings['currencySymbol'].number_format(abs(50000 - $userCreditsBal), 2, '.', ',');?></h3>
                    <span class="money-format third-line"><?php echo $settings['currency']?></span>
                    <a href="/transfer/" class="toThree">Go to transfer</a>
                </div>
                <div class="Card CardFullHor CardDoubleVert CardNoHover">
                    <table>
                        <tr>
                            <th class="TL">Account</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th class="Corner TR">Amount</th>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 0;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 1;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 2;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 3;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 4;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 5;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 6;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                        <tr>
                            <td><?php
                                $num = 7;
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['account'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['date'];
                                }
                            ?></td>
                            <td><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    echo $accountInfo[$num]['desc'];
                                }
                            ?></td>
                            <td class="<?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>"><?php
                                if (array_key_exists($num ,$accountInfo)) {
                                    if ($accountInfo[$num]['positive'] == true){
                                        echo '+';
                                    } else {
                                        echo '-';
                                    }
                                    echo number_format($accountInfo[$num]['amount'], 2, '.', ' ');
                                }
                            ?></td>
                        </tr>
                    </table>
                    <a class="toOne tableButton" href="/activities/">Go to activities</a>
                </div>
            </div>
        </section>
        <?php
            if ($settings["downloadButton"] == true) {
                echo '<a class="downloadLink" href="';
                echo $settings["downloadFileLink"];
                echo '" target="_blank" download>';
                echo $settings["downloadButtonText"];
                echo '</a>';
            }
        ?>
    </div>
        <?php
            require '../footer.php';
        ?>
</body>