<?php
if (isset($_POST['signup-submit'])) {
    
    require 'dbh.inc.php';
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    
    $chck1 = rand(1, 9999999999999999);
    $chck = strval(sprintf("%016d", $chck1));
                    
    $sav1 = rand(1, 9999999999999999);
    $sav = strval(sprintf("%016d", $sav1));
                    
    $cred1 = rand(1, 9999999999999999);
    $cred = strval(sprintf("%016d", $cred1));
    
    $checkingBal = 10000.00;
    $savingsBal = 5000.00;
    $creditBal = 1000.00;
    
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) ||  empty($password) ||  empty($passwordRepeat)) {
        header("Location: ../signup/index.php?error=emptyfields&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup/index.php?error=invalidmailuid&firstname=".$firstname."&lastname=".$lastname);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup/index.php?error=invalidmail&uid=".$username."&firstname=".$firstname."&lastname=".$lastname);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup/index.php?error=invaliduid&mail=".$email);
        exit();
    } else if ($password !== $passwordRepeat) {
        header("Location: ../signup/index.php?error=passwordcheck&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
        exit();
    } else if ((strlen($lastname) > 35)) {
        header("Location: ../signup/index.php?error=characterlimit&uid=".$username."&mail=".$email."&firstname=".$firstname);
        exit();
    } else if ((strlen($firstname) > 35)) {
        header("Location: ../signup/index.php?error=characterlimit&uid=".$username."&mail=".$email."&lastname=".$lastname);
        exit();
    } else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            $sql2 = "SELECT * FROM users WHERE emailUsers='$email'";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);

            if ($resultCheck > 0) {
                header("Location: ../signup/index.php?error=uidtaken&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
                exit();
            } else if ($resultCheck2 > 0) {
                header("Location: ../signup/index.php?error=emailtaken&uid=".$username."&firstname=".$firstname."&lastname=".$lastname);
                exit();
            } else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, firstname, lastname, chckAcc, savAcc, credits, chckNum, savNum, credNum) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup/index.php?error=sqlerror");
                    exit();
                } else if (strlen($password) < 6) {
                    header("Location: ../signup/index.php?error=passlength&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
                    exit();
                } else if (!preg_match('/[\'^£$%&*()};:"`{@#~?!.><>,|=_+¬-]/', $password)) {
                    header("Location: ../signup/index.php?error=weakpass&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname=".$lastname);
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssssssssss", $username, $email, $hashedPwd, $firstname, $lastname, $checkingBal, $savingsBal, $creditBal, $chck, $sav, $cred);
                    mysqli_stmt_execute($stmt);
                    $activity = array(
                        array("account"=>"****".$sav, "date"=>"06/19" , "year"=>"2020" , "desc"=>"Spotify", "amount"=>9.99, "positive"=>false),
                        array("account"=>"****".$chck, "date"=>"06/20" , "year"=>"2020" , "desc"=>"PH*Premium", "amount"=>7.99, "positive"=>false),
                        array("account"=>"****".$chck, "date"=>"06/26" , "year"=>"2020" , "desc"=>"Spotify", "amount"=>9.99, "positive"=>false),
                        array("account"=>"****".$chck, "date"=>"06/28" , "year"=>"2020" , "desc"=>"Black*Market", "amount"=>10000.00, "positive"=>true),
                    );
                    $newFileName = '../assets/users/'.$username.".json";
                    echo file_put_contents($newFileName, $username);
                    $fp = fopen('../assets/users/'.$username.'.json', 'w');
                    fwrite($fp, json_encode($activity, JSON_PRETTY_PRINT));
                    sleep(2);
                    echo "Pending...";
                    sleep(2);
                    echo "Sign up completed!";
                    header("Location: ../log-in/index.php?signup=success&uid=".$username);
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: http://".$_SERVER['HTTP_HOST']."/signup/");
    exit();
}