<?php

namespace Longbeidou\Taobaoke\SDK\top\security;


	class SecretContext
	{
		var $secret;
		var $secretVersion;
		var $invalidTime;
		var $maxInvalidTime;
		var $appConfig;

		var $cacheKey = '';
		var $session = '';
		var $encryptPhoneNum = 0;
		var $encryptNickNum = 0;
		var $encryptReceiverNameNum = 0;
		var $encryptSimpleNum = 0;
		var $encryptSearchNum = 0;

		var $decryptPhoneNum = 0;
		var $decryptNickNum = 0;
		var $decryptReceiverNameNum = 0;
		var $decryptSimpleNum = 0;
		var $decryptSearchNum = 0;

		var $searchPhoneNum = 0;
		var $searchNickNum = 0;
		var $searchReceiverNameNum = 0;
		var $searchSimpleNum = 0;
		var $searchSearchNum = 0;

		var $lastUploadTime;

		function toLogString()
		{
			return $this->session.','.$this->encryptPhoneNum.','.$this->encryptNickNum.','
				  .$this->encryptReceiverNameNum.','.$this->encryptSimpleNum.','.$this->encryptSearchNum.','
				  .$this->decryptPhoneNum.','.$this->decryptNickNum.','.$this->decryptReceiverNameNum.','
				  .$this->decryptSimpleNum.','.$this->decryptSearchNum.','.$this->searchPhoneNum.','
				  .$this->searchNickNum.','.$this->searchReceiverNameNum.','.$this->searchSimpleNum.','
				  .$this->searchSearchNum ;
		}

		function __construct()
	 	{
	 		$this->lastUploadTime = time();
	 	}
	}

	class SecretData
	{
		var $originalValue;
		var $originalBase64Value;
		var $secretVersion;
		var $search;

		function __construct()
	 	{

	 	}
	}
?>
