<?php
session_start();
$_COOKIE['mobile']='';
setcookie('mobile', '', time() + (86400 * 30), "/"); // 86400 = 1 day

echo '
<meta http-equiv="refresh" content="0; url=index.php">
';



?>