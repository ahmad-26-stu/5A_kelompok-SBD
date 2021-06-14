<?php
error_reporting(0);
session_start();
?>
<html>

<head>
        <link rel="stylesheet" href="styleMM.css"/>

</head>

<body>

<?php
include("web.php");
$host = 'localhost';
$user = 'postgres';
$pass = '';
$db = 'moneymanagement';
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die
        ("Can't connect\n");

if(!$con){
    echo "Error to connect :(\n";
} else { 

    $userid = $_SESSION["useruid"];
    $query = "SELECT id, tanggal_hutang, tanggal_bayar, jumlah, keterangan
    FROM catatan_utang_pribadi where userid LIKE '$userid' ORDER BY tanggal_hutang ASC";
    $show = pg_query($con, $query);
    }
?>
<table>
<tr>
    
    <th>NumID</th>
    <th>Tanggal Hutang</th>
    <th>Tanggal Bayar</th>
    <th>Jumlah</th>
    <th>Keterangan</th>
</tr>

<tr>
<?php
    while($row = pg_fetch_row($show)){   
            echo "<tr>";
                echo "<td>". $row[0] . "</td>";
                echo "<td>". $row[1] . "</td>";
                echo "<td>". $row[2] . "</td>";
                echo "<td>". $row[3] . "</td>";
                echo "<td>". $row[4] . "</td>";
            echo "</tr>";
        }  
pg_close($con);

?>
</tr>

</table>


<h2><a href="insertutang.php">add</a></h2>
<h2><a href="deleteutang.php">delete</a></h2>

</body>

</html>
