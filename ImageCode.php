<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/21
 * Time: 13:14
 */


/**
 * 生成验证码
 *
 * Class makeImageCode
 */
class ImageCode
{
    protected $image;
    protected $prevColorValue = 0;
    protected $nextColorValue = 255;
    protected $bgType = 1;
    protected $imageType = 'png';
    protected $type = array('jpeg', 'jpg', 'gif', 'png');
    protected $fontSize = 6;
    const ImageCode = 'qwertyuipkjhgfdsazxcvbnm23456789';

    function __construct()
    {
        if (isset($_GET['prev'])) {
            $this->prevColorValue = (int)$_GET['prev'];
        }

        if (isset($_GET['type'])) {
            if (in_array($_GET['type'], $this->type)) {
                $this->imageType = $_GET['type'];
            }
        }
    }


    function makeImageCode()
    {
        try {
            //创建画布
            $this->createImageCate();

            //生成背景色并填充
            $this->fillImageColor();

            //增加干扰点
            $this->interFerElement();

            //输出验证码图像
            $this->inputImageCode();
        } catch (\Exception $msg) {
            echo $msg->getMessage();
        }

    }

    public function createImageCate()
    {
        $this->image = imagecreatetruecolor(100, 30);
    }

    protected function setImageColor($prev = 255, $next = 255, $rand = false)
    {
        if (!$rand) {
            $color = imagecolorallocate($this->image, 255, 255, 255);
        } else {
            $this->setBoundary($prev, $next);
            $color = imagecolorallocate($this->image, rand($this->prevColorValue, 255), rand($this->prevColorValue, 255), rand($this->prevColorValue, 255));
        }
        return $color;
    }

    protected function setBoundary($prev, $next)
    {
        if (((int)$prev >= 0 && (int)$prev <= 255) && ((int)$next >= 0 && (int)$next <= 255)) {
            if ((int)$prev == (int)$next) {
                throw new Exception("边界值不能相等");
            }
            $this->prevColorValue = $prev;
            $this->nextColorValue = $next;
        } else {
            throw new Exception("边界值不合法");
        }
    }

    public function fillImageColor()
    {
        imagefill($this->image, 0, 0, $this->setImageColor());
    }

    /**
     * @param int $count
     * @return string
     */
    protected function randColor($count = 3)
    {
        $data = '';
        if ((int)$count >= 0) {
            for ($i = 0; $i < $count; $i++) {
                $data .= sprintf("rand(%d,%d),", $this->prevColorValue, $this->nextColorValue);
            }
        }
        return trim($data, ',');
    }


    public function interFerElement()
    {
        $this->inputCode();
        $this->ferElement();
    }

    protected function inputCode()
    {
        for ($i = 0; $i < 4; $i++) {
            $color = $this->setImageColor(25, 235, true);
            $content = substr(self::ImageCode, rand(0, strlen(self::ImageCode)), 1);
            $x = ($i * 100 / 4) + rand(5, 9);
            $y = rand(5, 10);
            imagestring($this->image, $this->fontSize, $x, $y, $content, $color);
        }
    }

    protected function ferElement()
    {
        // 增加干扰点元素
        for ($i = 0; $i < 300; $i++) {
            $point = $this->setImageColor(50, 200, true);;
            imagesetpixel($this->image, rand(0, 99), rand(0, 29), $point);
        }
        // 增加干扰线元素  线 和 点 的颜色一定要控制好 要比验证码数字的颜色浅 避免出现验证码数字看不见的现象
        for ($i = 0; $i < 4; $i++) {
            $line = $this->setImageColor(100, 240, true);
            imageline($this->image, rand(0, 99), rand(0, 29), rand(0, 99), rand(0, 29), $line);
        }
    }

    public function inputImageCode()
    {
        $this->setImageType();
        $imageType = $this->inputImageType();
        $imageType($this->image);
    }

    private function inputImageType()
    {
        $str = "image";
        $imageType = $str . $this->imageType;
        return $imageType;
    }

    protected function setImageType()
    {
        header(sprintf("Content-Type:image/%s", $this->imageType));
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        imagedestroy($this->image);

    }
}
$img=new ImageCode();
$img->makeImageCode();

