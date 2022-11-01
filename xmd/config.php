<?php 
//https://www.youtube.com/watch?v=qXvqvRX8vaE - شرح عن الوحة # 
$db_serveraddres = "localhost";
$db_username = "root";
$db_password = "0552851912";
$db_dbname = "test";

$conn = mysqli_connect($db_serveraddres, $db_username, $db_password , $db_dbname) or die("Error Not Connected To Database :(");


// لا تمسحها بتخرب الوحة ## 
$Rights = "xMD";




//Server Name : 
$xmd_ServerName = "MTA UCP";
$xmd_SmallServerName = "MTA";

if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}


//someSettings
$xmd_ManagerAdminLevelID = 2222;
$xmd_SupportOn = true; // do it false if not

if(isset($_COOKIE["connectInfo"])) {
	$sql = "SELECT * FROM accounts WHERE password='".(string)$_COOKIE["connectInfo"]."' ";
	 $query = mysqli_query($conn, $sql);
	 if (mysqli_num_rows($query) > 0){
		$row = mysqli_fetch_assoc($query);
		$name = $row["username"];
		
		$admin = $row["admin"];
		$accountID = $row["id"];
	
	 }else{
		unset($_COOKIE['connectInfo']); 
		setcookie('connectInfo', null, -1, '/'); 
	 }
}	


$query = "SELECT * FROM xmdSupport";
$result = mysqli_query($conn, $query);

if(empty($result)) {
	$query = "CREATE TABLE xmdSupport (
	ID int(11)	AUTO_INCREMENT,
	accountID varchar(255) NOT NULL,
	Date varchar(255) NOT NULL,
	accountName varchar(255) NOT NULL,
	xmd_Name varchar(255) NOT NULL,
	xmd_Age varchar(255) NOT NULL,
	xmd_Discord varchar(255) NOT NULL,
	xmd_isAnotherServer varchar(255) NOT NULL,
	xmd_WhyUS varchar(255) NOT NULL,
	xmd_WhereUS varchar(255) NOT NULL,
	xmd_AboutME varchar(255) NOT NULL,
	xmd_AboutRP varchar(255) NOT NULL,
	xmd_Status varchar(255) NOT NULL,
	xmd_Reason varchar(255) NOT NULL,
	xmd_Admin varchar(255) NOT NULL,
	PRIMARY KEY  (ID))";
	$result = mysqli_query($conn, $query);

}

				

?>