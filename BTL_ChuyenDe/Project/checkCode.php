<?php 
session_start();
require "link.php";

$email = isset($_POST['email']) ? $_POST['email'] : '';
$verificationCode_test = isset($_POST['verificationCode']) ? $_POST['verificationCode'] : '';

// if ($verificationCode_test) {
    $code = isset($_POST['verificationCode']) ? $_POST['verificationCode'] : '';
    $storedCode = $_SESSION["verification_code_for_$email"];
    
    if ($storedCode === $code) {
        // khi đã so sánh xong thì xóa code vừa tạo đi
        unset($_SESSION["verification_code_for_$email"]);

         // Thực hiện truy vấn SQL
       $sql = "SELECT pass_word FROM login WHERE user_name = '$email'";
       $result = mysqli_query($conn, $sql);
   
        // lưu Pass vào $_SESSION['pass_word'], chuyển qua getPass để gọi lại nó
        //.... gọi tại đây dính mã html
       $_SESSION['pass_word'] = mysqli_fetch_assoc($result)['pass_word'];
      
       header("Location: /send.php", true, 200 );

       
    } 
    else {
        header("Location: /send.php", true, 5000 );
    }
// }
 
?>