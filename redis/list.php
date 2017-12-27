<a href="add.php">注册</a>
<?php
    require "redis.php";
    if(!empty($_COOKIE['auth'])) {
        $id = $redis->get("auth:" . $_COOKIE['auth']);
        $name = $redis->hget("user:" . $id, "username");

        ?>
        欢迎您,<?php echo $name; ?><a href="logout.php">退出</a>
        <?php
    }else {
        ?>
        <a href="login.php">登录</a>
        <?php
    }
    $count=$redis->lsize("uid");
?>
