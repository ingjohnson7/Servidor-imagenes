<?php
include_once"allitnalp.php";
class index extends allitnalp
{
	function __construct()
	{
		$this->showNav();
		$this->showPics();
		$this->showFooter();
	}//end construct



    
}//end index
new index();
?>