<?php

namespace Longbeidou\Taobaoke\SDK\top\request;

/**
 * TOP API: taobao.httpdns.get request
 * 
 * @author auto create
 * @since 1.0, 2018.05.25
 */
class HttpdnsGetRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "taobao.httpdns.get";
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
