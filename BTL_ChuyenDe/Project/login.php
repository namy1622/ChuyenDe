<html lang="en" style="background-color: #FFFFCC">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời Trang Store</title>
    <style>
input{
    margin: 5px;
    border-radius: 2px;
    width: 300px;
    height: 30px;
}
.login{
    margin-top: 10%;
    margin-left: 40%;
}
h1{
    margin-left: 27px;
    color:#33CCFF;
}
form{
    background-color:grey;
    width:310px;
    border-radius: 10px;
    height: 300px;
}
    </style>
</head>
<body>
<div class="login">
   <form action="login.php" method="post">
      <h1>Đăng nhập tại đây</h1>
      <input type="text"  placeholder= "Nhập Tài Khoản" name="user"><br>
      <input type="password" placeholder="Nhập Password" name="password"><br>
      <input type="Submit" value="Đăng nhập" name="login">
   </form>  
   </div>
<?php
ob_start();
require "link.php";
session_start();
if(isset($_POST["login"])){
    $user_name=$_POST["user"];
    $password=$_POST["password"];
    $sql = "SELECT *FROM login WHERE user_name = '$user_name' AND pass_word ='$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $_SESSION["user"]=$user_name;
        if($result->fetch_assoc()['role'] == 1) {
            header("location: trangchu.php");
        } else {
            header("location: trangchuuser.php");
        }
    }
    else{
        echo"sai ten dang nhap hoac mat khau" ;
    }  
}
$conn->close();
ob_end_flush();
?>
</body>
</html>