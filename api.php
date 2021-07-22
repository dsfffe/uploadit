<?php
define("MADELINE_BRANCH", "5.1.34");
ini_set('memory_limit', '2048M');
ini_set('display_errors', 0);
ini_set('memory_limit', -1);
ini_set('max_execution_time', 300);
if(!is_dir('files')){
mkdir('files');
mkdir("list");
}
if(!file_exists('madeline.php')){
copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
if(!file_exists('online.txt')){
file_put_contents('online.txt','off');
}
if (!file_exists('timebio.txt')) {
    file_put_contents('timebio.txt', 'off');
}
if(!file_exists('list/ban.txt')){
}

     if(!file_exists('list/vip.txt')){
          }

          if(!file_exists('list/mute.txt')){
               }

          if (!file_exists('MadelineProto.log')) {
               unlink('MadelineProto.log');
          }
include 'madeline.php';
include 'jdf.php';
$settings = [];
$settings['app_info']['api_id'] = '394879';
$settings['app_info']['api_hash'] = 'b45f10cd94d6f970f55fd17a3b400b8f';
$MadelineProto = new \danog\MadelineProto\API('session.madeline',$settings);
$MadelineProto->start();
 
if(file_get_contents('online.txt') == 'on'){
date_default_timezone_set('Asia/Tehran');
    $time = date("H꧇i");
    $fonts = [["𝟶","𝟷","𝟸","𝟹","𝟺","𝟻","𝟼","𝟽","𝟾","𝟿"],
 ["𝟘","𝟙","𝟚","𝟛","𝟜","𝟝","𝟞","𝟟","𝟠","𝟡"],
 ["₀","₁","₂","₃","₄","₅","₆","₇","₈","₉"],
["𝟬","𝟭","𝟮","𝟯","𝟰","𝟱","𝟲","𝟳","𝟴","𝟵"]];
	$time = date("H꧇i");
    $time2 = str_replace(range(0,9),$fonts[array_rand($fonts)],date("H꧇i"));
    $day_number = jdate('j');
    $month_number = jdate('n');
    $year_number = jdate('y');
    $day_name = jdate('l');
 $MadelineProto->account->updateProfile(['last_name' => "𓆩 𝖇𝖊𝖓𝖏𝖆𝖒𝖎𝖓 $time2 𓆪"]);

}
if (file_get_contents('timebio.txt') == 'on') {
    $time = date("H꧇i");
    $fonts = [["𝟶","𝟷","𝟸","𝟹","𝟺","𝟻","𝟼","𝟽","𝟾","𝟿"],
 ["𝟘","𝟙","𝟚","𝟛","𝟜","𝟝","𝟞","𝟟","𝟠","𝟡"],
 ["₀","₁","₂","₃","₄","₅","₆","₇","₈","₉"],
["𝟬","𝟭","𝟮","𝟯","𝟰","𝟱","𝟲","𝟳","𝟴","𝟵"]];
    $time = date("H꧇i");
    $time2 = str_replace(range(0, 9), $fonts[array_rand($fonts)], date("H꧇i"));
    $day_number = jdate('j');
    $month_number = jdate('n');
    $year_number = jdate('y');
    $day_name = jdate('l');
    $MadelineProto->account->updateProfile(['about' => "فضولی شما در ساعت $time2 ⌚ثبت شد❗"]);
}
function closeConnection($message = 'Zero Paradox Self is Running...')
{
if (php_sapi_name() === 'cli' || isset($GLOBALS['exited'])) {
return;
}
  @ob_end_clean();
  header('Connection: close');
  ignore_user_abort(true);
  ob_start();
  echo '<html><body><h1 style="margin-top:50px; text-align:center; color:black; text-shadow:1px 1px 15px black;">'.$message.'</h1></body</html>';
  $size = ob_get_length();
  header("Content-Length: $size");
  header('Content-Type: text/html');
  
  $GLOBALS['exited'] = true;
}
function shutdown_function($lock)
{
  $a = fsockopen((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'tls' : 'tcp').'://'.$_SERVER['SERVER_NAME'], $_SERVER['SERVER_PORT']);
  fwrite($a, $_SERVER['REQUEST_METHOD'].' '.$_SERVER['REQUEST_URI'].' '.$_SERVER['SERVER_PROTOCOL']."\r\n".'Host: '.$_SERVER['SERVER_NAME']."\r\n\r\n");
  flock($lock, LOCK_UN);
  fclose($lock);
}
if(!file_exists('part.txt')){
file_put_contents('part.txt','off');
}
if(!file_exists('bold.txt')){
  file_put_contents('bold.txt','off');
  }

if (!file_exists('bot.lock')) {
touch('bot.lock');
}
$lock = fopen('bot.lock', 'r+');
$try = 1;
$locked = false;
while (!$locked) {
$locked = flock($lock, LOCK_EX | LOCK_NB);
if (!$locked) {
closeConnection();
if ($try++ >= 30) {
exit;
}
 sleep(1);
}

}
if(!file_exists('data.json')){
 file_put_contents('data.json', '{"power":"on","adminStep":"","online":"off","typing":"off","poker":"off","funny":"off","hashtag":"off","photo":"off","loc":"off","file":"off","audio":"off","part":"off","lockpv":"off","fafont":"off","enfont":"off","proactions":"off","under":"off","pmrun":"on","bold":"off","italic":"off","echo":"off","video":"off","markread":"off","gaming":"off","gamepv":"off","enemies":[],"answering":[]}');
}

if(!file_exists('comment.json')){
  file_put_contents('comment.json', '{"comment":"on"}');
}
class EventHandler extends \danog\MadelineProto\EventHandler
{
public function __construct($MadelineProto){
parent::__construct($MadelineProto);
}
public function onUpdateSomethingElse($update)
{
if (isset($update['_'])){
  if ($update['_'] == 'updateNewMessage'){
  onUpdateNewMessage($update);
  }
  else if ($update['_'] == 'updateNewChannelMessage'){
  onUpdateNewChannelMessage($update);
}
}
}

public function onUpdateNewChannelMessage($update)
{
 yield $this->onUpdateNewMessage($update);
}
public function onUpdateNewMessage($update){
$from_id = isset($update['message']['from_id']) ? $update['message']['from_id']:'';
  try {
 if(isset($update['message']['message'])){
 $text = $update['message']['message'];
 $msg_id = $update['message']['id'];
 $message = isset($update['message']) ? $update['message']:'';
 $MadelineProto = $this;
 $partmode = file_get_contents("part.txt");
 $boldmode=file_get_contents("bold.txt");
  $me = yield $MadelineProto->get_self();
 $para = $me['id'];
 $paradox = "1119563781";
 $chID = yield $MadelineProto->get_info($update);
 $peer = $chID['bot_api_id'];
 $type3 = $chID['type'];
 @$data = json_decode(file_get_contents("data.json"), true);
 @$comment = json_decode(file_get_contents("comment.json"), true);
 $step = $data['adminStep'];
 if($from_id == $para){
 if($text == '/exit;'){
  exit;
 }
   if(preg_match("/^[\/\#\!]?(bot) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(bot) (on|off)$/i", $text, $m);
     $data['power'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "YOᑌᖇ 🤖ᗷOT ᑎOᗯ $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(online) (on|off)$/i", $text)){
  preg_match("/^[\/\#\!]?(online) (on|off)$/i", $text, $m);
  file_put_contents('online.txt', $m[2]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "OᑎᒪIᑎE 👀ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
                  if (preg_match("/^[\/\#\!]?(timebio) (on|off)$/i", $text)) {
                        preg_match("/^[\/\#\!]?(timebio) (on|off)$/i", $text, $m);
                        file_put_contents('timebio.txt', $m[2]);
                        yield $this->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "ساعت تو بیو 👈🏻 $m[2]"]);
                    }
if(preg_match("/^[\/\#\!]?(EnMode) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(EnMode) (on|off)$/i", $text, $m);
     $data['enfont'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "EᑎGᒪISᕼ 📮ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(FaMode) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(FaMode) (on|off)$/i", $text, $m);
     $data['fafont'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᖴᗩᖇSI 📚ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(part) (on|off)$/i", $text)){
    preg_match("/^[\/\#\!]?(part) (on|off)$/i", $text, $m);
    file_put_contents('part.txt', $m[2]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᑭᗩᖇT 🪁ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(poker) (on|off)$/i", $text)){
       preg_match("/^[\/\#\!]?(poker) (on|off)$/i", $text, $m);
       $data['poker'] = $m[2];
       file_put_contents("data.json", json_encode($data));
       $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᑭOKEᖇ 😐ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
  if(preg_match("/^[\/\#\!]?(funny) (on|off)$/i", $text)){
       preg_match("/^[\/\#\!]?(funny) (on|off)$/i", $text, $m);
       $data['funny'] = $m[2];
       file_put_contents("data.json", json_encode($data));
       $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᖴᑌᑎᑎY 😂ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
   if(preg_match("/^[\/\#\!]?(hashtag) (on|off)$/i", $text)){
    preg_match("/^[\/\#\!]?(hashtag) (on|off)$/i", $text, $m);
    $data['hashtag'] = $m[2];
    file_put_contents("data.json", json_encode($data));
    $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᕼᗩSᕼTᗩG 🔗ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
   if(preg_match("/^[\/\#\!]?(italic) (on|off)$/i", $text)){
    preg_match("/^[\/\#\!]?(italic) (on|off)$/i", $text, $m);
    $data['italic'] = $m[2];
    file_put_contents("data.json", json_encode($data));
    $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ITᗩᒪIᑕ 🧷ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
   if(preg_match("/^[\/\#\!]?(underline) (on|off)$/i", $text)){
  preg_match("/^[\/\#\!]?(underline) (on|off)$/i", $text, $m);
  $data['under'] = $m[2];
  file_put_contents("data.json", json_encode($data));
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᑌᑎᗪEᖇᒪIᑎE 📜ᗰOᗪE ᑎOᗯ $m[2]"]);
   }
  if(preg_match("/^[\/\#\!]?(bold) (on|off)$/i", $text)){
    preg_match("/^[\/\#\!]?(bold) (on|off)$/i", $text, $m);
    file_put_contents('bold.txt', $m[2]);
    file_put_contents("data.json", json_encode($data));
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᗷOᒪᗪ 🖋ᗰOᗪE ᑎOᗯ $m[2]"]);
   }



     if ($text == '/robot' or $text == 'ربات') {
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "°• ʀᴇᴅᴏx sᴇʟғ ᴏɴʟɪɴᴇ •°"]);
   }

           if ($text == '/proxy' or $text == 'پروکسی') {
            $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
           http://api.codebazan.ir/mtproto/?type=html&channel=ProxyMTProto
           پروکسی برای سرورم، بمال روش سلطان😎"]);
           }
  if ($text == 'ping' or $text == '/ping' or $text == 'پینگنگ') {
$ping = sys_getloadavg();
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝒀𝒐𝒖𝒓 𝑺𝒆𝒓𝒗𝒆𝒓 𝑷𝒊𝒏𝒈 ➢ $ping[0]", 'parse_mode' => 'MarkDown']);
  }
  if($text == "for" or $text == "fosh" or $text == "فحش"){
for($i = 1 ; $i < 30 ; $i++){
$rand = rand(1,480);
yield $MadelineProto->messages->forwardMessages(['from_peer' => "@ZeroParadoxFosh", 'to_peer' => $peer, 'id' => [$rand], ]);
}
}
	if ($text == 'بشمارش' or $text == 'count') {
		yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "１"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "２"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "３"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "４"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "５"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "６"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "７"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "８"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "９"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "１０"]);
		yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "کوبصی ⛈ ریدی بای😹🤘"]);
    }
    if($text=='bk' or $text=='بکیرم' or $text=='bekiram'){
$bk = ["🇮🇷","✅","😒","👅","😈","💦","💋","🧿","♾","♻️","✊🏻","🤪","🚫","👽","🐆","🕊","⚘","🌵","🍭","🍩","🎈","🎃","🎁","🎗","🧸","💎","🎵","📟","📯","💻","🔋","📀","🪔","📚","💰","💳","🗂","📍","🔫","🛡","🩸","🗑","📿","⛔️","🚸","☣️","🔆","✳️","#️⃣","ℹ️","🔘","🔹️","❗️","❕","⚠️","🎒","🎏","🎯","🃏","🧱","🌐","♨️","💋","🚦","🚧","⚓️","🪂","🛰","🚀","🛸","⏳","🍌","🥕","👑","😎","🎩","😂","💀","🍓","🌭","🔪","☕️","🍔","🐌","🐝","🐉","🦈","🐙","🐠","🦉","🦇","🦅","🐍","🕸","😴","🤯","😳","☠️","🤖","👻","😼","💫","🕳","👨🏻‍💻",];
$Aa = $bk[rand(0, count($bk)-1)];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Aa$Aa$Aa$Aa 
$Aa               $Aa
$Aa                  $Aa
$Aa               $Aa
$Aa$Aa$Aa$Aa  
$Aa               $Aa
$Aa                  $Aa
$Aa               $Aa
$Aa$Aa$Aa$Aa"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Aa          $Aa
$Aa       $Aa
$Aa    $Aa
$Aa $Aa
$Aa
$Aa $Aa
$Aa    $Aa
$Aa       $Aa
$Aa          $Aa"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Aa$Aa$Aa$Aa        $Aa                $Aa
$Aa              $Aa      $Aa             $Aa
$Aa                 $Aa   $Aa          $Aa
$Aa              $Aa      $Aa        $Aa
$Aa$Aa$Aa$Aa       $Aa     $Aa
$Aa              $Aa      $Aa       $Aa
$Aa                 $Aa   $Aa          $Aa
$Aa              $Aa      $Aa             $Aa
$Aa$Aa$Aa$Aa        $Aa                $Aa"]);
}
if($text=='bk2' or $text=='2بکیرم' or $text=='bekiram2'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
😎😎😎
😎         😎
😎           😎
😎        😎
😎😎😎
😎         😎
😎           😎
😎           😎
😎        😎
😎😎😎']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
😶         😶
😶       😶
😶     😶
😶   😶
😶😶
😶   😶
😶      😶
😶        😶
😶          😶
😶            😶']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
😂😂😂          😂         😂
😂         😂      😂       😂
😂           😂    😂     😂
😂        😂       😂   😂
😂😂😂          😂😂
😂         😂      😂   😂
😂           😂    😂      😂
😂           😂    😂        😂
😂        😂       😂          😂
😂😂😂          😂            😂']);


yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
🖕🖕🖕          🖕         🖕
🖕         🖕      🖕       🖕
🖕           🖕    🖕     🖕
🖕        🖕       🖕   🖕
🖕🖕🖕          🖕🖕
🖕         🖕      🖕   🖕
🖕           🖕    🖕      🖕
🖕           🖕    🖕        🖕
🖕        🖕       🖕          🖕
 🖕🖕🖕         🖕            🖕']);
 
 yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
❤️❤️❤️          ❤️         ❤️
❤️         ❤️      ❤️       ❤️
❤️           ❤️    ❤️     ❤️
❤️        ❤️       ❤️   ❤️
❤️❤️❤️          ❤️❤️
❤️         ❤️      ❤️   ❤️
❤️           ❤️    ❤️      ❤️
❤️           ❤️    ❤️        ❤️
❤️        ❤️       ❤️          ❤️
 ❤️❤️❤️         ❤️            ❤️']);
 
 yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
🥀🥀🥀          🥀         🥀
🥀         🥀      🥀       🥀
🥀           🥀    🥀     🥀
🥀        🥀       🥀   🥀
🥀🥀🥀          🥀🥀
🥀         🥀      🥀   🥀
🥀           🥀    🥀      🥀
🥀           🥀    🥀        🥀
🥀        🥀       🥀          🥀
 🥀🥀🥀         🥀            🥀']);
 
 yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
🍆🍆🍆          😎         😎
🍆         🍆      😎       😎
🍆           🍆    😎     😎
🍆        🍆       😎   😎
🍆🍆🍆          😎😎
🍆         🍆      😎   😎
🍆           🍆    😎      😎
🍆           🍆    😎        😎
🍆        🍆       😎          😎
🍆🍆🍆          😎            😎']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
👽👽👽          👽         👽
👽         👽      👽       👽
👽           👽    👽     👽
👽        👽       👽   👽
👽👽👽          👽👽
👽         👽      👽   👽
👽           👽    👽      👽
👽           👽    👽        👽
👽        👽       👽          👽
👽👽👽          👽            👽']);
 
}

if ($text == 'زامبی' or $text == 'آدم') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️                     🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️                    🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️                   🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️                  🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️                 🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️                🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️               🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️              🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️             🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️            🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️           🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️          🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️         🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️        🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️       🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️      🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️     🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️    🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️   🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️  🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️ 🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧟‍♂️🔦🙎‍♂️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😑 زامبی آدمه رو به فاک داد 🕸"]);
}
if ($text == 'موشک' or $text=='حمله') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                      🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                     🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                    🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                   🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                  🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                 🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀               🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀              🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀             🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀            🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀           🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀          🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀         🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀        🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀       🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀      🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀     🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀    🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀   🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀  🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀 🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀🛸"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💥 Boom Alian Be F**k Raf, Bye 😂💥"]);
}
if ($text == 'ماه' or $text=='بریم ماه') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                       🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                      🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                     🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                    🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                   🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                  🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                 🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀                🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀               🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀              🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀             🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀            🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀           🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀          🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀         🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀        🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀       🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀      🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀     🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀    🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀   🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀  🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀 🌙"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🚀🌙"]);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "!🕳 رفتیم ماه 🕳!"]);
}
if ($text == 'پول' or $text=='دلار') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                          💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                         💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                        💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                       💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                      💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                     💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                    💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                   💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                  💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                 💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥                💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥               💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥              💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥             💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥            ‌💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥           💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥          💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥         💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥        💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥       💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥      💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥     💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥    💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥   💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥  💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥 💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🔥💵"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💸"]);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '🔥 این پول است، سلطان شهر من 💸']);
}
if ($text == 'خز بازی' or $text == 'خزوخیل') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                       🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                      🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                     🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                    🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                   🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                  🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                 🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩                🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩               🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩              🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩             🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩            🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩           🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩          🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩         🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩        🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩       🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩      🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩     🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩    🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩   🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩  🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩 🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💩🤢"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤮 ریدی با این خز بازیات بمولا 🤮"]);
}
if($text=='س' or $text=='/salam'){
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
S
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
Sl
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
Sla
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
Slam
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.       Slam
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌼🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌼🌷💐
       🌸slam 🌸
        🌺??🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌼💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷🌼
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌼
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷🌼
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌼💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷🌺
       🌸slam 🌸
        🌺🌼🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌼🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌼slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌼🌹🌷💐
       🌸slam 🌸
        🌺🌹??💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌼🌷💐
       🌸slam 🌸
        ??🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌼💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      ??🌹🌷🌼
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌼
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷🌼
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌼💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌼🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌼🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌼slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌼🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌼🌷💐
       🌸slam 🌸
        🌺??🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌼💐
       🌸slam 🌸
        🌺🌹??💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷🌼
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌼
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷🌼
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌼💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌼🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       ??slam 🌸
        🌼🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      ??🌹🌷💐
       🌼slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌼🌹🌷💐
       🌸slam 🌸
        🌺??🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌼🌷💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌼💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷🌼
       🌸slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌼
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌷🌼
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌹🌼💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌺🌼🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌸slam 🌸
        🌼🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌺🌹🌷💐
       🌼slam 🌸
        🌺🌹🌷💐
"]);

yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
.      🌼??🌷💐
       🌸slam 🌸
        🌺🌹🌷💐
"]);
}
        if ($text == 'ق') {

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           ❤️                  ❤️
        ❤️  ❤️          ❤️  ❤️
    ❤️          ❤️  ❤️          ❤️
       ❤️           ❤️           ❤️
           ❤️                    ❤️
               ❤️            ❤️
                   ❤️    ❤️
                        ❤️
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🧡                  🧡
        🧡  🧡          🧡  🧡
    🧡          🧡  🧡          🧡
       🧡           🧡           🧡
           🧡                    🧡
               🧡            🧡
                   🧡    🧡
                        🧡
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💛                  💛
        💛  💛          💛  💛
    💛          💛  💛          💛
       💛           💛           💛
           💛                    💛
               💛            💛
                   💛    💛
                        💛
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💚                  💚
        💚  💚          💚  💚
    💚          💚  💚          💚
       💚           💚           💚
           💚                    💚
               💚            💚
                   💚    💚
                        💚
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💙                  💙
        💙  💙          💙  💙
    💙          💙  💙          💙
       💙           💙           💙
           💙                    💙
               💙            💙
                   💙    💙
                        💙
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💜                  💜
        💜  💜          💜   💜
    💜          💜  💜          💜
       💜           💜           💜
           💜                    💜
               💜            💜
                   💜    💜
                        💜
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🖤                  🖤
        🖤  🖤          🖤   🖤
    🖤          🖤  🖤          🖤
       🖤           🖤           🖤
           🖤                    🖤
               🖤            🖤
                   🖤    🖤
                        🖤
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍   🤍
    🤍          🤍  🤍          🤍
       🤍           🤍           🤍
           🤍                    🤍
               🤍            🤍
                   🤍    🤍
                        🤍
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💗                  💗
        💗  💗          💗   💗
    💗          💗  💗          💗
       💗           💗           💗
           💗                    💗
               💗            💗
                   💗    💗
                        💗
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           ❤️                  ❤️
        ❤️  ❤️          ❤️  ❤️
    ❤️          ❤️  ❤️          ❤️
       ❤️           ❤️           ❤️
           ❤️                    ❤️
               ❤️            ❤️
                   ❤️    ❤️
                        ❤️
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🧡                  🧡
        🧡  🧡          🧡  🧡
    🧡          🧡  🧡          🧡
       🧡           🧡           🧡
           🧡                    🧡
               🧡            🧡
                   🧡    🧡
                        🧡
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💛                  💛
        💛  💛          💛  💛
    💛          💛  💛          💛
       💛           💛           💛
           💛                    💛
               💛            💛
                   💛    💛
                        💛
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💚                  💚
        💚  💚          💚  💚
    💚          💚  💚          💚
       💚           💚           💚
           💚                    💚
               💚            💚
                   💚    💚
                        💚
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💙                  💙
        💙  💙          💙  💙
    💙          💙  💙          💙
       💙           💙           💙
           💙                    💙
               💙            💙
                   💙    💙
                        💙
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💜                  💜
        💜  💜          💜   💜
    💜          💜  💜          💜
       💜           💜           💜
           💜                    💜
               💜            💜
                   💜    💜
                        💜
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🖤                  🖤
        🖤  🖤          🖤   🖤
    🖤          🖤  🖤          🖤
       🖤           🖤           🖤
           🖤                    🖤
               🖤            🖤
                   🖤    🖤
                        🖤
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍   🤍
    🤍          🤍  🤍          🤍
       🤍           🤍           🤍
           🤍                    🤍
               🤍            🤍
                   🤍    🤍
                        🤍
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💗                  💗
        💗  💗          💗   💗
    💗          💗  💗          💗
       💗           💗           💗
           💗                    💗
               💗            💗
                   💗    💗
                        💗
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           ❤️                  ❤️
        ❤️  ❤️          ❤️  ❤️
    ❤️          ❤️  ❤️          ❤️
       ❤️           ❤️           ❤️
           ❤️                    ❤️
               ❤️            ❤️
                   ❤️    ❤️
                        ❤️
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🧡                  🧡
        🧡  🧡          🧡  🧡
    🧡          🧡  🧡          🧡
       🧡           🧡           🧡
           🧡                    🧡
               🧡            🧡
                   🧡    🧡
                        🧡
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💛                  💛
        💛  💛          💛  💛
    💛          💛  💛          💛
       💛           💛           💛
           💛                    💛
               💛            💛
                   💛    💛
                        💛
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💚                  💚
        💚  💚          💚  💚
    💚          💚  💚          💚
       💚           💚           💚
           💚                    💚
               💚            💚
                   💚    💚
                        💚
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💙                  💙
        💙  💙          💙  💙
    💙          💙  💙          💙
       💙           💙           💙
           💙                    💙
               💙            💙
                   💙    💙
                        💙
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💜                  💜
        💜  💜          💜   💜
    💜          💜  💜          💜
       💜           💜           💜
           💜                    💜
               💜            💜
                   💜    💜
                        💜
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🖤                  🖤
        🖤  🖤          🖤   🖤
    🖤          🖤  🖤          🖤
       🖤           🖤           🖤
           🖤                    🖤
               🖤            🖤
                   🖤    🖤
                        🖤
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍   🤍
    🤍          🤍  🤍          🤍
       🤍           🤍           🤍
           🤍                    🤍
               🤍            🤍
                   🤍    🤍
                        🤍
.']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💗                  💗
        💗  💗          💗   💗
    💗          💗  💗          💗
       💗           💗           💗
           💗                    💗
               💗            💗
                   💗    💗
                        💗
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🧡                  🧡
        🧡  🧡          🧡  🧡
    🧡  🤍 🧡  🧡   🤍  🧡
       🧡   🤍 🧡   🤍   🧡
           🧡   🤍  🤍   🧡
               🧡   🤍   🧡
                   🧡    🧡
                        🧡
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  🧡 🤍  🤍   🧡  🤍
       🤍   🧡 🤍   🧡   🤍
           🤍   🧡  🧡   🤍
               🤍   🧡   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🧡                  🧡
        🧡  🧡          🧡  🧡
    🧡  🤍 🧡  🧡   🤍  🧡
       🧡   🤍 🧡   🤍   🧡
           🧡   🤍  🤍   🧡
               🧡   🤍   🧡
                   🧡    🧡
                        🧡
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  🧡 🤍  🤍   🧡  🤍
       🤍   🧡 🤍   🧡   🤍
           🤍   🧡  🧡   🤍
               🤍   🧡   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💛                  💛
        💛  💛          💛  💛
    💛  🤍 💛  💛   🤍  💛
       💛   🤍 💛   🤍   💛
           💛   🤍  🤍   💛
               💛   🤍   💛
                   💛    💛
                        💛
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💛 🤍  🤍   💛  🤍
       🤍   💛 🤍   💛   🤍
           🤍   💛  💛   🤍
               🤍   💛   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💛                  💛
        💛  💛          💛  💛
    💛  🤍 💛  💛   🤍  💛
       💛   🤍 💛   🤍   💛
           💛   🤍  🤍   💛
               💛   🤍   💛
                   💛    💛
                        💛
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💛 🤍  🤍   💛  🤍
       🤍   💛 🤍   💛   🤍
           🤍   💛  💛   🤍
               🤍   💛   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💚                  💚
        💚  💚          💚  💚
    💚  🤍 💚  💚   🤍  💚
       💚   🤍 💚   🤍   💚
           💚   🤍  🤍   💚
               💚   🤍   💚
                   💚    💚
                        💚
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💚 🤍  🤍   💚  🤍
       🤍   💚 🤍   💚   🤍
           🤍   💚  💚   🤍
               🤍   💚   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💚                  💚
        💚  💚          💚  💚
    💚  🤍 💚  💚   🤍  💚
       💚   🤍 💚   🤍   💚
           💚   🤍  🤍   💚
               💚   🤍   💚
                   💚    💚
                        💚
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💚 🤍  🤍   💚  🤍
       🤍   💚 🤍   💚   🤍
           🤍   💚  💚   🤍
               🤍   💚   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💙                  💙
        💙  💙          💙  💙
    💙  🤍 💙  💙   🤍  💙
       💙   🤍 💙   🤍   💙
           💙   🤍  🤍   💙
               💙   🤍   💙
                   💙    💙
                        💙
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💙 🤍  🤍   💙  🤍
       🤍   💙 🤍   💙   🤍
           🤍   💙  💙   🤍
               🤍   💙   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💙                  💙
        💙  💙          💙  💙
    💙  🤍 💙  💙   🤍  💙
       💙   🤍 💙   🤍   💙
           💙   🤍  🤍   💙
               💙   🤍   💙
                   💙    💙
                        💙
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💙 🤍  🤍   💙  🤍
       🤍   💙 🤍   💙   🤍
           🤍   💙  💙   🤍
               🤍   💙   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💜                  💜
        💜  💜          💜  💜
    💜  🤍 💜  💜   🤍  💜
       💜   🤍 💜   🤍   💜
           💜   🤍  🤍   💜
               💜   🤍   💜
                   💜    💜
                        💜
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💜 🤍  🤍   💜  🤍
       🤍   💜 🤍   💜   🤍
           🤍   💜  💜   🤍
               🤍   💜   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           💜                  💜
        💜  💜          💜  💜
    💜  🤍 💜  💜   🤍  💜
       💜   🤍 💜   🤍   💜
           💜   🤍  🤍   💜
               💜   🤍   💜
                   💜    💜
                        💜
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  💜 🤍  🤍   💜  🤍
       🤍   💜 🤍   💜   🤍
           🤍   💜  ??   🤍
               🤍   💜   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🖤                  🖤
        🖤  🖤          🖤  🖤
    🖤  🤍 🖤  🖤   🤍  🖤
       🖤   🤍 🖤   🤍   🖤
           🖤   🤍  🤍   🖤
               🖤   🤍   🖤
                   🖤    🖤
                        🖤
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  🖤 🤍  🤍   🖤  🤍
       🤍   🖤 🤍   🖤   🤍
           🤍   🖤  🖤   🤍
               🤍   🖤   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🖤                  🖤
        🖤  🖤          🖤  🖤
    🖤  🤍 🖤  🖤   🤍  🖤
       🖤   🤍 🖤   🤍   🖤
           🖤   🤍  🤍   🖤
               🖤   🤍   🖤
                   🖤    🖤
                        🖤
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  🖤 🤍  🤍   🖤  🤍
       🤍   🖤 🤍   🖤   🤍
           🤍   🖤  🖤   🤍
               🤍   🖤   🤍
                   🤍    🤍
                        🤍
.']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           ❤️                  ❤️
        ❤️  ❤️          ❤️  ❤️
    ❤️  🤍 ❤️  ❤️   🤍  ❤️
       ❤️   🤍 ❤️   🤍   ❤️
           ❤️   🤍  🤍   ❤️
               ❤️   🤍   ❤️
                   ❤️    ❤️
                        ❤️
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  ❤️ 🤍  🤍   ❤️  🤍
       🤍   ❤️ 🤍   ❤️   🤍
           🤍   ❤️  ❤️   🤍
               🤍   ❤️   🤍
                   🤍    🤍
                        🤍
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           ❤️                  ❤️
        ❤️  ❤️          ❤️  ❤️
    ❤️  🤍 ❤️  ❤️   🤍  ❤️
       ❤️   🤍 ❤️   🤍   ❤️
           ❤️   🤍  🤍   ❤️
               ❤️   🤍   ❤️
                   ❤️    ❤️
                        ❤️
.']);
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '.           🤍                  🤍
        🤍  🤍          🤍  🤍
    🤍  ❤️ 🤍  🤍   ❤️  🤍
       🤍   ❤️ 🤍   ❤️   🤍
           🤍   ❤️  ❤️   🤍
               🤍   ❤️   🤍
                   🤍    🤍
                        🤍
.']);
                            }
          if ($text == 'ف' or $text == 'fuck') {
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "         \                         /
          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "        ('(   (   (   (  ¯~/'  ' /
         \                         /
          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "          /'/   /    /  /     /¨¯\
        ('(   (   (   (  ¯~/'  ' /
         \                         /
          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "             /´¯/'   '/´¯¯`•¸
          /'/   /    /  /     /¨¯\
        ('(   (   (   (  ¯~/'  ' /
         \                         /
          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "                     /    /
             /´¯/'   '/´¯¯`•¸
          /'/   /    /  /     /¨¯\
        ('(   (   (   (  ¯~/'  ' /
         \                         /
          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "                        /   /
                     /    /
             /´¯/'   '/´¯¯`•¸
          /'/   /    /  /     /¨¯\
        ('(   (   (   (  ¯~/'  ' /
         \                         /
          \                _.•´
            \              (
              \             \ ' "]);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => " .                        /¯)
                        /   /
                     /    /
             /´¯/'   '/´¯¯`•¸
          /'/   /    /  /     /¨¯\
        ('(   (   (   (  ¯~/'  ' /
         \                         /
          \                _.•´
            \              (
              \             \ ' "]);
                            }                   
            if ($text == 'بای' or $text == 'bye') {
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'خداحافظ']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Bye']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Totsiens']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'अलविदा']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
Tchau']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ባይ']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Pa']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'وداعا']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'bless']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'до свидания']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ցտեսություն']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
ka ọ dị']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'addio']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'さようなら']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'здраво']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'doei']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'хайр']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'vale']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Чао']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hoşçakal']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'au revoir']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Tschüss']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'баяртай']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
αντίο']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ବିଦାୟ']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'o dabọ']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ביי']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'usale kahle']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'د خدای په امان']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'farvel']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hejdå']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'kwaheri']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '再见']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'sala hantle']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'slán']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'sağol']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'خداحافظظظ']);
                            }                    
       if ($text == 'slm' or $text == 'سلم') {
                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'سلام']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hello']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'مرحبا']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Dia dhuit
']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Салом']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Merhaba']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hallo']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'שלום']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Bonjour']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Salve']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hallå']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hola']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Lumela']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Ciao']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Բարեւ']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Здравствуйте']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'नमस्कार']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Olá']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ሰላም']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Helló']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Salut']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'হ্যালো']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Здраво']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
добры дзень']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'හෙලෝ']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Ahoj']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ಹಲೋ
']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ဟယ်လို
']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Waad salaaman tihiin']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '你好']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ສະບາຍດີ
']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hej']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Sveiki']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Hei']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ନମସ୍କାର']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'Sawubona']);

                                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'سلاااااممم']);
                            }                      
if ($text == 'جن' or $text=='روح'  or $text=='روحح') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                       🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                      🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                     🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                    🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                   🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                  🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                 🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻                🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻               🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "??              🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻             🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻            🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻           🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻          🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻         🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻        🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻       🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻      🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻     🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻    🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻   🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻  🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻 🙁"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👻😯"]);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☠ اینم که بگا رف پس😐☠"]);
}
if ($text == 'برم خونه' or $text == 'برسم خونه') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠                   🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠                  🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠                 🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠                🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠               🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠              🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠             🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠            🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠           🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠          🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠         🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠        🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠       🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠      🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠     🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠    🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠   🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠  🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠 🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏠 بالاخره رسیدم خونه 🚶‍♂"]);
}
if ($text == 'فرار از خونه' or $text=='شکست عشقی') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡 💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡  💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡   💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡    💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡     💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡      💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡       💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡        💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡         💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡          💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡           💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡            💃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡             💃💔👫"]);
  yield $MadelineProto->sleep(1.5);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡                  🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡                 🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡                🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡               🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡              🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡             🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡            🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡           🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡          🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡         🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡        🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡       🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡      🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡     🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡    🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡   🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡  🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡 🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏡🚶‍♀"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😥 هعععععععععی، سینگل شدیم رفت 🚶‍♀"]);
}
if ($text == 'عقاب' or $text=='موش') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭                  🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭                 🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭                🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭               🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭              🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭             🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭            🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭           🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭          🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭         ??"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭        🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭       🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭      🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭     🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭    🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭   🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭  🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭 🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🐭🦅"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🥱 موش بگای عقاب رف، بای بمولا 😂"]);
}
if ($text == 'حموم' or $text=='حمام') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪                   🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪                  🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪                 🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪                🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪               🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪              🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪             🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪            🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪           🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪          🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪         🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪        🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪       🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪      🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪     🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪    🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪   🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪  🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪 🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛁🚪🗝"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛀💦 اوه اوه وسط عملیات لو رفتیم 😈"]);
}
if ($text == 'آپدیت' or $text=='اپدیت' or $text=='update') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩 10%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩 20%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩 30%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩🟩 40%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩🟩🟩 50%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩🟩🟩🟩 60%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩🟩🟩🟩🟩 70%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩🟩🟩🟩🟩🟩 80%"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🟩🟩🟩🟩🟩🟩🟩🟩🟩 90%"]);
  yield $MadelineProto->sleep(2);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❗️ERROR, Update Failed❗️"]);
}
if ($text == 'جنایتکارو بکش' or $text=='بکشش') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃                 • 🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃                •  🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃               •   🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃              •    🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃             •     🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃            •      🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃           •       🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃          •        🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃         •         🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃        •          🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃       •           🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃      •            🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃     •             🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃    •              🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃   •               🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃  •                🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃 •                 🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🙃•                  🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤯                   🔫🤠"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "سرانجام جنایتکار کشته شد 😂😐"]);
}
if ($text == 'بریم مسجد' or $text == 'مسجد') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌                   🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌                  🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌                 🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌                🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌               🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌              🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌             🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌            🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌           🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌          🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌         🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌        🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌       🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌      🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌     🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌    🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌   🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌  🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌 🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🕌🚶‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "اشهدان الا الا الله، برو نماز بخون روشن بشی...📢"]);
  }
  if ($text == 'کوسه' or $text == 'شانس') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅┄┄┅     🏊‍♂┅┄┄┅🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅┄┄┅   🏊‍♂┅┄┄┅🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅┄┄┅  🏊‍♂┅┄┄┅🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅┄┄┅ 🏊‍♂┅┄┄┅🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅┄┄🏊‍♂┅┄┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅┄🏊‍♂┅┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄┅🏊‍♂┅┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅┄🏊‍♂┅┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄┅🏊‍♂┅┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝┄🏊‍♂┅┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🏝🏊‍♂┅┄🦈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "عجب شانسی داشتم، بای بده کوسه 😂"]);
}
if ($text == 'بارون' or $text == 'ابر') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️                    ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️                   ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️                  ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️                 ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️                ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️               ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️              ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️             ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️            ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️           ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️          ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️         ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️        ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️       ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️      ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️     ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️    ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️   ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️  ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️ ⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "☁️⚡️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "چترمو جا گذاشتم ⛈"]);
}
if ($text == 'بادکنک' or $text == 'کاکتوس') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵                     🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵                    🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵                   🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵                  🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵                 🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵                🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵               🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵              🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵             🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵            🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵           🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "??          🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵         🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵        🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵       🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵      🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵     🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵    🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵   🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵  🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵 🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌵🎈"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💥😐 Bomm, Ballon exploded 😥💥"]);
}
if ($text == 'شب خوش' or $text == 'شب بخیر ' or $text=='شو خوش') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜              🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜             🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜            🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜           🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜          🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜         🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜        🙃"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜       😕"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜      ☹️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜     😣"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜    😖"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜   😩"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜  🥱"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌜 🥱"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😴"]);
}
if ($text == 'فیشینگ' or $text == 'فیش') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈                     💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈                    💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈                   💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈                  💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈                 💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈                💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈               💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈              💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈             💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈            💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈           💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈          💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈         💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈        💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈       💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈      💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈     💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈    💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈   💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈  💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈 💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😈💳"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💵🤑 کارتت شسته شد 🤑💵"]);
}
if ($text == 'گل بزن' or $text=='فوتبال' or $text=='توی دروازه') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟          ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟         ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟        ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟       ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟      ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟     ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟    ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟   ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟  ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟 ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟  ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟   ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟    ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟     ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟      ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟       ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟        ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟         ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "👟          ⚽️"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "(🔥 توی دروازه و گللللللللللللل 🥳)"]);
}
if ($text == 'برم بخوابم' or $text=='بخواب') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏                  🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏                 🚶??"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏                🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏               🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏              🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏             🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏            🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏           🚶🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏          🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏         🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏        🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏       🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏      🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏     🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏    🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏   🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏  🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏 🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛏🚶🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🛌 شب خوشک 😴"]);
}
if($text=='انگشت' or $text=='انگشتش کن'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻               👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻              👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻             👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻            👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻           👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻          👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻         👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻        👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻       👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻      👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻     👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻    👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻   👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻  👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻 👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '👌🏻👈🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '✌🏻 غار انگشت شد ✌🏻']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '👌']);
}
if($text=='قلبب' or $text=='گلبب') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚💚💚💚💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛💛💛💛💛']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡🧡🧡🧡🧡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💜💜💜💜💜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖤🖤🖤🖤🖤']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚💚💚💚💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💖💖💖💖💖']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💞💞💞💞💞']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💝💝💝💝💝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💕💕💕💕💕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💗💗💗💗💗']);
}
if($text=='گوههه' or $text=='گوه بخوررر'){
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => 'G.......']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '.O......']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '..H.....']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '...B....']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '....O...']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '.....KH..']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '......O.']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '.......R']);
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => 'GOH BOKHOR💩']);
}
if($text=='گوه2' or $text=='گوه بخور2'){
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩💩💩
💩💩💩
🖕🖕🖕
💥💥💥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😂💩🖕
🖕😐🖕
😂🖕😂
💩💩💩']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😐💩😐
💩😂🖕
💥💩💥
🖕🖕😐']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤤🖕😐
😏🖕😏
💩💥💩
💩🖕😂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩💩💩
🤤🤤🤤
💩👽💩
💩😐💩']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😐🖕💩
💩💥💩
💩🖕💩
💩💔😐']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩💩🖕💩
😐🖕😐🖕
💩🤤🖕🤤
🖕😐💥💩']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💥😐🖕💥
💥💩💩💥
👙👙💩💥
💩💔💩👙']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩👙💥🖕
💩💥🖕💩
👙💥🖕💥
💩😐👙🖕
💥💩💥💩']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩😐🖕
💩🖕💥
👙🖕💥
👙🖕💥
💩💥🖕
😂👙🖕
💩💥👙']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤤😂🖕👙💩
😏🖕💥👙🖕🖕
😂🖕👙💥😂🖕
😂🖕👙🖕😂🖕
💔🖕🖕🖕🖕🖕
💩💩💩💩
💩👙💩👙']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤫👙💩😂💥💥
💩🖕💩👙💥💥
💩💩💩💩💩💩
💩😐💩😐💩😐
😃💩😃😃💩💩
🤤💩🤤💩🤤💩
💩👙💩😐🖕💩']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩🖕💥👙💥🖕
💩👙💥🖕💥👙
👙🖕💥💩💩💥
👙🖕💥💩💥😂
💩💥👙🖕💩🖕
💩👙💥🖕💥😂
💩👙💥🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩👙💥👙👙🖕
💩👙💥🖕💩😂
💩👙💥🖕💥👙
💩👙💥🖕💩👙
💩👙💥🖕😂😂
💩👙💥🖕😂😂
💩👙💥🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩💩💩💩💩
💩💩💩💩💩
💩💩💩💩💩
💩💩💩💩💩
💩💩💩💩💩
💩💩💩💩💩
💩💩💩💩💩']);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'چه گوه تو گوهی شد، پس گوه بخور 😐😂😁']);
}
if($text=='گوه3' or $text=='گوه بخور3'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩                      🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩                    🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩                  🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩                🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩              🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩            🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩          🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩        🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩      🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩    🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩  🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩🚽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💩']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'کمتر گوه بخورید💩😂...']);
}
if($text=='لامپ' or $text=='نور' or $text=='چراغ'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡                 ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡                ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡               ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡              ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡             ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡            ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡           ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡          ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡         ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡        ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡       ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡      ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡     ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡    ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡   ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡  ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡 ⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡⚡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💡']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'با رعد و برق لامپ روشن کردیم😐، پشمای فیزیک بمولا😅']);
}
if($text=='نامه' or $text=='صندوق' or $text=='پست'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫               ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫              ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫             ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫            ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫           ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫          ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫         ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫        ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫       ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫      ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫     ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫    ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫   ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫  ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫 ✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📫✉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📬']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'سلطان از طرف بدخواهت، نامه جدید داری 👑📬']);
}
if($text=='هالوین' or $text=='کدو' or $text=='چاقووو'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪               🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪              🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪             🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪            🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪           🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪          🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪         🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪        🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪       🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪      🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪     🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪    🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪   🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪  🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪 🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔪🎃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🎃']);
}
if($text=='اسکلت' or $text=='جمجمه'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀💀']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💀']);
}
if($text=='فوششش' or $text=='ناسزا'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬🤬']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤬']);
}
if($text=='💋💋💋' or $text=='بوس بوس' or $text=='بوسس'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻               💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻              💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻             💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻            💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻           💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻          💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻         💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻        💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻       💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻      💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻     💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻    💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻   💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻  💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻 💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👦🏻💋']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💋']);
}
if($text=='کیبورد' or $text=='هکر مرد'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⌨️']);
  yield $MadelineProto->sleep(4);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️ ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️  ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️   ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️    ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️     ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️      ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️       ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️        ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️         ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️          ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️           ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️            ⌨️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙎🏻‍♂️']);
  yield $MadelineProto->sleep(2);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'عجب... هکرمون بی کیبورد شد 😕']);
}
if($text=='آمپول' or $text=='تزریق' or $text=='دکتر'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑                          💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑                        💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑                      💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑                    💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑                  💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑                💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑              💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑            💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑          💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑        💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑      💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑    💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑  💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻‍⚕️🍑💉']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💉']);
  yield $MadelineProto->sleep(4);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍑']);
}
if($text=='مجسمه' or $text=='حکاکی'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏            🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏           🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏          🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏         🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏        🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏       🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏      🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏     🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏    🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏   🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏  🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏ 🗿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏🗿']);
  yield $MadelineProto->sleep(1); 
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🗿']);
}
if($text=='کوه' or $text=='الماس'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏                🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏               🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏              🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏             🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏            🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏           🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏          🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏         🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏        🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏       🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏      🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏     🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏    🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏   🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏  🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏ 🗻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛏🗻']);
  yield $MadelineProto->sleep(1); 
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💎']);
}
if($text=='کلید' or $text=='قفل'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒                🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒               🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒              🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒             🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒            🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒           🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒          🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒         🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒        🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒       🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒      🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒     🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒    🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒   🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒  🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒 🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔒🔑']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔐']);
}
if($text=='تایممم' or $text=='زماننن'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳          10']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳         9']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳        8']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳       7']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳      6']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳     5']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳    4']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳   3']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳  2']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳ 1']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳0']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏳']);
  yield $MadelineProto->sleep(1); 
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'زمانت بگا رف، بای بدههههه 😂']);
}
if($text=='تاکسی' or $text=='اسنپ'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻          🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻         🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻        🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻       🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻      🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻     🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻    🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻   🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻  🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻 🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨🏻🚕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚕']);
}
if($text=='هورا' or $text=='یسسس'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🎉']);
}
if($text=='بقلبممم' or $text=='بگلبممم'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💔']);
}
if($text=='آتش' or $text=='آتیش'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔥']);
}
if($text=='پشممم' or $text=='ترکید'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤯']);
}
if($text=='بادمجون' or $text=='دک'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍆']);
}
if($text=='تق تق' or $text=='دربزن'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⚰️']);
}
if($text=='کرونایی' or $text=='خفاش'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🦇']);
}
if($text=='هنن' or $text=='واتت'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🗿']);
}
if($text=='حشره' or $text=='عن کبوت'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕷']);
}
if($text=='بترسونش' or $text=='بترس'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👻']);
}
if($text=='عمل صالح' or $text=='تقوا' or $text=='ایمان'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '📂']);
}
if($text=='رقص تابوت' or $text=='تابوت'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳     🚶🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳   🚶🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳  🚶🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳 🚶🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳🚶🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕴⚰️🕴🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => ' 🕴️⚰️🕴🏿⚰️🕴️⚰️🕴🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕴⚰️🕴🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => ' 🕴️⚰️🕴🏿⚰️🕴️⚰️🕴🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕴⚰️🕴🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => ' 🕴️⚰️🕴🏿⚰️🕴️⚰️🕴🏿']);
}
if($text=='برگام' or $text== 'پشمام'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍂🍂🍂🍂🍂🍂🍂🍂🍂🍂🍂🍂🍂🍂🍂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍁🍁🍁🍁🍁🍁🍁🍁🍁🍁🍁🍁🍁🍁🍁']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍃🍃🍃🍃🍃🍃🍃🍃🍃🍃🍃🍃🍃🍃🍃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌿🌿🌿🌿🌿🌿🌿🌿🌿🌿🌿🌿🌿🌿🌿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱🌱']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '☘️☘️☘️☘️☘️☘️☘️☘️☘️☘️☘️☘️☘️☘️☘️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍀🍀🍀🍀🍀🍀🍀🍀🍀🍀🍀🍀🍀🍀🍀️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍂🍁🍂🍁🍂🍁🍂🍁🍂🍁🍂🍁🍂🍁🍂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌱🌿🌱🌿🌱🌿🌱🌿🌱🌿🌱🌿🌱🌿🌱']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍂🍂🌿🍂🌿🍂🌿🍂🌿🍂🌿🍂🌿🍂🌿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '☘️🍁☘️🍁☘️🍁☘️🍁☘️🍁☘️🍁☘️🍁☘️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍁🌱🌿🍂🍁🌱🌿🍂🍁🌱🌿🍂🍁🌱🌿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🍃🍂🍁🌱🌿☘️🍀🍃🍁🍂🌿🌱☘️🍀🍃']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'پشمام ریخت، یا حضرت پشم 🤐']);
}
if ($text == 'غرقش کن' or $text=='غرق شو') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊                  🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊                 🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊                🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊               🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊              🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊             🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊            🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊           🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊          🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊         🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊        🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊       🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊      🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊     🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊    🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊   🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊  🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊 🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🌊🏄🏻‍♂"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "😞 رفیقمونم غرق شد، بای بمولا 🙁"]);
}
if ($text == 'فضانورد' or $text == 'برو فضا') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀                   🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀                  🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀                 🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀                🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀               🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀              🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀             🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀            🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀           🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀          🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀         🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀        🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀       🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀      🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀     🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀    🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀   🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀  🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀 🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🧑‍🚀🪐"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🇮🇷 من میگم ایران قویه 🇮🇷"]);
}
if ($text == 'بزن قدش' or $text=='ایول') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻                    🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻                   🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻                  🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻                 🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻                🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻               🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻              🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻             🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻            🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻           🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻          🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻         🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻        🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻       🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻      🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻     🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻    🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻   🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻  🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤜🏻🤛🏻"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'بسیار زیبا زد قدش 😂']);
}
if($text=='جق' or $text=='بجق'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👌🏻<---']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<👌🏻---']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<-👌🏻--']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<--👌🏻-']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<---👌🏻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<--👌🏻-']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<-👌🏻--']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<👌🏻---']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👌🏻<---']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<-👌🏻--']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<--👌🏻-']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<-👌🏻--']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👌🏻<---']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<-👌🏻--']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<--👌🏻-']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '<-👌🏻--']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👌🏻<---']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💦💦💦<---']);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'اینم از جق امروز، بای بمولا😁']);
}
if($text=='قلببب' or $text=='گلببب'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️🧡💛💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡❤️💛💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡💛❤️💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡💛💚❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛🧡💚❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛💚🧡❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛💚❤️🧡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚💛❤️🧡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚❤️🧡💛']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️💚🧡💛']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️🧡💚💛']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️🧡💛💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡❤️💛💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡💛❤️💚']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🧡💛💚❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛🧡💚❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛💚🧡❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛💚❤️🧡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚💛❤️🧡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚❤️💛🧡']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚❤️🧡💛']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️💚🧡💛']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️🧡💚💛']);
}
if ($text=='قلبببب' or $text=='گلبببب') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❤️🧡💛💚"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💜💙🖤💛"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤍🤎💛💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💚❤️🖤🧡"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💜💚🧡🖤"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤍🧡🤎💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💙🧡💜🧡"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💚💛💙💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🖤💛💙🤍"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🖤🤍💙❤"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❤️🧡💛💚"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💜💙🖤💛"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤍🤎💛💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💚❤️🖤🧡"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💜💚🧡🖤"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤍🧡🤎💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💙🧡💜🧡"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💚💛💙💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🖤💛💙🤍"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🖤🤍💙❤"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "❤️🧡💛💚"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💜💙🖤💛"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤍🤎💛💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💚❤️🖤🧡"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💜💚🧡🖤"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🤍🧡🤎💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💙🧡💜🧡"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "💚💛💙💜"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🖤💛💙🤍"]);
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "🖤🤍💙❤"]);
}
if($text=='قلبز' or $text=='بقلب'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤍' ]);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💛']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💚️']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙️']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖤️']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤎️']);
  yield $MadelineProto->sleep(1);  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️']);
}
if($text=='قلب' or $text=='پرو قلب'){
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️❤️❤️❤️❤️❤️
❤️❤️❤️❤️❤️❤️
❤️❤️💛💛❤️❤️
❤️❤️💛💛❤️❤️
❤️❤️❤️❤️❤️❤️
❤️❤️❤️❤️❤️❤️']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️❤️❤️❤️❤️❤️
❤️💚💚💚💚❤️
❤️💚💛💛💚❤️
❤️💚💛💛💚❤️
❤️💚💚💚💚❤️
❤️❤️❤️❤️❤️❤️']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙💙
💙💚💚💚💚💙
💙💚💛💛💚💙
💙💚💛💛💚💙
💙💚💚💚💚💙
💙💙💙💙💙💙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙💙
💙🖤🖤🖤🖤💙
💙🖤💛💛🖤💙
💙🖤💛💛🖤💙
💙🖤🖤🖤🖤💙
💙💙💙💙💙💙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙💙
💙🖤🖤🖤🖤💙
💙🖤🤍🤍🖤💙
💙🖤🤍🤍🖤💙
💙🖤🖤🖤🖤💙
💙💙💙💙💙💙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💔💔💔💔💔💔
💔🖤🖤🖤🖤💔
💔🖤🤍🤍🖤💔
💔🖤🤍🤍🖤💔
💔🖤🖤🖤🖤💔
💔💔💔💔💔💔']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️❤️❤️❤️❤️❤️
❤️❤️❤️❤️❤️❤️
❤️❤️💛💛❤️❤️
❤️❤️💛💛❤️❤️
❤️❤️❤️❤️❤️❤️
❤️❤️❤️❤️❤️❤️']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️❤️❤️❤️❤️❤️
❤️💚💚💚💚❤️
❤️💚💛💛💚❤️
❤️💚💛💛💚❤️
❤️💚💚💚💚❤️
❤️❤️❤️❤️❤️❤️']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙💙
💙💚💚💚💚💙
💙💚💛💛💚💙
💙💚💛💛💚💙
💙💚💚💚💚💙
💙💙💙💙💙💙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙💙
💙🖤🖤🖤🖤💙
💙🖤💛💛🖤💙
💙🖤💛💛🖤💙
💙🖤🖤🖤🖤💙
💙💙💙💙💙💙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💙💙💙💙💙💙
💙🖤🖤🖤🖤💙
💙🖤🤍🤍🖤💙
💙🖤🤍🤍🖤💙
💙🖤🖤🖤🖤💙
💙💙💙💙💙💙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💔💔💔💔💔💔
💔🖤🖤🖤🖤💔
💔🖤🤍🤍🖤💔
💔🖤🤍🤍🖤💔
💔🖤🖤🖤🖤💔
💔💔💔💔💔💔']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
🖤🖤🖤🖤
🖤🤍🤍🖤
🖤🤍🤍🖤
??🖤🖤🖤']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤍']);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️']);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤍']);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️']);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤍']);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️']);
}
if($text=='خخخ' or $text=='خنده' or $text == 'lol'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😂']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤣']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😀']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😃']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😄']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😁']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😆']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😅']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😊']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🙃']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😛']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😝']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😜']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤪']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😺']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😹']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😸']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😇']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😂']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤤']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤣']);
}
if($text=='بپا پس' or $text=='کرونا'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🦠' ]);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😷']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤒']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤢']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤧']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🤕']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚑']);
  yield $MadelineProto->sleep(3);                                                         
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💊']);
  yield $MadelineProto->sleep(3);                                                         
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💉']);
  yield $MadelineProto->sleep(3); 
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'پس بپا کرونا نگیری 😐😑🤜🏻']);
}
if($text=='زارت' or $text=='یک روز'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌕' ]);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌔']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌖']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌓']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌓']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌒']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌘']);
  yield $MadelineProto->sleep(3);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌑']);
}
if($text=='عشق' or $text=='عاشقی'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀               🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀              🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀             🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀            🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀           🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀          🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀         🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀        🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀       🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀      🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀     🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀    🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀   🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀  🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀ 🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🚶‍♀🏃‍♂']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤ I LOVE YOU, I NEED YOU 🙃🤤']);
}
if($text=='موتور'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳               🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳              🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳             🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳            🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳           🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳          🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳         🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳        🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳       🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳      🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳     🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳    🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳   🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳  🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳 🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕳🏍']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👑 KING @Zero_Paradox 👑']);
}

if($text=='ماشین'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣               🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣              🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣             🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣            🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣           🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣          🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣         🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣        🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣       🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣      🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣     🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣    🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣   🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣  🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣 🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💣🏎']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💥 BOOM Be F**k RAF 😂💥']);
}
if($text=='بکنش' or $text=='بگاش'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'فاضلاب شمال شرق تهران تو کص ننت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'کیر گراز وحشی تو مادرت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'اونجا که شاعر میگه یه کیر دارم شاه نداره تو ننت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'پایه تختم تو کونت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'کلا کص ننت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'الکی بی دلیل کص ننت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'بابات چه ورقیه']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'دست زدم به کون بابات دلم رفت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'به بابات بگو سفید کنه شب میام بکنم']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'کص ننت؟']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'ایمیل عمتو لطف کن']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'کوننده خونه ای که عمت توش پول درمیاره نوشتم رو کیرم']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'کص ننت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'کص پدرت']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😂 امیدوارم از فحش ها لذت برده باشی']);
}
if($text=='فاک' or $text=='فاککک'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🏿🖕🖕🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🏿🖕🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🏿🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🖕🏿🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🖕🖕🏿🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🖕🖕🖕🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🖕🖕🏾🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🖕🏿🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🏿🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🏿🖕🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🏿🖕🖕🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🏿🖕🖕🏿🖕🖕🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🏿🖕🖕🏿🖕🖕🏿🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🖕🖕🖕🖕🖕']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🖕🏿🖕🏿🖕🏿🖕🏿🖕🏿🖕🏿']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '☘ 𝐅𝐮𝐜𝐤 𝐘𝐨𝐮 𝐰𝐢𝐭𝐡 ❤']);
}
if($text=='مربع1' or $text=='sqr1'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟥🟥🟥🟥🟥
  🟥🟥🟥🟥🟥
  🟥🔲🔳🔲🟥
  🟥🟥🟥🟥🟥
  🟥🟥🟥🟥🟥']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟥🟥🟥🟥🟥
  🟥🟥🔲🟥🟥
  🟥🟥🔳🟥🟥
  🟥🟥🔲🟥🟥
  🟥🟥🟥🟥🟥']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟥🟥🟥🟥🟥
  🟥🟥🟥🔲🟥
  🟥🟥🔳🟥🟥
  🟥🔲🟥🟥🟥
  🟥🟥🟥🟥🟥']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟥🟥🟥🟥🟥
  🟥🔲🟥🟥🟥
  🟥🟥🔳🟥🟥
  🟥🟥🟥🔲🟥
  ??🟥🟥🟥🟥']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟪🟪🟪🟪🟪
  🟪🟪🟪🟪🟪
  🟪🔲🔳🔲🟪
  🟪🟪🟪🟪🟪
  🟪🟪🟪🟪🟪']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟪🟪🟪🟪🟪
  🟪🟪🔲🟪🟪
  🟪🟪🔳🟪🟪
  🟪🟪🔲🟪🟪
  🟪🟪🟪🟪🟪']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟪🟪🟪🟪🟪
  🟪🟪🟪🔲🟪
  🟪🟪🔳🟪🟪
  🟪🔲🟪🟪🟪
  🟪🟪🟪🟪🟪']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟪🟪🟪🟪🟪
  🟪🔲🟪🟪🟪
  🟪🟪🔳🟪🟪
  🟪🟪🟪🔲🟪
  🟪🟪🟪🟪🟪']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟦🟦🟦🟦🟦
  🟦🟦🟦🟦🟦
  🟦🔲🔳🔲🟦
  🟦🟦🟦🟦🟦
  🟦🟦🟦🟦🟦']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟦🟦🟦🟦🟦
  🟦🟦🔲🟦🟦
  🟦🟦🔳🟦🟦
  🟦🟦🔲🟦🟦
  🟦🟦🟦🟦🟦']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟦🟦🟦🟦🟦
  🟦🟦🟦🔲🟦
  🟦🟦🔳🟦🟦
  🟦🔲🟦🟦🟦
  🟦🟦🟦🟦🟦']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟦🟦🟦🟦🟦
  🟦🔲🟦🟦🟦
  🟦🟦🔳🟦🟦
  🟦🟦🟦🔲🟦
  🟦🟦🟦🟦🟦']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ◻️🟩🟩◻️◻️
  ◻️◻️🟩◻️🟩
  🟩🟩🔳🟩🟩
  🟩◻️🟩◻️◻️
  ◻️◻️🟩🟩◻️']);
  
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  🟩⬜️⬜️🟩🟩
  🟩🟩⬜️🟩⬜️
  ⬜️⬜️🔲⬜️⬜️
  ⬜️🟩⬜️🟩🟩
  🟩🟩⬜️⬜️🟩']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '♡سرورم رقص مربع با موفقیت به پایان رسید♡']);
}
if ($text == 'رقص مربع' or $text == 'دنس') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧??🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟪🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧??🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟪🟪🟪🟧🟧🟧
🟧🟧🟧🟪🟧🟪🟧🟧🟧
🟧🟧🟧🟪🟪🟪🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟪🟪🟪🟪🟪🟧🟧
🟧🟧🟪🟧🟧🟧🟪🟧🟧
🟧🟧🟪🟧🟦🟧🟪🟧🟧
🟧🟧🟪🟧🟧🟧🟪🟧🟧
🟧🟧🟪🟪🟪🟪🟪🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟪🟪🟪🟪🟪🟪🟪🟧
🟧🟪🟧🟧🟧🟧🟧🟪🟧
🟧🟪🟧🟦🟦🟦🟧🟪🟧
🟧🟪🟧🟦🟧🟦🟧🟪🟧
🟧🟪🟧🟦🟦🟦🟧🟪🟧
🟧🟪🟧🟧🟧🟧🟧🟪🟧
🟧🟪🟪🟪🟪🟪🟪🟪🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟪🟪🟪🟪🟪🟪🟪🟪🟪
🟪🟧🟧🟧🟧🟧🟧🟧🟪
🟪🟧🟦🟦🟦🟦🟦🟧🟪
🟪🟧🟦🟧🟧🟧🟦🟧🟪
🟪🟧🟦🟧⬜️🟧🟦🟧🟪
??🟧🟦🟧🟧🟧🟦🟧🟪
🟪🟧🟦🟦🟦🟦🟦🟧🟪
🟪🟧🟧🟧🟧🟧🟧🟧🟪
🟪🟪🟪🟪🟪🟪🟪🟪🟪']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧🟦🟦🟦🟦🟦🟦🟦🟧
🟧🟦🟧🟧🟧🟧🟧🟦🟧
🟧🟦🟧⬜️⬜️⬜️🟧🟦🟧
🟧🟦🟧⬜️⬜️⬜️🟧🟦🟧
🟧🟦🟧⬜️⬜️⬜️🟧🟦🟧
🟧🟦🟧🟧🟧🟧🟧🟦🟧
🟧🟦🟦🟦🟦🟦🟦🟦🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟦🟦🟦🟦🟦🟦🟦🟦🟦
🟦🟧🟧🟧🟧🟧🟧🟧🟦
🟦🟧⬜️⬜️⬜️⬜️⬜️🟧🟦
🟦🟧⬜️⬜️⬜️⬜️⬜️🟧🟦
🟦🟧⬜️⬜️⬜️⬜️⬜️🟧🟦
🟦🟧⬜️⬜️⬜️⬜️⬜️🟧🟦
🟦🟧⬜️⬜️⬜️⬜️⬜️🟧🟦
🟦🟧🟧🟧🟧🟧🟧🟧🟦
🟦🟦🟦🟦🟦🟦🟦🟦🟦']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟧🟧🟧🟧🟧🟧🟧🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧⬜️⬜️⬜️⬜️⬜️⬜️⬜️🟧
🟧🟧🟧🟧🟧🟧🟧🟧🟧']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜️🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥⬜⬜⬜⬜⬜⬜⬜⬜🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥⬜⬜⬜⬜⬜⬜🟥🟥
🟥🟥⬜⬜⬜⬜⬜⬜🟥🟥
🟥🟥⬜⬜⬜⬜⬜⬜🟥🟥
🟥🟥⬜⬜⬜⬜⬜⬜🟥🟥
🟥🟥⬜⬜⬜⬜⬜⬜🟥🟥
🟥🟥⬜⬜⬜⬜⬜⬜🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥⬜⬜⬜⬜️🟥🟥🟥
🟥🟥🟥⬜⬜⬜⬜🟥🟥🟥
🟥🟥🟥⬜⬜⬜⬜🟥🟥🟥
🟥🟥🟥⬜⬜⬜⬜🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥⬜️⬜️🟥🟥🟥🟥
🟥🟥🟥🟥⬜⬜️🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥💙💙🟥🟥🟥🟥
🟥🟥🟥🟥💙💙🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟦🟦🟥🟥🟥🟥
🟥🟥🟥🟥🟦🟦🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟦🟦🟦🟦🟥🟥🟥
🟥🟥🟥🟦🟦🟦🟦🟥🟥🟥
🟥🟥🟥🟦🟦🟦🟦🟥🟥🟥
🟥🟥🟥🟦🟦🟦🟦🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟨🟨🟨🟨🟨🟨🟥🟥
🟥🟥🟨🟦🟦🟦🟦🟨🟥🟥
🟥🟥🟨🟦🟦🟦🟦🟨🟥🟥
🟥🟥🟨🟦🟦🟦🟦🟨🟥🟥
🟥🟥🟨🟦🟦🟦🟦🟨🟥🟥
🟥🟥🟨🟨🟨🟨🟨🟨🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟨🟨🟨🟨🟨🟨🟨🟨🟥
🟥🟨🟨🟨🟨🟨🟨🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟨🟨🟨🟨🟨🟨🟥
🟥🟨🟨🟨🟨🟨🟨🟨🟨🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟨🟨🟨🟨🟨🟨🟪🟥
🟥🟨🟪🟨🟨🟨🟨🟪🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟨🟦🟦🟦🟦🟨🟨🟥
🟥🟨🟪🟨🟨🟨🟨🟪🟨🟥
🟥🟪🟨🟨🟨🟨🟨🟨🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟨🟨🟨🟨🟨🟨🟪🟥
🟥🟪🟪🟨🟨🟨🟨🟪🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟪🟨🟨🟨🟨🟪🟪🟥
🟥🟪🟨🟨🟨🟨🟨🟨🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟪🟪🟨🟨🟨🟨🟪🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟨🟦🟦🟦🟦🟨🟪🟥
🟥🟪🟪🟨🟨🟨🟨🟪🟪🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟧🟦🟦🟦🟦🟧🟪🟥
🟥🟪🟧🟦🟦🟦🟦🟧🟪🟥
🟥🟪🟧🟦🟦🟦🟦🟧🟪🟥
🟥🟪🟧🟦🟦🟦🟦🟧🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟧🟨🟦🟦🟨🟧🟪🟥
🟥🟪🟧🟦🟨🟨🟦🟧🟪🟥
🟥🟪🟧🟦🟨🟨🟦🟧🟪🟥
🟥🟪🟧🟨🟦🟦🟨🟧🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟧💛🟦🟦💛🟧🟪🟥
🟥🟪🟧🟦💛💛🟦🟧🟪🟥
🟥🟪🟧🟦💛💛🟦🟧🟪🟥
🟥🟪🟧💛🟦🟦💛🟧🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟧💛💙💙💛🟧🟪🟥
🟥🟪🟧💙💛💛💙🟧🟪🟥
🟥🟪🟧💙💛💛💙🟧🟪🟥
🟥🟪🟧💛💙💙💛🟧🟪🟥
🟥🟪🟪⬛️⬛️⬛️⬛️🟪🟪🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟪🟪🖤🖤🖤🖤🟪🟪🟥
🟥🟪🟧💛💙💙💛🟧🟪🟥
🟥🟪🟧💙💛💛💙🟧🟪🟥
🟥🟪🟧💙💛💛💙🟧🟪🟥
🟥🟪🟧💛💙💙💛🟧🟪🟥
🟥🟪🟪🖤🖤🖤🖤🟪🟪🟥
🟥🟪🟩🟩🟩🟩🟩🟩🟪🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥💜🟩🟩🟩🟩🟩🟩💜🟥
🟥💜💜🖤🖤🖤🖤💜💜🟥
🟥💜🟧💛💙💙💛🟧💜🟥
🟥💜🟧💙💛💛💙🟧💜🟥
🟥💜🟧💙💛💛💙🟧💜🟥
🟥💜🟧💛💙💙💛🟧💜🟥
🟥💜💜🖤🖤🖤🖤💜💜🟥
🟥💜🟩🟩🟩🟩🟩🟩💜🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥💜🟩🟩🟩🟩🟩🟩💜🟥
🟥💜💜🖤🖤🖤🖤💜💜🟥
🟥💜🧡💛💙💙💛🧡💜🟥
🟥💜🧡??💛💛💙🧡💜🟥
🟥💜🧡💙💛💛💙🧡💜🟥
🟥💜🧡💛💙💙💛🧡💜🟥
🟥💜💜🖤🖤🖤🖤💜💜🟥
🟥💜🟩🟩🟩🟩🟩🟩💜🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥
🟥💜💚💚💚💚💚💚💜🟥
🟥💜💜🖤🖤🖤🖤💜💜🟥
🟥💜🧡💛💙💙💛🧡💜🟥
🟥💜🧡💙💛💛💙🧡💜🟥
🟥💜🧡💙💛💛💙🧡💜🟥
🟥💜🧡💛💙💙💛🧡💜🟥
🟥💜💜🖤🖤🖤🖤💜💜🟥
🟥💜💚💚💚💚💚💚💜🟥
🟥🟥🟥🟥🟥🟥🟥🟥🟥🟥']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️
❤️💜💚💚💚💚💚💚💜❤️
❤️💜💜🖤🖤🖤🖤💜💜❤️
❤️💜🧡💛💙💙💛🧡💜❤️
❤️💜🧡💙💛💛💙🧡💜❤️
❤️💜🧡💙💛💛💙🧡💜❤️
❤️💜🧡💛💙💙💛🧡💜❤️
❤️💜💜🖤🖤🖤🖤💜💜❤️
❤️💜💚💚💚💚💚💚💜❤️
❤️❤️❤️❤️❤️❤️❤️❤️❤️❤️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️⬜️⬜️⬜️◻️◽️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️◻️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️⬜️⬜️◻️◽️▫️
⬜️⬜️⬜️⬜️⬜️⬜️◻️◽️◽️
⬜️⬜️⬜️⬜️⬜️⬜️◻️◻️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️⬜️◻️◽️▫️▫️
⬜️⬜️⬜️⬜️⬜️◻️◽️▫️▫️
⬜️⬜️⬜️⬜️⬜️◻️◽️◽️◽️
⬜️⬜️⬜️⬜️⬜️◻️◻️◻️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️⬜️◻️◽️▫️▫️▫️
⬜️⬜️⬜️⬜️◻️◽️▫️▫️▫️
⬜️⬜️⬜️⬜️◻️◽️▫️▫️▫️
⬜️⬜️⬜️⬜️◻️◽️◽️◽️◽️
⬜️⬜️⬜️⬜️◻️◻️◻️◻️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️⬜️◻️◽️▫️▫️▫️▫️
⬜️⬜️⬜️◻️◽️▫️▫️▫️▫️
⬜️⬜️⬜️◻️◽️▫️▫️▫️▫️
⬜️⬜️⬜️◻️◽️▫️▫️▫️▫️
⬜️⬜️⬜️◻️◽️◽️◽️◽️◽️
⬜️⬜️⬜️◻️◻️◻️◻️◻️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬜️◻️◽️▫️▫️▫️▫️▫️
⬜️⬜️◻️◽️▫️▫️▫️▫️▫️
⬜️⬜️◻️◽️▫️▫️▫️▫️▫️
⬜️⬜️◻️◽️▫️▫️▫️▫️▫️
⬜️⬜️◻️◽️▫️▫️▫️▫️▫️
⬜️⬜️◻️◽️◽️◽️◽️◽️◽️
⬜️⬜️◻️◻️◻️◻️◻️◻️◻️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️◻️◽️▫️▫️▫️▫️▫️▫️
⬜️◻️◽️▫️▫️▫️▫️▫️▫️
⬜️◻️◽️▫️▫️▫️▫️▫️▫️
⬜️◻️◽️▫️▫️▫️▫️▫️▫️
⬜️◻️◽️▫️▫️▫️▫️▫️▫️
⬜️◻️◽️▫️▫️▫️▫️▫️▫️
⬜️◻️◽️◽️◽️◽️◽️◽️◽️
⬜️◻️◻️◻️◻️◻️◻️◻️◽️
⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜️⬜']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️▫️▫️▫️▫️▫️▫️▫️
◻️◽️◽️◽️◽️◽️◽️◽️◽️
◻️◻️◻️◻️◻️◻️◻️◻️◻️']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️▫️▫️▫️▫️▫️▫️▫️▫️
◽️◽️◽️◽️◽️◽️◽️◽️◽']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️
▫️▫️▫️▫️▫️▫️▫️▫️▫️']);
}
if($text == "هلیکوپتر"){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id ,'message' => "
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬ 
╬═╬  
╬═╬                                  
╬═╬                    
╬═╬     
╬═╬☻/  
╬═╬/▌  
╬═╬/  \
" ]);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬ 
╬═╬  
╬═╬                                  
╬═╬                    
╬═╬☻/  
╬═╬/▌  
╬═╬/  \
╬═╬
']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬ 
╬═╬  
╬═╬                                  
╬═╬☻/  
╬═╬/▌  
╬═╬/  \
╬═╬
╬═╬
']);
  yield $MadelineProto->sleep(1);                      
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬ 
╬═╬  
╬═╬☻/  
╬═╬/▌  
╬═╬/  \
╬═╬
╬═╬
╬═╬
']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬ 
╬═╬☻/  
╬═╬/▌  
╬═╬/  \
╬═╬
╬═╬ 
╬═╬
╬═╬
']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬☻/  
╬═╬/▌  
╬═╬/  \
╬═╬
╬═╬ 
╬═╬
╬═╬ 
╬═╬
']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═ 
╬═╬ 
╬═╬
╬═╬
╬═╬
╬═╬ 
╬═╬
╬═╬ 
╬═╬
']);
  yield $MadelineProto->sleep(1);                   
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id , 'message' => '
█▬▬▬.◙.▬▬▬█
═▂▄▄▓▄▄▂ 
◢◤ █▀▀████▄▄▄▄◢◤ 
█▄ █ █▄ ███▀▀▀▀▀▀▀╬ 
◥█████◤ 
══╩══╩═
']);
}
if($text== 'هک' or $text== 'هکر'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  █████▓█████▓▓╬╬╬╬╬╬╬╬▓███▓╬╬╬╬╬╬╬▓╬╬▓█ 
  ██▓▓▓▓╬╬▓█████╬╬╬╬╬╬███▓╬╬╬╬╬╬╬╬╬╬╬╬╬█
  █▓▓▓▓╬╬╬╬╬╬▓██╬╬╬╬╬╬▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ██▓▓▓╬╬╬╬╬╬╬▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
  █▓█▓███████▓▓███▓╬╬╬╬╬╬▓███████▓╬╬╬╬▓█ 
  ██████████████▓█▓╬╬╬╬╬▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬█
  █▓▓▓▓▓▓▓╬╬▓▓▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ██▓▓▓╬╬╬╬▓▓▓▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█
  █▓█▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ███▓▓▓▓▓▓▓▓█▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ ']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ███▓▓▓▓▓▓▓██▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██ 
  ███▓▓▓▓▓████▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██
  ██▓█▓▓▓▓██▓▓▓▓██╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██ 
  ███▓███▓▓▓▓▓▓▓▓████▓▓╬╬╬╬╬╬╬█▓╬╬╬╬╬▓██ 
  ███▓▓█▓███▓▓▓████╬▓█▓▓╬╬╬▓▓█▓╬╬╬╬╬╬███
  ████▓██▓███████▓╬╬╬▓▓╬▓▓██▓╬╬╬╬╬╬╬▓███
  █████▓██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬████
  █████▓▓██▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓████ 
  ██████▓▓▓█████▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█████
  ███████▓▓▓█▓▓▓▓▓███▓╬╬╬╬╬╬╬╬╬╬╬▓██████ 
  ████████▓▓▓█▓▓▓╬▓██╬╬╬╬╬╬╬╬╬╬╬▓███████
  █████████▓▓█▓▓▓▓███▓╬╬╬╬╬╬╬╬╬▓████████ 
  ████████████▓▓▓███▓▓╬╬╬╬╬╬╬╬██████████ 
  █████████████▓▓▓██▓▓╬╬╬╬╬╬▓███████████']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  █████▓█████▓▓╬╬╬╬╬╬╬╬▓███▓╬╬╬╬╬╬╬▓╬╬▓█ 
  ██▓▓▓▓╬╬▓█████╬╬╬╬╬╬███▓╬╬╬╬╬╬╬╬╬╬╬╬╬█ 
  █▓▓▓▓╬╬╬╬╬╬▓██╬╬╬╬╬╬▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ██▓▓▓╬╬╬╬╬╬╬▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  █▓█▓███████▓▓███▓╬╬╬╬╬╬▓███████▓╬╬╬╬▓█ 
  ██████████████▓█▓╬╬╬╬╬▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬█ 
  █▓▓▓▓▓▓▓╬╬▓▓▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ██▓▓▓╬╬╬╬▓▓▓▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  █▓█▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ███▓▓▓▓▓▓▓▓█▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█ 
  ███▓▓▓▓▓▓▓██▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██ 
  ███▓▓▓▓▓████▓▓▓█▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██ 
  ██▓█▓▓▓▓██▓▓▓▓██╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬██ 
  ██▓▓███▓▓▓▓▓▓▓██▓╬╬╬╬╬╬╬╬╬╬╬╬█▓╬▓╬╬▓██ 
  ███▓███▓▓▓▓▓▓▓▓████▓▓╬╬╬╬╬╬╬█▓╬╬╬╬╬▓██ 
  ███▓▓█▓███▓▓▓████╬▓█▓▓╬╬╬▓▓█▓╬╬╬╬╬╬███ 
  ████▓██▓███████▓╬╬╬▓▓╬▓▓██▓╬╬╬╬╬╬╬▓███ 
  █████▓██▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬████ 
  █████▓▓██▓▓▓▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓████ 
  ██████▓▓▓█████▓▓╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬╬▓█████ 
  ███████▓▓▓█▓▓▓▓▓███▓╬╬╬╬╬╬╬╬╬╬╬▓██████ 
  ████████▓▓▓█▓▓▓╬▓██╬╬╬╬╬╬╬╬╬╬╬▓███████ 
  █████████▓▓█▓▓▓▓███▓╬╬╬╬╬╬╬╬╬▓████████ 
  ████████████▓▓▓███▓▓╬╬╬╬╬╬╬╬██████████ 
  █████████████▓▓▓██▓▓╬╬╬╬╬╬▓███████████']);
      
  }
  if($text== 'دوستت دارم' or $text== 'قلبمی'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ▀██▀─▄███▄─▀██─██▀██▀▀█
  ─██─███─███─██─██─██▄█']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ─██─▀██▄██▀─▀█▄█▀─██▀█
  ▄██▄▄█▀▀▀─────▀──▄██▄▄█']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ▀██▀─▄███▄─▀██─██▀██▀▀█
  ─██─███─███─██─██─██▄█
  ─██─▀██▄██▀─▀█▄█▀─██▀█
  ▄██▄▄█▀▀▀─────▀──▄██▄▄█']);
      
  }
  if($text=='دهنت سرویس' or $text=='خندههه' or $text== 'حق بود'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ░░░░░░░░███████████████░░░░░░░░
  ░░░░░█████████████████████░░░░░
  ░░░░████████████████████████░░░
  ░░░██████████████████████████░░
  ░░█████████████████████████████
  ░░███████████▀░░░░░░░░░████████
  ░░███████████░░░░░░░░░░░░░░░███']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ░░░░░░░░███████████████░░░░░░░░
  ░░░░░█████████████████████░░░░░
  ░░░░████████████████████████░░░
  ░░░██████████████████████████░░
  ░░█████████████████████████████
  ░░███████████▀░░░░░░░░░████████
  ░░███████████░░░░░░░░░░░░░░░███
  ░████████████░░░░░░░░░░░░░░░░██
  ░█░░███████░░░░░░░░░░░▄▄░░░░░██
  █░░░░█████░░░░░░▄███████░░██░░█
  █░░█░░░███░░░░░██▀▀░░░░░░░░██░█
  █░░░█░░░░░░░░░░░░▄██▄░░░░░░░███
  █░░▄█░░░░░░░░░░░░░░░░░░█▀▀█▄░██
  █░░░░░░░░░░░░░░░░░░░░░░█░░░░██░']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ░░░░░░░░███████████████░░░░░░░░
  ░░░░░█████████████████████░░░░░
  ░░░░████████████████████████░░░
  ░░░██████████████████████████░░
  ░░█████████████████████████████
  ░░███████████▀░░░░░░░░░████████
  ░░███████████░░░░░░░░░░░░░░░███
  ░████████████░░░░░░░░░░░░░░░░██
  ░█░░███████░░░░░░░░░░░▄▄░░░░░██
  █░░░░█████░░░░░░▄███████░░██░░█
  █░░█░░░███░░░░░██▀▀░░░░░░░░██░█
  █░░░█░░░░░░░░░░░░▄██▄░░░░░░░███
  █░░▄█░░░░░░░░░░░░░░░░░░█▀▀█▄░██
  █░░░░░░░░░░░░░░░░░░░░░░█░░░░██░
  ░███░░░░░░░░░░░░░░░░░░░█░░░░█░░
  ░░█░█░░░░░░░█░░░░░██▀▄░▄██░░░█░
  ░░█░█░░░░░░█░░░░░░░░░░░░░░░░░█░
  ░░░██░░░░░░█░░░░▄▄▄▄▄▄░░░░░░█░░
  ░░░██░░░░░░░█░░█▄▄▄▄░▀▀██░░█░░░']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
  ░░░░░░░░███████████████░░░░░░░░
  ░░░░░█████████████████████░░░░░
  ░░░░████████████████████████░░░
  ░░░██████████████████████████░░
  ░░█████████████████████████████
  ░░███████████▀░░░░░░░░░████████
  ░░███████████░░░░░░░░░░░░░░░███
  ░████████████░░░░░░░░░░░░░░░░██
  ░█░░███████░░░░░░░░░░░▄▄░░░░░██
  █░░░░█████░░░░░░▄███████░░██░░█
  █░░█░░░███░░░░░██▀▀░░░░░░░░██░█
  █░░░█░░░░░░░░░░░░▄██▄░░░░░░░███
  █░░▄█░░░░░░░░░░░░░░░░░░█▀▀█▄░██
  █░░░░░░░░░░░░░░░░░░░░░░█░░░░██░
  ░███░░░░░░░░░░░░░░░░░░░█░░░░█░░
  ░░█░█░░░░░░░█░░░░░██▀▄░▄██░░░█░
  ░░█░█░░░░░░█░░░░░░░░░░░░░░░░░█░
  ░░░██░░░░░░█░░░░▄▄▄▄▄▄░░░░░░█░░
  ░░░██░░░░░░░█░░█▄▄▄▄░▀▀██░░█░░░
  ░░░██░░░░░░░█░░▀████████░░█░░░░
  ░░█░░█░░░░░░░█░░▀▄▄▄▄██░░█░░░░░
  ░░█░░░█░░░░░░░█░░░░░░░░░█░░░░░░
  ░█░░░░░█░░░░░░░░░░░░░░░░█░░░░░░
  ░░░░░░░░█░░░░░░█░░░░░░░░█░░░░░░
  ░░░░░░░░░░░░░░░░████████░░░░░░░']);
  }
  if($text=='مربع2'){
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟪🟩🟨⬛️']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟨🟩🟦']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟪🟦🟥🟩']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⬜️⬛️⬜️🟪']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟨🟦🟪🟩']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥⬛️🟪🟦']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟩🟫🟨']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔳🔲◻️🟥']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '▪️▫️◽️◼️']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '◻️◼️◽️▪️']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟪🟦🟨🟪']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟥⬛️🟪🟩']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟧🟨🟥🟦']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🟩🟦🟩🟪']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🔳🔲🟪🟥']);
    yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '(☞ﾟヮﾟ)☞...☜(ﾟヮﾟ☜)']);
    }
if($text=='💋' or $text=='بوس بده' or $text=='بوس'){
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"ا"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"او"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول ی"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه ب"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بو"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس ب"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس بد"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس بده"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس بده به"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس بده به ع"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس بده به عم"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>"اول یه بوس بده به عمو 💋"]);
}
if($text=='مرغ'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚_______________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚______________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚_____________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚____________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚___________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚__________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚_________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚________🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚_______🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚______🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚_____🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚____🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚___🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚__🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚_🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🥚🐓']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🐣']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'تبرک میگم تخمات جوجه شدن 😂😂😂']);
}
if($text=='صبح بخیر' or $text=='صبح'){
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌑---_______🏙________---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌖---______ _🎆_______---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌗---_____ _🏙_______---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌘---______🎆______---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌑---_____🏙______---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌒---____🎆_____---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌓---___🏙_____---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌔---🎆___---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌓---_🏙---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌘---🎆_---🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🌕-🚴🏻']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => 'صبحتان را با یاد خدا اغاز کنید📿🌄']);
}
if($text=='ارسال سوپر' or $text=='ارسال پورن' or $text=='سوپر بفرست'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📂📂📂📂📂📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📂📂📂📂📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📂📂📂📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📂📂📂📂💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📂📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📂📂📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📁📂📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📁📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '💻📁💻']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⛔ سایت مورد نظر به دلیل دستور وزیر ارتباطات کصده فیلتر می باشد : 403 ⛔']);
}
if($text=='زنبور'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥_______🏃😱...😳🚶‍♂________🐝']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥______________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥_____________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥____________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥___________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥__________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥_________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥________🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥_______🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥______🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥_____🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥____🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥___🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥__🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥_🐝']);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🏃‍♂😥🐝']);
  yield $MadelineProto->sleep(1);
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '👨‍🦽😭 زنبور پدسگ 🥺']);
}
if($text=='kir' or $text=='کیر'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂         😂
😂       😂
😂     😂
😂   😂
😂😂
😂   😂
😂      😂
😂        😂
😂          😂
😂            😂']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
🙄
🙄
🙄
🙄
🙄
🙄
🙄
🙄
🙄']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😒😒😒😒😒😒😒
😒                                   😒
😒                                   😒
😒😒😒😒😒😒😒
😒    😒
😒       😒
😒          😒 
😒            😒
😒              😒
😒                😒
😒        ‌          😒']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂         😂 
😂       😂
😂     😂
😂   😂
😂😂 
😂   😂
😂      😂
😂        😂
😂           😂

🙄
🙄
🙄
🙄
🙄
🙄
🙄
🙄
🙄

😒😒😒😒😒😒😒
😒                                   😒
😒                                   😒
😒😒😒😒😒😒😒
😒    😒
😒       😒
😒          😒 
😒            😒
😒              😒
😒                😒
😒        ‌          😒

اوه کیررررررررررررر😂😂']);
}
if($text=='kir2' or $text=='کیر2'){
$kir = ["🇮🇷","✅","😒","👅","😈","💦","💋","🧿","♾","♻️","✊🏻","🤪","🚫","👽","🐆","🕊","⚘","🌵","🍭","🍩","🎈","🎃","🎁","🎗","🧸","💎","🎵","📟","📯","💻","🔋","📀","🪔","📚","💰","💳","🗂","📍","🔫","🛡","🩸","🗑","📿","⛔️","🚸","☣️","🔆","✳️","#️⃣","ℹ️","🔘","🔹️","❗️","❕","⚠️","🎒","🎏","🎯","🃏","🧱","🌐","♨️","💋","🚦","🚧","⚓️","🪂","🛰","🚀","🛸","⏳","🍌","🥕","👑","😎","🎩","😂","💀","🍓","🌭","🔪","☕️","🍔","🐌","🐝","🐉","🦈","🐙","🐠","🦉","🦇","🦅","🐍","🕸","😴","🤯","😳","☠️","🤖","👻","😼","💫","🕳","👨🏻‍💻",];
$Bb = $kir[rand(0, count($kir)-1)];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Bb          $Bb
$Bb       $Bb
$Bb    $Bb
$Bb $Bb
$Bb
$Bb $Bb
$Bb    $Bb
$Bb       $Bb
$Bb          $Bb"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Bb
$Bb
$Bb
$Bb
$Bb
$Bb
$Bb
$Bb
$Bb
$Bb
"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Bb$Bb$Bb$Bb$Bb$Bb$Bb
$Bb                                $Bb
$Bb                                $Bb
$Bb$Bb$Bb$Bb$Bb$Bb$Bb
$Bb    $Bb
$Bb        $Bb
$Bb            $Bb
$Bb               $Bb
$Bb                  $Bb
$Bb                     $Bb
$Bb                        $Bb"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
$Bb          $Bb   $Bb   $Bb$Bb$Bb$Bb$Bb$Bb$Bb
$Bb       $Bb      $Bb   $Bb                                $Bb
$Bb    $Bb         $Bb   $Bb                                $Bb
$Bb $Bb            $Bb   $Bb$Bb$Bb$Bb$Bb$Bb$Bb
$Bb                $Bb   $Bb    $Bb
$Bb $Bb            $Bb   $Bb        $Bb
$Bb    $Bb         $Bb   $Bb            $Bb
$Bb       $Bb      $Bb   $Bb                $Bb
$Bb          $Bb   $Bb   $Bb                    $Bb"]);
}
if($text=='شمارش' or $text=='counter'){
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'بالاباش ببين چطوري مادرتو صلاخي مکينم چصکي موصکي جان خههخهخهخ بي ناموس ممبر واس من قد قد نکن چص ميکنمت بي ناموس واس اربابت شاخ نشو همين لنگه دمپايي رو تو کس مادرت ول ميدم چسکي مادر حوس کردي کير  بکنم تو ما تحت شعاع ناموس گراميت"؟ خخخهه مادرکسه بالاباش ببينم چي بارته تو  الاغ جان بي ناموس خارکسه تو کيرمم ميشيي يا خير؟؟؟خخخخخخخخخخخخخخ مادرکسه کاتکليک ناموس خخخخخخخخخخخخخخ بالاببالاباش.... اين يک فرمان از اربابت ب تو اضحار شد پس لطفا بالاباش']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخمادرتو ب 9999 روش پوزيشن گاييدم بوم!خخخخخخخخخخخخخخخ خارتو ب روش فرقوني 9999 بار گاييدم بوم!خخخخخخخخخخخخخخخخخخخخخخ پدرتو ب صلاخي بستم 1 بار کلا بوم!خخخخخخخخخخخخخخخخخخخخخخخخخخخخخ مادرت کسه بالاباش مادرت خره بالاباش اوب مممادر الاغ زاده نفهم کسافت ناموس بي فرهنگ ناموس بدخبت خيلي بي عدبي تو بي ناموس ميفهمي؟']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'خارکصه بالا باش']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'خخخخخخخخخخخخخخخ']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'پيتزا تو کص ننتتتتتتتتت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'رلت تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'پاره تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'دفتر تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'موس تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'کتاب تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه تلگرام تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'برنامه بنديکام تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'گوشيم تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'اين مداد ها تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'خودکار تو ک ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'جمجمه تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'قمقمه تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'سيم تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'پنجره تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'پارده تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'پنکه تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'کيس پيسيم تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'باطريه گوشيم تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'جورابام تو کص ننت']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'بي ناموس کص ننت شد؟']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۲']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۳']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۴']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۵']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۶']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۷']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۸']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۹']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '۱۰']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'خب دیگه کیر تو صورتت شد، بای بده فرزندم😎']);
}
if($text=='شمارشش' or $text=='Counterr'){
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SAG BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR GAV BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KHAR BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KHAZ BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR HEYVUN BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR GORAZ BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR KROKODIL BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SHOTOR BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MADAR SHOTOR MORGH BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'MIKHAY TIZ BEGAMET HALA BEBI KHHKHKHKHK SORAATI NANATO MIKONAM']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'CHIYE KOS MEMBER BABT TAZE BARAT PC KHRIDE BI NAMOS MEMBER?']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'NANE MOKH AZAD NANE SHAM PAYNI NANE AROS MADAR KENTAKI PEDAR HALAZONI KIR MEMBERAK TIZ BASH YALA  TIZZZZZ😂']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'FEK KONAM NANE NANATI NAGAIIDAM KE ENGHAD SHAKHHI????????????????????????????????????HEN NANE GANGANDE PEDAR LASHI']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'to yatimi enghad to pv man daso pa mizani koskesh member man doroste nanato ye zaman mikardam vali toro beh kiramam nemigiram']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'KIRAM TU KUNE NNT BALA BASH KIRAM TU DAHANE MADARET BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'KHARETO BE GA MIDAM BALA BASH']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '1']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '2']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '3']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '4']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '5']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '6']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '7']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '8']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '9']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '10']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'NABINAM DIGE GOHE EZAFE BOKHORIA']);
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'KOS NANAT GAYIDE SHOD BINAMUS!!! SHOT SHODI BINAMUS!BYE']);
}
if($text=='بخند کیر نشه' or $text=='بخند'){
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '😐😂😐😂😐😂😐
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😐😂😐😂😐😂😐
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😐😂😐😂😐😂😐
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😐😂😐😂😐😂😐
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😐😂😐😂😐😂😐
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😐😂😐😂😐😂😐
😂        👇🏻           😂
😐         👇🏻          😐
😂👉🏿👉🏿😐👈🏿👈🏿😂
😐          👆🏻          😐
😂          👆🏻          😂
😐 😂😐😂😐😂😐']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '
😂😐😂😐😂😐😂
😐        👇🏿           😐
😂         👇🏿          😂
😐👉🏻👉🏻😐👈🏻👈🏻😐
😂          👆🏿          😂
😐          👆🏿          😐
😂 😐😂😐😂😐😂']);

yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>' خیلی خندیدیم، مسواک  گرون شد 😐']);
}
if ($text == 'امام' or $text == 'مرگ بر امریکا') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'⣿⣿⣿⣿⣿⡿⠋⠁⠄⠄⠄⠈⠘⠩⢿⣿⣿⣿⣿⣿
⣿⣿⣿⣿⠃⠄⠄⠄⠄⠄⠄⠄⠄⠄⠄⠻⣿⣿⣿⣿
⣿⣿⣿⣿⠄⠄⣀⣤⣤⣤⣄⡀⠄⠄⠄⠄⠙⣿⣿⣿
⣿⣿⣿⣿⡀⢰⣿⣿⣿⣿⣿⢿⠄⠄⠄⠄⠄⠹⢿⣿
⣿⣿⣿⣿⣿⡞⠻⠿⠟⠋⠉⠁⣤⡀⠄⠄⠄⠄⠄⠄
⣿⣿⣿⣿⣿⣿⣶⢼⣷⡤⣦⣿⠛⡰⢃⠄⠐⠄⠄⢸
⣿⣿⣿⣿⣿⣿⣿⡯⢍⠿⢾⡿⣸⣿⠰⠄⢀⠄⠄⡬
⣿⣿⣿⣿⣿⣿⣿⣴⣴⣅⣾⣿⣿⡧⠦⡶⠃⠄⠠⢴
⣿⣿⣿⣿⠿⠍⣿⣿⣿⣿⣿⣿⣿⢇⠟⠁⠄⠄⠄⠄
⠟⠛⠉⠄⠄⠄⡽⣿⣿⣿⣿⣿⣯⠏⠄⠄⠄⠄⠄⠄
⠄⠄⠄⢀⣾⣾⣿⣤⣯⣿⣿⡿⠃⠄⠄⠄⠄....']);
}
if ($text == 'پیانو') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
║░█░█░║░█░█░█░║░█░█░║
║░█░█░║░█░█░█░║░█░█░║
║░║░║░║░║░║░║░║░║░║░║
╚═╩═╩═╩═╩═╩═╩═╩═╩═╩═╝
']);
}
if ($text == 'دوستت دارم بمولا') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
█───▄▀▀▀▀▄─▐█▌▐█▌▐██
█──▐▄▄────▌─█▌▐█─▐▌─
█──▐█▀█─▀─▌─█▌▐█─▐██
█──▐████▄▄▌─▐▌▐▌─▐▌─
███─▀████▀───██──▐██
']);
}
if ($text == 'لبخند بزن') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
╔══╗░░░░╔╦╗░░╔═════╗
║╚═╬════╬╣╠═╗║░▀░▀░║
╠═╗║╔╗╔╗║║║╩╣║╚═══╝║
╚══╩╝╚╝╚╩╩╩═╝╚═════╝
']);
}
if ($text == 'بکششش') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
 /﹋\
(҂`_´)
<,︻╦╤─ ҉ - -----💥
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌

‌ /﹋\
(҂`_´)
<,︻╦╤─ ҉ - -----💥
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
}
if ($text == 'حملههه') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
 /﹋\
(҂`_´)
<,︻╦╤─ ҉ -
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌

‌ /﹋\
(҂`_´)
<,︻╦╤─ ҉ -
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
/﹋\
(҂`_´)
<,︻╦╤─ ҉ - --
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌

‌ /﹋\
(҂`_´)
<,︻╦╤─ ҉ - --
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
/﹋\
(҂`_´)
<,︻╦╤─ ҉ - ----
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌

‌ /﹋\
(҂`_´)
<,︻╦╤─ ҉ - ----
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
/﹋\
(҂`_´)
<,︻╦╤─ ҉ - -----💥
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌

‌ /﹋\
(҂`_´)
<,︻╦╤─ ҉ - -----💥
/﹋\‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
}
if ($text == 'گل') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
┈╭╭╮╮┈┈┈┈╱▔▔╲┈┈┈
╭╭╭╮╮╮┈┈▕▔▔▔▔▏┈┈
╰╰╰╯╯╯┈┈╭╰┫╰╯╮┈┈
┈╰╰╋╯┈┈┈╰▏┗┛▕╯┈┈
┈┈╭┻┳━━━━╲╰╯╱━╮┈
┈┈╰┳┻━━━┫┊┊┊┊╭┃┈
┈┈┈╯┈┈┈┈┃┊┊┊┊┣╯┈‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
}
if ($text == 'قهوه') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
 . ¨ ¨ ¨ ¨ ¨(
¨ ¨ ¨ ) ¨ ) ¨ (
¨ ¨ ¨ ) ¨ ( (¨ )
¨ ¨ ¨( ¨ ~.) ) (
¨[=============]
¨ \ °°°°°°°°°°°°°°   /_ _
 ¨ |   …¨…¨…¨…¨… |ˆˆ\*\
 ¨ |*¨ . CAFFEE ..¨*| …*|*|
 ¨ | …¨…¨…¨…¨…  |… /*/
  ¨¨\°°°°°°°°°°°°°/ ˆˆˆˆ
   ¨¨ \|||||||||||||||/
']);
}
if ($text == 'لایک') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
┈┈┈┈┈┈▕▔╲┈┈┈┈┈
┈┈┈┈┈┈┈▏▕┈┈LIKE
┈┈┈┈┈┈┈▏▕▂▂▂┈┈
▂▂▂▂▂▂╱┈▕▂▂▂▏┈
▉▉▉▉▉┈┈┈▕▂▂▂▏┈
▉▉▉▉▉┈┈┈▕▂▂▂▏┈
▔▔▔▔▔▔╲▂▕▂▂▂▏┈‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌‌
']);
}
if ($text == 'دانش آموزان') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
╭╰╰╮┣┻┻┫╭┳┳╮╋━━╋ 
┃▉▉┃┃▍▍┃╯▉▉╰┃▍▍┃ 
┫╰╯┣┫╰╯┣┫╰╯┣┫╰╯┣ 
┗┳┳┛╰┳┳╯╰┳┳╯┗┳┳┛ 
┈┛┗┈┈┛┗┈┈┛┗┈┈┛┗┈ 
']);
}
if ($text == 'ساعت مچی') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
╦╦╦╦╦╦▄▀▀▀▀▀▀▄╦╦╦╦╦╦
▒▓▒▓▒█╗░░▐░░░╔█▒▓▒▓▒
▒▓▒▓▒█║░░▐▄▄░║█▒▓▒▓▒
▒▓▒▓▒█╝░░░░░░╚█▒▓▒▓▒
╩╩╩╩╩╩▀▄▄▄▄▄▄▀╩╩╩╩╩╩
']);
}
if ($text == 'خوش آمد') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
█▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀▀█
█ ╦─╦╔╗╦─╔╗╔╗╔╦╗╔╗       █
█ ║║║╠─║─║─║║║║║╠─       █
█ ╚╩╝╚╝╚╝╚╝╚╝╩─╩╚╝       █
█▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄▄█
']);
}
if ($text == 'دوربین') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
░░▄▄░▄███▄
▄▀▀▀▀░▄▄▄░▀▀▀▀▄
█▒▒▒▒█░░░█▒▒▒▒█
█▒▒▒▒▀▄▄▄▀▒▒▒▒█
▀▄▄▄▄▄▄▄▄▄▄▄▄▄▀
']);
}
if ($text == 'تلفن') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
──▄▄██████▄▄
▄██▀▄█▄▄█▄▀██▄
▀▀▀▄██▀▀██▄▀▀▀
─▄███─██─███▄
─█████▄▄█████

']);
}
if ($text == 'تولد مبارک') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
 ╔═══════ ೋღღೋ ═══════╗
 ೋ Happy Birthday To You ೋ
 ╚═══════ ೋღღೋ ═══════╝
']);
}
if ($text == 'ز666') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
▒▒▒▒▒▒▒▒▒▒▒▒
▒▒▒▒▓▒▒▓▒▒▒▒
▒▒▒▒▓▒▒▓▒▒▒▒
▒▒▒▒▒▒▒▒▒▒▒▒
▒▓▒▒▒▒▒▒▒▒▓▒
▒▒▓▓▓▓▓▓▓▓▒▒
▒▒▒▒▒▒▒▒▒▒▒▒
']);
}
if ($text == 'بپر پایین') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
████████
█⬛⬛⬛⬛⬛█
█⬛⬛⬛⬛⬛█ ＼＼
█⬛⬛⬛⬛⬛█
█⬛⬛⬛⬛⬛█ヽ○ノ
█⬛⬛⬛⬛⬛█   /
█⬛⬛⬛⬛⬛█ノ)
█⬛⬛⬛⬛⬛█
█⬛⬛⬛⬛⬛█
█⬛⬛⬛⬛⬛█
█⬛⬛⬛⬛⬛█
█⬛⬛⬛⬛⬛█
']);
}
if ($text == 'ضبط') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
░░█▀▀▀▀▀▀▀▀▀▀▀▀▀▀█
██▀▀▀██▀▀▀▀▀▀██▀▀▀██
█▒▒▒▒▒█▒▀▀▀▀▒█▒▒▒▒▒█
█▒▒▒▒▒█▒████▒█▒▒▒▒▒█
██▄▄▄██▄▄▄▄▄▄██▄▄▄██
']);
}
if ($text == 'لیوان') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
█▄▀▄▀▄█
█░▀░▀░█▄
█░▀░░░█─█
█░░░▀░█▄▀
▀▀▀▀▀▀▀
']);
}
if ($text == 'ز777') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
█▄████─█▄████─█▄████
▀▀─▄█▀─▀▀─▄█▀─▀▀─▄█▀
──▄██────▄██────▄██
─▄██▀───▄██▀───▄██▀
─███────███────███
']);
}
if ($text == 'بالگرد') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
█▬▬▬.◙.▬▬▬
═▂▄▄▓▄▄▂
◢◤ █▀▀████▄▄▄▄◢◤
█▄ █ █▄ ███▀▀▀▀▀▀▀╬
◥█████◤
══╩══╩═
╬═╬
╬═╬ 
╬═╬                                 
╬═╬                   
╬═╬    
╬═╬☻/ 
╬═╬/▌ 
╬═╬/  \
']);
}
if ($text == 'گوزپلنگ') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
▕▔▔╲╱▋▔▋▔▋╲╱▔▔▏┈
▕┈▔╲▍┈▋┈▍┈▋╱▔┈▏┈
▔╲╱┳▅╮┊┊┊╭▅┳╲╱┈┈
┈▕▋╰━┫┊┊┊┣━╯▋▏┈┈
▋┈╲▍╱┈▂▂▂┈╲▍╱┈
┈▊┈╲▏┈╲▂╱┈▕╱┈┈
▋┈┈▋╲▂╱▔╲▂╱┈┈
┈┈▍┈┈╲▂▂▂╱┈┈
']);
}
if ($text == 'فان بود') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>'
╲╭━<━━╮╲╲
╲┃╭╮╭╮┃╲╲
┗┫┏━━┓┣┛╲
╲┃╰━━╯┃ ╲
╲╰┳━━┳╯╲╲
╲╲┛╲╲┗╲╲╲
']);
}
if ($text == '/time' or $text=='ساعت' or $text=='تایم' or $text=='time') {
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕐🕐🕐🕐🕐
🕐🕐🕐🕐🕐
🕐🕐🕐🕐🕐
🕐🕐🕐🕐🕐
🕐🕐🕐🕐🕐']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕑🕑🕑🕑🕑
🕑🕑🕑🕑🕑
🕑🕑🕑🕑🕑
🕑🕑🕑🕑🕑
🕑🕑🕑🕑🕑']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕒🕒🕒🕒🕒
🕒🕒🕒🕒🕒
🕒🕒🕒🕒🕒
🕒🕒🕒🕒🕒
🕒🕒🕒🕒🕒']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕔🕔🕔🕔🕔
🕔🕔🕔🕔🕔
🕔🕔🕔🕔🕔
🕔🕔🕔🕔🕔
🕔🕔🕔🕔🕔']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕕🕕🕕🕕🕕
🕕🕕🕕🕕🕕
🕕🕕🕕🕕🕕
🕕🕕🕕🕕🕕
🕕🕕🕕🕕🕕']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕖🕖🕖🕖🕖
🕖🕖🕖🕖🕖
🕖🕖🕖🕖🕖
🕖🕖🕖🕖🕖
🕖🕖🕖🕖🕖']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕗🕗🕗🕗🕗
🕗🕗🕗🕗🕗
🕗🕗🕗🕗🕗
🕗🕗🕗🕗🕗
🕗🕗🕗🕗🕗']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕙🕙🕙🕙🕙
🕙🕙🕙🕙🕙
🕙🕙🕙🕙🕙
🕙🕙🕙🕙🕙
🕙🕙🕙🕙🕙']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕚🕚🕚🕚🕚
🕚🕚🕚🕚🕚
🕚🕚🕚🕚🕚
🕚🕚🕚🕚🕚
🕚🕚🕚🕚🕚']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛
🕛🕛🕛🕛🕛']);
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => '⏰⏰⏰⏰⏰']);
}
if ($text == 'فیل' or $text == 'قلبی' or $text == 'عشقی') {
	yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
░░▄███▄███▄ 
░░█████████ 
░░▒▀█████▀░ 
░░▒░░▀█▀ 
"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
░░▄███▄███▄ 
░░█████████ 
░░▒▀█████▀░ 
░░▒░░▀█▀ 
░░▒░░█░ 
░░▒░█ 
"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
░░▄███▄███▄ 
░░█████████ 
░░▒▀█████▀░ 
░░▒░░▀█▀ 
░░▒░░█░ 
░░▒░█ 
░░░█ 
░░█░░░░███████ 
░██░░░██▓▓███▓██▒ 
██░░░█▓▓▓▓▓▓▓█▓████ 
██░░██▓▓▓(◐)▓█▓█▓█ 
███▓▓▓█▓▓▓▓▓█▓█▓▓▓▓█ 
▀██▓▓█░██▓▓▓▓██▓▓▓▓▓█ 
"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
░░▄███▄███▄ 
░░█████████ 
░░▒▀█████▀░ 
░░▒░░▀█▀ 
░░▒░░█░ 
░░▒░█ 
░░░█ 
░░█░░░░███████ 
░██░░░██▓▓███▓██▒ 
██░░░█▓▓▓▓▓▓▓█▓████ 
██░░██▓▓▓(◐)▓█▓█▓█ 
███▓▓▓█▓▓▓▓▓█▓█▓▓▓▓█ 
▀██▓▓█░██▓▓▓▓██▓▓▓▓▓█ 
░▀██▀░░█▓▓▓▓▓▓▓▓▓▓▓▓▓█ 
░░░░▒░░░█▓▓▓▓▓█▓▓▓▓▓▓█ 
░░░░▒░░░█▓▓▓▓█▓█▓▓▓▓▓█ 
░▒░░▒░░░█▓▓▓█▓▓▓█▓▓▓▓█ 
"]);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
░░▄███▄███▄ 
░░█████████ 
░░▒▀█████▀░ 
░░▒░░▀█▀ 
░░▒░░█░ 
░░▒░█ 
░░░█ 
░░█░░░░███████ 
░██░░░██▓▓███▓██▒ 
██░░░█▓▓▓▓▓▓▓█▓████ 
██░░██▓▓▓(◐)▓█▓█▓█ 
███▓▓▓█▓▓▓▓▓█▓█▓▓▓▓█ 
▀██▓▓█░██▓▓▓▓██▓▓▓▓▓█ 
░▀██▀░░█▓▓▓▓▓▓▓▓▓▓▓▓▓█ 
░░░░▒░░░█▓▓▓▓▓█▓▓▓▓▓▓█ 
░░░░▒░░░█▓▓▓▓█▓█▓▓▓▓▓█ 
░▒░░▒░░░█▓▓▓█▓▓▓█▓▓▓▓█ 
░▒░░▒░░░█▓▓▓█░░░█▓▓▓█ 
░▒░░▒░░██▓██░░░██▓▓██
"]);
  }
  if ($text == 'تاریخ شمسی') {
include 'jdf.php';
$fasl = jdate('f');
$month_name= jdate('F');
$day_name= jdate('l');
$tarikh = jdate('y/n/j');
$hour = jdate('H:i:s - a');
$animal = jdate('q');
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "امروز  $day_name  |$tarikh|

ماه 🌙: $month_name

فصل ❄️: $fasl

ساعت ⌚️: $hour

حیوان امسال 🐋: $animal
"]);
}

if ($text == 'تاریخ میلادی') {
date_default_timezone_set('UTC');
$rooz = date("l"); // روز
$tarikh = date("Y/m/d"); // سال
$mah = date("F"); // نام ماه
$hour = date('H:i:s - A'); // ساعت
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Today is  $rooz $tarikh

month 🌙: $mah

time ⌚️: $hour"]);
}
if(preg_match("/^\/[Tt][Aa][Ss]\s(\d)/", $text, $rr)) {
@touch("tas.txt");
@file_put_contents("tas.txt", $rr[1]);
$diceo = ['_' => 'inputMediaDice', 'emoticon' => '🎲'];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇɴᴅɪɴɢ ᴅɪᴄᴇ ⁅ $rr[1] ⁆ ɴᴏᴡ :-)", 'parse_mode' => 'markdown' ]);
yield $this->messages->sendMedia(['peer'=>$peer,'media'=>$diceo,'message'=>"🎲"]);}
if(isset($update['message']['media']['_'])){
if($update['message']['media']['_'] == "messageMediaDice"){
if(is_numeric(file_get_contents("tas.txt"))){
$valueo = $update['message']['media']['value'];
if(file_exists("tas.txt") and $valueo != file_get_contents("tas.txt")){
yield $this->channels->deleteMessages(['channel' => $peer, 'id' => [$msg_id]]);
$diceo = ['_' => 'inputMediaDice', 'emoticon' => '🎲'];
yield $this->messages->sendMedia(['peer'=>$peer,'media'=>$diceo,'message'=>"🎲"]);
} else {
unlink("tas.txt");}}}}
	if ($text == '/time' or $text=='ساعت' or $text=='تایم' or $text=='time') {
	    date_default_timezone_set('Asia/Tehran');
	yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'حاجی ساعت الان ⏲']);
	for ($i=1; $i <= 10; $i++){
	yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id +1, 'message' => date('H:i:s')]);
	yield $MadelineProto->sleep(1);
	}
  }
if ($text == 'دانستنی' or $text=='اطلاعات'  or $text=='دانستی بگو') {
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇɴᴅɪɴɢ ⁅ 𝙸𝚗𝚏𝚘𝚛𝚖𝚊𝚝𝚒𝚘𝚗 ⁆ ɴᴏᴡ :-)", 'parse_mode' => 'markdown' ]);
yield $MadelineProto->messages->sendMedia([
  'peer'  => $update,
    'media' => [
        '_' => 'inputMediaUploadedPhoto',
        'file' => 'http://api.codebazan.ir/danestani/pic/'
    ],
    'message' => 'بخون شاید چیزی یاد گرفتی 😑😐',
    'parse_mode' => 'HTML'
]);
}
if ($text == 'viplist' or $text=='listvip'  or $text=='لیست ویژه') {
     yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇɴᴅɪɴɢ ⁅ 𝚅𝙸𝙿𝙻𝙸𝚂𝚃 ⁆ ɴᴏᴡ :-)", 'parse_mode' => 'markdown' ]);
     yield $MadelineProto->messages->sendMedia([
          'peer' => $peer,
          'media' => [
              '_' => 'inputMediaUploadedDocument',
              'file' => 'list/vip.txt',
              'attributes' => [
                  ['_' => 'documentAttributeVideo', 'round_message' => false, 'supports_streaming' => true]
              ]
          ],
          'message' => 'لیست ویژه ها 😎',
          'parse_mode' => 'HTML'
      ]); 
}
if ($text == 'banlist' or $text=='listban'  or $text=='لیست بن') {
     yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇɴᴅɪɴɢ ⁅ 𝙱𝙰𝙽𝙻𝙸𝚂𝚃 ⁆ ɴᴏᴡ :-)", 'parse_mode' => 'markdown' ]);
     yield $MadelineProto->messages->sendMedia([
          'peer' => $peer,
          'media' => [
              '_' => 'inputMediaUploadedDocument',
              'file' => 'list/ban.txt',
              'attributes' => [
                  ['_' => 'documentAttributeVideo', 'round_message' => false, 'supports_streaming' => true]
              ]
          ],
          'message' => "لیست بن شده ها 😬",
          'parse_mode' => 'HTML'
      ]); 
}
if ($text == 'mutelist' or $text=='listmute'  or $text=='لیست سکوت') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇɴᴅɪɴɢ ⁅ 𝙼𝚄𝚃𝙴𝙻𝙸𝚂𝚃 ⁆ ɴᴏᴡ :-)", 'parse_mode' => 'markdown' ]);
     yield $MadelineProto->messages->sendMedia([
          'peer' => $peer,
          'media' => [
              '_' => 'inputMediaUploadedDocument',
              'file' => 'list/mute.txt',
              'attributes' => [
                  ['_' => 'documentAttributeVideo', 'round_message' => false, 'supports_streaming' => true]
              ]
          ],
          'message' => 'لیست سکوت شده ها 🙃',
          'parse_mode' => 'HTML'
      ]); 
}
if ($text == 'فال' or $text=='فال بمولا'  or $text=='فال بگیر') {
     yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇɴᴅɪɴɢ ⁅ 𝙾𝚖𝚎𝚗  ⁆ ɴᴏᴡ :-)", 'parse_mode' => 'markdown' ]);
     $link = json_decode(file_get_contents("https://api.codebazan.ir/fal/?type=json"),true);
     $paradoxam = $link['Result'];
     $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' =>"
     اینم از فال زندگی شخمیت بمولا 🥴
     ————————————————————————
$paradoxam
     ————————————————————————
     "]);
}

          else if(preg_match("/^[\/\#\!]?(setvip) (.*)$/i", $text)){
               preg_match("/^[\/\#\!]?(setvip) (.*)$/i", $text, $m);
               $query = $m[2];
               $time = date("H:i:s");
               if($type3 == 'supergroup' or $type3 == 'chat'){
                 $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
                 $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
                 $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
                 $messag = $gms['messages'][0]['from_id'];
                    $mes = "\n کاربر $messag  \n دلیل :$query\n┾┈┅┅━━━━━━┅┅┈┾\n";
                    file_put_contents('list/vip.txt', $mes,FILE_APPEND);
                    $vip = ['_' => 'chatBannedRights', 'send_messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => false, 'embed_links' => false, 'send_polls' => false, 'change_info' => true, 'invite_users' => false, 'pin_messages' => false, 'until_date' => 999999];
       $MadelineProto->channels->editBanned(['channel' => $peer, 'user_id' => $messag, 'banned_rights' => $vip, ]);
       $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
       کاربر ↢ $messag 
       در ساعت ↢ $time 
       به دلیل ↢ $query 
       در لیست ویژه ها قرار گرفت 😎
       "]);
       }
     }
     else if(preg_match("/^[\/\#\!]?(mute) (.*)$/i", $text)){
          preg_match("/^[\/\#\!]?(mute) (.*)$/i", $text, $m);
          $query = $m[2];
          if($type3 == 'supergroup' or $type3 == 'chat'){
            $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
            $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
            $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
            $messag = $gms['messages'][0]['from_id'];
            $mes = "\n کاربر $messag \n دلیل :$query \n┾┈┅┅━━━━━━┅┅┈┾\n";
                        file_put_contents('list/mute.txt', $mes,FILE_APPEND);
            $mute = ['_' => 'chatBannedRights', 'send_messages' => true, 'send_media' => true, 'send_stickers' => true, 'send_gifs' => true, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_messages' => true, 'until_date' => 99999];
            $MadelineProto->channels->editBanned(['channel' => $peer, 'user_id' => $messag, 'banned_rights' => $mute, ]);
            $MadelineProto->channels->deleteUserHistory(['channel' => $peer, 'user_id' => $messag, ]);
            $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
            کاربر ↢ $messag 
            در ساعت ↢ $time 
            به دلیل ↢ $query 
            در لیست سکوت ها شده قرار گرفت 😬
            "]);
            }
          }
          else if(preg_match("/^[\/\#\!]?(ban) (.*)$/i", $text)){
               preg_match("/^[\/\#\!]?(ban) (.*)$/i", $text, $m);
               $query = $m[2];
               if($type3 == 'supergroup' or $type3 == 'chat'){
                 $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
                 $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
                 $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
                 $messag = $gms['messages'][0]['from_id'];
                 $mee = yield $MadelineProto->get_full_info($messag);
                 $mes = "\n کاربر $messag \n دلیل :$query \n┾┈┅┅━━━━━━┅┅┈┾\n";
                 file_put_contents('list/ban.txt', $mes,FILE_APPEND);
                 $ban = ['_' => 'chatBannedRights', 'view_messages' => true, 'send_messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_messages' => true, 'until_date' => 99999];
                 $MadelineProto->channels->editBanned(['channel' => $peer, 'user_id' => $messag, 'banned_rights' => $ban, ]);
                 $MadelineProto->channels->deleteUserHistory(['channel' => $peer, 'user_id' => $messag ]);
                 $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
                 کاربر ↢ $messag 
                 در ساعت ↢ $time 
                 به دلیل ↢ $query 
                 در لیست بن شده ها قرار گرفت 🙃
                 "]); 
                  }
               }
               else if(preg_match("/^[\/\#\!]?(unban) (.*)$/i", $text)){
                    preg_match("/^[\/\#\!]?(unban) (.*)$/i", $text, $m);
                    $query = $m[2];
                    if($type3 == 'supergroup' or $type3 == 'chat'){
                      $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
                      $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
                      $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
                      $messag = $gms['messages'][0]['from_id'];
                      $mes = "\n کاربر $messag \n دلیل :$query \n┾┈┅┅━━━━━━┅┅┈┾\n";   
                       file_put_contents('list/ban.txt', $mes,FILE_APPEND);
                      $unban = ['_' => 'chatBannedRights', 'view_messages' => false, 'send_messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => false, 'pin_messages' => true, 'until_date' => 99999];
                      $MadelineProto->channels->editBanned(['channel' => $peer, 'user_id' => $messag, 'banned_rights' => $unban, ]);
                      $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
                      کاربر ↢ $messag 
                      در ساعت ↢ $time 
                      به دلیل ↢ $query 
                      از لیست بن شده ها خارج شد 🙃
                      "]); 
                      }
                    }
                    else if(preg_match("/^[\/\#\!]?(unmute) (.*)$/i", $text)){
                         preg_match("/^[\/\#\!]?(unmute) (.*)$/i", $text, $m);
                         $query = $m[2];
                         if($type3 == 'supergroup' or $type3 == 'chat'){
                           $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
                           $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
                           $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
                           $messag = $gms['messages'][0]['from_id'];
                           $mee = yield $MadelineProto->get_full_info($messag);
                           $mes = "\n کاربر $messag \n دلیل :$query \n┾┈┅┅━━━━━━┅┅┈┾\n";
                           file_put_contents('list/mute.txt', $mes,FILE_APPEND);
                           $unmute = ['_' => 'chatBannedRights',  'send_messages' => false, 'send_media' => false, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => false, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => false, 'pin_messages' => true, 'until_date' => 9999];
                           $MadelineProto->channels->editBanned(['channel' => $peer, 'user_id' => $messag, 'banned_rights' => $unmute, ]);
                           $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
                           کاربر ↢ $messag 
                           در ساعت ↢ $time 
                           به دلیل ↢ $query 
                           از لیست سکوت شده ها خارج شد 😬
                      "]); 
                    }
                         }
               else if(preg_match("/^[\/\#\!]?(delvip) (.*)$/i", $text)){
                    preg_match("/^[\/\#\!]?(delvip) (.*)$/i", $text, $m);
                    $query = $m[2];
                    if($type3 == 'supergroup' or $type3 == 'chat'){
                      $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
                      $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
                      $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
                      $messag = $gms['messages'][0]['from_id'];
                      $mee = yield $MadelineProto->get_full_info($messag);
                      $mes = "\n کاربر $messag \n دلیل :$query \n┾┈┅┅━━━━━━┅┅┈┾\n";
                      file_put_contents('list/vip.txt', $mes,FILE_APPEND);
                      $delvip = ['_' => 'chatBannedRights', 'send_messages' => false, 'send_media' => true, 'send_stickers' => false, 'send_gifs' => false, 'send_games' => true, 'send_inline' => true, 'embed_links' => true, 'send_polls' => true, 'change_info' => true, 'invite_users' => true, 'pin_messages' => true, 'until_date' => 99999];
                      $MadelineProto->channels->editBanned(['channel' => $peer, 'user_id' => $messag, 'banned_rights' => $delvip, ]);
                      $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
                      کاربر ↢ $messag 
                      در ساعت ↢ $time 
                      به دلیل ↢ $query 
                      از لیست ویژه ها خارج شد 😎
                      "]); 
                      }
                    }
if ($text == 'پاکسازی لیست سکوت' or $text == 'cleanmute') {
file_put_contents("mute.txt", 'لیست پاکسازی شد');
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "سرورم👑 لیست افراد سکوت شده پاکسازی شد"]);

}
if ($text == 'پاکسازی لیست بن' or $text == 'cleanban') {
     file_put_contents("ban.txt", 'لیست پاکسازی شد');
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "سرورم👑 لیست افراد بن شده پاکسازی شد"]);

     }
     if ($text == 'پاکسازی لیست ویژه' or $text == 'cleanvip') {
          file_put_contents("vip.txt", 'لیست پاکسازی شد');
          $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "سرورم👑 لیست افراد ویژه پاکسازی شد"]);

          }
          if ($text == 'پاکسازی لیست ها' or $text == 'cleanlist') {
               file_put_contents("mute.txt", 'لیست پاکسازی شد');
               file_put_contents("ban.txt", 'لیست پاکسازی شد');
               file_put_contents("vip.txt", 'لیست پاکسازی شد');
               $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "سرورم👑 همه لیست های (سکوت . بن . ویژه) پاکسازی شدند"]);
               }

if($data['enfont'] == 'on'){
$text = strtoupper("$text");
$en = ['Q','W','E','R','T','Y','U','I','O','P','A','S','D','F','G','H','J','K','L','Z','X','C','V','B','N','M'];
$a_a = ['🆀','🆆','🅴','🆁','🆃','🆈','🆄','🅸','🅾️','🅿️','🅰️','🆂','🅳','🅵','🅶','🅷','🅹','🅺','🅻','🆉','🆇','🅲','🆅','🅱️','🅽','🅼'];
$b_b = ['🅠','🅦','🅔','🅡','🅣','🅨','🅤','🅘','🅞','🅟','🅐','🅢','🅓','🅕','🅖','🅗','🅙','🅚','🅛','🅩 ','🅧','🅒','🅥','🅑','🅝','🅜'];
$c_c = ['Q̷̷','W̷̷','E̷̷','R̷̷','T̷̷','Y̷̷','U̷̷','I̷̷','O̷̷','P̷̷','A̷̷','S̷̷','D̷̷','F̷̷','G̷̷','H̷̷','J̷̷','K̷̷','L̷̷','Z̷̷','X̷̷','C̷̷','V̷̷','B̷̷','N̷̷','M̷̷'];
$d_d = ['Ⓠ','Ⓦ','Ⓔ','Ⓡ','Ⓣ','Ⓨ','Ⓤ','Ⓘ','Ⓞ','Ⓟ','Ⓐ','Ⓢ','Ⓓ','Ⓕ','Ⓖ','Ⓗ','Ⓙ','Ⓚ','Ⓛ','Ⓩ','Ⓧ','Ⓒ','Ⓥ','Ⓑ','Ⓝ','Ⓜ️'];
$e_e = ['ǫ','ᴡ','ᴇ','ʀ','ᴛ','ʏ','ᴜ','ɪ','ᴏ','ᴘ','ᴀ','s','ᴅ','ғ','ɢ','ʜ','ᴊ','ᴋ','ʟ','ᴢ','x','ᴄ','ᴠ','ʙ','ɴ','ᴍ'];
$f_f = ['ℚ','Ꮤ','℮','ℜ','Ƭ','Ꮍ','Ʋ','Ꮠ','Ꮎ','⅌','Ꭿ','Ꮥ','ⅅ','ℱ','Ꮹ','ℋ','ℐ','Ӄ','ℒ','ℤ','ℵ','ℭ','Ꮙ','Ᏸ','ℕ','ℳ'];
$h_h = ['🅀','🅆','🄴','🅁','🅃','🅈','🅄','🄸','🄾','🄿','🄰','🅂','🄳','🄵','🄶','🄷','🄹','🄺','🄻','🅉','🅇','🄲','🅅','🄱','🄽','🄼'];
$ss = str_replace($en,$a_a,$text);
$aa = str_replace($en,$b_b,$text);
$bb = str_replace($en,$c_c,$text);
$cc = str_replace($en,$d_d,$text);
$dd = str_replace($en,$e_e,$text);
$ee = str_replace($en,$f_f,$text);
$hh = str_replace($en,$h_h,$text);
$bots = [$ss,$aa,$bb,$cc,$dd,$ee,$hh,];
$ru = $bots[rand(0, count($bots)-1)];
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "$ru",'parse_mode'=>'HTML']); 
}
if($data['fafont'] == 'on'){
$text = strtoupper("$text");
$fas = ['آ','ا','ب','پ','ت','ث','ج','چ','ح','خ','د','ذ','ر','ز','ژ','س','ش','ص','ض','ط','ظ','ع','غ','ف','ق','ک','گ','ل','م','ن','و','ه','ی']; 
$_a_a = ['آ','اَِ','بَِ','پَِـَِـ','تَِـ','ثَِ','جَِ','چَِ','حَِـَِ','خَِ','دَِ','ذَِ','رَِ','زَِ','ژَِ','سَِــَِ','شَِـَِ','صَِ','ضَِ','طَِ','ظَِ','عَِ','غَِ','فَِ','قَِ','ڪَِــ','گَِــ','لَِ','مَِــَِ','نَِ','وَِ','هَِ','یَِ'];
$_b_b = ['آ','ا','بـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','پـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','تـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','ثـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','جـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','چـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','حـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','خـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','د۪ٜ','ذ۪ٜ','ر۪ٜ','ز۪ٜ‌','ژ۪ٜ','سـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','شـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','صـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','ضـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','طـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','ظـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','عـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','غـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','فـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','قـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','کـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','گـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','لـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','مـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ‌','نـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','و','هـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ','یـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜـ۪ٜ']; 
$_c_c = ['آ','ا','بـــ','پــ','تـــ','ثــ','جــ','چــ','حــ','خــ','دّ','ذّ','رّ','زّ','ژّ','ســ','شــ','صــ','ضــ','طــ','ظــ','عــ','غــ','فــ','قــ','کــ','گــ','لــ','مـــ','نـــ','وّ','هــ','یـــ']; 
$_d_d = ['آ','ا','بـ﹏ـ','پـ﹏ـ','تـ﹏ـ','ثـ﹏ــ','جـ﹏ــ','چـ﹏ـ','حـ﹏ـ','خـ﹏ـ','د','ذ','ر','ز','ژ','سـ﹏ـ','شـ﹏ـ','صـ﹏ــ','ضـ﹏ـ','طـ﹏ـ','ظـ﹏ــ','عـ﹏ـ','غـ﹏ـ','فـ﹏ـ','قـ﹏ـ','کـ﹏ـ','گـ﹏ـ','لـ﹏ــ','مـ﹏ـ','نـ﹏ـ','و','هـ﹏ـ','یـ﹏ـ']; 
$_e_e = ['آ','ا','ب̈́ـ̈́ـ̈́ـ̈́ـ','پ̈́ـ̈́ـ̈́ـ̈́ـ','ت̈́ـ̈́ـ̈́ـ̈́ـ','ث̈́ـ̈́ـ̈́ـ̈́ـ','ج̈́ـ̈́ـ̈́ـ̈́ـ','چـ̈́ـ̈́ـ̈́ـ','ح̈́ـ̈́ـ̈́ـ̈́ـ','خـ̈́ـ̈́ـ̈́ـ','د','ذ','ر','ز','ژ','سـ̈́ـ̈́ـ̈́ـ','شـ̈́ـ̈́ـ̈́ـ','ص̈́ـ̈́ـ̈́ـ̈́ـ','ض̈́ـ̈́ـ̈́ـ̈́ـ','ط̈́ـ̈́ـ̈́ـ̈́ـ','ظـ̈́ـ̈́ـ̈́ـ̈́ـ','ع̈́ـ̈́ـ̈́ـ̈́ـ','غ̈́ـ̈́ـ̈́ـ̈́ـ','فـ̈́ـ̈́ـ̈́ـ̈́ـ','قـ̈́ـ̈́ـ̈́ـ','کـ̈́ـ̈́ـ̈́ـ','گـ̈́ـ̈́ـ̈́ـ̈́ـ','ل̈́ـ̈́ـ̈́ـ̈́ـ','م̈́ـ̈́ـ̈́ـ̈́ـ','ن̈́ـ̈́ـ̈́ـ̈́ـ','و','ه̈́ـ̈́ـ̈́ـ̈́ـ','ی̈́ـ̈́ـ̈́ـ̈́ـ']; 
$_f_f = ['آ','اؒؔ','بـ͜͡ــؒؔـ͜͝ـ','پـ͜͡ــؒؔـ͜͝ـ','تـ͜͡ــؒؔـ͜͝ـ','ثـ͜͡ــؒؔـ͜͝ـ','جـ͜͡ــؒؔـ͜͝ـ','چـ͜͡ــؒؔـ͜͝ـ','حـ͜͡ــؒؔـ͜͝ـ','خـ͜͡ــؒؔـ͜͝ـ','د۠۠','ذ','ر','ز','ژ','سـ͜͡ــؒؔـ͜͝ـ','شـ͜͡ــؒؔـ͜͝ـ','صـ͜͡ــؒؔـ͜͝ـ','ضـ͜͡ــؒؔـ͜͝ـ','طـ͜͡ــؒؔـ͜͝ـ','ظـ͜͡ــؒؔـ͜͝ـ','عـ͜͡ــؒؔـ͜͝ـ','غـ͜͡ــؒؔـ͜͝ـ','فـ͜͡ــؒؔـ͜͝ـ','قـ͜͡ــؒؔـ͜͝ـ','کـ͜͡ــؒؔـ͜͝ـ','گـ͜͡ــؒؔـ͜͝ـ','لـ͜͡ــؒؔـ͜͝ـ','مـ͜͡ــؒؔـ͜͝ـ','نـ͜͡ــؒؔـ͜͝ـ','وۘۘ','هـ͜͡ــؒؔـ͜͝ـ','یـ͜͡ــؒؔـ͜͝ـ']; 
$ines = str_replace($fas,$_a_a,$text);
$awer = str_replace($fas,$_b_b,$text);
$bwer = str_replace($fas,$_c_c,$text);
$cwer = str_replace($fas,$_d_d,$text);
$dwer = str_replace($fas,$_e_e,$text);
$ewer = str_replace($fas,$_f_f,$text);
$boti = [$ines,$awer,$wer,$cwer,$dwer,$ewer,];
$rum = $bot[nd(0, count($boti)-1)];
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "$rum",'parse_mode'=>'HTML']);
}
if($partmode == "on"){
  if($update){
      if(strlen($text) < 150){
      $text = str_replace(" ","‌",$text);
  for ($T = 1; $T <= mb_strlen($text); $T++) {
                  yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => mb_substr($text, 0, $T)]);
                  yield $MadelineProto->sleep(0.1);
                }
  }
  }}
if($boldmode == "on"){
if($update){
                yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "<b>$text</b>",'parse_mode'=>'HTML']);
}}
if($data['under'] == "on"){
                                        yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id,'message'=> '<u>'.$text.'</u>', 'parse_mode'=> 'HTML' ,]);
}
if($data['hashtag'] == "on"){
                              $tag = "#".$text;
                              $tags = str_replace(' ', "_",$tag);
                              yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id,'message' => $tags]);
                              }
if($data['italic'] == "on"){
                              yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id,'message'=> '<i>'.$text.'</i>', 'parse_mode'=> 'HTML' ,]);
}

if ($text == '/runlist' or $text == 'لیست فعال') {
     $powr = $data['power'];
     $online = $data['online'];
     $markread = $data['markread'];
     $poker = $data['poker'];
     $funny = $data['funny'];
     $lockpv = $data['lockpv'];
     $proactions = $data['proactions'];
     $typing = $data['typing'];
     $gaming = $data['gaming'];
     $gamepv  = $data['gamepv'];
     $fileon = $data['file'];
     $audio = $data['audio'];
     $photo = $data['photo'];
     $video = $data['video'];
     $loc = $data['loc'];
     $part = $data ['part'];
     $echo  = $data['echo'];
     $bold  = $data['bold'];
     $italic = $data['italic'];
     $hashtag = $data['hashtag'];
     $under = $data['under'];
     $EnFont = $data['enfont'];
     $FaFont = $data['fafont'];
     $teexxeett = "
  .
  ᴘᴏᴡᴇʀ ⩺ $powr 💪🏻
  ┈┅┅━━━━↯━━━━┅┅┈
  ᴏɴʟɪɴᴇ ⩺ $online 👀
  ᴍᴀʀᴋʀᴇᴀᴅ ⩺ $markread 🎧
  ᴘᴏᴋᴇʀ ⩺ $poker 😐
  ғᴜɴɴʏ ⩺ $funny 😂
  ʟᴏᴄᴋᴘᴠ ⩺ $lockpv 🔐
  ┈┅┅━━━━↯━━━━┅┅┈
  ᴘʀᴏ ᴀᴄᴛɪᴏɴs ⩺ $proactions 🎰
  ᴛʏᴘɪɴɢ ⩺ $typing 🕳
  ɢᴀᴍɪɴɢ ⩺ $gaming 🎮
  ɢᴀᴍᴇᴘᴠ ⩺ $gamepv 🗽
  ғɪʟᴇ sᴇɴᴅɪɴɢ  ⩺ $fileon 📦
  ᴀᴜᴅɪᴏ sᴇɴᴅɪɴɢ ⩺ $audio 🎙
  ᴘʜᴏᴛᴏ sᴇɴᴅɪɴɢ ⩺ $photo 🖼
  ᴠɪᴅᴇᴏ sᴇɴᴅɪɴɢ ⩺ $video 🎬
  ʟᴏᴄᴀᴛɪᴏɴ sᴇɴᴅɪɴɢ ⩺ $loc 🥂
  ┈┅┅━━━━↯━━━━┅┅┈
  ᴘᴀʀᴛ ⩺ $part 🪁
  ᴇᴄʜᴏ ⩺ $echo 🦜
  ʙᴏʟᴅ  ⩺ $bold 🖋
  ɪᴛᴀʟɪᴄ ⩺ $italic 🧷
  ʜᴀsʜᴛᴀɢ ⩺ $hashtag 🔗
  ᴜɴᴅᴇʀʟɪɴᴇ ⩺ $under 📜
  ᴇɴᴍᴏᴅᴇ ⩺ $EnFont 📮
  ғᴀᴍᴏᴅᴇ ⩺ $FaFont 📚
  ";
  yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "$teexxeett"]);
}
  if($text == '/creator' or $text == 'سازنده'){
       yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐂𝐫𝐞𝐚𝐭𝐞𝐝 𝖡𝗒 🤴🏻 @redoxi 🤴🏻"]);
       }
    if ($text == '/status' or $text == 'مصرف'){
       $mem_using = round(memory_get_usage() / 1024 / 1024,1);
       yield $this->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "⚙ 𝕌𝕤𝕖𝕕 𝕄𝕖𝕞𝕠𝕣𝕪 : $mem_using MB"]);
    }
 if(preg_match("/^[\/\#\!]?(setanswer) (.*)$/i", $text)){
$ip = trim(str_replace("/setanswer ","",$text));
$ip = explode("|",$ip."|||||");
$txxt = trim($ip[0]);
$answeer = trim($ip[1]);
if(!isset($data['answering'][$txxt])){
$data['answering'][$txxt] = $answeer;
file_put_contents("data.json", json_encode($data));
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "◕‿◕ کلمه جدید به لیست پاسخ های شما اضافه شد ◕‿◕"]);
}else{
yield $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "•♬•♫• کلمه از قبل در لیست پاسخ ها موجود است 🥱"]);
 }
}
if(preg_match("/^[\/\#\!]?(php) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(php) (.*)$/i", $text, $a);
if(strpos($a[2], '$MadelineProto') === false and strpos($a[2], '$this') === false){
$OutPut = eval("$a[2]");
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ʀᴜɴɴɪɴɢ ᴘʜᴘ ᴄᴏᴅᴇ ⁅ $a[2] ⁆ ɴᴏᴡ :-)",'parse_mode'=>"MarkDown"]);
$MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "`🔻 $OutPut`", 'parse_mode'=>'markdown']);
}
}
                 if (preg_match("/^[\/\#\!]?(tagall)(.*)$/i", $text)) {
                        $chat = yield $this->getPwrChat($peer);
                        $chats = $chat['participants'];
                        while (sizeof($chats) >= 100) {
                            $spl = $chats;
                            $Safa = false;
                            $chats = array_splice($spl, 100);
                            foreach ($spl as $number => $up) {
                                $id = $up['user']['id'];
                                $Safa .= $number + 1 . "-[$id](tg://user?id=$id) ";
                            }
                            yield $this->messages->sendMessage([
                                'peer' => $peer,
                                'message' => "𝗔𝗹𝗹 𝗨𝘀𝗲𝗿𝘀 𝗜𝗻 𝗚𝗥𝗢𝗨𝗣 :\n$Safa",
                                'parse_mode' => 'Markdown'
                            ]);
                        }
                        $Safa = false;
                        foreach ($chats as $number => $up) {
                            $id = $up['user']['id'];
                            if ($up['user']['type'] == "user")
                                $Safa .= $number + 1 . "-[$id](tg://user?id=$id) ";
                        }
                        yield $this->messages->sendMessage([
                            'peer' => $peer,
                            'message' => "𝗔𝗹𝗹 𝗨𝘀𝗲𝗿𝘀 𝗜𝗻 𝗚𝗥𝗢𝗨𝗣 :\n$Safa",
                            'parse_mode' => 'Markdown'
                        ]);
                        return;
                    }

                    if ($text == 'تگ انلاین' or $text == "tagonline") {
                        $lis = [];
                        $ChatOnlines = $this->messages->getOnlines(['peer' => $peer,]);
                        foreach ($ChatOnlines['participants'] as $ajbs) {
                            if (isset($ajbs['user']['username']))
                                $lis[] = $ajbs['user']['username'];
                        }
                        foreach ($lis as $reza) {
                            yield $this->messages->sendMessage(['peer' => $peer, 'message' => "$reza \n"]);
                        }
                    }
if ($text == '/Host') {
  yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝚈𝚘𝚞𝚛 𝚂𝚘𝚞𝚛𝚌𝚎 𝚒𝚜 𝚒𝚗 𝚃𝚑𝚒𝚜 𝙵𝚘𝚕𝚍𝚎𝚛 👇"]);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => $_SERVER['SCRIPT_NAME'] ]);
  yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "\n".$_TLVPWJX ]);
}
if($text == 'number' or $text == 'شمارت'){
      if($type3 == 'supergroup' or $type3 == 'chat'){
        $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
        $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
        $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
        $messag = $gms['messages'][0]['from_id'];
        $iduser = $messag;
        yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "⚠ در حال پیدا کردن شمارت داوپش ⚠"]);
        file_put_contents("msgid25.txt",$msg_id);
        file_put_contents("peer5.txt","$peer");
        file_put_contents("id.txt","$messag");
        yield $MadelineProto->messages->sendMessage(['peer' => "@khiar_number_bot", 'message' => "جستجو شماره"]);
        yield $MadelineProto->sleep(1);
        yield $MadelineProto->messages->sendMessage(['peer' => "@khiar_number_bot", 'message' => "$messag"]);
        } else {
         if($type3 == 'user'){
          yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "⚠ در حال پیدا کردن شمارت داوپش ⚠"]);
          file_put_contents("msgid25.txt",$msg_id);
          file_put_contents("peer5.txt","$peer");
          file_put_contents("id.txt","$peer");
           yield $MadelineProto->messages->sendMessage(['peer' => "@khiar_number_bot", 'message' => "جستجو شماره"]);
        yield $MadelineProto->sleep(1);
          yield $MadelineProto->messages->sendMessage(['peer' => "@khiar_number_bot", 'message' => "$peer"]);
         
      }
      }
      }
if(strpos($text,"💢متاسفانه شماره فرد موردنظر در دیتابیس سامانه شکار موجود نمیباشد") !== false && $from_id == 1348966811){
    $msgsgs = file_get_contents("msgid25.txt");
    $perer = file_get_contents("peer5.txt");
    $e = file_get_contents("id.txt");
    yield $MadelineProto->messages->editMessage(['peer' => $perer,'id' => $msgsgs ,'message' => "📿 شماره داوپشمون تو دیتابیس نبود 📿",
    'parse_mode' => 'markdown']);
}
if(preg_match("/^[\/\#\!]?(upload) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(upload) (.*)$/i", $text, $a);
$oldtime = time();
$link = $a[2];
$ch = curl_init($link);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_NOBODY, TRUE);
$data = curl_exec($ch);
$size1 = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD); curl_close($ch);
$size = round($size1/1024/1024,1);
if($size <= 200.9){
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => '🌵 Pℓєαѕє Wαιт...
💾 File Size : '.$size.' MB']);
$path = parse_url($link, PHP_URL_PATH);
$filename = basename($path);
copy($link, "files/$filename");
yield $MadelineProto->messages->sendMedia([
 'peer' => $peer,
 'media' => [
 '_' => 'inputMediaUploadedDocument',
 'file' => "files/$filename",
 'attributes' => [['_' => 'documentAttributeFilename',
 'file_name' => "$filename"]]],
 'message' => "🔖 Name : $filename
🎡 [Your File !]($link)
💎 Size : ".$size.' MB',
 'parse_mode' => 'Markdown'
]);
$t=time()-$oldtime;
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐔𝐩𝐥𝐨𝐚𝐝𝐞𝐝 ✅ ($t".'s)']);
unlink("files/$filename");
} else {
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => '⚠️ حجم فایل انتخابی بیشتر از 200 مگابایت است']);
}
}
 if(preg_match("/^[\/\#\!]?(delanswer) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(delanswer) (.*)$/i", $text, $text);
$txxt = $text[2];
if(isset($data['answering'][$txxt])){
unset($data['answering'][$txxt]);
file_put_contents("data.json", json_encode($data));
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "⫸ کلمه از لیست پاسخ های شما حذف شد 👍"]);
}else{
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "⩥ این کلمه در لیست پاسخ های شما موجود نیست😐"]);
 }
}

if ($text == '/reboot' or $text == "/restart" or $text == "ریستارت") {
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => '𝐘𝐨𝐮𝐫 ᗷOT R̷e̷s̷t̷a̷r̷t̷e̷d̷  S͎u͎c͎c͎e͎s͎s͎f͎u͎l͎l͎y͎⚙']);
  yield $this->restart();
  die;
}

if($text == '/id' or $text == 'id' or $text == 'ایدی'){
  if (isset($message['reply_to_msg_id'])) {
   if($type3 == 'supergroup' or $type3 == 'chat'){
  $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
  $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
  $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
  $messag = $gms['messages'][0]['from_id'];
 $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => '✞ ID is : '.$messag, 'parse_mode' => 'markdown']);
} else {
	if($type3 == 'user'){
 $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "✞ T̷a̷r̷g̷e̷t̷ ̷I̷D : `$peer`", 'parse_mode' => 'markdown']);
}}} else {
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "✞ 𝐆𝐫𝐨𝐮𝐩 𝐈𝐃 : `$peer`", 'parse_mode' => 'markdown']);
}
}

if(isset($message['reply_to_msg_id'])){
if($text == 'unblock' or $text == '/unblock' or $text == 'آنبلاک'){
if($type3 == 'supergroup' or $type3 == 'chat'){
  $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
  $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
  $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
  $messag = $gms['messages'][0]['from_id'];
  yield $MadelineProto->contacts->unblock(['id' => $messag]);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Sɪʀ Uɴʙʟᴏᴄᴋᴇᴅ!🗨"]);
  } else {
  	if($type3 == 'user'){
yield $MadelineProto->contacts->unblock(['id' => $peer]); $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Sɪʀ Uɴʙʟᴏᴄᴋᴇᴅ!🗨"]);
}
}
}

if($text == 'block' or $text == '/block' or $text == 'بلاک'){
if($type3 == 'supergroup' or $type3 == 'chat'){
  $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
  $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
  $gms = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
  $messag = $gms['messages'][0]['from_id'];
  yield $MadelineProto->contacts->block(['id' => $messag]);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Sɪʀ Bʟᴏᴄᴋᴇᴅ!❌!"]);
  } else {
 	if($type3 == 'user'){
yield $MadelineProto->contacts->block(['id' => $peer]); $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Sɪʀ Bʟᴏᴄᴋᴇᴅ!❌"]);
}
}
}

if(preg_match("/^[\/\#\!]?(setenemy) (.*)$/i", $text)){
$gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
  $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
  $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
  $messag = $gmsg['messages'][0]['from_id'];
  if(!in_array($messag, $data['enemies'])){
    $data['enemies'][] = $messag;
    file_put_contents("data.json", json_encode($data));
    yield $MadelineProto->contacts->block(['id' => $messag]);
    $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "$messag 𝔾𝕖𝕥 𝕚𝕟𝕥𝕠 𝔼ℕ𝔼𝕄𝕐 𝕃𝕚𝕤𝕥✨"]);
  } else {
    $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "𝕌𝕤𝕖𝕣 𝕚𝕤 𝔸𝕝𝕣𝕖𝕒𝕕𝕪 𝕚𝕟 𝕥𝕙𝕖 𝕝𝕚𝕤𝕥 𝕠𝕗 𝕖𝕟𝕖𝕞𝕚𝕖𝕤🤨"]);
  }
}
if(preg_match("/^[\/\#\!]?(delenemy) (.*)$/i", $text)){
$gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$msg_id]]);
  $messag1 = $gmsg['messages'][0]['reply_to_msg_id'];
  $gmsg = yield $MadelineProto->channels->getMessages(['channel' => $peer, 'id' => [$messag1]]);
  $messag = $gmsg['messages'][0]['from_id'];
  if(in_array($messag, $data['enemies'])){
    $k = array_search($messag, $data['enemies']);
    unset($data['enemies'][$k]);
    file_put_contents("data.json", json_encode($data));
    yield $MadelineProto->contacts->unblock(['id' => $messag]);
    $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "$messag DᴇLᴇTᴇD FʀOᴍ EɴEᴍY LɪSᴛ💩"]);
  } else{
    $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "TʜIꜱ UꜱEʀ WᴀSɴ'T Iɴ EɴEᴍY LɪSᴛ👨‍🦯"]);
  }
 }
}

if(preg_match("/^[\/\#\!]?(answerlist)$/i", $text)){
if(count($data['answering']) > 0){
$txxxt = "لیست پاسخ های شما :
";
$counter = 1;
foreach($data['answering'] as $k => $ans){
$txxxt .= "$counter: $k => $ans \n";
$counter++;
}
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => $txxxt]);
}else{
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "پاسخی برای نمایش وجود ندارد!"]);
  }
 }
 $timei = date('i:s');
if ($timei == '05:00' or $timei == '10:00' or $timei == '15:00' or $timei == '20:00' or $timei == '25:00' or $timei == '30:00' or $timei == '35:00' or $timei == '40:00' or $timei == '45:00' or $timei == '50:00' or $timei == '55:00' or $timei == '00:00') {
     $MadelineProto->restart();
}
if($text == 'help' or $text == 'راهنما' or $text == 'ر'){
$ping = sys_getloadavg();
$mem_using = round(memory_get_usage() / 1024 / 1024,1);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
⁪         ‌**°• ʜᴇʟᴘ sᴇʟғ °•**
•┏━━━━━━━━━━━••┓⚜  
•┣⪧`group`⇎گروه 
•┣━━━━━━━━•• 
•┣⪧`manage`⇎ تنظیمات 
•┣━━━━━━━━•• 
•┣⪧`karbordi`⇎ کاربردی  
•┣━━━━━━━━•• 
•┣⪧`modeha`⇎ مود ها 
•┣━━━━━━━━•• 
•┣⪧`actions`⇎ اکشن 
•┗━━━━━━━━━━━••┛⚜   
•┏━━━━━━━━━━━•• 
•┣⪧`time`⇎ ساعتم 
•┣━━━━━━━━•• 
•┣⪧`ans`⇎ پاسخ 
•┣⪧`eny`⇎ راهنمای اتک 
•┣━━━━━━━━•• 
•┣⪧`profhelp`⇎ راهنمای پروفایل 
•┗━━━━━━━━━━━•• 
•┏━━━━━━━━━━━••⚜  
•┣⪧`game`⇎ بازی 
•┣⪧`game2`⇎ بازی2 
⁪•┣━━━━━━━━•• 
•┣⪧`ᏒᎪᎷ⇎$mem_using ᴍʙ`
•┣⪧`ᏢᏆNᏀ⇎$ping[0] ᴍꜱ`
•┗━━━━━━━━━━━••⚜  
     ╲\    
         📡  
           \╲ sᴇʟғ ʙᴏᴛ...
",'parse_mode' => 'markdown']);
}

if($text == 'group' or $text == 'گروه' or $text == 'gro'){
$ping = sys_getloadavg();
$mem_using = round(memory_get_usage() / 1024 / 1024,1);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
⁪       **• ʜᴇʟᴘ ɢʀᴏᴜᴘ sᴇʟғ •**
╭━─━─━─━─•◈•─━─━─━─━╮
**⎞دریافت اطلاعات گروه⎝↯**   
•┃⪧`/gpinfo` 
**⎞پاکسازی پیام های گروه⎝↯**
•┃⪧`/cleans`↬عدد↫   
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞بن و آنبن کردن کاربران گروه⎝↯**
•╿⪧`/ban`↬دلیل↫   
•╽⪧`/unban`↬دلیل↫    
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞ویژه کردن کاربران گروه⎝↯**
•╿⪧`/setvip`↬دلیل↫    
•╽⪧`/delvip`↬دلیل↫    
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞سکوت کردن کاربران گروه⎝↯**
•╿⪧`/mute` ↬دلیل↫
•╽⪧`/unmute` ↬دلیل↫
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞تگ همه افراد⇎تگ افراد آنلاین⎝↯**
•╿⪧`/tagall` 
•╽⪧`/tagonline`
 ╰━─━─━─━─•◈•─━─━─━─━╯
      ╲\    
         📡  
           \╲ sᴇʟғ ʙᴏᴛ...
           
•╿⪧**ᏒᎪᎷ⇎$mem_using ᴍʙ**
•╽⪧**ᏢᏆNᏀ⇎$ping[0] ᴍꜱ**
",
'parse_mode' => 'markdown']);
}

if($text == '/modha' or $text == 'modha' or $text == 'مود'){
$ping = sys_getloadavg();
$mem_using = round(memory_get_usage() / 1024 / 1024,1);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
▸͞͞↳̽  ⒽⒺⓁⓅⓂⓄⒹⒺ ↵ᵎ.͜. 

﴾┅━━━━𖤍━━━━┅﴿
حالت پارت نویسی 🏆↶
➺ /part ↬on / off↫
﴾┅━━━━𖤍━━━━┅﴿ 
حالت نوشتن با هشتگ# ↶
➺ /hashtag ↬on / off↫ 
﴾┅━━━━𖤍━━━━┅﴿ 
حالت کج نویس 🤔 ↶
➺ /italic ↬on / off↫ 
﴾┅━━━━𖤍━━━━┅﴿
حالت زیر خط کشیدن🦅 ↶
➺ /underline ↬on / off↫ 
﴾┅━━━━𖤍━━━━┅﴿ 
حالت درشت نویسی 👲 ↶
➺ /bold ↬on / off↫ 
﴾┅━━━━𖤍━━━━┅﴿
حالت طوطی (اکو) 🦜↶
➺ /echo ↬on / off↫ 
﴾┅━━━━𖤍━━━━┅﴿ 
حالت فونت مد انگلیسی 💃 ↶
➺ /EnMode ↬on / off↫ 
﴾┅━━━━𖤍━━━━┅﴿ 
حالت فونت مد فارسی 🍷 ↶ 
➺ /FaMode ↬on / off↫
﴾┅━━━━𖤍━━━━┅﴿
دیدن پوشه سورس در هاست🌚 ↶
➺ /Host ↬on / off↫
﴾┅━━━━??━━━━┅﴿
دریافت تاس باعدد دلخواه ↶
➺ /tas ↬number↫
﴾┅━━━━𖤍━━━━┅﴿
 دریافت اسکرین شات از سایت⚡️ ↶
➺ /screen ↬នɨƬ៩↫
﴾┅━━━━??━━━━┅﴿
 دستور دریافت پینگ از سایت☄ ↶
➺ /webping ↬នɨƬ៩↫
﴾┅━━━━𖤍━━━━┅﴿  
 دستور تنظیم نام اکانت✨ ↶
➺ /setfirstname ↬Ƭ៩✗Ƭ↫
﴾┅━━━━𖤍━━━━┅﴿ 
دستور تنظیم نام خانوادگی اکانت💥↶
➺ /setlastname↬Ƭ៩✗Ƭ↫
﴾┅━━━━𖤍━━━━┅﴿ 
 دستور تنظیم بیو اکانت🌥 ↶
➺ /setbio ↬Ƭ៩✗Ƭ↫
﴾┅━━━━𖤍━━━━┅﴿
 دستور تنظیم نام کاربری اکانت🌬 ↶
➺ /setusername ↬@Ƭ៩✗Ƭ↫
﴾┅━━━━𖤍━━━━┅﴿
",
'parse_mode' => 'markdown']);
}

if($text == '/manage' or $text == 'manage' or $text == 'تنظیمات'){
  $ping = sys_getloadavg();
  $mem_using = round(memory_get_usage() / 1024 / 1024,1);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
⁪‌‌ ‌‌                 **ʜᴇʟᴘ ᴍᴀɴᴀɢᴇ** 

**⎞روشن خاموش کردن ربات⎝↯**
•┃⪧`/bot` ↬on/off↫   
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞اطلاع از انلاین بودن ربات⎝↯**
•┃⪧`/robot`⇎ربات
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞پینگ سرور⎝↯**
•┃⪧`/ping`⇎پینگگ    
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞مقدار مصرف هاست⎝↯**
•┃⪧`/status`⇎مصرف   
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞سازنده ربات⎝↯**
•┃⪧`/creator`⇎سازنده   
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞دریافت لیست ران⎝↯**
•┃⪧`/runlist`⇎لیست فعال  
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞دریافت پروکسی پر سرعت⎝↯**
•┃⪧`/proxy`⇎پروکسی 
 ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞ریستارت کردن ربات⎝↯**
•┃⪧`/restart`⇎ریستارت
 ╰━─━─━─━─•◈•─━─━─━─━╯
     ╲\    
         📡  
           \╲ sᴇʟғ ʙᴏᴛ...
           
•╿⪧**ᏒᎪᎷ⇎$mem_using ᴍʙ**
•╽⪧**ᏢᏆNᏀ⇎$ping[0] ᴍs**
",
'parse_mode' => 'markdown']);
}
if($text == 'ans' or $text == 'answer settings' or $text == 'پاسخ'){
  $ping = sys_getloadavg();
  $mem_using = round(memory_get_usage() / 1024 / 1024,1);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
⁪   ⁪     ⁪         ⁪       •**ʜᴇʟᴘ ᴀɴsᴡᴇʀ**• 
•┏━━━━━━━━━━••┓
•┣ ⪧`/setanswer`↬ᴛᴇxᴛ|ᴀɴꜱᴡᴇʀ↫تنظیم
•┣ ⪧`/delanswer`↬ᴛᴇxᴛ↫حذف پاسخ
•┣ ⪧`/answerlist`↭لیست
•┣ ⪧`/clean answers`↭حذف همه 
•┗━━━━━━━━━━••╋•

`•┣ ⪧ᏒᎪᎷ⇎$mem_using ᴍʙ`
`•┣ ⪧ᏢᏆNᏀ⇎$ping[0] ᴍꜱ`
",
'parse_mode' => 'markdown']);
}
if($text == 'tim' or $text == 'timez' or $text == 'ساعتم'){
  $ping = sys_getloadavg();
  $mem_using = round(memory_get_usage() / 1024 / 1024,1);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
▸͞͞↳̽  ⒽⒺⓁⓅ ⓉⒾⓂⒺⓏ ↵ᵎ.͜.

﴾┅━━━━𖤍━━━━┅﴿  
دریافت ساعت و آپدیت خودکار 💫 ↶ 
↫ساعت↬ 
﴾┅━━━━𖤍━━━━┅﴿
دریافت تاریخ میلادی🌐 (جهانی)↶  
↫تاریخ میلادی↬  
﴾┅━━━━𖤍━━━━┅﴿  
دریافت تاریخ شمسی🕋 (ایرانی)↶ 
↫تاریخ شمسی↬  
﴾┅━━━━𖤍━━━━┅﴿
حالت انلاین نگه داشتن اکانت 🦾  
➺ /online↬ᴏɴ / ᴏꜰꜰ↫
﴾┅━━━━𖤍━━━━┅﴿
𝚄𝚜𝚎𝚍 𝙼𝚎𝚖𝚘𝚛𝚢 ➢ $mem_using ᴍʙ
𝚈𝚘𝚞𝚛 𝚂𝚎𝚛𝚟𝚎𝚛 𝙿𝚒𝚗𝚐 ➢ $ping[0] ᴍꜱ
",
'parse_mode' => 'markdown']);
}
if($text == 'eny' or $text == 'enemy settings' or $text == 'دشمن'){
  $ping = sys_getloadavg();
  $mem_using = round(memory_get_usage() / 1024 / 1024,1);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
▸͞͞↳̽  ⒺⓃⒺⓂⓎ ⓈⒺⓉⓉⒾⓃⒼⓈ ↵ᵎ.͜.

﴾┅━━━━𖤍━━━━┅﴿ 
تنظیم دشمن با آیدی یا ریپلای 😈 
➺ /setenemy 
﴾┅━━━━𖤍━━━━┅﴿ 
حذف دشمن با آیدی عددی یا ریپلای 💊 
➺ /delenemy 
﴾┅━━━━𖤍━━━━┅﴿ 
پاکسازی لیست دشمنان 🤝 
➺ /clean enemylist 
﴾┅━━━━𖤍━━━━┅﴿ 
اسپم پیام در یک متن 📄 
➺ /flood↬ɴᴜᴍʙᴇʀ↫↬ᴛᴇxᴛ↫ 
﴾┅━━━━𖤍━━━━┅﴿ 
اسپم پیام خط به خط 📑 
➺ /spam↬ɴᴜᴍʙᴇʀ↫↬ᴛᴇxᴛ↫ 
﴾┅━━━━𖤍━━━━┅﴿ 
بلاک کردن افراد با آیدی یا ریپلای 🪁 
➺ /block 
﴾┅━━━━𖤍━━━━┅﴿
آنبلاک کردن افراد با آیدی یا ریپلای 🛹 
➺ /unblock 
﴾┅━━━━𖤍━━━━┅﴿ 
قسمت فحش های بگایی 🤬 
◝فحش◟ 
◝شمارش◟ 
◝شمارشش◟ 
﴾┅━━━━𖤍━━━━┅﴿
𝚄𝚜𝚎𝚍 𝙼𝚎𝚖𝚘𝚛𝚢 ➢ $mem_using ᴍʙ
𝚈𝚘𝚞𝚛 𝚂𝚎𝚛𝚟𝚎𝚛 𝙿𝚒??𝚐 ➢ $ping[0] ᴍꜱ
",
'parse_mode' => 'markdown']);
}
if($text == '/actions' or $text == 'actions' or $text == 'اکشن'){
  $ping = sys_getloadavg();
  $mem_using = round(memory_get_usage() / 1024 / 1024,1);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
**ʜᴇʟᴘ ᴀᴄᴛɪᴏɴs** •┏━━━━━━━━━━━━━━━━━━••┓  
**⎞حالت ارسال تایپینگ در گروه⎝↯** 
•╿⪧`/typing` ↬on/off↫     
**⎞حالت ارسال بازی در گروه 🎮 ⎝↯**
•╿⪧`/gaming` ↬on/off↫     
**⎞حالت ارسال ویس در گروه⎝↯**
•╽⪧`/audio` ↬on/off↫   
**⎞حالت ارسال ویدیو در گروه🎥⎝↯**
•╿⪧`/video` ↬on/off↫ 
**⎞حالت ارسال فایل در گروه🗂⎝↯**
•╽⪧`/file` ↬on/off↫  
**⎞حالت ارسال عکس در گروه🖼⎝↯**
•╿⪧`/photo` ↬on/off↫    
**⎞حالت پرو اکشن ها (اجرای همه)😎⎝↯**
•╽⪧`/proactions` ↬on/off↫   
**⎞حالت بازی برای پی وی 🧩⎝↯**  
•╿⪧`/gamepv` ↬on/ff↫   
**⎞حالت سین خودکار 👁⎝↯**   
•╽⪧`/markread` ↬on/off↫    
**⎞حالت پوکر 😐⎝↯**   
•╿⪧`/poker` ↬on/off↫    
**⎞حالت خنده 😂⎝↯**    
•╽⪧`/funny` ↬on/off↫
•┗━━━━━━━━━━━━━━━━━━••┛

•╿⪧ **ᏒᎪᎷ꧇$mem_using ᴍʙ**
•╽⪧ **ᏢᏆNᏀ꧇$ping[0] ᴍꜱ**
",
'parse_mode' => 'markdown']);
}
if($text == 'prof' or $text == 'profhelp' or $text == 'پروفایل'){
$ping = sys_getloadavg();
$mem_using = round(memory_get_usage() / 1024 / 1024,1);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
**ʜᴇʟᴘ ᴘʀᴏғᴀɪʟ**
**╭━─━─━─━─•◈•─━─━─━─━╮**
**⎞دستور تنظیم نام اکانت✨⎝↯**
•┃⪧`/setfirstname`↬ᴛᴇxᴛ↫ 
⁪ ‌╰━─━─━─━─•◈•─━─━─━─━╯
**⎞دستور تنظیم نام خانوادگی اکانت💥⎝↯** 
•┃⪧`/setlastname`↬ᴛᴇxᴛ↫
‌ ‌╰━─━─━─━─•◈•─━─━─━─━╯
**⎞دستور تنظیم بیو اکانت🌥⎝↯** 
•┃⪧`/setbio`↬ᴛᴇxᴛ↫ 
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞دستور تنظیم نام کاربری اکانت🌬⎝↯**
•┃⪧`/setusername`↬@ᴛᴇxᴛ↫
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞جست و جو برای نام کابری ⛳⎝↯**
•┃⪧`/checkusername`↬@ᴛᴇxᴛ↫
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
**⎞دریافت نشست های فعال 📊⎝↯**
•┃⪧`/sessions`
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
*⎞دریافت آیدی عددی با ریپلای🤴🏻⎝↯**   
•┃⪧`/id`↬ʀᴇᴘʟᴀʏ↫
‌ ╰━─━─━─━─•◈•─━─━─━─━╯
     ╲\    
         📡  
           \╲ sᴇʟғ ʙᴏᴛ...
           
•╿⪧**ᏒᎪᎷ⇎$mem_using ᴍʙ**
•╽⪧**ᏢᏆNᏀ⇎$ping[0] ᴍꜱ**
",
'parse_mode' => 'markdown']);
}
if($text == '/karbordi' or $text == 'karbordi' or $text == 'کاربردی'){
  $ping = sys_getloadavg();
  $mem_using = round(memory_get_usage() / 1024 / 1024,1);
  $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
  ▸͞͞↳̽  ⒽⒺⓁⓅ ⓀⒶⓇⒷⓄⓇⒹⒾ ↵ᵎ.͜.
 
﴾┅━━━━𖤍━━━━┅﴿  
لایک دار کردن پیام 👍🏻   
➺ /like↬Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿  
ساخت کارت فیک 🏴‍☠️↶  
➺ /fakecard   
﴾┅━━━━𖤍━━━━┅﴿ 
دریافت گیف مرتبط با متن 🪔↶  
➺ /gif↬Ƭ៩✗Ƭ↫    
﴾┅━━━━𖤍━━━━┅﴿ 
دریافت گیف از ککسال گیف ❣↶  
➺ /koksal↬Ƭ៩✗Ƭ↫   
﴾┅━━━━𖤍━━━━┅﴿  
دریافت عکس مرتبط با متن 🎴↶  
➺ /pic↬Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿  
دریافت جوک 😃↶   
➺ /joke   
﴾┅━━━━𖤍━━━━┅﴿  
سرچ متن در گوگل 😪↶  
➺ /google↬Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿   
سرچ متن در ویکی پدیا 🎊 ↶  
➺ /wiki↬Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿
سرچ متن در یوتبوب ⛑↶  
➺ /youtube↬Ƭ៩✗Ƭ↫   
﴾┅━━━━𖤍━━━━┅﴿  
دریافت ویس با توجه متن دلخواه🎙↶  
➺ /voice↬Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿  
دریافت آیدی عددی با ریپلای 🤴🏻↶   
➺ /id↬ʀᴇᴘʟᴀʏ↫  
﴾┅━━━━𖤍━━━━┅﴿   
سیو کردن در فضای ابری شخصی 🗂↶  
➺ /save↬ʀᴇᴘʟᴀʏ↫  
﴾┅━━━━𖤍━━━━┅﴿  
اجرای کد های پی اچ پی🔻↶   
➺ /php↬Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿ 
پیدا کردن اهنگ با متن 🎵↶  
➺ /music↬Ƭ៩✗Ƭ↫    
﴾┅━━━━𖤍━━━━┅﴿  
دریافت آب و هوای شهر 📡 ↶  
➺ /weather↬ᴄɪᴛʏ↫  
﴾┅━━━━𖤍━━━━┅﴿
دریافت اطلاعات کاربری با آیدی 🔍↶  
➺ /info↬ᴜꜱᴇʀɴᴀᴍᴇ⇛   
﴾┅━━━━𖤍━━━━┅﴿
دریافت نشست های فعال 📊↶   
➺ /sessions   
﴾┅━━━━𖤍━━━━┅﴿     
لیست ویژه 🥀↶  
➺ /viplist   
﴾┅━━━━𖤍━━━━┅﴿
لیست بن 🎈↶  
➺ /banlist   
﴾┅━━━━𖤍━━━━┅﴿
لیست میوت 🐍↶  
➺ /mutelist   
﴾┅━━━━𖤍━━━━┅﴿ 
آپلود فایل از لینک 📥 ↶  
➺ /upload   
﴾┅━━━━𖤍━━━━┅﴿   
پیدا کردن شماره کاربر از دیتابیس🔎 ↶  
➺ /number    
﴾┅━━━━𖤍━━━━┅﴿  
جست و جو برای موجود بودن نام کابری ⛳ ↶  
➺ /checkusername ↬@Ƭ៩✗Ƭ↫  
﴾┅━━━━𖤍━━━━┅﴿
پاکسازی پیام ها در گروه✅↶  
➺ /cleans↬ɴᴜᴍʙᴇʀ↫   
﴾┅━━━━𖤍━━━━┅﴿
تگ تمام افراد گروه 🔥↶  
➺ /TagAll   
﴾┅━━━━𖤍━━━━┅﴿ 
دریافت اطلاعات گروه 💯↶  
➺ /gpinfo   
﴾┅━━━━𖤍━━━━┅﴿   
بن و آنبن کردن کاربران گروه 🎆 ↶  
➺ /ban↬دلیل↫  
➺ /unban↬دلیل↫   
﴾┅━━━━𖤍━━━━┅﴿ 
ویژه کردن کاربران گروه 🎊↶  
➺ /setvip↬دلیل↫   
➺ /delvip↬دلیل↫   
﴾┅━━━━𖤍━━━━┅﴿ 
سکوت کردن کاربران گروه🥊↶  
➺ /mute ↬دلیلش↫   
➺ /unmute ↬دلیلش↫  
﴾┅━━━━𖤍━━━━┅﴿
جست و جو کردن متن در گروه 🕵🏻‍♂️↶   
➺ /search↬Ƭ៩✗Ƭ↫    
﴾┅━━━━𖤍━━━━┅﴿
𝚄𝚜𝚎𝚍 𝙼𝚎𝚖𝚘𝚛𝚢 ➢ $mem_using ᴍʙ
𝚈𝚘𝚞𝚛 𝚂𝚎𝚛𝚟𝚎𝚛 𝙿𝚒𝚗𝚐 ➢ $ping[0] ᴍꜱ
",
'parse_mode' => 'markdown']);
}
if($text == '/game' or $text == 'game' or $text == 'بازی'){
$ping = sys_getloadavg();
$mem_using = round(memory_get_usage() / 1024 / 1024,1);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
▸͞͞↳̽  ⒽⒺⓁⓅⒼⒶⓂⒺ ↵ᵎ.͜. 

﴾┅━━━━𖤍━━━━┅﴿  
「 بکیرم ⇦ بکیرم های رندوم 👽」
「 بکیرم2 ⇦ بکیرم انیمیشن دار 😎」
「 کیر ⇦ کیر انیمیشن دار 🙄」
「 کیر2 ⇦ کیر های رندوم 🤖」
「 بشمارش ⇦ شمارشش میکنه 😪」
「 زامبی ⇦ زامبی آدم رو به فاک میده 🧟‍♂️」
「 موشک ⇦ فضایی با موشک به چخ میده ??」
「 بریم ماه ⇦ به ماه سفر میکنیم 🌙」
「 پول ⇦ پول پرواز میکنه 💵」
「 خز بازی ⇦ عن خز بازی رو در میاره 🤮」
「 روح ⇦ توسط روح مورد گایش قرار میگیره 👻」
「 برم خونه ⇦ پیاده میره خونه 🏠」
「 شکست عشقی ⇦ سینگل میشه 💃」
「 عقاب ⇦ موش به گای عقاب میره 🦅」
「 حموم ⇦ انجام عملیات با گلنار 🛁」
「 آپدیت ⇦ سرور آپدیت میشه 🟩」
「 بکشش ⇦ جنایتکار رو میکشه 🤠」
「 مسجد ⇦ به سوی مسجد میرویم 🕌」
「 کوسه ⇦ شانس میاره کوسه نمیگادش 🦈」
「 بارون ⇦ بارون میاد سیل میشه ولی... ☁️」
「 کاکتوس ⇦ بادکنک میترکه 🌵」
「 شب خوش ⇦ میره و می خوابه 😴」
「 فیشینگ ⇦ کارت رو میشوره میبره بمولا 😈」
「 گل بزن ⇦ توپ رو میزنه تو گل ⚽️」
「 بخواب ⇦ میره که بخوابه 🛏」
「 انگشت ⇦ انگشتش میکنه 👌🏻」
「 قلبب ⇦ قلب موشن دار شماره 1 💚」
「 قلببب ⇦ قلب موشن دار شماره 2 💛」
「 قلبببب ⇦ قلب موشن دار شماره 3 🤍」
「 قلبز ⇦ قلب موشن دار شماره 4 ❤️」
「 قلب پرو ⇦ رقص قلب های متحرک 🖤」
「 گوه بخوررر ⇦ گوه میده بهش بخوره 💩」
「 گوه بخور2 ⇦ بازم گوه میخوره(انیمیشن) 💥」
「 گوه بخور3 ⇦ دوباره مورد گوه خوری قرار میگیره 🚽」
「 لامپ ⇦ لامپ رو روشن میکنه 💡」
「 نامه ⇦ برات نامه میفرستن ✉」
「 هالوین ⇦ تزینات هالوین فراموش نشه 🎃」
「 اسکلت ⇦ جمجمه های انیمیشن دار 💀」
「 فوششش ⇦ فحش با انیمیشن 🤬」
「 بوس بوس ⇦ بوسش میکنه 💋」
「 کیبورد ⇦ یک هکر بدون کیبورد ⌨️」
「 آمپول ⇦ دکتر آمپولش میزنه ??🏻‍⚕️」
「 مجسمه ⇦ تجربه هنر مجسمه سازی 🗿」
「 الماس ⇦ میکنه تا به الماس برسه 💎」
「 قفل ⇦ قفل رو با کلید باز میکنه 🔐」
「 تایممم ⇦ زمانش بگا میره ⏳」
「 تاکسی ⇦ تاکسی میگیره 🚕」
「 رقص تابوت ⇦ دیگه باهاش آشنا هستی ⚰️」
「 پشمام ⇦ پشمات میریزههه 🍂」
「 غرقش کن ⇦ رفیقتم غرق میشه 🏄🏻‍♂」
「 فضانورد ⇦ منم میگم ایران قویه 🇮🇷」
「 بزن قدش ⇦ بسیار زیبا میزنه قدش 🤛🏻」
「 جق ⇦ کار همیشگی رو انجام میده 💦」
「 خنده ⇦ مثل کصمخ ها میخنده 😂」
「 کرونا ⇦ بپا کرونا نگیری 🦠」
「 زارت ⇦ هیچ ایده ای موجود نیست 🌑」
「 عشق ⇦ عشقشو بدست میاره 🙃」
「 موتور ⇦ موتورش میره تو چاله 🏍」
「 ماشین ⇦ ماشینش منفجر میشه 🏎」
「 فیل ⇦ لوگو فیل با یه قلب گودرتمند 🐘」
「 بکنش ⇦ فحش های زیبایی بهش میده 📿」
「 فاک ⇦ با عشق تقدیم به تو 🖕」
「 مربع1 ⇦ رقص مربع ها قسمت اول 🟥」
「 مربع2 ⇦ رقص مربع ها قسمت دوم 🔳」
「 دنس ⇦ رقص مربع های رنگارنگ 💃🏻」
「 هکر ⇦ نقاب آنانیموس رو نمایش میده 💻」
「 دوستت دارم ⇦ نمایش علاقه بهت با لوگو 🍆」
「 حق بود ⇦ میخنده بهش هههه 😆」
「 بوس بده ⇦ اول یه بوس میده به عمو 💋」
「 بخند ⇦ بهش میخندن 😄」
「 امام ⇦ ما ملت غیور ایرانیم 👳🏻‍♂️」
「 پیامو ⇦ چگونگی رسم پیانو با شکل 🎹」
「 دوستت دارم بمولا ⇦ لوگو دوستت دارم 🥰」
「 لبخند بزن ⇦ لوگو با شکلک لبخند 🙂」
「 حملههه ⇦ تیر بارون میشه 🔫」
「 گل برای خل ⇦ گل میده بهش با لوگو 🌹」
「 قهوه ⇦ قهوه بخور بمولا ☕」
「 لایک داری ⇦ لایکش میکنه 👍🏻」
「 دانش آموزان ⇦ لوگو چند تا دانش آموز با هم 😗」
「 ساعت مچی ⇦ ساعت مچیشو در میاره ⌚」
「 خوش آمد ⇦ بهش خوش آمد گویی میگه 😃」
「 دوربین ⇦ دریافت دوربین با لوگو 📷」
「 تلفن ⇦ دریافت تلفن با لوگو ☎」
「 تولد مبارک ⇦ بنر تولدت مبارک میده بهش 🥳」
「 ز666 ⇦ دوباره لوگو لبخند 😉」
「 بپر پایین ⇦ خودشو میندازه پایین 👨🏻‍🦯」
「 ضبط ⇦ بازم لوگو به شکل ضبط 🎛」
「 لیوان ⇦ لوگو به شکل لیوان 🥛」
「 بالگرد ⇦ هلیکوپتر میاد دنباش 🚁」
「 هلیکوپتر ⇦ هلیکوپتر میاد با انیمیشن ✈」
「 گوزپلنگ ⇦ لوگو یوزپلنگ برات میاره 🐆」
「 فان بود ⇦ بازم دریافت لوگو خنده 😏」
「 مرغ ⇦ تخماش جوجه میشن 🐓」
「 صبح بخیر ⇦ روز خود را آغاز کنید 🥱」
「 ارسال پورن ⇦ خدا بخواد پورن میفرسته 📁」
「 زنبور ⇦ زنبور پدسگ نیشش میزنه 🐝」

﴾┅━━━━𖤍━━━━┅﴿  
𝚄𝚜𝚎𝚍 𝙼𝚎𝚖𝚘𝚛𝚢 ➢ $mem_using ᴍʙ
𝚈𝚘𝚞𝚛 𝚂𝚎𝚛𝚟𝚎𝚛 𝙿𝚒𝚗𝚐 ➢ $ping[0] ᴍꜱ
",
'parse_mode' => 'markdown']);
}
if(preg_match("/^[\/\#\!]?(screen) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(screen) (.*)$/i", $text, $m);

$mi = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ꜱᴄʀᴇᴇɴꜱʜᴏᴛ ꜰʀᴏᴍ ⁅ $m[2] ⁆ ᴡᴇʙ ꜱɪᴛᴇ :-)",'parseMarkDown_mode'=>""]);

$ound = "https://api.codebazan.ir/webshot/?text=1000&domain=".$mi;
$inputMediaGifExternal = ['_' => 'inputMediaGifExternal', 'url' => $ound];
$MadelineProto->messages->sendMedia(['peer' => $peer, 'media' => $inputMediaGifExternal ,'reply_to_msg_id' => $msg_id,'message' => "اسکرین شات از سایت مورد نظر آماده شد 📸"]);
}
if(preg_match("/^[\/\#\!]?(webping) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(webping) (.*)$/i", $text, $m);
if($type3 == "supergroup" or $type3 == "chat" or $type3 == 'user'){
$mi = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ᴘɪɴɢ ꜰʀᴏᴍ ⁅ $m[2] ⁆ ᴡᴇʙꜱɪᴛᴇ :-)",'parse_mode'=>"MarkDown"]);
$r = file_get_contents("https://api.codebazan.ir/ping/?url=".$mi);
if($r != NULL){
    
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' =>
"
ᴡᴇʙꜱɪᴛᴇ ᴘɪɴɢ ɪꜱ $r !!!
",
'parse_mode' => 'HTML','reply_to_msg_id' => $msg_id]);
}else{
yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' =>
"
 𝑌??𝑢𝑟 𝐴𝑑𝑑𝑟𝑒𝑠 𝐼𝑠 ɪɴᴠᴀʟɪᴅ !
",
'parse_mode' => 'markdown','reply_to_msg_id' => $msg_id]);
}
}
}
if($text == '/config' or $text == 'پیکربندی'){
$MadelineProto->channels->joinChannel(['channel' => "@linkyab_sistani" ]);
$MadelineProto->channels->joinChannel(['channel' => "@linkdonifarstel"]);
$MadelineProto->messages->sendMessage(['peer' => "@crazymahdi", 'message' => 'من سلفت رو ران کردم، دمت گرم بمولا 🌹🔥']);
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message'=> "پیکربندی ربات انجام شد ☕", 'parse_mode'=>'MarkDown']);
}
if(preg_match("/^[\/\#\!]?(save)$/i", $text) && isset($message['reply_to_msg_id'])){
$me = yield $MadelineProto->get_self();
$me_id = $me['id'];
yield $MadelineProto->messages->forwardMessages(['from_peer' => $peer, 'to_peer' => $me_id, 'id' => [$message['reply_to_msg_id']]]);
      $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "♡سرورم ریپلی مورد نظر با موفقیت در فضای شخصی شما ذخیره شد♡"]);
     }
 if(preg_match("/^[\/\#\!]?(typing) (on|off)$/i", $text)){
preg_match("/^[\/\#\!]?(typing) (on|off)$/i", $text, $m);
$data['typing'] = $m[2];
file_put_contents("data.json", json_encode($data));
      $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "TYᑭIᑎG 🕳ᗰOᗪE ᑎOᗯ $m[2]"]);
     }

     if(preg_match("/^[\/\#\!]?(comment) (on|off)$/i", $text)){
      preg_match("/^[\/\#\!]?(comment) (on|off)$/i", $text, $m);
      $comment['comment'] = $m[2];
      file_put_contents("comment.json", json_encode($comment));
            $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "comment is $m[2]"]);
           }


 if(preg_match("/^[\/\#\!]?(echo) (on|off)$/i", $text)){
preg_match("/^[\/\#\!]?(echo) (on|off)$/i", $text, $m);
$data['echo'] = $m[2];
file_put_contents("data.json", json_encode($data));
      $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "EᑕᕼO 🦜ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
 if(preg_match("/^[\/\#\!]?(markread) (on|off)$/i", $text)){
preg_match("/^[\/\#\!]?(markread) (on|off)$/i", $text, $m);
$data['markread'] = $m[2];
file_put_contents("data.json", json_encode($data));
      $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᗰᗩᖇKᖇEᗩᗪ 🎧ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
 if(preg_match("/^[\/\#\!]?(info) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(info) (.*)$/i", $text, $m);
$mee = yield $MadelineProto->get_full_info($m[2]);
$me = $mee['User'];
$me_id = $me['id'];
$me_status = $me['status']['_'];
$me_bio = $mee['full']['about'];
$me_common = $mee['full']['common_chats_count'];
$me_name = $me['first_name'];
$me_uname = $me['username'];
$mes = "𝐈𝐃» $me_id \n𝐍𝐚𝐦𝐞» $me_name \n𝐔𝐬𝐞𝐫𝐧𝐚𝐦𝐞» @$me_uname \n𝐒𝐭𝐚𝐭𝐮𝐬» $me_status \n𝐁𝐢𝐨» $me_bio \n𝐂𝐨𝐦𝐦𝐨𝐧 𝐆𝐫𝐨𝐮𝐩𝐬» $me_common";
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $mes]);
     }
 if(preg_match("/^[\/\#\!]?(block) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(block) (.*)$/i", $text, $m);
yield $MadelineProto->contacts->block(['id' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Sɪʀ Bʟᴏᴄᴋᴇᴅ!❌"]);
     }
 if(preg_match("/^[\/\#\!]?(unblock) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(unblock) (.*)$/i", $text, $m);
yield $MadelineProto->contacts->unblock(['id' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "Sɪʀ Uɴʙʟᴏᴄᴋᴇᴅ!"]);
     }
 if(preg_match("/^[\/\#\!]?(checkusername) (@.*)$/i", $text)){
preg_match("/^[\/\#\!]?(checkusername) (@.*)$/i", $text, $m);
$check = yield $MadelineProto->account->checkUsername(['username' => str_replace("@", "", $m[2])]);
if($check == false){
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "E͎x͎i͎s͎t͎☂"]);
} else{
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᖴᖇEE✔"]);
}
     }
 if(preg_match("/^[\/\#\!]?(setfirstname) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(setfirstname) (.*)$/i", $text, $m);
yield $MadelineProto->account->updateProfile(['first_name' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐓𝐚𝐬𝐤 𝐃𝐨𝐧𝐞🔰"]);
     }
 if(preg_match("/^[\/\#\!]?(setlastname) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(setlastname) (.*)$/i", $text, $m);
yield $MadelineProto->account->updateProfile(['last_name' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐓𝐚𝐬𝐤 𝐃𝐨𝐧𝐞🔰"]);
     }
 if(preg_match("/^[\/\#\!]?(setbio) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(setbio) (.*)$/i", $text, $m);
yield $MadelineProto->account->updateProfile(['about' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐓𝐚𝐬𝐤 𝐃𝐨𝐧𝐞🔰"]);
     }
 if(preg_match("/^[\/\#\!]?(setusername) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(setusername) (.*)$/i", $text, $m);
yield $MadelineProto->account->updateUsername(['username' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐓𝐚𝐬𝐤 𝐃𝐨𝐧𝐞🔰"]);
     }
 if(preg_match("/^[\/\#\!]?(join) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(join) (.*)$/i", $text, $m);
yield $MadelineProto->channels->joinChannel(['channel' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝕁𝕠𝕚𝕟𝕖𝕕..."]);
     }
 if(preg_match("/^[\/\#\!]?(leave)$/i", $text)){
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝕃𝕖𝕒𝕧𝕖𝕕..."]);
yield $MadelineProto->channels->leaveChannel(['channel' => $message['to_id']]);
     }
     if ($text == "/fakecard" or $text == "کارت") {
                              $link = json_decode(file_get_contents("https://api.codebazan.ir/visa-card/"), true);
                                   $visa = $link["Result"];
                                   $visa2 = $visa[rand(0,46)];
                                   $name = $visa2["name"];
                                   $lname = $visa2["lastname"];
                                   $adres = $visa2["Address"];
                                   $vcity = $visa2["City"];
                                   $state = $visa2["State"];
                                   $post = $visa2["Postalcode"];
                                   $country = $visa2["Country"];
                                   $brithday = $visa2["birthday"];
                                   $cardt = $visa2["cardtype"];
                                    $cardn = $visa2["cardnumber"];
                                    $cvv = $visa2["CVV2"];
                                     $date = $visa2["Expirationdate"];
                                     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "
𝙵𝚒𝚛𝚜𝚝 𝙽𝚊𝚖𝚎 ⇴ $name 💀
𝙻𝚊𝚜𝚝 𝙽𝚊𝚖𝚎 ⇴  $lname 🤠
𝙲𝚘𝚞𝚗𝚝𝚛𝚢 ⇴ $country 🌎
𝙰𝚍𝚍𝚛𝚎𝚜𝚜 ⇴ $adres 📮
𝙲𝚒𝚝𝚢 ⇴ $vcity 🏛
𝙿𝚘𝚜𝚝𝚊𝚕 𝙲𝚘𝚍𝚎 ⇴ $post 🖨
𝙲𝚘𝚗𝚍𝚒𝚝𝚒𝚘𝚗 ⇴ $state 🛒
𝙲𝚊𝚛𝚍 ⇴ $cardt 💻
𝙲𝚊𝚛𝚍 𝙽𝚞𝚖𝚋𝚎𝚛 ⇴ $cardn 🔓
𝙲𝚅𝚅𝟸 ⇴ $cvv 😇
𝙴𝚡𝚙𝚒𝚛𝚊𝚝𝚒𝚘𝚗 𝙳𝚊𝚝𝚊 ⇴ $date ❌
                                     "]);
}

 if(preg_match("/^[\/\#\!]?(delanswer) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(delanswer) (.*)$/i", $text, $m);
$txxt = $m[2];
if(isset($data['answering'][$txxt])){
unset($data['answering'][$txxt]);
file_put_contents("data.json", json_encode($data));
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "⫸ کلمه از لیست پاسخ های شما حذف شد 👍"]);
} else{
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "⩥ این کلمه در لیست پاسخ های شما موجود نیست😐"]);
}
     }
 if(preg_match("/^[\/\#\!]?(clean answers)$/i", $text)){
$data['answering'] = [];
file_put_contents("data.json", json_encode($data));
$MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' => "✞☬♥ لیست پاسخ ها پاکسازی شد ♥☬✞"]);
     }
 if(preg_match("/^[\/\#\!]?(setenemy) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(setenemy) (.*)$/i", $text, $m);
$mee = yield $MadelineProto->get_full_info($m[2]);
$me = $mee['User'];
$me_id = $me['id'];
$me_name = $me['first_name'];
if(!in_array($me_id, $data['enemies'])){
$data['enemies'][] = $me_id;
file_put_contents("data.json", json_encode($data));
yield $MadelineProto->contacts->block(['id' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "$me_name 𝔾𝕖𝕥 𝕚𝕟𝕥𝕠 𝔼ℕ𝔼𝕄𝕐 𝕃𝕚𝕤𝕥✨"]);
} else {
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝕌𝕤𝕖𝕣 𝕚𝕤 𝔸𝕝𝕣𝕖𝕒𝕕𝕪 𝕚𝕟 𝕥𝕙𝕖 𝕝𝕚𝕤𝕥 𝕠𝕗 𝕖𝕟𝕖𝕞𝕚𝕖𝕤🤨"]);
}
     }
 if(preg_match("/^[\/\#\!]?(delenemy) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(delenemy) (.*)$/i", $text, $m);
$mee = yield $MadelineProto->get_full_info($m[2]);
$me = $mee['User'];
$me_id = $me['id'];
$me_name = $me['first_name'];
if(in_array($me_id, $data['enemies'])){
$k = array_search($me_id, $data['enemies']);
unset($data['enemies'][$k]);
file_put_contents("data.json", json_encode($data));
yield $MadelineProto->contacts->unblock(['id' => $m[2]]);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "$me_name DᴇLᴇTᴇD FʀOᴍ EɴEᴍY LɪSᴛ💩"]);
} else{
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "TʜIꜱ UꜱEʀ WᴀSɴ'T Iɴ EɴEᴍY LɪSᴛ👨‍🦯"]);
}
     }
 if(preg_match("/^[\/\#\!]?(clean enemylist)$/i", $text)){
$data['enemies'] = [];
file_put_contents("data.json", json_encode($data));
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "єηємуℓιѕт ιѕ ησω ємρту🧹"]);
     }
 if(preg_match("/^[\/\#\!]?(enemylist)$/i", $text)){
if(count($data['enemies']) > 0){
$txxxt = "⇱ ᴇɴᴇᴍʏʟɪꜱᴛ ⇲
";
$counter = 1;
foreach($data['enemies'] as $ene){
  $mee = yield $MadelineProto->get_full_info($ene);
  $me = $mee['User'];
  $me_name = $me['first_name'];
  $txxxt .= "$counter: $me_name \n";
  $counter++;
}
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => $txxxt]);
} else{
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "⛧ 𝒩𝑜 𝐸𝓃𝑒𝓂𝓎 ⛧"]);
}
     }
     if(preg_match("/^[\/\#\!]?(lockpv) (on|off)$/i", $text)){
          preg_match("/^[\/\#\!]?(lockpv) (on|off)$/i", $text, $m);
          $data['lockpv'] = $m[2];
          file_put_contents("data.json", json_encode($data));
          $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᒪOᑕK ᑭᐯ 🔐ᗰOᗪE ᑎOᗯ $m[2]"]);
        }
     if(preg_match("/^[\/\#\!]?(gaming) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(gaming) (on|off)$/i", $text, $m);
     $data['gaming'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "GᗩᗰIᑎG 🎮ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
     if(preg_match("/^[\/\#\!]?(gamepv) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(gamepv) (on|off)$/i", $text, $m);
     $data['gamepv'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "GᗩᗰIᑎGᑭᐯ 🗽ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
     if(preg_match("/^[\/\#\!]?(photo) (on|off)$/i", $text)){
          preg_match("/^[\/\#\!]?(photo) (on|off)$/i", $text, $m);
          $data['photo'] = $m[2];
          file_put_contents("data.json", json_encode($data));
                $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᑭᕼOTO SEᑎᗪIᑎG 🖼ᗰOᗪE ᑎOᗯ $m[2]"]);
               }
               if(preg_match("/^[\/\#\!]?(loc) (on|off)$/i", $text)){
                    preg_match("/^[\/\#\!]?(loc) (on|off)$/i", $text, $m);
                    $data['loc'] = $m[2];
                    file_put_contents("data.json", json_encode($data));
                          $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᒪOᑕᗩTIOᑎ SEᑎᗪIᑎG 🥂ᗰOᗪE ᑎOᗯ $m[2]"]);
                         }
                         if(preg_match("/^[\/\#\!]?(file) (on|off)$/i", $text)){
                              preg_match("/^[\/\#\!]?(file) (on|off)$/i", $text, $m);
                              $data['file'] = $m[2];
                              file_put_contents("data.json", json_encode($data));
                                    $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᖴIᒪE SEᑎᗪIᑎG 📦ᗰOᗪE ᑎOᗯ $m[2]"]);
                                   }
     if(preg_match("/^[\/\#\!]?(audio) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(audio) (on|off)$/i", $text, $m);
     $data['audio'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᗩᑌᗪIO SEᑎᗪIᑎG 🎙ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
     if(preg_match("/^[\/\#\!]?(video) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(video) (on|off)$/i", $text, $m);
     $data['video'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᐯIᗪEO 🎬SEᑎᗪIᑎG ᗰOᗪE ᑎOᗯ $m[2]"]);
     }

     if(preg_match("/^[\/\#\!]?(proactions) (on|off)$/i", $text)){
     preg_match("/^[\/\#\!]?(proactions) (on|off)$/i", $text, $m);
     $data['proactions'] = $m[2];
     file_put_contents("data.json", json_encode($data));
     $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ᑭᖇOᗩᑕTIOᑎS 🎰ᗰOᗪE ᑎOᗯ $m[2]"]);
     }
 if(preg_match("/^[\/\#\!]?(flood) ([0-9]+) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(flood) ([0-9]+) (.*)$/i", $text, $m);
$count = $m[2];
$txt = $m[3];
$spm = "";
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜰʟᴏᴏᴅɪɴɢ ⁅ $m[3] ⁆ ᴛɪᴍᴇꜱ ᴡᴏʀᴅ ⁅ $m[2] ⁆ ɴᴏᴡ :-)",'parse_mode'=>"MarkDown"]);
for($i=1; $i <= $count; $i++){
$spm .= " $txt \n";
}
$MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => $spm]);
     }
 if(preg_match("/^[\/\#\!]?(spam) ([0-9]+) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(spam) ([0-9]+) (.*)$/i", $text, $m);
$count = $m[2];
$txt = $m[3];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴘᴀᴍɪɴɢ ⁅ $m[3] ⁆ ᴛɪᴍᴇꜱ ᴡᴏʀᴅ ⁅ $m[2] ⁆ ɴᴏᴡ :-)",'parse_mode'=>"MarkDown"]);
for($i=1; $i <= $count; $i++){
$MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => " $txt "]);
}
     }
 if(preg_match("/^[\/\#\!]?(music) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(music) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ᴍᴜꜱɪᴄ ᴡɪᴛʜ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@melobot", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
     if(preg_match("/^[\/\#\!]?(koksal) (.*)$/i", $text)){
     preg_match("/^[\/\#\!]?(koksal) (.*)$/i", $text, $m);
     $mu = $m[2];
     yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ᴋᴏᴋꜱᴀʟɢɪꜰ ᴡɪᴛʜ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
     $messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@G_ifBot", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
     $query_id = $messages_BotResults['query_id'];
     $query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
     yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(wiki) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(wiki) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇᴀʀᴄʜɪɴɢ ꜰᴏʀ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɪɴ ᴡɪᴋɪᴘᴇᴅɪᴀ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@wiki", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(youtube) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(youtube) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇᴀʀᴄʜɪɴɢ ꜰᴏʀ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɪɴ ʏᴏᴜᴛᴜʙᴇ ʙᴏᴛ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@uVidBot", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(pic) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(pic) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ᴘɪᴄᴛᴜʀᴇ ᴡɪᴛʜ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@pic", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(voice) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(voice) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ᴠᴏɪᴄᴇ ᴡɪᴛʜ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@Persian_Meme_Bot", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(gif) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(gif) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ɢɪꜰ ᴡɪᴛʜ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@gif", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(google) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(google) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ꜱᴇᴀʀᴄʜɪɴɢ ꜰᴏʀ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɪɴ ɢᴏᴏɢʟᴇ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@GoogleDEBot", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][rand(0, count($messages_BotResults['results']))]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(joke)$/i", $text)){
preg_match("/^[\/\#\!]?(joke)$/i", $text, $m);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@function_robot", 'peer' => $peer, 'query' => '', 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][0]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(like) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(like) (.*)$/i", $text, $m);
$mu = $m[2];
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ʟɪᴋᴇ ᴘᴀɴᴇʟ ᴡɪᴛʜ ⁅ $m[2] ⁆ ᴡᴏʀᴅ ɴᴏᴡ :-) ",'parse_mode'=>"MarkDown"]);
$messages_BotResults = yield $MadelineProto->messages->getInlineBotResults(['bot' => "@like", 'peer' => $peer, 'query' => $mu, 'offset' => '0']);
$query_id = $messages_BotResults['query_id'];
$query_res_id = $messages_BotResults['results'][0]['id'];
yield $MadelineProto->messages->sendInlineBotResult(['silent' => true, 'background' => false, 'clear_draft' => true, 'peer' => $peer, 'reply_to_msg_id' => $message['id'], 'query_id' => $query_id, 'id' => "$query_res_id"]);
     }
 if(preg_match("/^[\/\#\!]?(search) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(search) (.*)$/i", $text, $m);
$q = $m[2];

$res_search = yield $MadelineProto->messages->search(['peer' => $peer, 'q' => $q, 'filter' => ['_' => 'inputMessagesFilterEmpty'], 'min_date' => 0, 'max_date' => time(), 'offset_id' => 0, 'add_offset' => 0, 'limit' => 50, 'max_id' => $message['id'], 'min_id' => 1]);
$texts_count = count($res_search['messages']);
$users_count = count($res_search['users']);
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "𝐌𝐬𝐠𝐬 𝐅𝐨𝐮𝐧𝐝» $texts_count \n𝐅𝐫𝐨𝐦 𝐔𝐬𝐞𝐫𝐬 ??𝐨𝐮𝐧𝐭» $users_count"]);
foreach($res_search['messages'] as $text){
$textid = $text['id'];
yield $MadelineProto->messages->forwardMessages(['from_peer' => $text, 'to_peer' => $peer, 'id' => [$textid]]);
 }
}
     if(preg_match("/^[\/\#\!]?(cleans)(.*)$/i", $text)){
preg_match("/^[\/\#\!]?(cleans)(.*)$/i", $text);
     if(!isset($update['update']['message']['reply_to_msg_id'])){
     $del = str_replace("cleans","",$text);
     if(is_numeric($del)){
     for($i = $msg_id -1; $i>=$msg_id -1-$del;$i--){
          $MadelineProto->channels->deleteMessages(['channel' => $peer, 'id' => [$i], ]);
     //$MadelineProto->messages->deleteMessages(['peer' => $peer, 'id' => [$i]]);
     }
     $ed = $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>"$del پیام با موفقیت پاکسازی شدند ✅ ", 'parse_mode' => 'HTML' ]);
     }else{
     $ed = $MadelineProto->messages->editMessage(['peer' => $peer, 'id' => $msg_id, 'message' =>"...یک عدد وارد کنید ", 'parse_mode' => 'HTML' ]);
     }
     }
     }

 else if(preg_match("/^[\/\#\!]?(weather) (.*)$/i", $text)){
preg_match("/^[\/\#\!]?(weather) (.*)$/i", $text, $m);
$query = $m[2];
$url = json_decode(file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$query."&appid=eedbc05ba060c787ab0614cad1f2e12b&units=metric"), true);
$city = $url["name"];
$deg = $url["main"]["temp"];
$type1 = $url["weather"][0]["main"];
if($type1 == "Clear"){
		$tpp = 'آفتابی☀';
		file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Clouds"){
		$tpp = 'ابری ☁☁';
		file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Rain"){
		 $tpp = 'بارانی ☔';
file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Thunderstorm"){
		$tpp = 'طوفانی ☔☔☔☔';
file_put_contents('type.txt',$tpp);
	}
	elseif($type1 == "Mist"){
		$tpp = 'مه 💨';
file_put_contents('type.txt',$tpp);
	}
  if($city != ''){
$ziro = file_get_contents('type.txt');
  $txt = "دمای شهر $city هم اکنون $deg درجه سانتی گراد می باشد

شرایط فعلی آب و هوا: $ziro";
$MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>  $txt]);
unlink('type.txt');
}else{
 $txt = "⚠️ مکان شهر مورد نظر شما يافت نشد ⚠️";
 $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' =>  $txt]);
 }
}
  else if(preg_match("/^[\/\#\!]?(sessions)$/i", $text)){
    yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ⁅ 𝚂𝚎𝚜𝚜𝚒𝚘𝚗𝚜 ⁆ ᴏꜰ ᴀᴄᴄᴏᴜɴᴛ ɴᴏᴡ :-)",'parseMarkDown_mode'=>""]);
$authorizations = yield $MadelineProto->account->getAuthorizations();
$txxt="";
foreach($authorizations['authorizations'] as $authorization){
$txxt .="┈┅┅━━━━↯━━━━┅┅┈
هش: ".$authorization['hash']."
مدل دستگاه: ".$authorization['device_model']."
سیستم عامل: ".$authorization['platform']."
ورژن سیستم: ".$authorization['system_version']."
api_id: ".$authorization['api_id']."
app_name: ".$authorization['app_name']."
نسخه برنامه: ".$authorization['app_version']."
تاریخ ایجاد: ".date("Y-m-d H:i:s",$authorization['date_active'])."
تاریخ فعال: ".date("Y-m-d H:i:s",$authorization['date_active'])."
آی‌پی: ".$authorization['ip']."
کشور: ".$authorization['country']."
منطقه: ".$authorization['region']."

┈┅┅━━━━↯━━━━┅┅┈";
}
     }
 if(preg_match("/^[\/\#\!]?(gpinfo)$/i", $text)){
yield $MadelineProto->messages->editMessage(['peer' => $peer,'id' => $msg_id,'message' => "ɢᴇᴛᴛɪɴɢ ɪɴꜰᴏ ᴏꜰ ⁅ $peer_title ⁆ ɢʀᴏᴜᴘ ɴᴏᴡ :-)",'parseMarkDown_mode'=>""]);
$peer_inf = yield $MadelineProto->get_full_info($message['to_id']);
$peer_info = $peer_inf['Chat'];
$peer_id = $peer_info['id'];
$peer_title = $peer_info['title'];
$peer_type = $peer_inf['type'];
$peer_count = $peer_inf['full']['participants_count'];
$des = $peer_inf['full']['about'];
$mes = "𝐈𝐃» $peer_id \n𝐓𝐢𝐭𝐥𝐞» $peer_title \n𝐓𝐲𝐩𝐞» $peer_type \n𝐌𝐞𝐦𝐛𝐞𝐫𝐬 𝐂𝐨𝐮𝐧𝐭» $peer_count \n𝐁𝐢𝐨» $des";
$MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => $mes]);
     }
   }
 if($data['power'] == "on"){
   if ($from_id !=$paradox) {
   if($message && $data['typing'] == "on" && $update['_'] == "updateNewChannelMessage"){
$sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageTypingAction]);
     }
     if( $data['gaming'] == "on" && $update['_'] == "updateNewChannelMessage"){
     $sendMessageGamePlayAction = ['_' => 'sendMessageGamePlayAction'];
     yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageGamePlayAction]);
     }
     if( $data['gamepv'] == "on"){
      $sendMessageGamePlayAction = ['_' => 'sendMessageGamePlayAction'];
      yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageGamePlayAction]);
      }
     if($data['photo'] == "on" && $update['_'] == "updateNewChannelMessage"){
          $sendMessageUploadPhotoAction = ['_' => 'sendMessageUploadPhotoAction', 'progress' => 85];
          yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageUploadPhotoAction]);
          }
          if( $data['file'] == "on" && $update['_'] == "updateNewChannelMessage"){
               $sendMessageUploadDocumentAction = ['_' => 'sendMessageUploadDocumentAction', 'progress' => 85];
               yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageUploadDocumentAction]);
               }
               if( $data['loc'] == "on" && $update['_'] == "updateNewChannelMessage"){
                    $sendMessageGeoLocationAction = ['_' => 'sendMessageGeoLocationAction'];
                    yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageGeoLocationAction]);
                    }
     if($data['video'] == "on" && $update['_'] == "updateNewChannelMessage"){
     $sendMessageRecordRoundAction = ['_' => 'sendMessageRecordRoundAction'];
     yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageRecordRoundAction]);
     }
     if($data['audio'] == "on" && $update['_'] == "updateNewChannelMessage"){
     $sendMessageRecordAudioAction = ['_' => 'sendMessageRecordAudioAction'];
     yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageRecordAudioAction]);
     }
     if($message && $data['echo'] == "on"){
yield $MadelineProto->messages->forwardMessages(['from_peer' => $peer, 'to_peer' => $peer, 'id' => [$message['id']]]);
     }
     if($message && $data['markread'] == "on"){
if(intval($peer) < 0){
yield $MadelineProto->channels->readHistory(['channel' => $peer, 'max_id' => $message['id']]);
yield $MadelineProto->channels->readMessageContents(['channel' => $peer, 'id' => [$message['id']] ]);
} else{
yield $MadelineProto->messages->readHistory(['peer' => $peer, 'max_id' => $message['id']]);
}
     }
if($data['proactions'] == "on" && $update['_'] == "updateNewChannelMessage"){
        $sendMessageTypingAction = ['_' => 'sendMessageTypingAction'];
        $sendMessageGamePlayAction = ['_' => 'sendMessageGamePlayAction'];
        $sendMessageRecordVideoAction = ['_' => 'sendMessageRecordVideoAction'];
        $sendMessageRecordAudioAction = ['_' => 'sendMessageRecordAudioAction'];
        $sendMessageUploadDocumentAction = ['_' => 'sendMessageUploadDocumentAction'];
        $sendMessageUploadPhotoAction = ['_' => 'sendMessageUploadPhotoAction'];
        $sendMessageGeoLocationAction = ['_' => 'sendMessageGeoLocationAction'];
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageTypingAction]);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageGamePlayAction]);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageGeoLocationAction]);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageRecordVideoAction]);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageRecordAudioAction]);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageUploadDocumentAction]);
yield $MadelineProto->sleep(1);
yield $MadelineProto->messages->setTyping(['peer' => $peer, 'action' => $sendMessageUploadPhotoAction]);
yield $MadelineProto->sleep(1);
    }
if($type3 == 'user'){
if($text == $text and $data['lockpv'] == "on"){
     yield $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => "در حال حاضر پیویم قفله 🔒 و به همین دلیل شما بلاک میشید، در صورت تمایل صاحب اکانت شما رفع بلاک خواهید شد🎈🤖"]);
     yield $MadelineProto->messages->sendMessage(['peer' => $para, 'message' => "سرورم👑، کاربر $peer به دلیل فعال بودن حالت قفل پیوی و مزاحمت در ساعت خاص😎😅 بلاک شد"]);

      yield $MadelineProto->contacts->block(['id' => $peer]);
          }
}
       if(strpos($text, '😐') !== false and $data['poker'] == "on") {
           $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '😐😑😐', 'reply_to_msg_id' => $message['id']]);
       }
       if(strpos($text, '😂') !== false and $data['funny'] == "on") {
           $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => '🤣😂🤣', 'reply_to_msg_id' => $message['id']]);
       }



       if ($type3 == "supergroup"){
       if ($from_id == "" and $comment['comment']== "on"){
  $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => 'اول', 'reply_to_msg_id' => $msg_id]);
}
       }
       
  $fohsh = [
  "گص کش","کس ننه","کص ننت","کس خواهر","کس خوار","کس خارت","کس ابجیت","کص لیس","ساک بزن","ساک مجلسی","ننه الکسیس","نن الکسیس","ناموستو گاییدم","ننه زنا","کس خل","کس مخ","کس مغز","کس مغذ","خوارکس","خوار کس","خواهرکس","خواهر کس","حروم زاده","حرومزاده","خار کس","تخم سگ","پدر سگ","پدرسگ","پدر صگ","پدرصگ","ننه سگ","نن سگ","نن صگ","ننه صگ","ننه خراب","تخخخخخخخخخ","نن خراب","مادر سگ","مادر خراب","مادرتو گاییدم","تخم جن","تخم سگ","مادرتو گاییدم","ننه حمومی","نن حمومی","نن گشاد","ننه گشاد","نن خایه خور","تخخخخخخخخخ","نن ممه","کس عمت","کس کش","کس بیبیت","کص عمت","کص خالت","کس بابا","کس خر","کس کون","کس مامیت","کس مادرن","مادر کسده","خوار کسده","تخخخخخخخخخ","ننه کس","بیناموس","بی ناموس","شل ناموس","سگ ناموس","ننه جندتو گاییدم باو ","چچچچ نگاییدم سیک کن پلیز D:","ننه حمومی","چچچچچچچ","لز ننع","ننه الکسیس","کص ننت","بالا باش","ننت رو میگام","کیرم از پهنا تو کص ننت","مادر کیر دزد","ننع حرومی","تونل تو کص ننت","کیر تک تک بکس تلع گلد تو کص ننت","کص خوار بدخواه","خوار کصده","ننع باطل","حروم لقمع","ننه سگ ناموس","منو ننت شما همه چچچچ","ننه کیر قاپ زن","ننع اوبی","ننه کیر دزد","ننه کیونی","ننه کصپاره","زنا زادع","کیر سگ تو کص نتت پخخخ","ولد زنا","ننه خیابونی","هیس بع کس حساسیت دارم","کص نگو ننه سگ که میکنمتتاااا","کص نن جندت","ننه سگ","ننه کونی","ننه زیرابی","بکن ننتم","ننع فاسد","ننه ساکر","کس ننع بدخواه","نگاییدم","مادر سگ","ننع شرطی","گی ننع","بابات شاشیدتت چچچچچچ","ننه ماهر","حرومزاده","ننه کص","کص ننت باو","پدر سگ","سیک کن کص ننت نبینمت","کونده","ننه ولو","ننه سگ","مادر جنده","کص کپک زدع","ننع لنگی","ننه خیراتی","سجده کن سگ ننع","ننه خیابونی","ننه کارتونی","تکرار میکنم کص ننت","تلگرام تو کس ننت","کص خوارت","خوار کیونی","پا بزن چچچچچ","مادرتو گاییدم","گوز ننع","کیرم تو دهن ننت","ننع همگانی","کیرم تو کص زیدت","کیر تو ممهای ابجیت","ابجی سگ","کس دست ریدی با تایپ کردنت چچچ","ابجی جنده","ننع سگ سیبیل","بده بکنیم چچچچ","کص ناموس","شل ناموس","ریدم پس کلت چچچچچ","ننه شل","ننع قسطی","ننه ول","دست و پا نزن کس ننع","ننه ولو","خوارتو گاییدم","محوی!؟","ننت خوبع!؟","کس زنت","شاش ننع","ننه حیاطی /:","نن غسلی","کیرم تو کس ننت بگو مرسی چچچچ","ابم تو کص ننت :/","فاک یور مادر خوار سگ پخخخ","کیر سگ تو کص ننت","کص زن","ننه فراری","بکن ننتم من باو جمع کن ننه جنده /:::","ننه جنده بیا واسم ساک بزن","حرف نزن که نکنمت هااا :|","کیر تو کص ننت😐","کص کص کص ننت😂","کصصصص ننت جووون","سگ ننع","کص خوارت","کیری فیس","کلع کیری","تیز باش سیک کن نبینمت","فلج تیز باش چچچ","بیا ننتو ببر","بکن ننتم باو ","کیرم تو بدخواه","چچچچچچچ","ننه جنده","ننه کص طلا","ننه کون طلا","کس ننت بزارم بخندیم!؟","کیرم دهنت","مادر خراب","ننه کونی","هر چی گفتی تو کص ننت خخخخخخخ","کص ناموست بای","کص ننت بای ://","کص ناموست باعی تخخخخخ","کون گلابی!","ریدی آب قطع","کص کن ننتم کع","نن کونی","نن خوشمزه","ننه لوس"," نن یه چشم ","ننه چاقال","ننه جینده","ننه حرصی ","نن لشی","ننه ساکر","نن تخمی","ننه بی هویت","نن کس","نن سکسی","نن فراری","لش ننه","سگ ننه","شل ننه","ننه تخمی","ننه تونلی","ننه کوون","نن خشگل","نن جنده","نن ول ","نن سکسی","نن لش","کس نن ","نن کون","نن رایگان","نن خاردار","ننه کیر سوار","نن پفیوز","نن محوی","ننه بگایی","ننه بمبی","ننه الکسیس","نن خیابونی","نن عنی","نن ساپورتی","نن لاشخور","ننه طلا","ننه عمومی","ننه هر جایی","نن دیوث","تخخخخخخخخخ","نن ریدنی","نن بی وجود","ننه سیکی","ننه کییر","نن گشاد","نن پولی","نن ول","نن هرزه","نن دهاتی","ننه ویندوزی","نن تایپی","نن برقی","نن شاشی","ننه درازی","شل ننع","یکن ننتم که","کس خوار بدخواه","آب چاقال","ننه جریده","ننه سگ سفید","آب کون","ننه 85","ننه سوپری","بخورش","کس ن","خوارتو گاییدم","خارکسده","گی پدر","آب چاقال","زنا زاده","زن جنده","سگ پدر","مادر جنده","ننع کیر خور","چچچچچ","تیز بالا","ننه سگو با کسشر در میره","کیر سگ تو کص ننت","kos kesh","kir","kiri","nane lashi","kos","kharet","blis kirmo","دهاتی","کیرم لا کص خارت","کیری","ننه لاشی","ممه","کص","کیر","بی خایه","ننه لش","بی پدرمادر","خارکصده","مادر جنده","کصکش","کیرم کون مادرت😂😂😂😂","بالا باش کیرم کص مادرت😂😂😂","مادرتو میگام نوچه جون بالا😂😂😂","اب خارکصته تند تند تایپ کن ببینم","مادرتو میگام بخای فرار کنی","لال شو دیگه نوچه","مادرتو میگام اف بشی","کیرم کون مادرت","کیرم کص مص مادرت بالا","کیرم تو چشو چال مادرت","کون مادرتو میگام بالا","بیناموس  خسته شدی؟","نبینم خسته بشی بیناموس","ننتو میکنم","کیرم کون مادرت 😂😂😂😂😂😂😂","صلف تو کصننت بالا","بیناموس بالا باش بهت میگم","کیر تو مادرت","کص مص مادرتو بلیسم؟","کص مادرتو چنگ بزنم؟","به خدا کصننت بالا ","مادرتو میگام ","کیرم کون مادرت بیناموس","مادرجنده بالا باش","بیناموس تا کی میخای سطحت گح باشه","اپدیت شو بیناموس خز بود","ای تورک خر بالا ببینم","و اما تو بیناموس چموش","تو یکیو مادرتو میکنم","کیرم تو ناموصت ","کیر تو ننت","ریش روحانی تو ننت","کیر تو مادرت😂😂😂","کص مادرتو مجر بدم","صلف تو ننت","بات تو ننت ","مامانتو میکنم بالا","وای این تورک خرو","سطحشو نگا","تایپ کن بیناموس","خشاب؟","کیرم کون مادرت بالا","بیناموس نبینم خسته بشی","مادرتو بگام؟","گح تو سطحت شرفت رف","بیناموس شرفتو نابود کردم یه کاری کن","وای کیرم تو سطحت","بیناموس روانی شدی","روانیت کردما","مادرتو کردم کاری کن","تایپ تو ننت","بیپدر بالا باش","و اما تو لر خر","ننتو میکنم بالا باش","کیرم لب مادرت بالا😂😂😂","چطوره بزنم نصلتو گح کنم","داری تظاهر میکنی ارومی ولی مادرتو کوص کردم","مادرتو کردم بیغیرت","هرزه","وای خدای من اینو نگا","کیر تو کصننت","ننتو بلیسم","منو نگا بیناموس","کیر تو ننت بسه دیگه","خسته شدی؟","ننتو میکنم خسته بشی","وای دلم کون مادرت بگام","اف شو احمق","بیشرف اف شو بهت میگم","مامان جنده اف شو","کص مامانت اف شو","کص لش وا ول کن اینجوری بگو؟","ای بیناموس چموش","خارکوصته ای ها","مامانتو میکنم اف نشی","گح تو ننت","سطح یه گح صفتو","گح کردم تو نصلتا","چه رویی داری بیناموس","ناموستو کردم","رو کص مادرت کیر کنم؟😂😂??","نوچه بالا","کیرم تو ناموصتاا😂😂","یا مادرتو میگام یا اف میشی","لالشو دیگه","بیناموس","مادرکصته","ناموص کصده","وای بدو ببینم میرسی","کیرم کون مادرت چیکار میکنی اخه","خارکصته بالا دیگه عه","کیرم کصمادرت😂😂😂","کیرم کون ناموصد😂😂😂","بیناموس من خودم خسته شدم توچی؟","ای شرف ندار","مامانتو کردم بیغیرت","و اما مادر جندت","تو یکی زیر باش","اف شو","خارتو کوص میکنم","کوصناموصد","ناموص کونی","خارکصته ی بۍ غیرت","شرم کن بیناموس","مامانتو کرد ","ای مادرجنده","بیغیرت","کیرتو ناموصت","بیناموس نمیخای اف بشی؟","ای خارکوصته","لالشو دیگه","همه کس کونی","حرامزاده","مادرتو میکنم","بیناموس","کصشر","اف شو مادرکوصته","خارکصته کجایی","ننتو کردم کاری نمیکنی؟","کیرتو مادرت لال","کیرتو ننت بسه","کیرتو شرفت","مادرتو میگام بالا","کیر تو مادرت"
  ];
if(in_array($from_id, $data['enemies'])){
  $f = $fohsh[rand(0, count($fohsh)-1)];
  $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => $f, 'reply_to_msg_id' => $msg_id]);
}
if(isset($data['answering'][$text])){
  $MadelineProto->messages->sendMessage(['peer' => $peer, 'message' => $data['answering'][$text] , 'reply_to_msg_id' => $msg_id]);
    }
   }
  }
 }
} catch(\Exception $e){}	catch(\danog\MadelineProto\RPCErrorException $e){}
 }
}

// Madeline Tools
register_shutdown_function('shutdown_function', $lock);
closeConnection();
$MadelineProto->async(true);
$MadelineProto->loop(function () use ($MadelineProto) {
  yield $MadelineProto->setEventHandler('\EventHandler');
});
$MadelineProto->loop();
?>
