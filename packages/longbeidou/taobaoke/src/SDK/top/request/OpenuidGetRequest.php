<?php

namespace Longbeidou\Taobaoke\SDK\top\request;

/**
 * TOP API: taobao.openuid.get request
 * 
 * @author auto create
 * @since 1.0, 2018.01.03
 */
class OpenuidGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.openuid.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
