
<?php
session_start();
$link = mysql_connect('localhost', 'root', 'tier5');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('affiliate_db', $link);
return $link;
?>
