<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 19:19
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore\Databse;
use Framework\zCore\IDatabase;

class pdo implements IDatabase
{
    public function connect($host, $user, $passwd, $port, $db)
    {
        // TODO: Implement connect() method.
    }
    public function query($sql)
    {
        // TODO: Implement query() method.
    }
    public function close()
    {
        // TODO: Implement close() method.
    }
}