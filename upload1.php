<script type="text/javascript">
  
$('#delpic').on('click', function()
  {
     var x = $("#cod span").html();

      $.ajax({

                type: 'POST',                
                url: 'borrar_pic.php', // point to server-side PHP script 
                data:  "cod=" + x,                        
                dataType : "text",
                success: function(php_script_response){
                     $('#response').append(php_script_response);// display response from the PHP script, if any
                     $('#sortpicture').val("");
                }
     });
     $("#response").empty();
  });

$('#uppic').on('click', function()
  {
     var location1 = $("#cod").text();
     var type1 = $("#type").text();
     var size1 = $("#size").text();
     var dimensions1 = $("#dimensions").text();
     $("#response").empty();
      $.ajax({

                type: 'POST',                
                url: 'save_pic.php', // point to server-side PHP script 
                data:{  cod : location1,
                       type : type1,
                       size : size1,
                       dimensions : dimensions1
                     },                        
                dataType : "text",
                success: function(php_script_response){
                    
                     $('#response').append(php_script_response);// display response from the PHP script, if any
                     $('#sortpicture').val("");
                     var new_url = "links.php?id="+$('#img_code').text().trim();
                     window.location.assign(new_url);
                }
     });
  });



</script>
<?php
include_once'conex.php';
class upload1 extends conex
{

function __construct()
{
$idUsr = 0;
        if(isset($_SESSION['idUsr']))
        {
         $idUsr = $_SESSION['idUsr'];
        }//end if idUsr


    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        
    }//end if
    else 
    {
    	  $destino = 'uploads/'.$idUsr.' - ' . $_FILES['file']['name'];
    	  $tamano = ($_FILES['file']['size']/1000)." KB";
        $tipo = $_FILES['file']['type'];
        
       
        //no copiar todabia
        move_uploaded_file($_FILES['file']['tmp_name'], $destino);
        
        list($width, $height) = getimagesize($destino);
        $dimension = $width."x".$height;
        

        echo "<div id='cod' style='display: none;'><span>$destino</span></div>";

        echo "<br><b>Type: </b><span id='type' style='font-size:13px;' class='label label-primary'>
        ".$tipo."</span> ";        
        echo "<b>Size: </b><span id='size' style='font-size:13px;' class='label label-primary'>
        ".$tamano."</span> ";
        echo "<b>Dimensions: </b><span id='dimensions' style='font-size:13px;' class='label label-primary'>
        ".$dimension."</span><br><br>"; 

        echo "<img src='$destino' class='img-thumbnail' id='pc' width='150' height='130'><br>";

        echo "<a id='delpic' class='label label-danger' style='font-size:18px;float:left;margin-top:10px;margin-left:30px;'>
          <span class=\"glyphicon glyphicon-remove\"></span></a>";

        echo "<a id='uppic' class='label label-success' style='font-size:18px;float:left;margin-top:10px;margin-left:10px;'>
          <span class=\"glyphicon glyphicon-upload\"></span></a>";
        
        

    }//end else

}//end __construct


private function showImgLinks($id = 0)
{
  
}//enc showImgLinks

}//end class

new upload1();
?>