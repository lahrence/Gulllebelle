
                    <?php

                        if (isset($_SESSION['userId'])) {
                            echo '
                            ';
                        } else {
                            echo ' 
                            <div class="login-modal">
                                <div class="modal-content">
                                    <h1>Online Banking</h1>
                                    <hr>
                                    <a href="/log-in">Log In</a>
                                    <a href="/signup">Register</a>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                
            