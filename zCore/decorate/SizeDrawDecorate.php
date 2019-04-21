<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/3/18
 * +----------------------------------------------------------------------
 * | Time: 00:12
 * +----------------------------------------------------------------------
 */

namespace Framework\zCore\Decorate;

/*尺寸装饰器*/
class SizeDrawDecorate implements DrawDecorate
{
    protected $size;
    function __construct($size = '14px')
    {
        $this->size = $size;
    }
    
    function beforeDraw()
    {
        echo "<div style='font-size: {$this->size};'>";
    }
    
    function afterDraw()
    {
        echo "</div>";
    }
}