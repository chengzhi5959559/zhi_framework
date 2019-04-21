<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/23
 * +----------------------------------------------------------------------
 * | Time: 16:22
 * +----------------------------------------------------------------------
 */

ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');

//$config = new \Framework\zCore\Config(__DIR__ . '/configs');

//var_dump($config['database']);

$db = \Framework\zCore\Factory::getDatabase('proxy');
$list = $db->getUserName(16);
var_dump($list);