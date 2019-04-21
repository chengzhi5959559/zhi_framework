<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 23:45
 * +----------------------------------------------------------------------
 */
ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');

/*原型模式*/
$prototype = new \Framework\zCore\Canvas();
$prototype->init( );

$n1 = clone $prototype;

$n1->rect(3,6,4,12);
$n1->draw();
echo '==================<br>';
$n2 = clone $prototype;

$n2->rect(32,23,12,22);
$n2->draw();


