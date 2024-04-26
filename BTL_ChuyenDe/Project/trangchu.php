<html lang="en" style="background-color: #FFFFCC">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời Trang Store</title>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#submit').disabled = true;
        document.querySelector('#number').onkeyup = function() {
          if (document.querySelector('#number').value.length >= 10)
            document.querySelector('#submit').disabled = false;
          else
            document.querySelector('#submit').disabled = true;
            };
            const number = document.querySelector('#number').value;
            document.querySelector('#form').onsubmit = function() {
            document.querySelector('#number').value = '';
            document.querySelector('#submit').disabled = true;
            return false;
            };
    });
    function newAlert() {
        alert ("Bạn đã đăng nhập thành công");
    }
</script>
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
.nhap{
    width: 300px;
    height:30px;
    border-radius: 5px;
}
.submit{
    width: 80px;
    height:30px;
    border-radius: 5px;
    background-color: lightblue; 
}
.giohang{
    margin-top: 40px;
    width:200px;
    height:30px;
    margin-left: 700px;
    background-color:lightblue;
}
.search{
    margin-left: 450px;
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
.grid{
    display: grid;
    grid-column-gap:10px;
    grid-row-gap: 10px;
    grid-template-columns: 50% 50%;
    padding: 30px;
    margin: 30px;
    text-align: center;
}
footer{
    background-color: #CCFFCC;
}
h1{
    border :1px solid orange;
    background-color: orange;
    color: white;
}
.khuyenmai{
    margin-right:100px;
}
</style>
</head>
<body>
    <div class="search">
    <form action="trangchutimkiem.php" method="post">
    <input type="text" placeholder="Nhập Mã SP" name="id" class="nhap"> <input type="text" placeholder="Nhập tên sản phẩm" name="tensp" class="nhap"> 
        <input type="submit" value="Tìm kiếm" class="submit">
        </form>
    </div>
<div>
    <ul class="menu"> 
        <li class="list"><a href="trangchu.php">Trang chủ</a></li>
        <li class="list"><a href="giohang.php">Giỏ hàng</a></li>
        <li class="list"><a href="update.php">Sửa sản phẩm</a></li>
        <li class="list"><a href="https://bazaarvietnam.vn/thoi-trang/">Tin tức mua sắm</a></li>
      </ul>
</div>
<img src="schic-01-scaled.jpg" alt="not found" class="midimg"><br>
<form action="trangchu.php" method="post">
<input type='submit' value='Thêm vào giỏ hàng' name='insert' class='giohang'><br>
<div class='middle'>
<?php
ob_start(); 
require 'link.php';
mysqli_set_charset($conn,"UTF8");
$sql = "SELECT *FROM trangnpham";
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
if(isset($_POST['insert'])){
    if(isset($_POST['checkbox'])){
    $chkarr=$_POST['checkbox'];
    foreach ($chkarr as $id_san_pham) {
        $sql= "INSERT INTO  gio_hang ( `id_san_pham`,`ten_san_pham`,`dia_chi`)
        SELECT *FROM trangnpham 
        WHERE id_san_pham ='$id_san_pham'";
        $conn->query($sql);
        header("location: giohang.php");
}
}
}
ob_end_flush();
$conn->close();
?>
</div>
</form>
<footer>
    <div class="grid">
        <div>
            <h1>Liên Hệ</h1>
            <p>Địa chỉ: 255 Phạm Văn Đồng</p>
            <p>SĐT: 09XXXXXXXXX</p>
            <p>Email: thoitrangstore@gmail.com</p>
        </div>
        <div>
        <form action="trangchu.php" id="form">
      <h1>Kết Nối</h1>
      <p class='khuyenmai'>Nhận những khuyến mãi mới nhất</p>
      <input type="input" placeholder="Nhập Email" name="email"><br>
      <input type="Number" placeholder="Nhập SĐT" name="number" id="number"><br>
      <input type="Submit" value="Đăng nhập" name="login" id="submit" onclick="newAlert()">
   </form> 
        </div>
    </div>
</footer>
</body>
</html>