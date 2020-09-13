<?php
    include 'dbh.inc.php';
    session_start();
    require 'inactivity.php';

    $sql = "SELECT * FROM users WHERE idUsers=".$_SESSION['userId'].";";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    $idUser = $_SESSION['userId'];
if (isset($_POST['transfer-submit'])) {
    if (isset($_SESSION['timesince'])) {
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $in = $_POST['inaccount'];
                $userCheckingBal = $row['chckAcc'];
                $userSavingsBal = $row['savAcc'];
                $userCreditsBal = $row['credits'];
                $accountbal = $row[$in];
                $userCheckingN = $row['chckNum'];
                $userSavingsN = $row['savNum'];
                $userCreditsN = $row['credNum'];
            }
        }
        $inaccount = $_POST['inaccount'];
        $amount = floatval($_POST['amount']);
        $desc = $_POST['desc'];
        
        if ($inaccount == 'chckAcc') {
            $accountNumber = $userCheckingN;
        } else if ($inaccount == 'savAcc') {
            $accountNumber = $userSavingsN;
        } else if ($inaccount == 'credits') {
            $accountNumber = $userCreditsN;
        }
        if ($amount >= 0) {
            $positive = true;
            $negative = false;
        }
        if ($amount < 0) {
            $positive = false;
            $negative = true;
        }
    }
}

if (round($amount) !== 0.00) {
    if ($inaccount !== 'credits') {
        $sql = "UPDATE users SET ".$inaccount."=".$inaccount."+".$amount." WHERE    idUsers=".$idUser.";";
        mysqli_query($conn, $sql);
        $new = array(
            "account"=>"****".substr($accountNumber, -4), 
            "date"=>date("m/d"),
            "year"=>date("Y"),
            "desc"=>$desc, 
            "amount"=>abs(floatval($amount)),
            "positive"=>$positive
        );
        $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
        $arr = json_decode($json, true);
        $array = array_push($arr, $new);
        $fp = fopen('../assets/users/'.$_SESSION['userUid'].'.json', 'w');
        fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
        header("Location: ../dashboard/index.php?transaction=success");
        exit();
    } else if ($inaccount == 'credits') {
        $sql = "UPDATE users SET ".$inaccount."=".$inaccount."-".$amount." WHERE    idUsers=".$idUser.";";
        mysqli_query($conn, $sql);
        $new = array(
            "account"=>"****".substr($accountNumber, -4), 
            "date"=>date("m/d"),
            "year"=>date("Y"),
            "desc"=>$desc, 
            "amount"=>abs(floatval($amount)),
            "positive"=>$negative
        );
        $json = trim(file_get_contents("../assets/users/".$_SESSION['userUid'].".json"), "\xEF\xBB\xBF");
        $arr = json_decode($json, true);
        $array = array_push($arr, $new);
        $fp = fopen('../assets/users/'.$_SESSION['userUid'].'.json', 'w');
        fwrite($fp, json_encode($arr, JSON_PRETTY_PRINT));
        header("Location: ../dashboard/index.php?transaction=success");
        exit();
    }
} else {
    header("Location: ../transaction/index.php?error=noamount");
    exit();
}
?>