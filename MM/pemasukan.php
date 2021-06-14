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
   $query = "SELECT id, tanggal_pemasukan, jumlah, keterangan
    FROM catatan_pemasukan_pribadi where userid LIKE '$userid' ORDER BY tanggal_pemasukan ASC";
    $show = pg_query($con, $query);
    }
?>
<table>
<tr>
    
    <th>NumID</th>
    <th>Tanggal Pemasukan</th>
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
            echo "</tr>";
        }  
pg_close($con);

?>
</tr>

</table>

    <div class="container">
<h2><a href="insertpemasukan.php">add</a></h2>
<h2><a href="deletepemasukan.php" >delete</a></h2>
    </div>

</body>

</html>
