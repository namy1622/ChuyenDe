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
h1{
    color: black;
    margin-left: 600px
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
    <ul class="menu"> 
        <li class="list"><a href="trangchu.php">Trang chủ</a></li>
        <li class="list"><a href="giohang.php">Giỏ hàng</a></li>
        <li class="list"><a href="update.php">Sửa sản phẩm</a></li>
        <li class="list"><a href="https://bazaarvietnam.vn/thoi-trang/">Tin tức mua sắm</a></li>
      </ul>
</div>
<img src="schic-01-scaled.jpg" alt="not found" class="midimg"><br>
<div class='middle'>
<?php
require 'link.php';
$id = $_POST ["id"] ;
$tensp = $_POST ["tensp"] ;
mysqli_set_charset($conn,"UTF8");
$sql = "SELECT *FROM trangnpham WHERE id_san_pham='$id' OR ten_san_pham='$tensp'";
$result = $conn->query($sql);
if($result->num_rows > 0) {
$rows = $result->fetch_assoc();
        echo "<div class='proto'> 
        <img src='66d4fd084d8f622359eaca21e8b0d6b2.jpg' alt='not found' class='ao'>".
        "<p> Mã SP: ".$rows['id_san_pham']."</p>".
        "<p>Tên: " .$rows['ten_san_pham']."</p>".
        "<p>Địa chỉ: " .$rows['dia_chi']."</p>".
        "</div>";
    }
else{
    echo "<h1>Vui lòng nhập dữ liệu cần tìm !</h1>";
}
$conn->close();
?>
</div>
</body>
</html>
