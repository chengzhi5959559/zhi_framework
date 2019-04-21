<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 20:16
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;
use Framework\zCore\UserStrategy;

class MaleStrategy implements UserStrategy
{
    public function showAd() {
       echo 'AD:'.PHP_EOL;
       echo 'MacBook最新款！';
    }
    public function showCategory() {
       echo 'Category:'.PHP_EOL;
       echo '苹果数码！';
    }
}