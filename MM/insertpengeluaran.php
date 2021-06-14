<?php
include("pengeluaran.php");
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
    echo "Error to connect\n";
} else {  
if(isset($_GET['submit'])&&!empty($_GET['submit'])){

    session_start();
    $userid = $_SESSION["useruid"];
    $pengeluaran = $_GET['tanggal_pengeluaran'];
    $jumlah = $_GET['jumlah'];
    $keterangan = $_GET['keterangan'];  

    $query = "INSERT INTO catatan_pengeluaran_pribadi (tanggal_pengeluaran, jumlah, keterangan, userid) values 
            ('$pengeluaran', $jumlah, '$keterangan', '$userid' )";
    $result = @pg_query($con, $query);
    if(!$result){
        echo '<script>alert("Silahkan memasukkan kembali dengan benar")</script>';
         }
    else{
        header("location: pengeluaran.php");
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
        <input type ="text" name="tanggal_pengeluaran" placeholder="Tanggal Pengeluaran">
        <input type ="text" name="jumlah" placeholder="jumlah">
        <input type ="text" name="keterangan" placeholder="keterangan">
        <input type="submit" name="submit"  value="Submit">
    </form>


</body>
</html>
