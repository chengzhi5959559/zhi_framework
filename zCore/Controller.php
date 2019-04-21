<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/24
 * +----------------------------------------------------------------------
 * | Time: 23:40
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore;


abstract class Controller
{
    protected $data;
    protected $controller_name;
    protected $view_name;
    protected $template_dir;
    public function __construct($controller_name, $view_name) {
       $this->controller_name = $controller_name;
       $this->view_name = $view_name;
       $this->template_dir = Application::getInstance()->base_dir . '/templates';
    }
    
    public function assign($key, $value) {
       $this->data[$key] = $value;
    }
    
    public function display ($file = '') {
       if (empty($file)) {
          $file = strtolower($this->controller_name).'/'.$this->view_name.'.php';
       }
       $path = $this->template_dir . '/' . $file;
       extract($this->data);
       include $path;
    }
}