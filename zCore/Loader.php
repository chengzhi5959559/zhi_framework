<?php
/**
 * +----------------------------------------------------------------------
 * | Created by 诚挚先生.
 * +----------------------------------------------------------------------
 * | Author: 诚挚先生 <3289614616@qq.com>
 * +----------------------------------------------------------------------
 * | Date: 2019/4/21
 * +----------------------------------------------------------------------
 * | Time: 11:33
 * +----------------------------------------------------------------------
 */
 
namespace Framework\zCore;


class Ps4AutoloaderClass {
    /**
     * 一个关联数组，其中键是名称空间前缀和值是该名称空间中的类的基本目录数组。
     * @var array
     */
   protected $prefixes = array();
   
   public function register () {
      spl_autoload_register(array($this, 'loadClass'));
   }
    
    /**
     * 添加名称空间前缀的基目录
     * @param $prefix
     * @param $base_dir
     * @param bool $prepend
     */
    public function addNamespace($prefix, $base_dir, $prepend = false)
    {
        // normalize namespace prefix
        $prefix = trim($prefix, '\\') . '\\';
        
        // normalize the base directory with a trailing separator
        $base_dir = rtrim($base_dir, DIRECTORY_SEPARATOR) . '/';
        
        // initialize the namespace prefix array
        if (isset($this->prefixes[$prefix]) === false) {
            $this->prefixes[$prefix] = array();
        }
        
        // retain the base directory for the namespace prefix
        if ($prepend) {
            array_unshift($this->prefixes[$prefix], $base_dir);
        } else {
            array_push($this->prefixes[$prefix], $base_dir);
        }
    }
    
    /**
     * 加载给定类名的类文件
     * @param $class
     * @return bool
     */
    public function loadClass($class)
    {
        // the current namespace prefix
        $prefix = $class;
        
        // work backwards through the namespace names of the fully-qualified
        // class name to find a mapped file name
        while (false !== $pos = strrpos($prefix, '\\')) {
            
            // retain the trailing namespace separator in the prefix
            $prefix = substr($class, 0, $pos + 1);
            
            // the rest is the relative class name
            $relative_class = substr($class, $pos + 1);
            
            // try to load a mapped file for the prefix and relative class
            $mapped_file = $this->loadMappedFile($prefix, $relative_class);
            if ($mapped_file) {
                return $mapped_file;
            }
            
            // remove the trailing namespace separator for the next iteration
            // of strrpos()
            $prefix = rtrim($prefix, '\\');
        }
        
        // never found a mapped file
        return false;
    }
    
    /**
     * 加载映射文件以获取名称空间前缀和相对类
     * @param $prefix
     * @param $relative_class
     * @return bool|string
     */
    protected function loadMappedFile($prefix, $relative_class)
    {
        // are there any base directories for this namespace prefix?
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }
        
        // look through base directories for this namespace prefix
        foreach ($this->prefixes[$prefix] as $base_dir) {
            
            // replace the namespace prefix with the base directory,
            // replace namespace separators with directory separators
            // in the relative class name, append with .php
            $file = $base_dir
                . str_replace('\\', '/', $relative_class)
                . '.php';
            
            // if the mapped file exists, require it
            if ($this->requireFile($file)) {
                // yes, we're done
                return $file;
            }
        }
        
        // never found it
        return false;
    }
    
    /**
     * 加载对应的文件
     * @param $file
     * @return bool
     */
    protected function requireFile($file)
    {
        if (file_exists($file)) {
            require $file;
            return true;
        }
        return false;
    }
}
