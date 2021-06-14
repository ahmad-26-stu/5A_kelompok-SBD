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
    if(isset($_POST['submit'])&&!empty($_POST['submit'])){
        $userid = $_POST['userid'];  

        $show = @pg_query($con, "DELETE FROM akun WHERE userid ='$userid'");
        if(!$show){
            echo 'Silahkan menghapus akun dengan ID yang benar';
        } else {
            header("location: admin.php");
        }
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="form-group">
    <form method= "POST">
      <label for="userid">Userid:</label>
      <input type="text" class="form-control" id="userid" placeholder="Enter username" name="userid">
      <input type="submit" name="submit" class="btn btn-primary" value="Submit">

    </form>
</div>


</body>

</html>