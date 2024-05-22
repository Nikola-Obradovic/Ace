<?php
session_start();
session_unset();
session_destroy();
sleep(1);
header("location: ../public/index.php");
exit;

