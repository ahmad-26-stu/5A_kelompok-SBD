<?php 
include("pemasukan.php");
?>
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
    if(isset($_GET['submit'])&&!empty($_GET['submit'])){
    $id = $_GET['id'];  

    $show = pg_query($con, "DELETE FROM catatan_pemasukan_pribadi WHERE id ='$id'");
    if(!$show){
        echo '<script>alert("Silahkan menghapus data dengan nomer ID yang benar")</script>';
    }
    else{
        header("location: pemasukan.php");
    }
    pg_close($con);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleMM.css" />
    <title>MoneyManagement</title>
</head>
<body>
    
    <form class = "box" method="GET">
        <input type ="text" name="id" placeholder="Urutan">       
        <input type="submit" name="submit" value="Submit">
    </form>


</body>
</html>


