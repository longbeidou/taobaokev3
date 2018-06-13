<?php

namespace Longbeidou\Taobaoke\SDK\top\request;

use Longbeidou\Taobaoke\SDK\top\RequestCheckUtil;

/**
 * TOP API: taobao.tbk.item.info.get request
 * 
 * @author auto create
 * @since 1.0, 2017.09.05
 */
class TbkItemInfoGetRequest
{
	/** 
	 * 需返回的字段列表
	 **/
	private $fields;
	
	/** 
	 * 商品ID串，用,分割，从taobao.tbk.item.get接口获取num_iid字段，最大40个
	 **/
	private $numIids;
	
	/** 
	 * 链接形式：1：PC，2：无线，默认：１
	 **/
	private $platform;
	
	private $apiParas = array();
	
	public function setFields($fields)
	{
		$this->fields = $fields;
		$this->apiParas["fields"] = $fields;
	}

	public function getFields()
	{
		return $this->fields;
	}

	public function setNumIids($numIids)
	{
		$this->numIids = $numIids;
		$this->apiParas["num_iids"] = $numIids;
	}

	public function getNumIids()
	{
		return $this->numIids;
	}

	public function setPlatform($platform)
	{
		$this->platform = $platform;
		$this->apiParas["platform"] = $platform;
	}

	public function getPlatform()
	{
		return $this->platform;
	}

	public function getApiMethodName()
	{
		return "taobao.tbk.item.info.get";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
		RequestCheckUtil::checkNotNull($this->fields,"fields");
		RequestCheckUtil::checkNotNull($this->numIids,"numIids");
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
