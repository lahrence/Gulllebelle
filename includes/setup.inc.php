<?php
    $json = trim(file_get_contents("../setup.json"), "\xEF\xBB\xBF");
    $settings = json_decode($json, true);

    if (isset($_POST['overlay'])) {
        $overlay = true;
    } else {
        $overlay = false;
    }

    if (isset($_POST['downloadButton'])) {
        $downloadButton = true;
    } else {
        $downloadButton = false;
    }

    $downloadButtonText = $_POST['downloadButtonText'];
    $downloadFileLink = $_POST['downloadFileLink'];
    $currency = $_POST['currency'];
    $currencySymbol = $_POST['currencySymbol'];
    $transferLimit = $_POST['transferLimit'];
    
    $settings['overlay'] = $overlay;
    $settings['downloadButton'] = $downloadButton;
    $settings['downloadButtonText'] = $downloadButtonText;
    $settings['downloadFileLink'] = $downloadFileLink;
    $settings['currency'] = $currency;
    $settings['currencySymbol'] = $currencySymbol;
    $settings['transferLimit'] = (float)$transferLimit;
        
    $json = json_encode($settings, JSON_PRETTY_PRINT);
    file_put_contents('../setup.json', $json);
    header("Location: ../hidden/index.php?update=success");
    exit();
?>