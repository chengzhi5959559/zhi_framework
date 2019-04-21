<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/25
 * +----------------------------------------------------------------------
 * | Time: 12:04
 * +----------------------------------------------------------------------
 */

namespace App\Model;
use Framework\zCore\Factory;

class User extends \Framework\zCore\Model
{
    public function getUserInfo ($id) {
       return Factory::getDatabase('slave')->query("select * from cy_medicine WHERE med_id = $id limit 1")->fetch_accoc();
    }
    
    public function create($user) {
      $userId = 13;
      $this->notify($user);
      return $userId;
    }
}