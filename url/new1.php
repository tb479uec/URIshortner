<?php
$uri = $_GET['i'];
echo $uri;
$db = mysqli_connect('127.0.0.1','root','ttt','urishortner');
if($db)
{
echo "correctly connected to Database urishortner";
}

$query = "SELECT `url` FROM `url` WHERE `code` = '$uri'";
$result = mysqli_query($db,$query);
$row = mysqli_fetch_array($result);
echo $row['url'];
if($row)
{
header('Location: http://'.$row['url']);
}
else{echo "lkdfhjlkdafh";}
?>