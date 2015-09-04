<?php
//发送邮件函数1,此函数为方便phpmailer发送邮件类的调用。如需更强大的功能，请直接使用PHPMailer类
function sendMail1($address,$fromName,$toName,$subject,$body){
		import("@.Tool.phpmailer");
        $mail = new PHPMailer(); //实例化 
        $mail->IsSMTP(); // 启用SMTP 
        $mail->Host = C('mail_Host'); //SMTP服务器 以163邮箱为例子 
        $mail->Port = C('mail_Port');  //邮件发送端口 
        $mail->SMTPAuth   = true;  //启用SMTP认证 
         
        $mail->CharSet  = "UTF-8"; //字符集 
        $mail->Encoding = "base64"; //编码方式 
         
        $mail->Username = C('mail_Username');  //你的邮箱 
        $mail->Password = C('mail_Password');  //你的密码 
        $mail->Subject = $subject; //邮件标题 
         
        $mail->From = C('mail_Username');  //发件人地址（也就是你的邮箱） 
        $mail->FromName = $fromName;  //发件人姓名 
         
        $mail->AddAddress($address, $toName);//添加收件人（地址，昵称） 
         
        $mail->IsHTML(true); //支持html格式内容 
        
        $mail->Body = $body; //邮件主体内容 
 
        //发送 
        if(!$mail->Send()) { 
          // echo "发送失败: " . $mail->ErrorInfo; 
            return false;
        } else { 
          // echo "邮件已发送!"; 
            return true;
        } 
}
?>