
<?php
session_start();
if (isset($_SESSION['active']) && (time() - $_SESSION['active'] > 600)) {
    header("Location: logout.php");
}
$_SESSION['active'] = time();

if(!isset($_SESSION['useruid'])){
    header("location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styleMM.css"/>
    
    <title>MoneyManagement</title>
</head>
<body>
     <!-- ********************************************************* -->
  
     <div id="header-wrapper">
        <div class="container">
            <div class="row">
                <div class="12u">
                    <header id="header">
                        <h1><a href= "http://moneymanagement.vhost.com/web.php">Money Management</a></h1>
                        <nav id="nav">
                        <h4><a href="login.php" style ="display: block; " >Login</a> </h4> 
                         <h4><a href="register.php" style ="display: block; " >Register</a> </h4> 
                            <h4><a href="logout.php" style ="display: block; " >Logout</a> </h4> 
                            <a href="pemasukan.php" >catatan pemasukan</a>
                            <a href="pengeluaran.php"  >catatan pengeluaran</a>    
                            <a href="utang.php"  >catatan utang piutang</a>                         
                        </nav>
                    </header>
                </div>
            </div>
        </div>
    </div>

</body>
</html>