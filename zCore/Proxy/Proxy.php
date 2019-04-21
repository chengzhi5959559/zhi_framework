<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/23
 * +----------------------------------------------------------------------
 * | Time: 18:34
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore\Proxy;


use Framework\zCore\Factory;

class Proxy implements IUserProxy
{
    public function getUserName($id)
    {
        // TODO: Implement getUserName() method.
        $db = Factory::getDatabase('slave');
        $result = $db->query("select * from cy_medicine WHERE med_id = {$id}");
        return $result->fetch_row();
    }
    public function setUserName($id, $name)
    {
        // TODO: Implement setUserName() method.
        $db = Factory::getDatabase('master');
        $db->query(" update cy_medicine set medicine_name = '{$name}' WHERE med_id = {$id}");
    }
}