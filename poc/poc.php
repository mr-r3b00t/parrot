<html>
<head>
<title>Logon Page</title>
</head>
<body>
Loading...
<?php


$cip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];
echo $cip;

  define('MY_IP', 'https://ip.me');
  $myip = curl_init(MY_IP);
  curl_setopt($myip, CURLOPT_RETURNTRANSFER, true);
  $ip = curl_exec($myip);

  echo($ip);
  

 // Create a constant to store your Slack URL
  define('SLACK_WEBHOOK', 'https://hooks.slack.com/services/WEBOOOK');
  // Slack Message
$txtstr = ('Canary from pi: ');
$txt = ($txtstr . strval($ip) . ' Client IP:' . $cip . ' USER AGENT: ' . $agent);
  $message = array('payload' => json_encode(array('text' => $txt)));
  // Use curl
  $c = curl_init(SLACK_WEBHOOK);
  curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($c, CURLOPT_POST, true);
  curl_setopt($c, CURLOPT_POSTFIELDS, $message);
  curl_exec($c);
  curl_close($c);

echo 'Complete';

?>


</body>

</html>
