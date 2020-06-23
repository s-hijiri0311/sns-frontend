<?php

session_start();

$errorMessage = "";

/*$options = [
        'http' => [
            'method'  => 'GET',
            'timeout' => 3, // タイムアウト時間
        ]
    ];*/

if(isset($_POST["login"])) {
  $id = $_POST["username"];
  $pass = $_POST["password"];
  $_SESSION['pass']=$_POST["password"];
  $url = "http://ec2-3-115-14-119.ap-northeast-1.compute.amazonaws.com/api/login_api.php?name={$id}&pass={$pass}";
  $json = file_get_contents($url);
  $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

if ($json==false) {
  #header("Location:$url");
    echo 'パスワードかログインidが間違っています';
} else {
    $arr = json_decode($json,true);
    $_SESSION['user_id'] = $arr[0]{"user_id"};
    $_SESSION['user_name'] = $arr[0]{"user_name"};
    header("Location:http://localhost:8080/home.php");
    exit;
    ##$json = file_get_contents($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //URLの情報を取得する
    $res =  curl_exec($ch);

    #$json = file_get_contents($url);
    $res = mb_convert_encoding($res, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $res = preg_replace('/\\\\x([0-9a-f][0-9a-f])/i', '\\u00$1', $res);
    $arr = json_decode($json,true);
    $json2 = mb_convert_encoding($json2, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    $arr2= json_decode($json2,true);
    print_r($arr2);

    echo "<pre>";
    foreach((array)$arr2 as $v) {
      echo $v['user_id'];
      echo $v['user_name']."\n";
      echo $v['time']."\n";
      echo $v['message']."\n\n";
    }
    echo "</pre>";

    $_SESSION['user_id'] = $arr[0]{"user_id"};
    $_SESSION['user_name'] = $arr[0]{"user_name"};
    echo $_SESSION['user_id']."\n";
    echo $_SESSION['user_name']."\n\n";

    #header("Location:$url");
    #$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
    #$arr = json_decode($json,true);



    /*$id　= array();
    $parent_id = array();
    $message = array();
    $user_id = array();
    $user_name = array();
    $user_image = array();
    for($i=4;$i>=0;$i--){
        $id[$i] = $arr[$i]["id"];
        $parent_id[$i] = $arr[$i]["parent_id"];
        $message[$i] = $arr[$i]["message"];
        $user_id[$i] = $arr[$i]["user_id"];
        $user_name[$i] = $arr[$i]["user_name"];
        $user_image[$i] = $arr[$i]["user_image"];
        echo $user_name[$i];
        echo $message[$i];
    }*/

}
    #exit;
}

  /*if ($id == "") {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
        exit;
    } else if ($pass == "") {
        $errorMessage = 'パスワードが未入力です。';
        exit;
    }

  if (!$id == "" && !$pass == "") {
  header("Location:http://ec2-3-115-14-119.ap-northeast-1.compute.amazonaws.com/api.php?name={$id}&pass={$pass} ");
  exit;

}
  /*  if($_POST["username"] == "aaa" && $_POST["password"] == "aaa") {
        $_SESSION["username"] = $_POST["username"];
        $login_success_url = "http://ec2-3-115-14-119.ap-northeast-1.compute.amazonaws.com/index.php?name='username'&pass=55itolab!!";
        header("Location: {$login_success_url}");
        exit;
    }
print  "※ID、もしくはパスワードが間違っています。<br>　もう一度入力して下さい。";
}*/
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <tytle></title>
</head>
<body>

<h1>クラッチ</h1>
<form action"sample.php" method="POST">
  ユーザ名:<input type="text" name="username"><br>
  パスワード:<input type="password" name="password"><br>
  <input type="submit" name="login" value="ログイン">
</form>

</body>
</html>
