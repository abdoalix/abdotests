<?php 
 include 'config.php'; //by xmd 
//https://www.youtube.com/watch?v=qXvqvRX8vaE - شرح عن الوحة # 
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}

?>
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p><?php echo $xmd_ServerName; ?> </p>
    </div>
    <ul class="footer-end">
      <li><a href="##">Created By <?php echo $Rights?></a></li>
    </ul>
  </div>
</footer>
  </div>
</div>

<script>
	function logout(){
		var xmlhttp;
		  if(window.XMLHttpRequest){
			  xmlhttp = new XMLHttpRequest();
		  }else{
			  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  
		   xmlhttp.onreadystatechange = function(){
			  if(xmlhttp.readyState == 4 & xmlhttp.status == 200){
				location.reload()
			  }
		  }
		  
		  xmlhttp.open("POST","xmd/posts.php", true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send('logout');
		  
		  
	}
</script>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>

</html>