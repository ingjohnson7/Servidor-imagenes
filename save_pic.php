<?php
include_once'conex.php';
class save_pic extends conex
{
	function __construct()
	{
		$idUsr = 0;
        if(isset($_SESSION['idUsr']))
        {
	       $idUsr = $_SESSION['idUsr'];
        }//end if idUsr

		$destino = $_POST['cod'];
		$tipo = $_POST['type'];	
		$tamano = $_POST['size'];
		$dimension = $_POST['dimensions'];
			

        if(!$this->saveUploadedPic($idUsr,$destino,$tamano,$dimension,$tipo))
        {
        	echo "error";        	
        	unlink($destino);
        	exit;
        }//end if saveUploadedPic
        else
        {
        	echo "<br><div class=\"alert alert-success\"  style=\"width:40%\">
               <strong>Picture uploaded</strong>
               <span id='img_code' style='visibility:hidden'>
               ".$this->getPicCode()."
               </span> 
                </div>";
          //header("Location: links.php?id="+$destino);
        }
	

	}//end construct

function getMaxPicId()
{
  $C = $this->getCon();
  $qry = "SELECT MAX(id_Image) AS ID FROM image";
  $STM = $C->query($qry);
  $res = $STM->fetch_assoc();
  return $res['ID'];
}//end getMaxPicId

function getPicCode($t="")
{
  $temp="";
  $maxId="";
  if($t!=="")
  {
    $maxId = $this->getMaxPicId()+1; 
  }
  else
  {
    $maxId = $this->getMaxPicId();  
  }

  if(strlen($maxId)==1){
    $temp = "00000000".$maxId;
  }else if(strlen($maxId)==2){
    $temp = "0000000".$maxId;
  }else if(strlen($maxId)==3){
    $temp = "000000".$maxId;
  }else if(strlen($maxId)==4){
    $temp = "00000".$maxId;
  }else if(strlen($maxId)==5){
    $temp = "0000".$maxId;
  }else if(strlen($maxId)==6){
    $temp = "000".$maxId;
  }else if(strlen($maxId)==7){
    $temp = "00".$maxId;
  }
  return $temp;
}//edn getPicCode


function saveUploadedPic($usrId = 0, $location, $size, $dimensions, $type)
{


  $C = $this->getCon();
  $idUsr = 0;
  $code = $this->getPicCode("y");
  $idImage = 0;
  $l = $location;
  $s = $size;
  $t = $type;
  $d = $dimensions;
  $available = "YES";
  $uploadDate = date("d-m-Y");
 
  $STM = $C->prepare("INSERT INTO image VALUES (?,?,?,?,?,?,?,?,?);");
  $STM->bind_param("isissssss",
  	$idImage,
    $code,
  	$idUsr,
  	$l,
  	$s,
  	$t,
  	$d,
  	$available,
  	$uploadDate);

  $STM->execute();

  if($STM->affected_rows > 0)
  {
  	return true;
  }//end if
  else
  {
    return false;
  }//end else
        
}//end saveUploadedPic


}//end class

new save_pic();
?>