<?php
setcookie('theme', '', time() - 3600);
header('Location: index.php');
exit();
?>