<?php 
include("pemasukan.php");
?>
<?php
error_reporting();
$host = 'localhost';
$user = 'postgres';
$pass = '';
$db = 'moneymanagement';
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die
        ("Can't connect\n");

if(!$con){
    echo "Error to connect\n";
} else {  
if(isset($_GET['submit'])&&!empty($_GET['submit'])){
    session_start();
    $userid = $_SESSION["useruid"];
    $pemasukan = $_GET['tanggal_pemasukan'];
    $jumlah = $_GET['jumlah'];
    $keterangan = $_GET['keterangan'];  

    $query = "INSERT INTO catatan_pemasukan_pribadi (tanggal_pemasukan, jumlah, keterangan, userid) values 
            ('$pemasukan', $jumlah, '$keterangan', '$userid' )";
    $result = pg_query($con, $query);
    if(!$result){
        echo '<script>alert("Silahkan memasukkan kembali dengan benar")</script>';
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
        <input type ="text" name="tanggal_pemasukan" placeholder="tanggal pemasukan">
        <input type ="text" name="jumlah" placeholder="jumlah">
        <input type ="text" name="keterangan" placeholder="keterangan">
        <input type="submit" name="submit"  value="Submit">
    </form>


</body>
</html>
