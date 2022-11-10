<?php
          require "../PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
          require "../PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
          require '../PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
if (isset($_POST)) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
    try {
      //  $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $nguoigui = 'chucnienfc@gmail.com';
        $matkhau = 'mhkxfkyutplkchan'; // đã tạo ở bước 3
        $tennguoigui = 'chúc niên';
        $mail->Username = $nguoigui; // SMTP username
        $mail->Password = $matkhau;   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom($nguoigui, $tennguoigui);
        $to = $_POST['email'];
        $to_name = "thanh ba";
		$tieude = $_POST['hahaha'];

        $mail->addAddress($to, $to_name); //mail và tên người nhận  
		$mail->addAddress("banlt.21ad@vku.udn.vn","thanhba");
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = $tieude;
		$noidungthu = ' <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><b>Xin chào ' . $to_name . '</b></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <p class="card-text">' . $_POST['content'] . '</p>
                </div>
                </div> ';
        $mail->Body =  $noidungthu;	
			if(isset($_FILES['file']['name'])) {
                $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name']));
            } 
            $mail->smtpConnect(array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
            if($mail->send())
               {
                header("Location:index.php");
               }
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }	
        }
            