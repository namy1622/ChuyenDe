
<?php
    session_start();

    
    use Exception as GlobalException;
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;


    // require 'vendor/autoload.php'; // Đường dẫn đến tệp autoload.php của PHPMailer
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    
    // Hàm tạo mã xác nhận
    function generateVerificationCode() {
        return str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT); // Mã gồm 4 chữ số, có thể tùy chỉnh
    }

    // Lấy địa chỉ email từ form
    $email = isset($_POST['email']) ? $_POST['email'] : '';
 //   $verificationCode_test = isset($_POST['verificationCode']) ? $_POST['verificationCode'] : '';
         

    $mail = new PHPMailer(true);
    $verificationCode = generateVerificationCode();
    $_SESSION["verification_code_for_$email"] = $verificationCode;
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'namgoku235@gmail.com'; // Thay bằng email của bạn
        $mail->Password = 'lnzi xqzd ftpv icre'; // Thay bằng mật khẩu của bạn
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('namgoku235@gmail.com', 'Xác nhận');
        $mail->addAddress($email); // Thêm

        $mail->isHTML(false);
        $mail->Subject = 'Verification Code';
        $mail->Body = "Your verification code is: $verificationCode";

        $mail->send();
        // echo 'Mã đã được gửi...';
        // echo $verificationCode;
                
       
    } 
    catch (Exception $e) {        
    }

   
// }


?>


<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container{
            
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease forwards;
        }
           
        
        input{
            margin: 5px;
            border-radius: 2px;
            width: 300px;
            height: 30px;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="email"], input[type="text"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        input[type="email"]:focus, input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }
        input[type="submit"] {
            width: calc(100% - 20px);
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .verification-code {
            display: none;
            animation: slideIn 0.5s ease forwards;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
</style>
    <div class="container">
        <h2>Quên mật khẩu</h2>
        <form id="emailForm"  method="post">
            <label for="email">Nhập địa chỉ email đăng kí:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Gửi mã">
        </form>
        <form id="verificationForm"    method="post" class="verification-code">
            <label for="verificationCode">Nhập mã xác nhận:</label>
            <input type="text" id="verificationCode" name="verificationCode" required>
            <input type="text" id="confirm_email" hidden name="email">
            <input type="submit" id="xn" value="Xác nhận">

            <!-- <label class="show_MK">Mật khẩu là: <label name="password"></label></label> -->
        </form>
    </div>


    <script>
    // Biến để đánh dấu đã gửi mã từ form email hay chưa
    var emailFormSubmitted = false;

    // Email form submission
    document.getElementById("emailForm").onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

        // Send form data via AJAX only if not already submitted
        if (!emailFormSubmitted) {
            // biến đại diện cho đối tượng XMLHttpRequest, 
            //được sử dụng để gửi yêu cầu HTTP từ trình duyệt web đến máy chủ 
            //và xử lý phản hồi từ máy chủ
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "send.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.querySelector(".verification-code").style.display = "block"; // Display verification form
                    var email = document.getElementById("email").value;
                    document.getElementById('confirm_email').value = email;
                    emailFormSubmitted = true; // Mark email form as submitted
                } else {
                    alert("An error occurred while sending the request.");
                }
            };
            xhr.send(formData); // Send form data
        }
    };

    // Verification form submission
    document.getElementById("verificationForm").onsubmit = function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Get form data

       
        // Send form data via AJAX only if email form has been submitted
        if (emailFormSubmitted) {
            var xhr = new XMLHttpRequest();
            
            xhr.open("POST", "getPass.php", true);
            xhr.onload = function() {
                if (xhr.status === 200) {

                    var password = xhr.responseText;
                    alert("Mật khẩu là: " +  password);
                    location.href = 'login.php'; // Redirect to login page

                    
                } 
                else {
                    alert("Nhập sai mã...");
                }
            };
            xhr.send(formData); // Send form data
        } else {
            alert("Please submit email form first.");
        }
    };
</script>

