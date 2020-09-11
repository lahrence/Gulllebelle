<?php

sleep(5);
session_start();
session_unset();
session_destroy();
header("Location: ../");