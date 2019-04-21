<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/25
 * +----------------------------------------------------------------------
 * | Time: 00:15
 * +----------------------------------------------------------------------
 */

namespace App\Decorator;


class Login
{
    public function beforeRequest($controller) {
       session_start();
       if (!isset($_SESSION['isLogin'])) {
          header('Location:/zhi_framework/index.php/login/index');
       }
    }
    public function afterRequest($return_value) {
    
    }
}