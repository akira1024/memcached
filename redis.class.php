<?php
/**
 *    Memcached
 *
 *    @author kobewu
 */

class Re
{
    var $_redis = null;

    function Re($options){

        /* 连接到缓存服务器 */
        $this->connect($options);
    }

    /* 连接到缓存服务器 */
    function connect($options){

        if (empty($options)){
            return false;
        }
        $this->_redis = new Redis;

        return $this->_redis->connect($options['host'], $options['port']);
    }

    /* 写入缓存 */
    function set($key, $value, $ttl = null){

    	$value = json_encode($value);
        return $this->_redis->set($key, $value, $ttl);
    }

    /* 获取缓存 */
    function get($key){

    	$rs = $this->_redis->get($key);
        return json_decode($rs);
    }

    /* 清空缓存 */
    function clear(){

        return $this->_redis->flush();
    }

    /* 删除缓存 */
    function delete($key){

        return $this->_redis->del($key);
    }
}
?>