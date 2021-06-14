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

    session_start();
    $hashpassword = md5($_POST['pwd']);
    $query ="select * from akun where userid = '".$_POST['userid']."' and password ='".$hashpassword."'";

    $data = pg_query($con, $query); 
    $check = pg_num_rows($data);
    if($check > 0){ 
        echo "Login telah berhasil"; 
        $_SESSION["useruid"] = $_POST['userid'];
        $temp = 'admin';
        
        if ($_SESSION["useruid"] == $temp ){
            header("location: admin.php");
        } 
        
        else {
          $inuser = "insert into login (userid, password) values ('".$_SESSION["useruid"]."', '".$hashpassword."')";
          $data = @pg_query($con, $inuser); 
          header("location: web.php");
          exit();
          }
    }else{
        echo "terdapat kesalahan";
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
<div class="container">
  <h2>Silahkan login </h2>
  <form method="post">
  
    <div class="form-group">
      <label for="userid">Userid:</label>
      <input type="text" class="form-control" id="userid" placeholder="Enter username" name="userid" required>
    </div>
     
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    <a href= "http://moneymanagement.vhost.com/register.php"  class="btn btn-primary" >Register</a>
  </form>
</div>
</body>
</html>