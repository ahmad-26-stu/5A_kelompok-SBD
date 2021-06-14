<?php
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php
$host = 'localhost';
$user = 'postgres';
$pass = '';
$db = 'moneymanagement';
$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die
        ("Can't connect\n");

if(!$con){
    echo "Error to connect :(\n";
} else { 

        $query = "SELECT userid, name, email
        FROM akun";
        $show = pg_query($con, $query);
        if(!$show){
            echo"tidak berhasil ditampilkan";
        }
    
}
?>

<table border= "1px" cellpadding="4" cellspacing="0" width = "30%" style="margin-right:auto; margin-left:auto; text-align:center;" >
<tr>
    
    <th>UserID</th>
    <th>Name</th>
    <th>Email</th>
</tr>

<tr>
<?php
    while($row = pg_fetch_row($show)){   
            echo "<tr>";
                echo "<td>". $row[0] . "</td>";
                echo "<td>". $row[1] . "</td>";
                echo "<td>". $row[2] . "</td>";
            echo "</tr>";
        }  


?>
</tr>

</table>

<div class="container">
    <h2><a href="admindel.php"  class="btn btn-primary" >Delete</a><h2>
    <h2><a href="adminin.php" class="btn btn-primary">Insert</a></h2>
    <h4><a href="logout.php" class="btn btn-primary" >Logout</a> </h2> 
</div>

</body>

</html>
