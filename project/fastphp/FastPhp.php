<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2017/12/22
 * Time: 22:10
 */

namespace fastphp;


/**
 * 框架核心类
 * Class FastPhp
 * @package fastphp
 */
defined('CORE_PATH') or define('CORE_PATH', __DIR__);

class FastPhp
{
    protected $controllerName;
    protected $actionName;
    protected $param = array();
    //配置内容
    protected $config = [];

    public function __construct($config)
    {
        $this->config = $config;
        $this->setHeaderCode();
    }

    private function setHeaderCode()
    {
        header('Content-type:text/html;charset=utf-8');
    }

    /**
     * 程序运行
     *
     * 1.类自动加载
     * 2.环境检查
     * 3.过滤敏感字符
     * 4.移除全局变量
     * 5.路由处理
     */
    public function run()
    {
        try {
            spl_autoload_register(array($this, 'loadClass'));
            $this->setReporting();
            $this->removeMagicQuotes();
            $this->unregisterGlobals();
            $this->setDbConfig();
            $this->route();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    //自动加载类
    public function loadClass($className)
    {
        $classMap = $this->classMap();
        if (isset($classMap[$className])) {
            $file = $classMap[$className];
        } elseif (strpos($className, '\\') !== false) {
            $file = APP_PATH . str_replace('\\', '/', $className) . '.php';
            if (!is_file($file)) {
                return;
            }
        } else {
            return;
        }
        include $file;
    }

    /**
     * 内核文件命名空间映射关系
     */
    protected function classMap()
    {
        return [
            'fastphp\base\Controller' => CORE_PATH . '/base/Controller.php',
            'fastphp\base\Model' => CORE_PATH . '/base/Model.php',
            'fastphp\base\view' => CORE_PATH . '/base/View.php',
            'fastphp\db\Db' => CORE_PATH . '/db/Db.php',
            'fastphp\db\Sql' => CORE_PATH . '/db/Sql.php',
        ];

    }

    //检测开发环境
    public function setReporting()
    {
        if (APP_DEBUG === true) {
            error_reporting(E_ALL);
            ini_set('display_errors', 'On');
        } else {
            error_reporting(E_ALL);
            ini_set('display_errors', 'Off');
            ini_set('log_errors', 'On');
        }
    }

    //检测敏感字符并删除
    public function removeMagicQuotes()
    {
        if (!get_magic_quotes_gpc()) {
            $_GET = isset($_GET) ? $this->stripSlashesDeep($_GET) : "";
            $_POST = isset($_POST) ? $this->stripSlashesDeep($_POST) : "";
            $_COOKIE = isset($_COOKIE) ? $this->stripSlashesDeep($_COOKIE) : "";
            $_SESSION = isset($_SESSION) ? $this->stripSlashesDeep($_SESSION) : "";
        }
    }

    //删除敏感字符
    public function stripSlashesDeep($value)
    {
        $value = is_array($value) ? array_map(array($this, 'stripSlashesDeep'), $value) : stripslashes($value);
        return $value;
    }

    public function unregisterGlobals()
    {
        if (!ini_get('register_globals')) {
            $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
            foreach ($array as $value) {
                if (isset($GLOBALS[$value]) && is_array($GLOBALS[$value])) {
                    foreach ($GLOBALS[$value] as $key => $var) {
                        if (isset($var) && $var === isset($GLOBALS[$key])) {
                            unset($GLOBALS[$key]);
                        }
                    }
                }
            }
        }
    }

    //配置数据库信息
    public function setDbConfig()
    {
        if ($this->config['db']) {
            define('DB_HOST', $this->config['db']['host']);
            define('DB_NAME', $this->config['db']['dbname']);
            define('DB_USER', $this->config['db']['username']);
            define('DB_PASS', $this->config['db']['password']);
        }
    }

    //路由处理
    public function route()
    {
        $this->controllerName = $this->config['defaultController'];
        $this->actionName = $this->config['defaultAction'];

        //清除？后面参数
        $url = $_SERVER['REQUEST_URI'];
        $position = strpos($url, '?');
        $url = $position == false ? $url : substr($url, 0, $position);
        $url = trim($url, '/');
        if ($url) {
            //使用'/'分割字符串
            $urlArray = explode('/', $url);
            //过滤空元素
            $urlArray = array_filter($urlArray);
            if (count($urlArray) > 1) {
                //获取控制器名
                $this->controllerName = ucfirst(array_shift($urlArray));

                //获取方法名
                $this->actionName = $urlArray ? array_shift($urlArray) : $this->actionName;
            } else {
                $this->controllerName = $this->controllerName;
                $this->actionName = 'index';
            }


            //获取url参数
            array_shift($urlArray);
            $this->param = $urlArray ? $_GET : array();
        }

        //判断控制器和方法是否存在
        $controller = 'app\\controller\\' . $this->controllerName . 'Controller';
        if (!class_exists($controller)) {
            throw new \Exception(sprintf("%s控制器不存在", $controller));
        }
        if (!method_exists($controller, $this->actionName)) {
            throw new \Exception(sprintf("%s方法不存在", $this->actionName));
        }

        $dispatch = new $controller($controller, $this->actionName);
        call_user_func(array($dispatch, $this->actionName), $this->param);
    }
}