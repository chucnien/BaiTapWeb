<?php
          require "../PHPMailer-master/src/PHPMailer.php";  //nhúng thư viện vào để dùng, sửa lại đường dẫn cho đúng nếu bạn lưu vào chỗ khác
          require "../PHPMailer-master/src/SMTP.php"; //nhúng thư viện vào để dùng
          require '../PHPMailer-master/src/Exception.php'; //nhúng thư viện vào để dùng
          $mail = new PHPMailer\PHPMailer\PHPMailer(true);  //true: enables exceptions
            try {
               // $mail->SMTPDebug = 2;  // 0,1,2: chế độ debug. khi mọi cấu hình đều tớt thì chỉnh lại 0 nhé
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
		    $nguoigui = 'chucnienfc@gmail.com';
		    $matkhau = 'mhkxfkyutplkchan';// mật khẩu ứng dụng đã tạo ở bước 3
            $tennguoigui = 'Ba';
                $mail->Username = $nguoigui; // SMTP username
                $mail->Password = $matkhau;   // SMTP password
                $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                $mail->Port = 465;  // port to connect to                
                $mail->setFrom($nguoigui, $tennguoigui ); 
                $to = "banlt.21ad@vku.udn.vn";
                $to_name = "thanhba";
                $mail->addAddress($to, $to_name); //mail và tên người nhận
               // $mail->addAddress("nlquan@vku.udn.vn","lequan");
                /* $recipients = "test1@test.com,test2@test.com,test3@test.com,test1@test.com";
    $email_array = explode(",",$recipients);*/
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Gửi thư từ php';      
                $noidungthu = "<b>Chào bạn!</b><br>Nộp giấy nớ chưa?" ;
                $mail->Body = $noidungthu;
                $mail->AddAttachment("4.jpg","picture");
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                echo 'Đã gửi mail xong';
                
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }

?>

