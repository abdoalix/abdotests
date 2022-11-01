
<?php include 'xmd/header.php'; ?>
<?php 
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
?>
<?php if ($xmd_SupportOn){ ?>

<style>
 .xmdTexArea{
    background-color: #222235 !important;
    color: #d6d7e3;
	    border-radius: 8px;
    border-width: 0;
    margin-bottom: 15px;
    padding: 5px 16px;
    height: 44px;
    background: #eff0f6;
 }
 
 ::placeholder {
  color: #eff0f6;
  opacity: 1; /* Firefox */
}
</style>

<script >
	function applySupport2(){
		let username = document.getElementById("xmd_username").value;
		let age = document.getElementById("xmd_age").value;
		let discord = document.getElementById("xmd_discord").value;
		let cServer = document.getElementById("xmd_cServer").value;
		let howus = document.getElementById("xmd_howus").value;
		let whyus = document.getElementById("xmd_whyus").value;
		let aboutMe = document.getElementById("xmd_aboutMe").value;
		let aboutRoleplay = document.getElementById("xmd_aboutRoleplay").value;
		
		 var xmlhttp;
		  if(window.XMLHttpRequest){
			  xmlhttp = new XMLHttpRequest();
		  }else{
			  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange = function(){
			  if(xmlhttp.readyState == 4 & xmlhttp.status == 200){
				  swal({
					  text: xmlhttp.responseText,
					  icon: "info",
					  button: "Close",
					});
			  }
		  }

		  xmlhttp.open("POST","xmd/posts.php", true);
		  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		  xmlhttp.send('applySupport2=true&username='+username+'&age='+age+'&discord='+discord+'&cServer='+cServer+'&howus='+howus+'&whyus='+whyus+'&aboutMe='+aboutMe+'&aboutRoleplay='+aboutRoleplay);
	}
	
</script>

  <div class="layer"></div>
  
<main class="page-center" >
	 <h2 class="main-title">Support Apply </h2>

  <article class="sign-up">
    <form onsubmit="return false" class="sign-up-form form">
      <label class="form-label-wrapper" style="    display: block !important;">
        <input id="xmd_username" class="form-input" type="text" placeholder="Enter your Name"> 
        <input id="xmd_age" class="form-input" type="number" placeholder="Enter your Age">
        <input id="xmd_discord" class="form-input" type="text" placeholder="Enter your DiscordName">
		<hr>
        <input id="xmd_cServer" class="form-input" type="text" placeholder="Do you admin in another server?">
        <input id="xmd_howus" class="form-input" type="text" placeholder="Why did you choose us?">
        <input id="xmd_whyus" class="form-input" type="text" placeholder="Where do you know us?">
		<hr>
		<textarea id="xmd_aboutMe" class="xmdTexArea" rows="4" cols="50" style="margin: 0px 0px 15px; width: 794px; height: 82px;" placeholder="- Talk about your self:"></textarea><hr>
		<textarea id="xmd_aboutRoleplay" class="xmdTexArea" rows="4" cols="50" style="margin: 0px 0px 15px; width: 794px; height: 82px;" placeholder="- Talk a little about Roleplay:"></textarea>
      
      </label>
      <button onclick="applySupport2()" class="form-btn primary-default-btn transparent-btn">Submit</button>
    </form>
  </article>
</main><br>



<?php }else{?>
<br><br>
<h1 style="color:red;" class="sign-up__title">Support Apply is Closed Now</h1>
<?php } ?>
<hr>


<main class="main" id="skip-target">
      <div class="container">
		<div class="users-table table-wrapper">
          <table class="pages-table">
            <thead>
              <tr class="users-table-info">
                <th>ID</th>
                <th>Apply Date</th>
                <th>Account Name</th>
                <th>Status</th>
                <th>Reason</th>
              </tr>
            </thead>
			
			<?php
			$sql = "SELECT * FROM xmdSupport WHERE accountID='".$accountID."' ";
			 $query = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($query) > 0){
				while ($dn = mysqli_fetch_array($query)) {
						
						
				if ($dn["xmd_Status"] == 1){
					$status = '<button style="background-color: yellow;   color:black; font-size: 11px; border-radius: 4px;width: 78px;height: 27px;">Under Review</button>';
				}elseif ($dn["xmd_Status"] == 2){
					$status = '<button style="background-color: red; color:white;font-size: 11px; border-radius: 4px;width: 78px;height: 27px;">Unacceptable</button>';
				}elseif ($dn["xmd_Status"] == 3){
					$status = '<button style="background-color: green;color:white; border-radius: 4px;width: 78px;height: 27px;">Accepted</button>';
				}else{
					$status = '<button style="border-radius: 4px;width: 78px;height: 27px;">Unknown</button>';
				}
			?>
			
			<tbody>
				<tr class="">
                <td><?php echo $dn["ID"]; ?></td>
                <td><?php echo $dn["Date"]; ?></td>
                <td><?php echo $dn["accountName"]; ?></td>
                <td><?php echo $status ?></td>
                <td><?php echo $dn["xmd_Reason"]; ?></td>
                
				 
				</tr>
			 </tbody>
			
			<?php }} ?>
			
			</table>
        </div>
      </div>
    </main><br><br>



<?php include 'xmd/footer.php'; ?>