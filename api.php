<?php

// channel : @OGHAB_TM

date_default_timezone_set('Europe/Stockholm');
if (!file_exists('madeline.php')) {
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
define('MADELINE_BRANCH', '5.1.34');
include 'madeline.php';
$settings = [];
$settings['app_info']['api_id'] = '394879';
$settings['app_info']['api_hash'] = 'b45f10cd94d6f970f55fd17a3b400b8f';
$MadelineProto = new \danog\MadelineProto\API('oghab.madeline', $settings);
$MadelineProto->start();
$time = date('H:i');
try {
  // بیو
 
  // انلاین
  $MadelineProto->account->updateStatus(['offline' => false]);
  $MadelineProto->account->updateProfile(['last_name' => " 〔 $time 〕"]);
  // نام

} catch (\Exception $e) {
  echo "$e";
}
sleep(2);
if (file_exists('MadelineProto.log')) {
 unlink('MadelineProto.log');
}
echo 'Ok!';
