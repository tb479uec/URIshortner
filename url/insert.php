<?php
function newcode($s)
{
if(ord($s[1])==122)
{
$s[0]=chr(ord($s[0])+1);
$s[1]='a';
}
else
{
$s[1]=chr(ord($s[1])+1);
}
return $s;
}
$uri = $_POST['URL'];
echo $uri;
$db = mysqli_connect('127.0.0.1','root','ttt','urishortner');
if($db)
{
echo "correctly connected to Database urishortner";
}
$initcode = "SELECT `url` FROM `url` WHERE `code` = 'lastcode'";
$result1 = mysqli_query($db,$initcode);
$row1 = mysqli_fetch_array($result1);
$code = newcode($row1['url']);
$result2 = mysqli_query($db,"UPDATE `url` SET `url` = '$code' WHERE `code` = 'lastcode'");
$query = "INSERT INTO `url`(`code`, `url`) VALUES ('$code','$uri')";
$result = mysqli_query($db,$query);

if($result)
{
echo 'Your new url is: <a href="http://localhost/url/new1.php?i='.$code.'">http://localhost/url/new1.php?i='.$code.'</a>';
}
else{echo "error";}

?>