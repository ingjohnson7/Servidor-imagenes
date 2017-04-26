<script type="text/javascript">
  
$('#delpic11').on('click', function()
  {
     var x = $("#cod span").html();

     $.ajax({

                type: 'POST',                
                url: 'delPic.php', // point to server-side PHP script 
                data:  "cod=" + x,                        
                dataType : "text",
                success: function(php_script_response){
                     $('#response').append(php_script_response);// display response from the PHP script, if any
                     $('#sortpicture').val("");
                }
     });
     $("#response").empty();
  });
</script>

<?php
//delete pic
include_once'conex.php';
class delPic extends conex
{

function __construct()
{
   
if(isset($_POST['cod']))
{
	
	$location = $_POST['cod'];
	$C = $this->getCon();

	$qry = "DELETE FROM image WHERE lacation = ?";
    
	$STM = $C->prepare($qry);
	$STM->bind_param("s",$location);
	$STM->execute();

	if(!unlink($location))
	{
echo "<div class=\"alert alert-danger\">
 <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Error!</strong> while deleting picture.
</div>";		
	}//end if

	if($STM->affected_rows == 0)
	{
echo "<div class=\"alert alert-danger\">
 <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>Error!</strong> while deleting picture.
</div>";
      exit;
	}//end if
	else
	{
		$STM->close();
	}//end else

}
else
{
	echo "<h3>Image id not especified</h3>";
}

}//end construct

}//end delPic
new delPic();
?>