<?php

namespace Longbeidou\Taobaoke\SDK\top\request;

use Longbeidou\Taobaoke\SDK\top\RequestCheckUtil;

/**
 * TOP API: taobao.tbk.spread.get request
 * 
 * @author auto create
 * @since 1.0, 2017.06.17
 */
class TbkSpreadGetRequest
{
	/** 
	 * 请求列表，内部包含多个url
	 **/
	private $requests;
	
	private $apiParas = array();
	
	public function setRequests($requests)
	{
		$this->requests = $requests;
		$this->apiParas["requests"] = $requests;
	}

	public function getRequests()
	{
		return $this->requests;
	}

	public function getApiMethodName()
	{
		return "taobao.tbk.spread.get";
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
