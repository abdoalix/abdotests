<?php include "xmd/header.php"; ?>
<style>
:root {
  --surface-color: #161624;
  --curve: 40;
}

* {
  box-sizing: border-box;
}

img {
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-o-user-select: none;
user-select: none;
}

body {
  font-family: 'Noto Sans JP', sans-serif;
  background-color: #161624;
}

.cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
  margin: 4rem 5vw;
  padding: 0;
  list-style-type: none;
}

.card {
  position: relative;
  display: block;
  height: 100%;  
  border-radius: calc(var(--curve) * 1px);
  overflow: hidden;
  text-decoration: none;
}

.card__image {      
    width: 45%;
    height: auto;
    margin-left: 6pc;
}

.card__overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1;      
  border-radius: calc(var(--curve) * 1px);    
  background-color:#161624;      
  transform: translateY(100%);
  transition: .2s ease-in-out;
}

.card:hover .card__overlay {
  transform: translateY(0);
}

.card__header {
  position: relative;
  display: flex;
  align-items: center;
  gap: 2em;
  padding: 2em;
  border-radius: calc(var(--curve) * 1px) 0 0 0;    
  background-color: #161624;
  transform: translateY(-100%);
  transition: .2s ease-in-out;
}

.card__arc {
  width: 80px;
  height: 80px;
  position: absolute;
  bottom: 100%;
  right: 0;      
  z-index: 1;
}

.card__arc path {
  fill: #161624;
  d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
}       

.card:hover .card__header {
  transform: translateY(0);
}

.card__thumb {
  flex-shrink: 0;
  width: 50px;
  height: 50px;      
  border-radius: 50%;      
}

.card__title {
  font-size: 1em;
  margin: 0 0 .3em;
  color: #6A515E;
}

.card__tagline {
  display: block;
  margin: 1em 0;
  font-family: "MockFlowFont";  
  font-size: .8em; 
  color: white;  
}

.card__status {
  font-size: .8em;
  color: white;
}

.card__description {
  padding: 0 2em 0.5em;
  margin: 0;
  color: white;
  font-family: "MockFlowFont";   
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 3;
  overflow: hidden;
}    
</style>
 <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Characters </h2>
		<ul class="cards">
<?php 
if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
$sq2l = "SELECT * FROM characters WHERE account='".$accountID."' ";
 $query2 = mysqli_query($conn, $sq2l);
 if (mysqli_num_rows($query2) > 0){
	 while ($dn23 = mysqli_fetch_array($query2)) {
		
	
$sq2l1 = "SELECT * FROM factions WHERE id='".$dn23["faction_id"]."' ";
 $query22 = mysqli_query($conn, $sq2l1);
 if (mysqli_num_rows($query22) > 0){
	 while ($dn33 = mysqli_fetch_array($query22)) {
		$factionName = $dn33["name"];
	 }
	 
 }else{
	 $factionName = "No Faction";
 }
 
 if ($Rights !== "xMD"){
	die("يرجي أرجاع الحقوق لـ xMD");
	exit;
}
?>


  <li>
    <div class="card">
      <img draggable="false" src="https://assets.open.mp/assets/images/skins/<?php echo $dn23["skin"] ?>.png" class="card__image" alt="" style="border-radius: 4pc;"/>
      <div class="card__overlay">
        <div class="card__header">
          <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>                     
          <div class="card__header-text">
            <h3 class="card__title"><?php echo $dn23["charactername"]; ?> (<?php echo $dn23['age'] ?>)</h3>            
            <span class="card__status" style="font-weight: bold;"><?php echo $factionName ?></span>
          </div>
        </div>
  
        <p class="card__description">Money: <span style="font-weight: bold;"><?php echo  number_format( $dn23["money"]) ?>$<span></p>
        <p class="card__description">BankMoney: <span style="font-weight: bold;"><?php echo number_format( $dn23["bankmoney"]) ?>$<span></p>
        <p class="card__description">Last Area: <span style="font-weight: bold;"><?php echo $dn23["lastarea"] ?><span></p>
		<p class="card__description">Last Login: <span style="font-weight: bold;"><?php echo  ( $dn23["lastlogin"]) ?><span></p>
        <p class="card__description">Creation Date: <span style="font-weight: bold;"><?php echo  ( $dn23["creationdate"]) ?><span></p>
      </div>
    </div>      
  </li>


<?php 

if (mysqli_num_rows($query2) <= 1){
	?>
		<li>
		</li>
	<?php 
}

}
 }else{
	 ?>
	 <h1 style="color:red;" class="sign-up__title">You Dont Have Any Characters yet.</h1>
	 <?php 
 }
?>
</ul>
 </div>
 </main>
<br><br>

<?php include "xmd/footer.php"; ?>