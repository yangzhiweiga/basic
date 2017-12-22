<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 14:02
 */
require_once("./vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("./vendor/phpmailer/phpmailer/src/SMTP.php");

$mail=new \PHPMailer\PHPMailer\PHPMailer();

//是否启用smtp的debug进行调试 开发环境建议开启 生产环境关闭
$mail->SMTPDebug=1;
//使用smtp鉴权方式发送邮件
$mail->isSMTP();
//smtp需要鉴权这个必须是ture
$mail->SMTPAuth=true;
//链接qq域名邮箱的服务器地址
$mail->Host='smtp.qq.com';
//设置使用ssl加密方式登录鉴权
$mail->SMTPSecure='ssl';
//设置ssl链接smtp服务器的远程服务端端口号
$mail->Port=465;
//设置发送的邮件编码
$mail->CharSet="UTF-8";
//设置发件人昵称 显示在收件人邮件的发件人邮箱地址的发件人姓名
$mail->FromName="飘来飘去";
//smtp登录的邮箱 QQ邮箱即可
$mail->Username='497357319@qq.com';
//smtp登录的密码 使用生成的授权码
$mail->Password='qnalqwoduwljcbed';
//设置发件人的邮箱地址 同登录账号
$mail->From='497357319@qq.com';
//邮件正文是否为html编码 注意此处是一个方法
$mail->isHTML(true);
//设置收件人的邮箱地址
$mail->addAddress('yangzhiweiga@163.com');
//添加该邮件主题
$mail->Subject='测试邮箱发送';
//添加邮件正文
$mail->Body='<h1>Hello world</h1>';
//添加附件
$mail->addAttachment('./Son.php');
//发送邮件 返回状态
$status=$mail->send();
if($status==1){
    echo '发送成功';
}





