<?php
require_once 'vendor/autoload.php';

use kornrunner\Ethereum\Address;

$address = new Address();

$arr = array();
// get address
$arr['address'] = "0x".$address->get();
// 4e1c45599f667b4dc3604d69e43722d4ace6b770
$arr['rd_address'] = $address->get();
$arr['pv_key'] = $address->getPrivateKey();
// 33eb576d927573cff6ae50a9e09fc60b672a8dafdfbe3045c7f62955fc55ccb4

$arr['public_key'] =  $address->getPublicKey();
// 20876c03fff2b09ea01861f3b3789ada54a20a8c5e90170618364cbb02d8e6408401e120158f489376a1db3f8cde24f9432976d2f89aeb193fb5becc094a28b9
print_r($arr);

?>