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
    $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
    $arr = json_decode($json, true);
    $accountInfo = array_reverse($arr);
    $chunked = array_chunk($accountInfo, 15);
    if (isset($_GET['page'])) {
        $page = $_GET['page'] - 1;
    } else {
        header("Location: ../activities/index.php?page=1");
        exit();
    }
    if ($_GET['page'] <= 0) {
        header("Location: ../activities/index.php?page=1");
        exit();
    } else if (count($chunked) < $_GET['page']) {
        header("Location: ../activities/index.php?page=".count($chunked));
        exit();
    }
    
    $json = trim(file_get_contents("../setup.json"), "\xEF\xBB\xBF");
    $settings = json_decode($json, true);
    require $root.'/assets/php/account-nav.php';
?>
<body>
    <div class="innerHere"></div>
    <div class="dashboard user_bank_information">
        <div class="Wrap">
            <div class="InWrap">
                <p class="dashboard-text" onclick="turnOne(1)">This is your activities, <?php
                    echo $_SESSION['firstname'];
                ?>.</p>
            </div>
        </div>
        <section class="user-information dashboard-section" id="user-information">
            <div class="available">
                <h2>My Activities</h2>
                <div class="Card CardFullHor CardTrippleVert CardNoHover">
                    <table>
                        <tr>
                            <th class="TL">Account</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th class="Corner TR">Amount</th>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(0 ,$chunked[$page])) {
                                    echo $chunked[$page][0]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(0 ,$chunked[$page])) {
                                    echo $chunked[$page][0]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(0 ,$chunked[$page])) {
                                    echo $chunked[$page][0]['desc'];
                                }
                            ?>
                            </td>
                            <td class="<?php
                                if (array_key_exists(0 ,$chunked[$page])) {
                                    if ($chunked[$page][0]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(0 ,$chunked[$page])) {
                                    if ($chunked[$page][0]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($accountInfo[$page]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(1 ,$chunked[$page])) {
                                    echo $chunked[$page][1]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(1 ,$chunked[$page])) {
                                    echo $chunked[$page][1]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(1 ,$chunked[$page])) {
                                    echo $chunked[$page][1]['desc'];
                                }
                            ?>
                            </td>
                            <td class="<?php
                                if (array_key_exists(1 ,$chunked[$page])) {
                                    if ($chunked[$page][1]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(1 ,$chunked[$page])) {
                                    if ($chunked[$page][1]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][1]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(2 ,$chunked[$page])) {
                                    echo $chunked[$page][2]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(2 ,$chunked[$page])) {
                                    echo $chunked[$page][2]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(2 ,$chunked[$page])) {
                                    echo $chunked[$page][2]['desc'];
                                }
                            ?>
                            </td>
                            <td class="<?php
                                if (array_key_exists(2 ,$chunked[$page])) {
                                    if ($chunked[$page][2]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(2 ,$chunked[$page])) {
                                    if ($chunked[$page][2]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][2]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(3 ,$chunked[$page])) {
                                    echo $chunked[$page][3]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(3 ,$chunked[$page])) {
                                    echo $chunked[$page][3]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(3 ,$chunked[$page])) {
                                    echo $chunked[$page][3]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists(3 ,$chunked[$page])) {
                                    if ($chunked[$page][3]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(3 ,$chunked[$page])) {
                                    if ($chunked[$page][3]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][3]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(4 ,$chunked[$page])) {
                                    echo $chunked[$page][4]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(4 ,$chunked[$page])) {
                                    echo $chunked[$page][4]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(4 ,$chunked[$page])) {
                                    echo $chunked[$page][4]['desc'];
                                }
                            ?>
                            </td>
                            <td class="<?php
                                if (array_key_exists(4 ,$chunked[$page])) {
                                    if ($chunked[$page][4]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(4 ,$chunked[$page])) {
                                    if ($chunked[$page][4]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][4]['amount'], 2, '.', ','); 
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(5 ,$chunked[$page])) {
                                    echo $chunked[$page][5]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(5 ,$chunked[$page])) {
                                    echo $chunked[$page][5]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(5 ,$chunked[$page])) {
                                    echo $chunked[$page][5]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists(5 ,$chunked[$page])) {
                                    if ($chunked[$page][5]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(5 ,$chunked[$page])) {
                                    if ($chunked[$page][5]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][5]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(6 ,$chunked[$page])) {
                                    echo $chunked[$page][6]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(6 ,$chunked[$page])) {
                                    echo $chunked[$page][6]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(6 ,$chunked[$page])) {
                                    echo $chunked[$page][6]['desc'];
                                }
                            ?>
                            </td>
                            <td class="<?php
                                if (array_key_exists(6 ,$chunked[$page])) {
                                    if ($chunked[$page][6]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(6 ,$chunked[$page])) {
                                    if ($chunked[$page][6]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][6]['amount'], 2, '.', ','); 
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(7 ,$chunked[$page])) {
                                    echo $chunked[$page][7]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(7 ,$chunked[$page])) {
                                    echo $chunked[$page][7]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(7 ,$chunked[$page])) {
                                    echo $chunked[$page][7]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists(7 ,$chunked[$page])) {
                                    if ($chunked[$page][7]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(7 ,$chunked[$page])) {
                                    if ($chunked[$page][7]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][7]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                if (array_key_exists(8 ,$chunked[$page])) {
                                    echo $chunked[$page][8]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(8 ,$chunked[$page])) {
                                    echo $chunked[$page][8]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists(8 ,$chunked[$page])) {
                                    echo $chunked[$page][8]['desc'];
                                }
                            ?>
                            </td>
                            <td class="<?php
                                if (array_key_exists(8 ,$chunked[$page])) {
                                    if ($chunked[$page][8]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists(8 ,$chunked[$page])) {
                                    if ($chunked[$page][8]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][8]['amount'], 2, '.', ','); 
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                $num = 9;
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][$num]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                $num = 10;
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][$num]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                $num = 11;
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][$num]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                $num = 12;
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][$num]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                $num = 13;
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][$num]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <?php
                                $num = 14;
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['account'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['date'];
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    echo $chunked[$page][$num]['desc'];
                                }
                            ?>
                            </td>
                            <td class="
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo 'positiveRecent';
                                    } else {
                                        echo 'negativeRecent';
                                    }
                                }
                            ?>">
                            <?php
                                if (array_key_exists($num ,$chunked[$page])) {
                                    if ($chunked[$page][$num]['positive'] == true){
                                        echo '+$';
                                    } else {
                                        echo '-$';
                                    }
                                    echo number_format($chunked[$page][$num]['amount'], 2, '.', ',');
                                }
                            ?>
                            </td>
                        </tr>
                    </table>
                </div>
                    <div class="paginationWrap">
                        <div class="pagination CardBottom" style="margin-top: 10px;">
                            <?php
                            $pageNumNeg = $_GET['page'] - 1;
                            if ($page !== 0) {
                                echo "<a href='/activities/index.php?page=".$pageNumNeg."' class='pagi no-print'>❮</a>";
                            } else {
                                echo "<a class='pagi no-print current'>❮</a>";
                            }
                                $pass = 1;
                                $limit = 12;
                                $pages = count($chunked);
                                $page = $_GET['page'];
                                $radius = 2;
                                while ($pass <= $pages) {
                                    if ($pages < $limit) {
                                        if ($pass == $_GET['page']) {
                                            //current page
                                            echo '<a class="pagi current">'.$pass.'</a>';
                                        } else {
                                            //navigation buttons
                                            echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                                        }
                                    } else {
                                        if ($pass == $page) {
                                            //current page
                                            echo '<a class="pagi current">'.$pass.'</a>';
                                        } else {
                                            if ($pass >= $page - $radius && $pass <= $radius + $page) {
                                                //navigation buttons
                                                echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                                            } else if ($pass <= $radius) {
                                                //navigation buttons
                                                echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                                                if ($pass == $radius) {
                                                    echo '<a class="pagetoomuch">•••</a>';
                                                }
                                            } else if ($pass >= $pages - $radius + 1) {
                                                if ($pass == $pages - $radius + 1) {
                                                    echo '<a class="pagetoomuch">•••</a>';
                                                }
                                                echo '<a href="/activities/index.php?page='.$pass.'" class="pagi no-print">'.$pass.'</a>';
                                            }
                                        }
                                    }
                                    $pass = $pass + 1;
                                }

                                $pageNum = $_GET['page'] + 1;
                                if ($_GET['page'] < count($chunked)) {
                                    echo "<a href='/activities/index.php?page=".$pageNum."' class='pagi no-print'>❯</a>";
                                } else {
                                    echo "<a class='pagi no-print current'>❯</a>";
                                }
                            ?>
                        </div>
                    </div>
            </div>
        </section>
    </div>
        <?php
            require '../footer.php';
        ?>
</body>