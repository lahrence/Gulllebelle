
        <div class="nb">
            <div class="nb_top_logo">
                <img src="/assets/png/LogoGull.png" width="50">
                <h1>Gull <span class="le">le</span> Belle <span class="bank-text">Banking</span></h1>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            echo '<a class="logout-button" href="/includes/logout.inc.php">Log Out</a>';
                        } else {
                            echo ' ';
                        }
                    ?>
            </div>
            <div class="list">
                <ul>
                    <li><a href="/">Home</a></li>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            echo '
                            <li><a href="/accounts">Accounts</a></li>
                            <li><a href="/transfer">Transfer</a></li>
                            ';
                        } else {
                            echo '
                    <li><a href="/">Fraud Awareness</a></li>
                    <li><a href="/">Affiliated Banks</a></li>
                    <li><a href="/signup">Join Us</a></li>
                    ';
                        }
                    ?>
                </ul>
            </div>
        </div>