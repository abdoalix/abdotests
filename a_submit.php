<?php include 'xmd/header.php'; ?>

<?php 

if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
?>
<?php if($admin>=$xmd_ManagerAdminLevelID){

if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
	?>

<?php 
if (isset($_GET['reviewID'])){
	if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
	$id = $_GET['reviewID'];
	   if (is_numeric($id)) {
		   $sql = "SELECT * FROM xmdSupport WHERE ID='".$id."' ";
			 $query = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($query) > 0){
				$row = mysqli_fetch_assoc($query);
				
				?>
				
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
				
				.xmd1{
					background-color:#e14242;
				}
				.xmd1:hover{
					background-color:#e57373;
				}
				
				.xmd2{
					background-color:#299345;
				}
				.xmd2:hover{
					background-color:#55e37b;
				}
				</style>
				
				  <div class="layer"></div>
				<main class="page-center" >
					 <h2 class="main-title">Review Application (<?php echo $row["accountName"]; ?>) </h2>

				  <article class="sign-up">
					<form onsubmit="return false" class="sign-up-form form">
						
					  <b style="color:white;">Name: <?php echo $row["xmd_Name"]?></b><br><br>
					  <b style="color:white;">Age: <?php echo $row["xmd_Age"]?></b><br><br>
					  <b style="color:white;">Discord: <?php echo $row["xmd_Discord"]?></b><br><br>
					  <b style="color:white;">Another Server: <?php echo $row["xmd_isAnotherServer"]?></b><br><br>
					  <b style="color:white;">Why us?: <?php echo $row["xmd_WhyUS"]?></b><br><br>
					  <b style="color:white;">Where did (<?php echo $row["accountName"] ?>) find us: <?php echo $row["xmd_WhereUS"]?></b><br><br>
					  <b style="color:white;">About (<?php echo $row["accountName"] ?>): <?php echo $row["xmd_AboutME"]?></b><br><br>
					  <b style="color:white;">About Roleplay: <?php echo $row["xmd_AboutRP"]?></b><br><br>
					  
					  
					  <br><br><hr><br><br>
					  
					  
					  <button onclick="window.location.replace('a_submit.php');" style=" width:8pc;" class="form-btn primary-default-btn transparent-btn">Go Back</button>					  
					  <button onclick="reject(<?php echo $id?>,<?php echo $row["xmd_Status"] ?>)" style="width: 10pc;margin-top: -40px;margin-left: 8.7pc;" class="xmd1 form-btn primary-default-btn transparent-btn">Reject</button>					  
					  <button onclick="accept(<?php echo $id?>,<?php echo $row["xmd_Status"] ?>)" style="width: 10pc;margin-top: -40px;margin-left: 19.5pc;" class="form-btn xmd2 primary-default-btn transparent-btn">Accept</button>					  

					</form>
				  </article>
				</main><br><br><br>
				
				<script >
				
				function reject(id,st) {
					if (st == 2){
						swal({
						  text: "This submission has already been rejected",
						  icon: "warning",
						  button: "Close",
						});
						return 
					}
					swal("Enter the reason for rejection", {
					  icon: "info",
					  content: "input",
					   buttons: ["Close", true],
					})
					.then((value) => {
						if (value.length<=4){
						swal({
						  text: "Please write a valid reason!",
						  icon: "warning",
						  button: "Close",
						});
						}else{
						 swal({
						  text: "The person was successfully rejected",
						  icon: "success",
						  button: "Close",
						}).then((value2) => {
						  var xmlhttp;
						  if(window.XMLHttpRequest){
							  xmlhttp = new XMLHttpRequest();
						  }else{
							  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						  }
						
						  xmlhttp.open("POST","xmd/posts.php", true);
						  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						  xmlhttp.send('app=true&id='+id+'&state=2&reason='+value);
							  
							  setTimeout(function(){ window.location.replace('a_submit.php'); }, 1500);

						 });
						}
					});
			     }
				 
				 
				function accept(id,st) {
					if (st == 3){
						swal({
						  text: "This submission has already been accepted",
						  icon: "warning",
						  button: "Close",
						  
						});
						return 
					}
					swal("Enter the reason for acceptance", {
					  icon: "info",
					  content: "input",
					  buttons: ["Close", true],
					})
					.then((value) => {
						if (value.length<=4){
						swal({
						  text: "Please write a valid reason!",
						  icon: "warning",
						  button: "Close",
						});
						}else{
						 swal({
						  text: "The user has been successfully accepted",
						  icon: "success",
						  button: "Close",
						}).then((value2) => {
						  var xmlhttp;
						  if(window.XMLHttpRequest){
							  xmlhttp = new XMLHttpRequest();
						  }else{
							  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						  }
						
						  xmlhttp.open("POST","xmd/posts.php", true);
						  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
						  xmlhttp.send('app=true&id='+id+'&state=3&reason='+value);
							  
							  setTimeout(function(){ window.location.replace('a_submit.php'); }, 1500);

						 });
						}
					});
			     }
				
				</script>
				
				
				<?php 
				
			 }else{
				header("Location: a_submit.php");
			 }
	   }else{
		   header("Location: a_submit.php");
	   }
	   
  include 'xmd/footer.php';   
die;
}
?>


<main class="main" id="skip-target">
      <div class="container">
	  <h2 class="main-title">Support Submissions </h2>
		<div class="users-table table-wrapper">
          <table class="pages-table">
            <thead>
              <tr class="users-table-info">
                <th>ID</th>
                <th>Apply Date</th>
                <th>Account Name</th>
                <th>Info</th>
                <th>Status</th>
                <th>Reason</th>
                <th>Reviewed By</th>
              </tr>
            </thead>
			
			<?php 
			$sql = "SELECT * FROM xmdSupport";
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
                <td><button style="width: 68px;" onclick="reviweSupprt(<?php echo $dn["ID"]; ?>)" class="form-btn primary-default-btn transparent-btn">Review</button></td>
                <td><?php echo $status ?> </td>
				<td><?php echo $dn["xmd_Reason"]; ?></td>
				<td><?php echo $dn["xmd_Admin"]; ?></td>
				
				</tr>
			 </tbody>
			
			 <?php }} ?>
			</table>
        </div>
      </div>
    </main><br><br>
	

<script>
function reviweSupprt(id){
	var xmlhttp;
	  if(window.XMLHttpRequest){
		  xmlhttp = new XMLHttpRequest();
	  }else{
		  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange = function(){
		  if(xmlhttp.readyState == 4 & xmlhttp.status == 200){
			  if (xmlhttp.responseText.includes("APPFound")){
				  window.location.replace("a_submit.php?reviewID="+id);
			  }else{
			  swal({
				  text: JSON.parse(xmlhttp.responseText),
				  icon: "info",
				  button: "Close",
				});
			}
		  }
	  }

	  xmlhttp.open("POST","xmd/posts.php", true);
	  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	  xmlhttp.send('reviewApplyS=true&id='+id);
}
</script>


<?php } include 'xmd/footer.php'; ?>