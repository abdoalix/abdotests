<?php include 'xmd/config.php';if(isset($_COOKIE["connectInfo"])) {	header("Location: index.php");	exit();}	
 if ($Rights !== "xMD"){	die("يرجي أرجاع الحقوق لـ xMD");	exit;}
 //by xmd -- > 
 ?>
 
 <!-- //by xmd --> 
<!DOCTYPE html><html lang="en">
 
 <!-- //by xmd --> 
<head>  <meta charset="UTF-8">  <meta http-equiv="X-UA-Compatible" content="IE=edge">  <meta name="viewport" content="width=device-width, initial-scale=1.0">  <title><?php echo $xmd_ServerName; ?></title>  <!-- Favicon -->  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">  <!-- Custom styles -->  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 
 <!-- //by xmd --> 
  <link rel="stylesheet" href="./css/style.min.css"></head>
 
 <!-- //by xmd --> 
<body class="darkmode">  <div class="layer"></div><main class="page-center">  <article class="sign-up">    <h1 class="sign-up__title"><?php echo $xmd_SmallServerName;?> Login Page</h1>    <form onsubmit="return false" class="sign-up-form form">      <label class="form-label-wrapper">        <p class="form-label">Username</p>        <input id="xmd_username" class="form-input" type="text" placeholder="Enter your username">      </label>      <label class="form-label-wrapper">        <p class="form-label">Password</p>        <input id="xmd_password" class="form-input" type="password" placeholder="Enter your password">      </label><br>      <button onclick="xmdLogin()" class="form-btn primary-default-btn transparent-btn">Sign in</button>    </form>  </article></main>
   <footer class="footer">  <div class="container footer--flex">    <div class="footer-start">      <p><?php echo $xmd_ServerName; ?> </p>    </div>    <ul class="footer-end">      <li><a href="##">Created By <?php echo $Rights?></a></li>    </ul>  </div></footer>
 <!-- //by xmd --> 
<script >	function xmdLogin(){		let username = document.getElementById("xmd_username").value;		let password = document.getElementById("xmd_password").value;				if (username.length >= 3) {			if (password.length >= 8) {				  var xmlhttp;                  if(window.XMLHttpRequest){                      xmlhttp = new XMLHttpRequest();                  }else{                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");                  }                  xmlhttp.onreadystatechange = function(){                      if(xmlhttp.readyState == 4 & xmlhttp.status == 200){						if (xmlhttp.responseText == "successfully logged in"){							location.reload()													}else{						  swal({							  text: xmlhttp.responseText,							  icon: "info",							  button: "Close",							});																													}                      }                  }                  xmlhttp.open("POST","xmd/posts.php", true);                  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");                  xmlhttp.send('loginUsername='+username+'&LoginPassword='+password);			}			else 			{				swal({				  title: "Error",				  text: "Password must be 8 characters or more",				  icon: "warning",				  button: "Close",				});					}		}		else		{			swal({			  title: "Error",			  text: "Account name must be 3 characters or more",			  icon: "warning",			  button: "Close",			});		}	}			</script>
 
 <!-- //by xmd -- > 
<!-- Chart library --><script src="./plugins/chart.min.js"></script><!-- Icons library --><script src="plugins/feather.min.js"></script><!-- Custom scripts --><script src="js/script.js"></script></body>
 
 <!-- //by xmd --> 
</html>