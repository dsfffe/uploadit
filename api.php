<?php

// channel : @OGHAB_TM

date_default_timezone_set('Asia/Tehran');
if (!file_exists('madeline.php')) {
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
define('MADELINE_BRANCH', '5.1.34');
include 'madeline.php';
$settings = [];
$settings['app_info']['api_id'] = '1059453';
$settings['app_info']['api_hash'] = '910474397b399ffcc1d19364008ed274';
$MadelineProto = new \danog\MadelineProto\API('oghab.madeline', $settings);
$MadelineProto->start();
$time = date('H:i');
try {
  // بیو
 
  // انلاین
  $MadelineProto->account->updateStatus(['offline' => false]);
  $MadelineProto->account->updateProfile(['last_name' => "| $time"]);
  // نام

} catch (\Exception $e) {
  echo "$e";
}
sleep(2);
if (file_exists('MadelineProto.log')) {
 unlink('MadelineProto.log');
}
echo 'Ok!';
