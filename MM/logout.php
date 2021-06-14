<?php
error_reporting(0);
$host = 'localhost';
$user = 'postgres';
$pass = '';
$db = 'moneymanagement';
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die
        ("Can't connect\n");

if(!$con){
    echo "Error to connect :(\n";
} else { 
    session_start();
    $userid = $_SESSION["useruid"];
    $show = pg_query($con, "DELETE FROM login WHERE userid = '$userid'");
    session_unset();
    session_destroy();

        if(!$show){
            echo 'Logout mengalami kegagalan';
        }
        echo "Logout telah berhasil";

        header("Location: login.php");

}
?>

