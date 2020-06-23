<?php
session_start();
    ?>
<?php ob_start();?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<h1>クラッチャット</h1>
</body>
</html>

<?php
echo $_SESSION['user_id']."\n";
echo $_SESSION['user_name']."\n\n";
$flag=0;
echo ($flag);
$url2 = "http://ec2-3-115-14-119.ap-northeast-1.compute.amazonaws.com/api/get_message_api.php?name={$_SESSION['user_name']}&pass={$_SESSION['pass']}";
$json2 = file_get_contents($url2);
$json2 = mb_convert_encoding($json2, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr2= json_decode($json2,true);
if($flag==0){
echo "<pre>";
foreach((array)$arr2 as $v) {
  echo $v['user_id'];
  echo $v['user_name']."\n";
  echo $v['time']."\n";
  echo $v['message']."\n\n";
}
echo "</pre>";
$flag=1;
}

if(isset($_POST["send"])) {
  $message = $_POST["message"];
  $url = "http://ec2-3-115-14-119.ap-northeast-1.compute.amazonaws.com/api/send_message_api.php?user_id={$_SESSION['user_id']}&pass={$_SESSION['pass']}&parent_id=0&message={$message}";
  $json = file_get_contents($url);
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr= json_decode($json,true);
 
  header("Location: " . $_SERVER['PHP_SELF']);

  /*$url2 = "http://ec2-3-115-14-119.ap-northeast-1.compute.amazonaws.com/api/get_message_api.php?name={$_SESSION['user_name']}&pass={$_SESSION['pass']}";
  $json2 = file_get_contents($url2);
  $json2 = mb_convert_encoding($json2, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
  $arr2= json_decode($json2,true);
  if($flag==1){
  echo "<pre>";
  foreach((array)$arr2 as $v) {
    echo $v['user_id'];
    echo $v['user_name']."\n";
    echo $v['time']."\n";
    echo $v['message']."\n\n";
  }
  echo "</pre>";
}*/
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>sample</title>
</head>
<body>
<form action="home.php" method="post">
  本文：<br />
  <textarea name="message" cols="30" rows="5"></textarea><br />
  <br />
  <input type="submit" name="send" value="送信する" />
</form>
</body>
</html>
