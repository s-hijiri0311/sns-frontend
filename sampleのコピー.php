
<?php

/* curlセッションを初期化する　*/
$ch = curl_init();

/* curlオプションを設定する */
curl_setopt($ch, CURLOPT_URL, "http://www.google.com/");

/* curlを実行する */
curl_exec($ch);

/* curlセッションを終了する */
curl_close($ch);
