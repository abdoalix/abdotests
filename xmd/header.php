
<?php include 'xmd/config.php'; 
//https://www.youtube.com/watch?v=qXvqvRX8vaE - شرح عن الوحة # 
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $xmd_ServerName; ?></title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <link rel="stylesheet" href="./css/style.min.css">
</head>

<?php 
if(!isset($_COOKIE["connectInfo"])) {
	header("Location: login.php");
	exit();
}	

?>

<style>

*{
	-webkit-user-select: none;  
  -moz-user-select: none;    
  -ms-user-select: none;      
  user-select: none;
}
</style>
<body class="darkmode">
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title"><?php echo $xmd_SmallServerName; ?></span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
				<span class="system-menu__title">Main</span>
                <li>
                    <a href="index.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
					<a href="characters.php"><span class="icon document" aria-hidden="true"></span>Characters</a>
				
                </li>
				 <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Submissions
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="s_submit.php">Apply Support</a>
                        </li>
                    </ul>
                </li>
                <li>
					 <a href="history.php"><span class="icon paper" aria-hidden="true"></span>History</a>
                </li>
           
			<?php if($admin>=$xmd_ManagerAdminLevelID){ ?>
			<span class="system-menu__title">Admins</span>
			 <li>
				<a class="show-cat-btn" href="##">
					<span class="icon folder" aria-hidden="true"></span>Submissions
					<span class="category__btn transparent-btn" title="Open list">
						<span class="sr-only">Open list</span>
					</span>
				</a>
				<ul class="cat-sub-menu">
					<li>
						<a href="a_submit.php">Supporters</a>
					</li>
				</ul>
			</li>
			<?php }?>
			 </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-01.png" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
				
                <span class="sidebar-user__title"><?php echo $name?></span>
            </div>
        </a>
    </div>
</aside>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg">
  <div class="container main-nav">
    <div class="main-nav-start">
    </div>
    <div class="main-nav-end">
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
      </button>
      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="./img/avatar/avatar-illustrated-02.png" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
        
          <li><a onclick="logout()" class="danger" href="##">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>