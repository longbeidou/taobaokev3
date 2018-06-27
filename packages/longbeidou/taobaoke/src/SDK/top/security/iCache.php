<?php

namespace Longbeidou\Taobaoke\SDK\top\security;

/**
* 缓存接口，如果不想使用yac缓存，需要自己去使用这个接口
*/
interface iCache
{
	//获取缓存
	public function getCache($key);

	//更新缓存
	public function setCache($key,$var);

}
?>
