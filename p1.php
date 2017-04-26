<form enctype="multipart/form-data" action="p2.php" method="post">
    <input name="file[]" type="file" />
    <button class="add_more">Add More Files</button>
    <input type="button" id="upload" value="Upload File" />
</form>

<script type="text/javascript">
  $(document).ready(function(){
    $('.add_more').click(function(e){
        e.preventDefault();
        $(this).before("<input name='file[]' type='file' />");
    });
});

</script>