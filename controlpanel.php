<?php
include_once"allitnalp.php";
class controlpanel extends allitnalp
{
	function __construct()
	{
		$this->showNav();
		$this->showPanel();
		$this->showFooter();
	}//end construct


private function showPanel()
{
?>
<div class="row text-center well" style="background-color:#FFFFFF;">

<div class="col-sm-4 well" style="padding:10px;float:left;height:270px;">
    <div class="w3-tag w3-large w3-teal">User name</div><br><br>
    <img src="Imagenes/profiles/default-user.png" class="img-circle img-thumbnail" alt="Your profile picture" width="160" height="160"><br><br>
    <div class="w3-tag w3-large w3-light-blue">User mail</div> <b>-</b> 
    <div class="w3-tag w3-large w3-cyan">Images count</div>
</div>

<div class="col-sm-7 well" style="padding:10px;float:right;height:270px;">

<?php 
$USER_ID = 0;

if(isset($_SESSION['user_id']))
{
	$USER_ID = $_SESSION["user_id"];
}

$C = $this->getCon();
$qry = "SELECT * FROM images WHERE id_User = ?;";

$images_count = $this->getImgCount($USER_ID);
$width = 130;

if($images_count>10 && $images_count<40)
{
	$width=80;
}
else if($images_count>40)
{
	$width=50;
} 
$i=1;
while ($i <= $images_count) 
{
	$i++;
	echo "

<img src=\"uploads/5.jpg\" class=\"img-thumbnail\" alt=\"Your profile picture\" width=\"$width\" height=\"$width\" style=\"float:left;margin:5px;\">

	";

}
?>

</div>

</div>
<?php
}//end showPanel
   

private function getImgCount($id_User)
{
	$c=$this->getCon();
	$STM = $c->query("SELECT COUNT(id_User) AS Total FROM image WHERE id_User = $id_User;");
    
    if($STM->num_rows > 0)
    {
    	$a = $STM->fetch_assoc();   
        return $a['Total'];
    }//end if

}//end getImgCount

private function getUserData($id_User)
{
	$C = $this->getCon();

	$STM = $C->query("SELECT name,email,avatar FROM user WHERE id_User = $id_User;");
	if($STM->num_rows > 0)
    {
    	$a = $STM->fetch_assoc();   
        //$DATA = 
        return array('Name' => $a['name'],
                      'Email' => $a['email'],
                      'Avatar' => $a['avatar']);
    }//end if

}//end getUserData


}//end class index

new controlpanel();
?>