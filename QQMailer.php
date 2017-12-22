<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/22
 * Time: 14:42
 */
require_once("./vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("./vendor/phpmailer/phpmailer/src/SMTP.php");

class QQMailer
{
    public static $HOST = 'smtp.qq.com';
    public static $PORT = 465;
    public static $SMTP = 'ssl';
    public static $CHARSET = 'UTF-8';

    private static $USERNAME = '497357319@qq.com';
    private static $PASSWOED = 'qnalqwoduwljcbed';
    private static $NICENAME = '飘来飘去';
    private static $isHTML = true;

    public function __construct($debug = false)
    {
        $this->mailer = new \PHPMailer\PHPMailer\PHPMailer();
        $this->mailer->SMTPDebug = $debug ? 1 : 0;
        $this->mailer->isSMTP();
    }

    public function getMailer()
    {
        return $this->mailer;
    }

    /**
     *
     */
    public function loadConfig()
    {
        /* 服务端配置 */
        $this->mailer->SMTPAuth = true;
        $this->mailer->Host = self::$HOST;
        $this->mailer->Port = self::$PORT;
        $this->mailer->SMTPSecure = self::$SMTP;

        /* 设置发送编码 */
        $this->mailer->CharSet = self::$CHARSET;
        $this->mailer->isHTML(self::$isHTML);

        /* 账户设置 */
        $this->mailer->Username = self::$USERNAME;
        $this->mailer->Password = self::$PASSWOED;
        $this->mailer->From = self::$USERNAME;
        $this->mailer->FromName = self::$NICENAME;

    }

    /**
     * @param $email
     * @param $title
     * @param $content
     * @param bool $attachment
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     */
    public function send($email, $title, $content, $attachment = false)
    {
        $this->loadConfig();
        $this->mailer->addAddress($email);
        $this->mailer->Subject = $title;
        $this->mailer->Body = $content;
        if ($attachment) {
            $this->addFile($attachment);
        }
        return (bool)$this->mailer->send();
    }

    private function addFile($path)
    {
        $this->mailer->addAttachment($path);
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->$name = $value;
    }

    public function __get($name)
    {
        $this->$name = 1;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo $name;
        print_r($arguments);
    }

    public static function __callStatic($name, $arguments)
    {
        echo 1;
    }
}

$mail = new QQMailer();
$sendEmail='yangzhiweiga@163.com';
$title='封装邮件发送';
$content=<<<EOD
<div ne-role="tab-body" class="tab_panel current" style="">
            <div class="mod_idx_live">
                <div class="bohe_imgs">
                    
                    <a href="http://live.ent.163.com/39172308?f=163.homeLive" class="photo">
                        <img src="http://mint-public.nosdn.127.net/mint_1513744454352_51025842.jpg?imageView&amp;thumbnail=200y200" alt="这个美女养不起">
                        <span class="bg"></span>
                        <h3>这个美女养不起</h3>
                        
                        <em class="cm_bohetag">LIVE</em>
                        
                    </a>
                    
                    <a href="http://live.ent.163.com/44667582?f=163.homeLive" class="photo">
                        <img src="http://mint-public.nosdn.127.net/mint_1513497504729_87398217.jpg?imageView&amp;thumbnail=200y200" alt="原生态绿色主播">
                        <span class="bg"></span>
                        <h3>原生态绿色主播</h3>
                        
                        <em class="cm_bohetag">LIVE</em>
                        
                    </a>
                    
                </div>
                <ul class="live_ul bohe_live_ul">
                    
                        <li class="first living">
                            <a href="http://live.ent.163.com/24198691?f=163.homeLive">
                                <em>正在直播</em>
                                <span>一生这么长，不要错过我这么有趣的人</span>
                            </a>
                        </li>
                        
                        <li class=" living">
                            <a href="http://live.ent.163.com/37599384?f=163.homeLive">
                                <em>正在直播</em>
                                <span>你觉得单眼皮和双眼皮哪个更好看呢？</span>
                            </a>
                        </li>
                        
                        <li class=" living">
                            <a href="http://live.ent.163.com/85670321?f=163.homeLive">
                                <em>正在直播</em>
                                <span>人生已经这么艰难，我只想和主播聊会天</span>
                            </a>
                        </li>
                        
                        <li class=" living">
                            <a href="http://live.ent.163.com/33662645?f=163.homeLive">
                                <em>正在直播</em>
                                <span>正点啊，好久没见过这么漂亮的主播妹子了</span>
                            </a>
                        </li>
                        
                        <li class=" living">
                            <a href="http://live.ent.163.com/10208910?f=163.homeLive">
                                <em>正在直播</em>
                                <span>没想到妹子反差萌，一举一动都是表情包</span>
                            </a>
                        </li>
                        
                </ul>
            </div>
        </div>
EOD;
$res=$mail->send($sendEmail,$title,$content);
if($res){
    echo "发送成功";
}else{
    echo "发送失败";
}