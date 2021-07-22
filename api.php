<?php
error_reporting(false);
header('Content-type: application/json;');
$urll = $_GET['url'];
$array = json_decode(file_get_contents("https://api.ocr.space/parse/imageurl?apikey=eb18cc1eca88957&url=$urll&language=eng&detectOrientation=True&filetype=JPG&OCREngine=1&isTable=True&scale=True"), true);
$result = $array['ParsedResults'][0]['ParsedText'];

echo $result;
