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


class Template
{
    protected $controller;
    public function beforeRequest ($controller) {
      $this->controller = $controller;
    }
    public function afterRequest($return_value) {
        if ($_GET['app'] == 'html')
        {
            foreach($return_value as $k => $v)
            {
                $this->controller->assign($k, $v);
            }
            $this->controller->display();
        }
    }
}