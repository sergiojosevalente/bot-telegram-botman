<?php

const CHAT_ID = '-844835074';
const BOT = '5814949504:AAH8SlHgDyYoM6bm229kSEE_vwSVHNoXA74';

const FILENAME = './public/getlastattached.txt';

// Create CURL object
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . BOT . "/sendDocument?chat_id=" . CHAT_ID);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

// Create CURLFile
$finfo = finfo_file(finfo_open(FILEINFO_MIME_TYPE), FILENAME);
$cFile = new CURLFile(FILENAME, $finfo);

// Add CURLFile to CURL request
curl_setopt($ch, CURLOPT_POSTFIELDS, [
    "document" => $cFile
]);

// Call
$result = curl_exec($ch);

// Show result and close curl
curl_close($ch);
