<?php include 'xmd/header.php'; ?>
	<main class="main" id="skip-target">
      <div class="container">
        <div class="main-title-wrapper">
          <h2 class="main-title">Account History <span style="color: #959595;" >(<?php echo $name; ?><span>)</h2>
        </div>
		
		
		<?php 
		 $charID = "";
			 $sql = "SELECT * FROM accounts WHERE password='".$_COOKIE["connectInfo"]."' ";
			 $query = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($query) > 0){
				while ($dn = mysqli_fetch_array($query)) {
					$charID = $dn['id'];
				}
			 }
			
			 
			 $sql2 = "SELECT * FROM adminhistory WHERE user='".$charID."' ";
			 $query2 = mysqli_query($conn, $sql2);
			 if (mysqli_num_rows($query2) > 0){
				
		?>
		
		<div class="users-table table-wrapper">
          <table class="pages-table">
            <thead>
              <tr class="users-table-info">
                <th>ID</th>
                <th>Action</th>
                <th>Character</th>
                <th>Reason</th>
                <th>Time</th>
                <th>Admin</th>
                <th>Date</th>
              </tr>
            </thead>
          
		
		<?php 
			 }
		 ?>
		
		
		<?php 
			 $charID = "";
			 $sql = "SELECT * FROM accounts WHERE password='".$_COOKIE["connectInfo"]."' ";
			 $query = mysqli_query($conn, $sql);
			 if (mysqli_num_rows($query) > 0){
				while ($dn = mysqli_fetch_array($query)) {
					$charID = $dn['id'];
				}
			 }
			
			 
			 $sql2 = "SELECT * FROM adminhistory WHERE user='".$charID."' ";
			 $query2 = mysqli_query($conn, $sql2);
			 if (mysqli_num_rows($query2) > 0){
				while ($dn2 = mysqli_fetch_array($query2)) {
				if ($dn2["action"] == 0){
					$actionName = "jail";
				}elseif($dn2["action"] == 1){
					$actionName = "kick";
				}elseif($dn2["action"] == 2){
					$actionName = "ban";
				}elseif($dn2["action"] == 3){
					$actionName = "app";
				}elseif($dn2["action"] == 4){
					$actionName = "warn";
				}elseif($dn2["action"] == 5){
					$actionName = "autoban";
				}elseif($dn2["action"] == 6){
					$actionName = "other";
				}elseif($dn2["action"] == 99){
					$actionName = "force-app";
				}
				
				$sql22 = "SELECT * FROM characters WHERE id='".$dn2["user_char"]."' ";
				 $query3 = mysqli_query($conn, $sql22);
				 if (mysqli_num_rows($query3) > 0){
					while ($dn23 = mysqli_fetch_array($query3)) {
						$Char_Name = $dn23["charactername"];
					}
				 }else{
					 $Char_Name = "None";
				 }
				 
				 
				$sql223 = "SELECT * FROM accounts WHERE id='".$dn2["admin"]."' ";
				 $query33 = mysqli_query($conn, $sql223);
				 if (mysqli_num_rows($query33) > 0){
					while ($dn232 = mysqli_fetch_array($query33)) {
						$Char_Name2 = $dn232["username"];
					}
				 }else{
					 $Char_Name2 = "None";
				 }
					
				
			  ?>
			
			<tbody>
				<tr class="">
                <td><?php echo $dn2["id"]?></td>
                <td><?php echo $actionName?></td>
				
                <td><?php echo $Char_Name ?></td>
                <td><?php echo $dn2["reason"]?></td>
                <td><?php echo $dn2["duration"] ?> min</td>
                <td><?php echo $Char_Name2; ?></td>
                <td><?php echo $dn2["date"] ?></td>
				 
				</tr>
			 </tbody>
		  <?php 
			  
			  }
			 }else{
				 echo "<center><span style='color:red;'>You dont have any history yet.</span></center>";
			 }
			 
	 ?>
		
		   </table>
        </div>
		
      </div>
    </main>
	
<?php include 'xmd/footer.php'; ?>
