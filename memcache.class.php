<?php
/**
 *    Memcached
 *
 *    @author kobewu
 */

class Mem
{
    var $_memcache = null;

    function Mem($options){

        /* 连接到缓存服务器 */
        $this->connect($options);
    }

    /* 连接到缓存服务器 */
    function connect($options){

        if (empty($options)){
            return false;
        }
        $this->_memcache = new Memcache;

        return $this->_memcache->connect($options['host'], $options['port']);
    }

    /* 写入缓存 */
    function set($key, $value, $ttl = null){

        return $this->_memcache->set($key, $value, $ttl);
    }

    /* 获取缓存 */
    function get($key){

        return $this->_memcache->get($key);
    }

    /* 清空缓存 */
    function clear(){

        return $this->_memcache->flush();
    }

    /* 删除缓存 */
    function delete($key){

        return $this->_memcache->delete($key);
    }
}
?>