<html lang="en" style="background-color: #FFFFCC">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời Trang Store</title>
    <style>
ul.menu{ 
    margin: 20px;
    background-color: lightblue ;
    border:1px solid green ;
    border-width:1px 0;
    list-style:none;
    margin:0;
    padding:0;
    text-align:center;
}
li{
    display:inline;
    font-size: large; 
    padding: 2px;
}
.menu a{
    display:inline-block;
    padding:10px; 
    color: black;
    font-size: 20px;
}  
.list {
    border-right: 2px solid #FFFFFF;
} 
a {
    text-decoration: none ;
}
img.midimg {
    width: 1504px;
    height: 500px;
}
.ao{
    width: 300px;
}
.giohang{
    margin-top: 40px;
    width:200px;
    height:30px;
    margin-left: 700px;
    background-color : lightblue;
}
.proto{
    background-color: lightgrey;
    width: 20%;
    justify-content: center;
    align-items: center;
    border-radius: 10px;
    margin: 20px;
    justify-content: center;
    align-items: center;
}
.middle{
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    margin: 20px;
    justify-content: center;
    align-items: center;
}
p{
    margin-left :80px;
}
span{
    margin-left :80px;
    font-size: large;
}
    </style>
</head>
<body>
<div>
    <ul class="menu"> 
        <li class="list"><a href="trangchu.php">Trang chủ</a></li>
        <li class="list"><a href="giohang.php">Giỏ hàng</a></li>
        <li class="list"><a href="update.php">Sửa sản phẩm</a></li>
        <li class="list"><a href="https://bazaarvietnam.vn/thoi-trang/">Tin tức mua sắm</a></li>
      </ul>
</div>
<img src="schic-01-scaled.jpg" alt="not found" class="midimg"><br>
<form action="giohang.php" method="post">
<input type='submit' value='Xóa khỏi giỏ hàng' name='delete' class='giohang'><br>
<div class='middle'>
<?php
ob_start();
require 'link.php';
mysqli_set_charset($conn,"UTF8");
$sql = "SELECT *FROM gio_hang";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    for ($i=0; $i<$result->num_rows; $i++){
        $rows = $result->fetch_assoc();
        $nameid=$rows['id_san_pham'];
        echo "<div class='proto'> 
        <img src='66d4fd084d8f622359eaca21e8b0d6b2.jpg' alt='not found' class='ao'>".
        "<p> Mã SP: ".$rows['id_san_pham']."</p>".
        "<p>Tên: " .$rows['ten_san_pham']."</p>".
        "<p>Địa chỉ: " .$rows['dia_chi']."</p>".
        "<span>Chọn sản phẩm </span><input type='checkbox' name='checkbox[]' value='$nameid' class='check'></div>";
    }
}
if(isset($_POST['delete'])){
    if(isset($_POST['checkbox'])){
    $chkarr=$_POST['checkbox'];
    foreach ($chkarr as $id_san_pham) {
        $sql= "DELETE FROM gio_hang WHERE id_san_pham='$id_san_pham'";
        $conn->query($sql);
        header("location: giohang.php");
        echo "Xóa sản phẩm thành công";
}
}
}
$conn->close();
ob_end_flush();
?>
</form>
</div>
</body>
</html>