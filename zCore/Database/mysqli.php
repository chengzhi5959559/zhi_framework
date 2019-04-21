<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/17
 * +----------------------------------------------------------------------
 * | Time: 18:29
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore\Database;
use Framework\zCore\IDatabase;

class mysqli implements IDatabase
{
    protected $conn;
    protected $result;
    function connect($host, $user, $passwd, $port,$db)
    {
        $this->conn = new \mysqli($host,$user,$passwd,$db, $port);
       return $this->conn;
    }
    function query($sql)
    {
        // TODO: Implement query() method.
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
    function close()
    {
        // TODO: Implement close() method.
        $this->result->close;
    }
}