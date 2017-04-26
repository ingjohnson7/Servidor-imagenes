<?php
class borrar_pic
{
	function __construct()
	{
		$location = $_POST['cod'];
		
		if(!unlink($location))
	    {
            echo "<div class=\"alert alert-danger\">
            <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
            <strong>Error!</strong> while deleting picture.
            </div>";		
	    }//end if

	}//end construct
}//end class

new borrar_pic();
?>