 <style type="text/css">
  
  #sortpicture {
  width: 0.1px;
  height: 0.1px;
  opacity: 0;
  overflow: hidden;
  position: absolute;
  z-index: -1;

}

#sortpicture + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: black;
    display: inline-block;
}

#sortpicture:focus + label,
#sortpicture + label:hover {
    background-color: red;
}

#sortpicture + label {
  cursor: pointer; /* "hand" cursor */
}
</style>
<?php
include_once"allitnalp.php";
class upload extends allitnalp
{
	function __construct()
	{
		$this->showNav("Upload your pics");
		$this->showUploader1();
		$this->showFooter();

	}//end construct


  public function showUploader1()
	{
	
	?>
  
<div class="well well-lg" style="width:50%;margin:0 auto;height:auto;"> 

<h3 class="text-center">
<span class="glyphicon glyphicon-arrow-down"></span>
Select your pictures
<span class="glyphicon glyphicon-arrow-down"></span>
</h3>

<div class="input-group">
        <label class="input-group-btn">
            <span class="btn btn-primary" style="">
              Browse&hellip; 
              <input type="file" id="sortpicture" name="file[]" style="display: none;">
            </span>
        </label>
        <input type="text" class="form-control" readonly>
</div>

<div id="response">
</div>
<br>
  <!-- Load jQuery and the necessary widget JS files to enable file upload -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  
  
  <!-- JavaScript used to call the fileupload widget to upload files -->
  <script>

    // When the server is ready...
$('#sortpicture').change('click', function() {

  $("#response").empty();//limpiar el div
  
    var file_data = $('#sortpicture').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);  
                              
                          
    $.ajax({
                url: 'upload1.php', // point to server-side PHP script 
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response)
                {

                     $('#response').append(php_script_response);// display response from the PHP script
                }
     });
});



  </script>
</div>
 

	
	<?php 	
	}//end showUploader1

    
}//end index
new upload();
?>