<?php

namespace Longbeidou\Taobaoke\SDK\top\security;


	include './SecurityClient.php';
	include './YacCache.php';


	$c = new TopClient;
    $c->appkey = '576216';
    $c->secretKey = 'd1e44cec2f6c8a2c73342595b711decc';
    $c->gatewayUrl = 'https://10.218.128.111/router/rest';

    $session = '6101701a21788e0e44743d5f1032ccd5276f00ea6a2d9092050695162';

    $client = new SecurityClient($c,'S7/xdg4AD7WooWY7+g11qoBpaVsEkonULDJPEiMcXPE=');
    $yac = new YacCache;
    $client->setCacheClient($yac);

    $type = 'phone';
    $val = '13834566786';

    echo "原文：13834566786".PHP_EOL;
    $encryptValue = $client->encrypt($val,$type,$session);
    echo "加密后:".$encryptValue.PHP_EOL;
    echo "search明文：".$val." -->".$client->search("6786",$type,$session).PHP_EOL;

    if($client->isEncryptData($encryptValue,$type))
    {
    	$originalValue = $client->decrypt($encryptValue,$type,$session);
    	echo "解密后:".$originalValue.PHP_EOL;
    }

    $originalValue = $client->decrypt('~YjW+T6rCmKcc0tGqzWIDaQ==~-113~','nick',$session);
    echo "公钥解密后:".$originalValue.PHP_EOL;    


    $secArray = array('~YjW+T6rCmKcc0tGqzWIDaQ==~-113~');
    $client->decryptBatch($secArray,'nick',$session);


	$typeArray = array('normal','nick','receiver_name');

	$val2 = '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊看哦【啊啊啊的';

	foreach ($typeArray as $type2) {
		echo "==============================TOP================================".PHP_EOL;
		$encty2 = $client->encrypt($val2,$type2,$session);
		echo $type2."|明文：".$val2." ---->密文：".$encty2.PHP_EOL;
		if($client->isEncryptData($encty2,$type2))
		{
			$originalValue = $client->decrypt($encty2,$type2,$session);
    		echo "解密后:".$originalValue.PHP_EOL;
            echo "search明文：".$originalValue." -->".$client->search($originalValue,$type2,$session).PHP_EOL;
		}else{
			echo "不是加密数据".PHP_EOL;
		}
	}

    $encryptNick = $client->encrypt("xxxuxxxuxxxu","nick");
    echo "加密后:".$encryptNick.PHP_EOL;
    echo "search明文：xxxuxxxuxxxu -->".$client->search("xxxu","nick").PHP_EOL;
    if($client->isEncryptData($encryptNick,"nick"))
    {
        $originalNick = $client->decryptPublic($encryptNick,"nick");
        echo "解密后:".$originalNick.PHP_EOL;
    }else{
        echo "不是加密数据 ".$encryptNick.PHP_EOL;
    }
?>