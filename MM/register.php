<?php
error_reporting();
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
    $name = $_POST['name'];
    $password = md5($_POST['pwd']);
    $email = $_POST['email'];  
    
    $query = "INSERT INTO akun (userid, name, password, email) values 
            ('$userid', '$name', '$password', '$email' )";
    $result = @pg_query($con, $query);
    if(!$result){echo 'Data tidak berhasil disimpan dan disarankan untuk mengganti useridnya';}
}
    }
    pg_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Silahkan register</h2>
  <form method="post">
  
    <div class="form-group">
      <label for="userid">Userid:</label>
      <input type="text" class="form-control" id="userid" placeholder="Enter username" name="userid" required>
    </div>
    
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
    <a href= "http://moneymanagement.vhost.com/login.php"  class="btn btn-primary" >Login</a>

  </form>
</div>
</body>
</html>