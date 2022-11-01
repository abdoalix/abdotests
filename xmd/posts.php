<?php 
 include 'config.php'; //by xmd 
//https://www.youtube.com/watch?v=qXvqvRX8vaE - شرح عن الوحة # 
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}

function isNotGood($text){
	if (strpos($text, '--') ) {
		return true;
	}elseif (strpos($text, '; //by xmd')) {
		return true;
	}elseif (strpos($text, 'DROP')) {
		return true;
	}elseif (strpos($text, '"') ) {
		return true;
	}elseif (strpos($text, '=') ) {
		return true;
	}else{
		return false;
	}
}
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}

if (isset($_POST['loginUsername'])){
	 $name = $_POST['loginUsername'];
	 $password = $_POST['LoginPassword'];
	 if (isNotGood($name) || isNotGood($password)) {
		echo "There are wrong entries"; //by xmd
		die;
	}
	 $sql = "SELECT * FROM `accounts` WHERE username='".$name."' "; //by xmd
	 $query = mysqli_query($conn, $sql);
	 if (mysqli_num_rows($query) > 0){
		$row = mysqli_fetch_assoc($query);
		$md5Password = strtolower(md5(strtolower(md5($password)).$row["salt"]));
		if($row["password"] == $md5Password){
			setcookie("connectInfo", $row["password"], time() + (86400 * 30), "/");
			echo 'successfully logged in'; //by xmd
		}else{
			echo 'Invaild Password For Account: '.$name;
		}
	 }else{
		 echo 'No Account found'; //by xmd
	 }
}
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}

if (isset($_POST['logout'])){
	if(isset($_COOKIE["connectInfo"])) {
		unset($_COOKIE['connectInfo']); 
		setcookie('connectInfo', null, -1, '/'); 
	}	
}
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}

if (isset($_POST['reviewApplyS'])){
	if($admin>=$xmd_ManagerAdminLevelID){
		$ID = $_POST['id'];
		$sql = "SELECT * FROM xmdSupport WHERE ID='".$ID."' "; //by xmd
			 $query = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($query) > 0){
				$_SESSION['XMD:SUPPORT:ID'] = $ID;
				echo 'APPFound'; //by xmd
			 }else{
				 echo 'No application found with id: '. $ID ; //by xmd
			 }
	}
}

if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}

if (isset($_POST['applySupport2'])){
	$username = $_POST['username'];
	$age = $_POST['age'];
	$discord = $_POST['discord'];
	$cServer = $_POST['cServer'];
	$howus = $_POST['howus'];
	$whyus = $_POST['whyus'];
	$aboutMe = $_POST['aboutMe'];
	$aboutRoleplay = $_POST['aboutRoleplay'];
	if (isNotGood($username) || isNotGood($age) || isNotGood($discord) || isNotGood($cServer) || isNotGood($howus) || isNotGood($whyus) || isNotGood($aboutMe) || isNotGood($aboutRoleplay)) {
		echo "There are wrong entries"; //by xmd
		die;
	}
	
	if (strlen($username)<=8){
		echo 'Please enter a valid Name!'; //by xmd //by xmd
	}elseif ($age<16){
		echo 'Please enter a valid Age!'; //by xmd //by xmd
	}elseif (strlen($discord)<=3){
		echo 'Please write you discord name'; //by xmd //by xmd
	}elseif (strlen($cServer)<=2){
		echo 'Please answer the question if you are admin in another server'; //by xmd //by xmd
	}elseif (strlen($howus)<=3){
		echo 'Please answer Why did you choose us?'; //by xmd //by xmd
	}elseif (strlen($whyus)<=3){
		echo 'Please answer Where do you know us?'; //by xmd //by xmd
	}elseif (strlen($aboutMe)<=30){
		echo 'Please write more about yourself'; //by xmd //by xmd
	}elseif (strlen($aboutRoleplay)<=20){
		echo 'Please write more about Roleplay'; //by xmd
	}else{
		//by xmd
		$sql = "SELECT * FROM xmdSupport WHERE accountID='".$accountID."'"; //by xmd
		 $query = mysqli_query($conn, $sql);
		 if (mysqli_num_rows($query) > 0){
		    $row = mysqli_fetch_assoc($query);
			if ($row['xmd_Status'] == 1 || $row['xmd_Status'] == 2){
			echo 'You already have another submission (ID): '. $row["ID"];
			die;
			}
		 }
	//by xmd
		
		$today = date('Y-m-d H:i:s');
		$sql = "INSERT INTO xmdSupport (accountID,Date,accountName,xmd_Name, xmd_Age, xmd_Discord,xmd_isAnotherServer,xmd_WhyUS,xmd_WhereUS,xmd_AboutME,xmd_AboutRP,xmd_Status,xmd_Reason,xmd_Admin) VALUES ('$accountID','$today','$name','$username', '$age', '$discord','$cServer','$howus','$whyus','$aboutMe','$aboutRoleplay','1','NULL','NULL')"; //by xmd
		
		//by xmd
		if ($conn->query($sql) === TRUE) {
		  echo "You have successfully applied"; //by xmd
		} else {
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}//by xmd
	}//by xmd
	//by xmd
}//by xmd

if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}


if (isset($_POST['app'])){//by xmd
	$id = $_POST['id'];//by xmd
	$state = $_POST['state'];//by xmd
	$reason = $_POST['reason'];//by xmd
	//by xmd
	$sql = "UPDATE xmdSupport SET xmd_Status='$state',xmd_Reason='$reason',xmd_Admin='$name' WHERE ID='$id'"; //by xmd
//by xmd
	if ($conn->query($sql) === TRUE) {//by xmd
	  echo "Record updated successfully"; //by xmd//by xmd
	} else {//by xmd
	  echo "Error updating record: " . $conn->error;
	}//by xmd
//by xmd
	//by xmd
}
//by xmd

if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}


?>