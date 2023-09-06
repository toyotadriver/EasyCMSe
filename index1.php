<?php
if (session_status() === PHP_SESSION_NONE) {session_start();};
if ($_GET){
    $get = array_keys($_GET);
    switch($get[0]){
        case 'login':
            $current_container = 'login.php';
            break;
        case 'logout':
            if (!empty($_SESSION)){
                $current_container = 'logout.php';
            } else{
                $current_container = 'main_container.php';
            }
            break;
        case 'medtable':
            $current_style = 'styles/tables.css';
            $current_container = 'medtests_table.php';
            break;
    }
} else{
    $current_container = 'main_container.php';
}
echo "<!DOCTYPE html>
    <html lang='en'>";
include_once 'head.php';
if (isset($current_style)){
    echo '<style>';
    include_once $current_style;
    echo '</style>';
}
echo "<body>";

include_once 'header.php';
echo "<div id='wrapper'>";
include_once $current_container;

echo "</div>";
include_once 'footer.php';
echo "</body>
        </html>";
?>