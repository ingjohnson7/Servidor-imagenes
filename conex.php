<?php
class conex
{
    function getCon()
	{
	    $user = "root";
		$pass = "";
		$server = "localhost";
		$db = "img_serv";
        $c = new mysqli($server,$user,$pass,$db);
        if($c == null)
		{
		    die("Error connect");
		}//end if
		return $c;
	}//end construct

}//end class

?>