<?php

namespace Longbeidou\Taobaoke\SDK\top\security;


	include './SecretContext.php';
	include './MagicCrypt.php';

	class SecurityUtil
	{

		private $BASE64_ARRAY = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
		private $SEPARATOR_CHAR_MAP;

		function __construct()
		{
			if(!defined("PHONE_SEPARATOR_CHAR"))
			{
				define('PHONE_SEPARATOR_CHAR','$');
			}
			if(!defined("NICK_SEPARATOR_CHAR"))
			{
				define('NICK_SEPARATOR_CHAR','~');
			}
			if(!defined("NORMAL_SEPARATOR_CHAR"))
			{
				define('NORMAL_SEPARATOR_CHAR',chr(1));
			}

			$this->SEPARATOR_CHAR_MAP['nick'] = NICK_SEPARATOR_CHAR;
			$this->SEPARATOR_CHAR_MAP['simple'] = NICK_SEPARATOR_CHAR;
			$this->SEPARATOR_CHAR_MAP['receiver_name'] = NICK_SEPARATOR_CHAR;
			$this->SEPARATOR_CHAR_MAP['search'] = NICK_SEPARATOR_CHAR;
			$this->SEPARATOR_CHAR_MAP['normal'] = NORMAL_SEPARATOR_CHAR;
			$this->SEPARATOR_CHAR_MAP['phone'] = PHONE_SEPARATOR_CHAR;

		}

		/*
		* 判断是否是base64格式的数据
		*/
		function isBase64Str($str)
		{
			$strLen = strlen($str);
			for($i = 0; $i < $strLen ; $i++)
			{
				if(!$this->isBase64Char($str[$i]))
				{
					return false;
				}
			}
			return true;
		}

		/*
		* 判断是否是base64格式的字符
		*/
		function isBase64Char($char)
		{
			return strpos($this->BASE64_ARRAY,$char) !== false;
		}

		/*
		* 使用sep字符进行trim
		*/
		function trimBySep($str,$sep)
		{
			$start = 0;
			$end = strlen($str);
			for($i = 0; $i < $end; $i++)
			{
				if($str[$i] == $sep)
				{
					$start = $i + 1;
				}
				else
				{
					break;
				}
			}
			for($i = $end -1 ; $i >= 0; $i--)
			{
				if($str[$i] == $sep)
				{
					$end = $i - 1;
				}
				else
				{
					break;
				}
			}
			return substr($str,$start,$end);
		}

		function checkEncryptData($dataArray)
		{
			if(count($dataArray) == 2){
				return  $this->isBase64Str($dataArray[0]);
			}else{
				return  $this->isBase64Str($dataArray[0]) && $this->isBase64Str($dataArray[1]);
			}
		}

		/*
		* 判断是否是加密数据
		*/
		function isEncryptDataArray($array,$type)
		{
			foreach ($array as $value) {
				if(!$this->isEncryptData($value,$type)){
					return false;
				}
			}
			return true;
		}

		/**
		* 判断是否是已加密的数据，数据必须是同一个类型
		*/
		function isPartEncryptData($array,$type)
		{
			$result = false;
			foreach ($array as $value) {
				if($this->isEncryptData($value,$type)){
					$result = true;
					break;
				}
			}
			return $result;
		}

		/*
		* 判断是否是加密数据
		*/
		function isEncryptData($data,$type)
		{
			if(!is_string($data) || strlen($data) < 4)
			{
				return false;
			}

			$separator = $this->SEPARATOR_CHAR_MAP[$type];
			$strlen = strlen($data);
			if($data[0] != $separator || $data[$strlen -1] != $separator)
			{
				return false;
			}

			$dataArray = explode($separator,$this->trimBySep($data,$separator));
			$arrayLength = count($dataArray);

			if($separator == PHONE_SEPARATOR_CHAR)
			{
				if($arrayLength != 3)
				{
					return false;
				}
				if($data[$strlen - 2] == $separator)
				{
					return $this->checkEncryptData($dataArray);
				}
				else
				{
					$version = $dataArray[$arrayLength -1];
					if(is_numeric($version))
					{
						$base64Val = $dataArray[$arrayLength -2];
						return $this->isBase64Str($base64Val);
					}
				}
			}else{
				if($data[strlen($data) - 2] == $separator && $arrayLength == 3)
				{
					return $this->checkEncryptData($dataArray);
				}
				else if($arrayLength == 2)
				{
					return $this->checkEncryptData($dataArray);
				}
				else
				{
					return false;
				}
			}
		}

		function search($data, $type,$secretContext)
		{
			$separator = $this->SEPARATOR_CHAR_MAP[$type];
			if('phone' == $type) {
		        if (strlen($data) != 4 ) {
		            throw new Exception("phoneNumber error");
		        }
		        return $separator.$this->hmacMD5EncryptToBase64($data, $secretContext->secret).$separator;
			} else {
				$compressLen = $this->getArrayValue($secretContext->appConfig,'encrypt_index_compress_len',3);
				$slideSize = $this->getArrayValue($secretContext->appConfig,'encrypt_slide_size',4);

				$slideList = $this->getSlideWindows($data, $slideSize);
		        $builder = '';
		        foreach ($slideList as $slide) {
					$builder .= $this->hmacMD5EncryptToBase64($slide,$secretContext->secret,$compressLen);
				}
		        return $builder;
			}
		}

		/*
		* 加密逻辑
		*/
		function encrypt($data,$type,$version,$secretContext)
		{
			if(!is_string($data))
			{
				return false;
			}

			$separator = $this->SEPARATOR_CHAR_MAP[$type];
			$isIndexEncrypt = $this->isIndexEncrypt($type,$version,$secretContext);
			if($isIndexEncrypt || $type == "search"){
				if('phone' == $type) {
					return $this->encryptPhoneIndex($data,$separator,$secretContext);
				} else {
					$compressLen = $this->getArrayValue($secretContext->appConfig,'encrypt_index_compress_len',3);
					$slideSize = $this->getArrayValue($secretContext->appConfig,'encrypt_slide_size',4);
					return $this->encryptNormalIndex($data,$compressLen,$slideSize,$separator,$secretContext);
				}
			}else{
				if('phone' == $type) {
					return $this->encryptPhone($data,$separator,$secretContext);
				} else {
					return $this->encryptNormal($data,$separator,$secretContext);
				}
			}

		}

		/*
		* 加密逻辑,手机号码格式
		*/
		function encryptPhone($data,$separator,$secretContext)
		{
			$len = strlen($data);
			if($len < 11)
			{
				return $data;
			}
			$prefixNumber = substr($data,0,$len -8);
			$last8Number =  substr($data,$len -8,$len);

			return $separator.$prefixNumber.$separator.Security::encrypt($last8Number,$secretContext->secret)
				  .$separator.$secretContext->secretVersion.$separator ;
		}

		/*
		* 加密逻辑,非手机号码格式
		*/
		function encryptNormal($data,$separator,$secretContext)
		{
			return $separator.Security::encrypt($data,$secretContext->secret)
							 .$separator.$secretContext->secretVersion.$separator;
		}

		/*
		* 解密逻辑
		*/
		function decrypt($data,$type,$secretContext)
		{
			if(!$this->isEncryptData($data,$type))
			{
				throw new Exception("数据[".$data."]不是类型为[".$type."]的加密数据");
			}
			$dataLen = strlen($data);
			$separator = $this->SEPARATOR_CHAR_MAP[$type];

			$secretData = null;
			if($data[$dataLen - 2] == $separator){
				$secretData = $this->getIndexSecretData($data,$separator);
			}else{
				$secretData = $this->getSecretData($data,$separator);
			}

			if($secretData == null){
				return $data;
			}

			$result = Security::decrypt($secretData->originalBase64Value,$secretContext->secret);

			if($separator == PHONE_SEPARATOR_CHAR && !$secretData->search)
			{
				return $secretData->originalValue.$result;
			}
			return $result;
		}

		/*
		* 判断是否是公钥数据
		*/
		function isPublicData($data,$type)
		{
			$secretData = $this->getSecretDataByType($data,$type);
			if(empty($secretData)){
				return false;
			}
			if(intval($secretData->secretVersion) < 0){
				return true;
			}
			return false;
		}

		function getSecretDataByType($data,$type)
		{
			$separator = $this->SEPARATOR_CHAR_MAP[$type];
			$dataLen = strlen($data);

			if($data[$dataLen - 2] == $separator){
				return $secretData = $this->getIndexSecretData($data,$separator);
			}else{
				return  $secretData = $this->getSecretData($data,$separator);
			}
		}

		/*
		* 分解密文
		*/
		function getSecretData($data,$separator)
		{
			$secretData = new SecretData;
			$dataArray = explode($separator,$this->trimBySep($data,$separator));
			$arrayLength = count($dataArray);

			if($separator == PHONE_SEPARATOR_CHAR)
			{
				if($arrayLength != 3){
					return null;
				}else{
					$version = $dataArray[2];
					if(is_numeric($version))
					{
						$secretData->originalValue = $dataArray[0];
						$secretData->originalBase64Value = $dataArray[1];
						$secretData->secretVersion = $version;
					}
				}
			}
			else
			{
				if($arrayLength != 2){
					return null;
				}else{
					$version = $dataArray[1];
					if(is_numeric($version))
					{
						$secretData->originalBase64Value = $dataArray[0];
						$secretData->secretVersion = $version;
					}
				}
			}
			return $secretData;
		}

		function getIndexSecretData($data,$separator) {
			$secretData = new SecretData;
			$dataArray = explode($separator,$this->trimBySep($data,$separator));
			$arrayLength = count($dataArray);

	        if($separator == PHONE_SEPARATOR_CHAR) {
	            if ($arrayLength != 3) {
	                return null;
	            }else{
					$version = $dataArray[2];
					if(is_numeric($version))
					{
						$secretData->originalValue = $dataArray[0];
						$secretData->originalBase64Value = $dataArray[1];
						$secretData->secretVersion = $version;
					}
	            }

	        } else {
	        	if($arrayLength != 3){
					return null;
				} else {
					$version = $dataArray[2];
					if(is_numeric($version))
					{
						$secretData->originalBase64Value = $dataArray[0];
						$secretData->originalValue = $dataArray[1];
						$secretData->secretVersion = $version;
					}
				}
	        }

	        $secretData->search = true;
	        return $secretData;
		}

		/**
	     * 判断密文是否支持检索
	     *
	     * @param key
	     * @param version
	     * @return
	     */
		function isIndexEncrypt($key,$version,$secretContext)
		{
	        if ($version != null && $version < 0) {
	            $key = "previous_".$key;
	        } else {
	            $key = "current_".$key;
	        }

	        return $secretContext->appConfig != null &&
	               array_key_exists($key,$secretContext->appConfig) &&
	               $secretContext->appConfig[$key] == "2";
		}

		function isLetterOrDigit($ch)
		{
			$code = ord($ch);
			if (0 <= $code && $code <= 127) {
            	return true;
        	}
        	return false;
		}

		function utf8_strlen($string = null) {
			// 将字符串分解为单元
			preg_match_all("/./us", $string, $match);
			// 返回单元个数
			return count($match[0]);
		}

		function utf8_substr($string,$start,$end) {
			// 将字符串分解为单元
			preg_match_all("/./us", $string, $match);
			// 返回单元个数
			$result = "";
			for($i = $start; $i < $end; $i++){
				$result .= $match[0][$i];
			}
			return $result;
		}

		function utf8_str_at($string,$index) {
			// 将字符串分解为单元
			preg_match_all("/./us", $string, $match);
			// 返回单元个数
			return $match[0][$index];
		}

		function compress($input,$toLength) {
			if($toLength < 0) {
				return null;
			}
			$output = array();
			for($i = 0; $i < $toLength; $i++) {
				$output[$i] = chr(0);
			}
			$input = $this->getBytes($input);
			$inputLength = count($input);
			for ($i = 0; $i < $inputLength; $i++) {
	            $index_output = $i % $toLength;
	            $output[$index_output] = $output[$index_output] ^ $input[$i];
	        }
	        return $output;
		}

	    /**
	     * @see #hmacMD5Encrypt
	     *
	     * @param encryptText
	     *            被签名的字符串
	     * @param encryptKey
	     *            密钥
	     * @param compressLen压缩长度
	     * @return
	     * @throws Exception
	     */
		function hmacMD5EncryptToBase64($encryptText,$encryptKey,$compressLen = 0) {
			$encryptResult = Security::hmac_md5($encryptText,$encryptKey);
			if($compressLen != 0){
				$encryptResult = $this->compress($encryptResult,$compressLen);
			}
			return base64_encode($this->toStr($encryptResult));
		}


	    /**
	     * 生成滑动窗口
	     *
	     * @param input
	     * @param slideSize
	     * @return
	     */
		function getSlideWindows($input,$slideSize = 4)
		{
			$endIndex = 0;
			$startIndex = 0;
			$currentWindowSize = 0;
			$currentWindow = null;
			$dataLength = $this->utf8_strlen($input);
			$windows = array();
			while($endIndex < $dataLength || $currentWindowSize > $slideSize)
			{
				$startsWithLetterOrDigit = false;
				if(!empty($currentWindow)){
					$startsWithLetterOrDigit = $this->isLetterOrDigit($this->utf8_str_at($currentWindow,0));
				}
				if($endIndex == $dataLength && $startsWithLetterOrDigit == false){
					break;
				}
				if($currentWindowSize == $slideSize &&
				   $startsWithLetterOrDigit == false &&
				   $this->isLetterOrDigit($this->utf8_str_at($input,$endIndex))) {
				   $endIndex ++;
				   $currentWindow = $this->utf8_substr($input,$startIndex,$endIndex);
				   $currentWindowSize = 5;
				} else {
				    if($endIndex != 0){
				    	if($startsWithLetterOrDigit){
				    		$currentWindowSize -= 1;
				    	}else{
				    		$currentWindowSize -= 2;
				    	}
				    	$startIndex ++;
				    }

	                while ($currentWindowSize < $slideSize && $endIndex < $dataLength) {
	                    $currentChar = $this->utf8_str_at($input,$endIndex);
	                    if ($this->isLetterOrDigit($currentChar)) {
	                        $currentWindowSize += 1;
	                    } else {
	                        $currentWindowSize += 2;
	                    }
	                    $endIndex++;
	                }
	                $currentWindow = $this->utf8_substr($input,$startIndex,$endIndex);
				}
				array_push($windows,$currentWindow);
			}
			return $windows;
		}

		function encryptPhoneIndex($data,$separator,$secretContext) {
			$dataLength = strlen($data);
			if($dataLength < 11) {
				return $data;
			}
			$last4Number = substr($data,$dataLength -4 ,$dataLength);
			return $separator.$this->hmacMD5EncryptToBase64($last4Number,$secretContext->secret).$separator
				   .Security::encrypt($data,$secretContext->secret).$separator.$secretContext->secretVersion
				   .$separator.$separator;
		}

		function encryptNormalIndex($data,$compressLen,$slideSize,$separator,$secretContext) {
			$slideList = $this->getSlideWindows($data, $slideSize);
			$builder = "";
			foreach ($slideList as $slide) {
				$builder .= $this->hmacMD5EncryptToBase64($slide,$secretContext->secret,$compressLen);
			}
			return $separator.Security::encrypt($data,$secretContext->secret).$separator.$builder.$separator
				   .$secretContext->secretVersion.$separator.$separator;
		}

		function getArrayValue($array,$key,$default) {
			if(array_key_exists($key, $array)){
				return $array[$key];
			}
			return $default;
		}

		function getBytes($string) {
	        $bytes = array();
	        for($i = 0; $i < strlen($string); $i++){
	             $bytes[] = ord($string[$i]);
	        }
	        return $bytes;
	    }

		function toStr($bytes) {
			if(!is_array($bytes)){
				return $bytes;
			}
	        $str = '';
	        foreach($bytes as $ch) {
	            $str .= chr($ch);
	        }
	        return $str;
	    }
	}
?>
