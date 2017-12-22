<?php
include 'loader.php';

spl_autoload_register('Loader::autoload');

new \app\mvc\view\home\Index();