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
// "urishortner" is name of database
//connecting to database named urishortner
$db = mysqli_connect('127.0.0.1','root','ttt','urishortner');
if(!$db)
{
echo "Connection error to Database urishortner";
}

// first url is the url of website to be shortened
// second url is the table name
// code is the unique alphabet code for every website


// here it fetches the last code assignned to the recently registered website
$initcode = "SELECT `url` FROM `url` WHERE `code` = 'lastcode'";
$result1 = mysqli_query($db,$initcode);
$row1 = mysqli_fetch_array($result1);
$code = newcode($row1['url']);

// updating the last assigned code to the new value for future refrence
$result2 = mysqli_query($db,"UPDATE `url` SET `url` = '$code' WHERE `code` = 'lastcode'");

// inserting the newly registered website and the code generated for it
$query = "INSERT INTO `url`(`code`, `url`) VALUES ('$code','$uri')";
$result = mysqli_query($db,$query);

if($result)
{
echo 'Your new url is: <a href="http://localhost/url/j/'.$code.'">http://localhost/url/j/'.$code.'</a>';
}
else{echo "error";}

?>