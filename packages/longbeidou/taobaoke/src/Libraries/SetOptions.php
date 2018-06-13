<?php

namespace Longbeidou\Taobaoke\Libraries;

/**
* 批量设置类的对象，格式为$obj->setOption()
*/
class SetOptions
{
	/**
	* 设置类的多个对象，格式为$obj->setOption()
	* $obj 传入的对象
	* $datas 设置对象属相的值
	* $standard 所有可以设置的对象属性字符串
	*/
	public function options($obj, Array $datas, Array $standard)
	{
		foreach ($datas as $key => $value) {
			if (in_array($key, $standard) && !empty($value) && $key !== 0) {
				$setstr = $this->setKey($key);
				$obj->$setstr($value);
			}
		}

		return $obj;
	}

	/**
	* 设置类的多个对象，格式为$obj->page_size = $page
	* $obj 传入的对象
	* $datas 设置对象属相的值
	* $standard 所有可以设置的对象属性字符串
	*/
	public function toOptions ($obj, Array $datas, Array $standard)
	{
		foreach ($datas as $key => $value) {
			if (in_array($key, $standard) && !empty($value) && $key !== 0) {
				$obj->$key = $value;
			}
		}

		return $obj;
	}

	/**
	* 将字符串组合成骆驼形式的字符串，例如：end_tk_rate 变为 setEndTkRate
	*/
	public function setKey ($key)
	{
		$str = '';
		$keyArr = explode('_', $key);
		foreach ($keyArr as $v) {
			$str .= ucfirst($v);
		}

		return 'set'.$str;
	}
}
