
        <div class="nb no-print">
            <div class="nb_top_logo">
                <img src="/assets/png/LogoGull.png" width="50">
                <h1>Gull <span class="le">le</span> Belle <span class="bank-text">Banking</span></h1>
            </div>
            <div class="list">
                <ul>
                    <li><a href="/#">Home</a></li>
                    <?php
                        if (isset($_SESSION['userId'])) {
                            echo '
                            <li><a href="/#about">About</a></li>
                            <li><a href="/#accounts">Our Rates</a></li>
                            <li><a href="/#fraud">Fraud Awareness</a></li>
                            <li><a href="/#banks">Affiliated Banks</a></li>
                            ';
                            echo "<li><a href='/dashboard/'>Online Portal</a></li>";
                        } else {
                            echo '
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#accounts">Our Rates</a></li>
                    <li><a href="/#fraud">Fraud Awareness</a></li>
                    <li><a href="/#banks">Affiliated Banks</a></li>
                    ';
                        }
                    ?>
                </ul>
            </div>
        <!--<script>document.addEventListener('contextmenu', event => event.preventDefault());
        document.onkeydown = function(e) {
  if(event.keyCode == 123) {
    console.log('You cannot inspect Element');
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
    console.log('You cannot inspect Element');
    return false;
  }
}
        </script>-->
        </div>