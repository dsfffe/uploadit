#!/usr/bin/env
<?php

// Written By @Code_Designer
// Our Channel: t.me/Oghab_Tm

# error_reporting(0);


if (!file_exists(__DIR__.'/madeline.php')) {
    copy('https://phar.madelineproto.xyz/madeline.php', DIR.'/madeline.php');
}
require DIR.'/madeline.php';


class MyEventHandler extends \danog\MadelineProto\EventHandler
{

const ADMIN = '1476130628'; // Change this
public function getReportPeers()
{
return [self::ADMIN];
}

public function onStart()
{
$this->adminId = yield $this->getInfo(self::ADMIN)['bot_api_id'];
}

public function onUpdateNewChannelMessage(array $update)
{
yield $this->onUpdateNewMessage($update);
}

public function onUpdateNewMessage(array $update): \Generator
{
if ($update['message']['out'] ?? false) {
return;
}

if ($update['message']['_'] !== 'message') {
return;
}

try {

$peer = yield $this->getInfo($update);
$chatID = $peer['bot_api_id'];
$userID = $update['message']['from_id']['user_id'] ?? 0;
$msg = $update['message']['message'];
$msg_id = $update['message']['id'];
$type2 = $peer['type'];

# Just Reply Admin
if ($userID == $this->adminId) {

# Ping Command
if ($msg === 'ping' or $msg === 'ربات' or $msg === '/ping') {
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => '👻', 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $msg_id]);
}

# show Memory Usage
if ($msg === 'mem' or $msg === '/mem' or $msg === '/usage' or $msg === 'usage' or $msg === 'ram' or $msg === 'رم' or $msg === 'مصرف') {
$mem_usage = round((memory_get_usage()/1024)/1024, 1).'MB';
yield $this->messages->sendMessage(['peer' => $chatID, 'message' => "🔋 Ram Usage: $mem_usage", 'parse_mode' => 'Markdown', 'reply_to_msg_id' => $msg_id]);
}

# Restart Bot Command
if ($msg == '/update' or $msg == '/restart'){
yield $this->messages->deleteHistory(['just_clear' => true, 'revoke' => true, 'peer' => $chatID, 'max_id' => $msg_id]);
yield $this->restart();
}

}

} catch (\Throwable $e) {
if (\strpos($e->getMessage(), 'Could not connect to URI') === false && !($e instanceof UriException) && \strpos($e->getMessage(), 'URI') === false) {
$this->report((string) $e);
$this->logger((string) $e, \danog\MadelineProto\Logger::FATAL_ERROR);
}
if ($e instanceof RPCErrorException && $e->rpc === 'FILE_PARTS_INVALID') {
$this->report(\json_encode($url));
}
try {
yield $this->messages->editMessage(['peer' => $peerId, 'id' => $id, 'message' => 'Error: '.$e->getMessage()]);
} catch (\Throwable $e) {
$this->logger((string) $e, \danog\MadelineProto\Logger::FATAL_ERROR);
}
}
}
}

$settings['db']['type'] = 'memory';
/*$settings['db']['mysql']['host'] = 'localhost';
$settings['db']['mysql']['port'] = 3306;
$settings['db']['mysql']['user'] = 'madeline_test';
$settings['db']['mysql']['password'] = 'DYBv^9*V#8+4';
$settings['db']['mysql']['database'] = 'madeline_test';*/
$MadelineProto = new \danog\MadelineProto\API('oghab.madeline', $settings);
$MadelineProto->startAndLoop(MyEventHandler::class);
// O * G * H * A * B
?>
