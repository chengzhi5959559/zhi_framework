<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/18
 * +----------------------------------------------------------------------
 * | Time: 00:09
 * +----------------------------------------------------------------------
 */

ini_set('display_errors',1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);
require ROOT_PATH . '/zCore/loader.php';
spl_autoload_register('\\Framework\\zCore\Loader::autoload');

/*装饰器模式*/

$canvas = new \Framework\zCore\Canvas();
$canvas->init();
$canvas->addDecorate(new Framework\zCore\Decorate\ColorDrawDecorate('red'));
$canvas->addDecorate(new Framework\zCore\Decorate\SizeDrawDecorate('50px'));
$canvas->rect(3,6,4,12);
$canvas->draw();