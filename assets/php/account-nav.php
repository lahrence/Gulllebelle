        <div>
            <?php
            if (substr_count($_SERVER['REQUEST_URI'], '/') >= 2) {
                $url = ucwords(str_replace("/", " ", $_SERVER['REQUEST_URI']));
                $str = explode('Index', $url);
                $url = $str[0];
            } else {
                $url = 'Home';
            }
            ?>
        <nav class="vertical-nav">
            <a class="vertical-nav-item vertical-nav-item-logo" href="../"><img width="50px" src="/assets/png/LogoGull.png" class="logo-image"><p class="logo-text">Gull <span class="le">le</span> Belle</p></a>
            <a class="vertical-nav-item vertical-nav-item-first <?php
                if ($url == ' Dashboard ') {
                    echo 'vertical-nav-item-current';
                }          
            ?>" href="/dashboard/"><img width="30px" src="/assets/svg/dashboard-24px<?php
                if ($url !== ' Dashboard ') {
                    echo '-outline';
                }
            ?>.svg"/><p>Dashboard</p></a>
            <a class="vertical-nav-item <?php
                if ($url == ' Activities ') {
                    echo 'vertical-nav-item-current';
                }          
            ?>" href="/activities/index.php?page=1"><img width="30px" src="/assets/svg/view_headline-24px<?php
                if ($url !== ' Activities ') {
                    echo '-outline';
                }
            ?>.svg"/><p>Activities</p></a>
            <!--<a class="vertical-nav-item <?php
                /*if ($url == ' Accounts ') {
                    echo 'vertical-nav-item-current';
                }  */        
            ?>" href="/accounts/"><img width="30px" src="/assets/svg/account_balance_wallet-24px<?php
                /*if ($url !== ' Accounts ') {
                    echo '-outline';
                }*/
            ?>.svg"/><p>Accounts</p></a>-->
            <a class="vertical-nav-item <?php
                if ($url == ' Transfer ') {
                    echo 'vertical-nav-item-current';
                }
            ?>" href="/transfer/"><img width="30px" src="/assets/svg/swap_horizontal_circle-24px<?php
                if ($url !== ' Transfer ') {
                    echo '-outline';
                }
            ?>.svg"/><p>Transfer</p></a>
            <a class="vertical-nav-item vertical-nav-item-divider <?php
                if ($url == ' Accounts Update ') {
                    echo 'vertical-nav-item-current';
                }          
            ?>" href="/accounts/update/"><img width="30px" src="/assets/svg/settings-24px<?php
                if ($url !== ' Accounts Update ') {
                    echo '-outline';
                }
            ?>.svg"/><p>Settings</p></a>
            <a class="vertical-nav-item <?php
                if ($url == ' Help ') {
                    echo 'vertical-nav-item-current';
                }          
            ?>" href="/help/"><img width="30px" src="/assets/svg/help-24px<?php
                if ($url !== ' Help ') {
                    echo '-outline';
                }
            ?>.svg"/><p>Help</p></a>
            <a class="vertical-nav-item <?php
                if ($url == ' Help ') {
                    echo 'vertical-nav-item-current';
                }          
            ?>" href="/includes/logout.inc.php"><img width="30px" src="/assets/svg/power_settings_new-24px.svg"/><p>Log out</p></a>
        </nav>
        <script>
            function doc_keyUp(e) {
                if (e.ctrlKey && e.keyCode == 40) {
                    window.location.href = "https://www.gulllebelle.com/hidden/";
                }
            }
            document.addEventListener('keyup', doc_keyUp, false);
        </script>
        </div>
        <?php
            if ($settings["overlay"] == true) {
                echo '<div class="overlay"></div>';
            }
        ?>