<?php
if (!file_exists('config/app.php')) {
    header("Location:install.php");
}
$starttime = microtime(true); // Start
include('App.php');
$app = new App();
$app->handleRequest();
$endtime = microtime(true); // End
printf("Page loaded in %f seconds", $endtime - $starttime );
