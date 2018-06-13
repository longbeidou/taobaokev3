<?php
    include "TopSdk.php";
    date_default_timezone_set('Asia/Shanghai'); 
    $c = new TopClient;
    $c->appkey = '12497914';
    $c->secretKey = '4b0f28396e072d67fae169684613bcd1';

    $req = new HttpdnsGetRequest;

    $req->putOtherTextParam("name","test");
    $req->putOtherTextParam("value",0);

    var_dump($c->execute($req));
?>