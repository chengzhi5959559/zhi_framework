<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/24
 * +----------------------------------------------------------------------
 * | Time: 23:19
 * +----------------------------------------------------------------------
 */

namespace App\Controller;
use Faker\Factory;
use Framework\zCore\Controller;

class Home extends Controller
{
    public function index () {
       $model = \Framework\zCore\Factory::getModel('User');
       $userId = $model->create(['name'=>'kkk','mobile'=>18765666666]);
       return ['user_id'=>11111,'name'=>'xiaobai'];
    }
}